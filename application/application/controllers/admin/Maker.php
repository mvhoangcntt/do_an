<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Maker extends Admin_Controller
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
        $this->lang->load('maker');
        $this->load->model('Maker_model');
        $this->_data = new Maker_model();
        $this->_name_controller = $this->router->fetch_class();
        $this->session->category_type = $this->_name_controller;
    }
    public function index(){
    	$data['heading_title'] = 'Nhà sản xuất';
        $data['heading_description'] = "";
        $this->breadcrumbs->push('Home', base_url());
        $this->breadcrumbs->push($data['heading_title'], '#');
        $data['breadcrumbs'] = $this->breadcrumbs->show();
    	$data['main_content'] = $this->load->view($this->template_path . $this->_name_controller. '/index', $data, TRUE);
        // var_dump($data); exit();
        $this->load->view($this->template_main, $data);
    }
    public function ajax_list()
    {
        $length =  $this->input->post('length');
        $no = $this->input->post('start');
        $page = $no/$length + 1;
        $params['parent_id'] = $this->input->post('parent_id');
        $params['catalog'] = $this->input->post('catalog');
        $params['maker_id'] = $this->input->post('maker_id');
        $params['category_type'] = $this->session->category_type;
        $params['page'] = $page;
        $params['limit'] = $length;
        $list = $this->_data->getData($params);
        // var_dump($list); exit();
        $data = array();
        if(!empty($list)) foreach ($list as $item) {
            $row = array();
            $row[] = $item->id;
            $row[] = $item->id;
            $row[] = $item->name_maker;
            $row[] = $item->content;
            $row[] = $item->created;
            $row[] = $item->created_time;
            //thêm action
            $action = '<div class="text-center">';
            $action .= '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="'.$this->lang->line('btn_edit').'" onclick="edit_form('."'".$item->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>';
            
            $action .= '</div>';
            $row[] = $action;
            $data[] = $row;
        }
        $product = array(
         "data"            => $data,
         "recordsTotal"    => $this->_data->getTotalAll(),
         "recordsFiltered" => $this->_data->getTotal($params),
         "draw"            => $input_post['draw'],
        );
        exit(json_encode($product));
    }
    
    public function ajax_add()
    {
        $data = $this->_convertData();
        $data['created'] = date("Y-m-d");
        // var_dump($data); exit();
        $insert_id = $this->_data->save($data);
        // var_dump($insert_id); exit();
        if($insert_id != ''){
            $action = $this->router->fetch_class();
            $note = "Insert $action: ".$insert_id;
            $this->addLogaction($action,$note);

            $message['type'] = 'success';
            $message['message'] = 'Thành công !';
            exit(json_encode($message));
        }else{
            $message['type'] = 'warning';
            $message['message'] = 'Lỗi thêm nhà sản xuất !';
            exit(json_encode($message));
        }
    }

    public function ajax_edit($id)
    {
        $data  = $this->_data->get_json($id);
        die(json_encode($data));
    }

    public function ajax_update($id){
        
        $data = $this->_convertData();
        // var_dump($data); exit();
        $conditions['id'] = $id;
        if ($this->_data->update($conditions,$data)) 
        {
            $action = $this->router->fetch_class();
            $note = "Update $action: ".$id;
            $this->addLogaction($action,$note);

            $message['type'] = 'success';
            $message['message'] = 'Thành công !';
            exit(json_encode($message));
        }else{
            $message['type'] = 'warning';
            $message['message'] = 'Lỗi sửa nhà sản xuất !';
            exit(json_encode($message));
        }
    }
    private function _convertData(){
        $this->_validate();
        $data = $this->input->post();
        $data_store = array();
        $arrLang = $this->config->item('cms_language');
        if (!empty($data)) foreach ($data as $key => $item) {
            if (is_array($item)){
                $keyLang = array_keys($item);
                if(!empty($keyLang[0]) && in_array($keyLang[0],array_keys($arrLang) )) foreach ($arrLang as $lang_code => $lang_name) {
                    if (in_array($key, array('content_more')))
                        $data_store[$key][$lang_code] = !empty($item[$lang_code]) ? json_encode($item[$lang_code]) : '';
                    else
                        $data_store[$key][$lang_code] = trim($item[$lang_code]);
                }else $data_store[$key] = json_encode($item);
            } else {
                $data_store[$key] = $item;
            }
        }
        return $data_store;
    }
    //Kiêm tra thông tin post lên
    private function _validate()
    {
        if($this->input->server('REQUEST_METHOD') == 'POST' && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $post = $this->input->post();
            $config = array(
                'name_maker'   => array(
                    'field'  => 'name_maker',
                    'label'  => 'name_maker',
                    'rules'  => 'required',
                    'errors' => array(
                        'required'  => 'Không được để trống !',
                   ),
                ),
                'content'   => array(
                    'field'  => 'content',
                    'label'  => 'content',
                    'rules'  => 'required',
                    'errors' => array(
                        'required'  => 'Không được để trống !',
                   ),
                ),
            );

            foreach ($config as $value) {
                $this->form_validation->set_rules(
                    $value['field'],
                    $value['label'],
                    $value['rules'],
                    $value['errors']
                );
            }
           
            if ($this->form_validation->run() === false) {
                $message['type'] = "warning";
                $message['message'] = "Đã có lỗi sảy ra vui lòng kiểm tra lại !";
                $valid = [];
                foreach ($config as $key => $value) {
                    $valid[$key] = form_error($value['field']);
                }
                $message['validation'] = $valid;
                die(json_encode($message));
            }
        }
    }
    public function ajax_delete($id){
        $conditions['id'] = $id;
        if( $this->_data->delete($conditions, $tablename['maker'])){
            $action = $this->router->fetch_class();
            $note = "Delete $action: ".$id;
            $this->addLogaction($action,$note);
            $message['type'] = 'success';
            $message['message'] = "Xóa thành công !";
            die(json_encode($message));
        }else{
            $message['type'] = 'warning';
            $message['message'] = "Đã sảy ra lỗi !";
            die(json_encode($message));
        }
    }

    // load select 2 size
    public function ajax_load(){
        $this->checkRequestGetAjax();
        $keyword = toSlug(toNormal($this->input->get("q")));
        $data    = $this->_data->list_size_datatable($keyword);
        if(!empty($data)) foreach ($data as $item) {
            $item = (object) $item;
            $json[] = ['id'=>$item->text_size, 'text'=>$item->text_size];
        }
        die(json_encode($json));
    }
    public function ajax_update_field($check){
        $this->checkRequestGetAjax();
        $keyword = toSlug(toNormal($this->input->get("q")));
        $data = $this->_data->filter_catalog($keyword);
        if(!empty($data)) foreach ($data as $item) {
            $item = (object) $item;
            $json[] = ['id'=>$item->id, 'text'=>$item->name_catalog];
        }
        // var_dump($data); exit();
        
        die(json_encode($json));
    }
}