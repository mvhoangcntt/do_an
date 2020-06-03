<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Slide extends Admin_Controller
{
   protected $_data;
    protected $_name_controller;
    protected $category_tree;

    const STATUS_CANCEL = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DRAFT = 2;

    public function __construct()
    {
        parent::__construct();
        //tải thư viện
        $this->lang->load('media_library');
        $this->load->model('Slide_model');
        $this->_data = new Slide_model();
        $this->_name_controller = $this->router->fetch_class();
    }

    public function index(){
        $data['heading_title'] = ucfirst($this->router->fetch_class());
        $data['heading_description'] = 'Thư viện ảnh, video';
        /*Breadcrumbs*/
        $this->breadcrumbs->push('Home', base_url());
        $this->breadcrumbs->push($data['heading_title'], '#');
        $data['breadcrumbs'] = $this->breadcrumbs->show(); 
        $data['main_content'] = $this->load->view($this->template_path . $this->_name_controller . '/index', $data, TRUE);
        $this->load->view($this->template_main, $data);
    }

    public function ajax_list()
    {
        if($this->input->server('REQUEST_METHOD') == 'POST' && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $data = array();
            $length =  $this->input->post('length');
            $no = $this->input->post('start');
            $page = $no/$length + 1;
            $params['parent_id'] = $this->input->post('parent_id');
            // --- lọc theo cái type nào của category
            $params['page'] = $page;
            $params['limit'] = $length;
            $list = $this->_data->getData($params);
            // var_dump($list); exit;
            if(!empty($list)) foreach ($list as $item) {
                $no++;
                $row = array();
                $row[] = $item->id;
                $row[] = $item->id;
                if(!empty($item->thumbnail)) $row[] = '<img style="height:150px" src="../public/media/'.$item->thumbnail.'">';
                else $row[] = '<img style="height:150px" src=https://i.ytimg.com/vi/'.getYoutubeKey($item->href_video).'/maxresdefault.jpg>';
                switch ($item->is_status){
                    case self::STATUS_ACTIVE:
                        $row[] = '<span class="label label-success btnUpdateStatus" data-value="'.self::STATUS_ACTIVE.'">'.$this->lang->line('text_status_'.self::STATUS_ACTIVE).'</span>';
                        break;
                    case self::STATUS_DRAFT:
                        $row[] = '<span class="label label-default btnUpdateStatus" data-value="'.self::STATUS_DRAFT.'">'.$this->lang->line('text_status_'.self::STATUS_DRAFT).'</span>';
                        break;
                    default:
                        $row[] = '<span class="label label-danger btnUpdateStatus" data-value="'.self::STATUS_CANCEL.'">'.$this->lang->line('text_status_'.self::STATUS_CANCEL).'</span>';
                        break;
                }
                $row[] = $item->created_time;
                $row[] = $item->updated_time;//formatDate($item->updated_time)
                //thêm action
                $action = '<div class="text-center">';
                $action .= '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="'.$this->lang->line('btn_edit').'" onclick="edit_form('."'".$item->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>';
                $action .= '&nbsp;<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="' . $this->lang->line('btn_remove') . '" onclick="delete_item(' . "'" . $item->id . "'" . ')"><i class="glyphicon glyphicon-trash"></i></a>';
                $action .= '</div>';
                $row[] = $action;
                $data[] = $row;
            }

            $output = array(
                "draw" => $this->input->post('draw'),
                "recordsTotal" => $this->_data->getTotalAll(),
                "recordsFiltered" => $this->_data->getTotal($params),
                "data" => $data,
            );
            //trả về json
            die(json_encode($output));
        }
        exit;
    }

    /*
     * Ajax xử lý thêm mới
     * */
    public function ajax_add()
    {
        $data_store = $this->_convertData();
        if($id_category = $this->_data->save($data_store)){
            // log action
            $action = $this->router->fetch_class();
            $note = "Insert $action: ".$id_category;
            $this->addLogaction($action,$note);
            $message['type'] = 'success';
            $message['message'] = $this->lang->line('mess_add_success');
        }else{
            $message['type'] = 'error';
            $message['message'] = $this->lang->line('mess_add_unsuccess');
        }
        die(json_encode($message));
    }
    /*
     * Ajax lấy thông tin
     * */
    public function ajax_edit($id)
    {
        $data['data'][0] = $this->_data->getById($id);
        // if(!empty($data['data'][0]->parent_id)) $data['parent_id'] = $this->_data->getSelect2($data['data'][0]->parent_id);
        die(json_encode($data));
    }

    public function ajax_update_field()
    {
        if($this->input->server('REQUEST_METHOD') == 'POST' && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $id = $this->input->post('id');
            $field = $this->input->post('field');
            $value = $this->input->post('value');
            $response = $this->_data->update(['id' => $id], [$field => $value]);
            if($response != false){
                $message['type'] = 'success';
                $message['message'] = $this->lang->line('mess_update_success');
            }else{
                $message['type'] = 'error';
                $message['message'] = $this->lang->line('mess_update_unsuccess');
            }
            print json_encode($message);
        }
        exit;
    }
    /*
     * Ajax xử lý thêm mới
     * */
    public function ajax_update()
    {
        $data_store = $this->_convertData();
        // var_dump($data_store); exit;
        $response = $this->_data->update(array('id' => $this->input->post('id')), $data_store, $this->_data->table);
        if($response != false){
            // log action
            $action = $this->router->fetch_class();
            $note = "Update $action: ".$data_store['id'];
            $this->addLogaction($action,$note);
            $message['type'] = 'success';
            $message['message'] = $this->lang->line('mess_update_success');
        }else{
            $message['type'] = 'error';
            $message['message'] = $this->lang->line('mess_update_unsuccess');
        }
        die(json_encode($message));
    }

    public function ajax_delete($id)
    {
        $response = $this->_data->delete(['id'=>$id]);
        if($response != false){
            // log action
            $action = $this->router->fetch_class();
            $note = "Update $action: $id";
            $this->addLogaction($action,$note);
            $message['type'] = 'success';
            $message['message'] = $this->lang->line('mess_delete_success');
        }else{
            $message['type'] = 'error';
            $message['message'] = $this->lang->line('mess_delete_unsuccess');
            $message['error'] = $response;
            log_message('error',$response);
        }
        die(json_encode($message));
    }

    /*
     * Kiêm tra thông tin post lên
     * */
    private function _validate()
    {
        if($this->input->server('REQUEST_METHOD') == 'POST' && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            if (!empty($this->config->item('cms_language'))) foreach ($this->config->item('cms_language') as $lang_code => $lang_name) {
                if ($lang_code === $this->config->item('default_language')) {
                    $this->form_validation->set_rules('is_status', 'status' . ' - không được để trống', 'required');
                    // $this->form_validation->set_rules('thumbnail', 'Hình ảnh' . ' - không được để trống', 'required');
                    // $this->form_validation->set_rules('href_video', 'Link video' . ' - không được để trống', 'required');
                }
            }
            if ($this->form_validation->run() === false) { 
                $message['type'] = "warning";
                $message['message'] = $this->lang->line('mess_validation');
                $valid = [];
                if (!empty($this->config->item('cms_language'))) foreach ($this->config->item('cms_language') as $lang_code => $lang_name) {
                    if ($lang_code === $this->config->item('default_language')) {
                        $valid["is_status"] = form_error("is_status");

                    }
                }
                $message['validation'] = $valid;
                die(json_encode($message));
            }
        }
    }

    private function _convertData(){
        $this->_validate();
        $data = $this->input->post();
        if ($data['thumbnail'] != '' && $data['href_video'] != '') {
            $message['type'] = "warning";
            $message['message'] = 'Chỉ được chọn hình ảnh hoặc link video youtube';
            die(json_encode($message));
        }
        if ($data['thumbnail'] == '' && $data['href_video'] == '') {
            $message['type'] = "warning";
            $message['message'] = 'Chọn hình ảnh hoặc link video youtube';
            die(json_encode($message));
        }
        return $data;
    }
}