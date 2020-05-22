<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Showroom extends Admin_Controller
{
    protected $_data;
    protected $_name_controller;

    const STATUS_CANCEL = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DRAFT = 2;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('showroom_model');
        $this->_data = new Showroom_model();
        $this->_name_controller = $this->router->fetch_class();
    }

    public function index()
    {
        $data['heading_title'] = ucfirst($this->_name_controller);
        $data['heading_description'] = "Danh sách $this->_name_controller";
        /*Breadcrumbs*/
        $this->breadcrumbs->push('Home', base_url());
        $this->breadcrumbs->push($data['heading_title'], '#');
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        /*Breadcrumbs*/
        $data['main_content'] = $this->load->view($this->template_path . $this->_name_controller . '/index', $data, TRUE);
        $this->load->view($this->template_main, $data);
    }

    public function ajax_list()
    {
        if($this->input->server('REQUEST_METHOD') == 'POST' && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
            $length = $this->input->post('length');
            $no = $this->input->post('start');
            $page = $no/$length + 1;
            $params['page'] = $page;
            $params['lang_code'] = !empty($this->input->post('filter_language_code'))?$this->input->post('filter_language_code'):$this->session->admin_lang_code;
            $params['limit'] = $length;
            $params['order'] = array('updated_time'=>'DESC');
            $list = $this->_data->getData($params);

            $data = array();
            if(!empty($list)) foreach ($list as $item) {
                $no++;
                $row = array();
                $row[] = $item->id;
                $row[] = $item->id;
                $row[] = $item->title;
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
                $row[] = date('d/m/Y H:i',strtotime($item->created_time));
                $row[] = date('d/m/Y H:i',strtotime($item->updated_time));
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
            echo json_encode($output);
        }
        exit;
    }

    public function ajax_add()
    {
        $data_store = $this->_convertData();
        unset($data_store['id']);
        if($this->_data->save($data_store)){
            $action = $this->router->fetch_class();
            $note = "Insert $action: ".$this->db->insert_id();
            $this->addLogaction($action,$note);
            $message['type'] = 'success';
            $message['message'] = $this->lang->line('mess_add_success');
        }else{
            $message['type'] = 'error';
            $message['message'] = $this->lang->line('mess_add_unsuccess');
        }
        die(json_encode($message));
    }

    public function ajax_edit($id)
    {
        $data = (array) $this->_data->getById($id);
        die(json_encode($data));
    }
    public function ajax_update(){
        $data_store = $this->_convertData();
        $data_store['updated_time'] = date('Y-m-d H:i:s', time());
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

    public function ajax_delete($id)
    {
        $response = $this->_data->delete(['id'=>$id]);
        if($response != false){
            $this->_data->delete(["id"=>$id],$this->_data->table_trans);
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

    private function _validate()
    {
        if($this->input->server('REQUEST_METHOD') == 'POST' && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            if (!empty($this->config->item('cms_language'))) foreach ($this->config->item('cms_language') as $lang_code => $lang_name) {
                $this->form_validation->set_rules('title[' . $lang_code . ']', 'Tên chi nhánh' . ' - ' . $lang_name, 'required|trim|min_length[5]|max_length[300]');
                $this->form_validation->set_rules('meta_title[' . $lang_code . ']', $this->lang->line('error_title') . ' - ' . $lang_name, 'trim|min_length[5]|max_length[300]');
                $this->form_validation->set_rules('description[' . $lang_code . ']', 'Địa chỉ' . ' - ' . $lang_name, 'trim|required');
                $this->form_validation->set_rules('meta_description[' . $lang_code . ']', $this->lang->line('error_description') . ' - ' . $lang_name, 'trim');
                //$this->form_validation->set_rules('meta_keyword[' . $lang_code . ']', $this->lang->line('error_keyword') . ' - ' . $lang_name, 'required');
            }
            $this->form_validation->set_rules('longtitude', 'Kinh độ', 'required|trim');
            $this->form_validation->set_rules('lattitude', 'Vĩ độ', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'trim|valid_email');


            if ($this->form_validation->run() === false) {
                $message['type'] = "warning";
                $message['message'] = $this->lang->line('mess_validation');
                $valid = [];
                if (!empty($this->config->item('cms_language'))) foreach ($this->config->item('cms_language') as $lang_code => $lang_name) {
                    $valid["title[$lang_code]"] = form_error("title[$lang_code]");
                    $valid["meta_title[$lang_code]"] = form_error("meta_title[$lang_code]");
                    $valid["description[$lang_code]"] = form_error("description[$lang_code]");
                    $valid["meta_description[$lang_code]"] = form_error("meta_description[$lang_code]");
                    $valid["meta_keyword[$lang_code]"] = form_error("meta_keyword[$lang_code]");
                }
                $valid["longtitude"] = form_error("longtitude");
                $valid["lattitude"] = form_error("lattitude");
                $valid["email"] = form_error("email");

                $message['validation'] = $valid;
                die(json_encode($message));
            }
        }
    }

    private function _convertData(){
        $this->_validate();
        $data = $this->input->post();
        return $data;
    }
}