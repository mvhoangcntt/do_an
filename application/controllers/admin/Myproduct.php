<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Myproduct extends Admin_Controller
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
        $this->lang->load('myproduct');
        $this->load->model('myproduct_model');
        $this->_data = new Myproduct_model();
        $this->_name_controller = $this->router->fetch_class();
        $this->session->category_type = $this->_name_controller;
    }
    public function index(){
    	$data['heading_title'] = 'MV Hoàng';
        $data['heading_description'] = "Danh sách sản phẩm";
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
            $size = $this->myproduct_model->get_size($item->id);
            $s = '';
            foreach ($size as $key) {
                $s .= $key->text_size." ";
            }
            $catalog = $this->myproduct_model->get_catalog($item->catalog);
            $cata = '';
            foreach ($catalog as $key) {
                $cata .= $key->name_catalog." ";
            }
            $maker = $this->myproduct_model->get_maker($item->maker_id);
            $ma = '';
            foreach ($maker as $key) {
                $ma .= $key->name_maker." ";
            }
            $row = array();
            $row[] = $item->id;
            $row[] = $item->id;
            $row[] = $item->name;
            $row[] = $item->_content;
            $row[] = $cata;
            $row[] = '<img style="width: 50px" src="../public/media/'.$item->thumbnail.'">';
            $row[] = $s;
            $row[] = $ma;
            $row[] = $item->price;
            $row[] = $item->created;
            $row[] = $item->total;
            //thêm action
            $action = '<div class="text-center">';
            $action .= '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="'.$this->lang->line('btn_edit').'" onclick="edit_form('."'".$item->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>';
            $action .= '&nbsp;<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="' . $this->lang->line('btn_remove') . '" onclick="delete_item('."'".$item->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
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
        $quantity   =  $data['quantity'];
        $text_size  =  $data['textsize'];
        // var_dump($data); exit();
        $insert_id = $this->_data->save($data);
        // var_dump($insert_id); exit();
        if($insert_id != ''){
            $this->convert_size($insert_id, $quantity, $text_size);
        }else{
            $message['type'] = 'warning';
            $message['message'] = 'Lỗi thêm sản phẩm !';
            exit(json_encode($message));
        }
    }

    public function ajax_edit($id)
    {
        $data          = $this->_data->get_json($id);
        $data->size    = $this->_data->get_size_come_product($id);
        $data->trans   = $this->_data->get_table_trans($id);
        $data->catalog = $this->_data->get_table_catalog($id);
        $data->maker_id   = $this->_data->get_table_maker($id);
        die(json_encode($data));
    }

    public function ajax_update($id){
        $data = $this->_convertData();
        $quantity   =  $data['quantity'];
        $text_size  =  $data['textsize'];
        $conditions['id'] = $id;
        if ($this->_data->update($conditions,$data)) 
        {
            $this->convert_size($id, $quantity, $text_size);
        }else{
            $message['type'] = 'warning';
            $message['message'] = 'Lỗi sửa sản phẩm !';
            exit(json_encode($message));
        }
    }

    public function convert_size($id, $quantity, $text_size){
      // xóa thông tin cũ
        $size['product_id'] = $id;
        $tablename['size'] = $this->_data->table_product;
        $this->_data->delete($size, $tablename['size']);
        
        foreach ($quantity as $key_quantity => $value_quantity) {
            $size = array(
                "product_id"   => $id,
                "text_size"    => $text_size[$key_quantity],
                "quantity"     => $value_quantity,
            );
            if(!$this->_data->set_size($size, $this->_data->table_product)){
                $message['type'] = 'warning';
                $message['message'] = 'Lỗi thêm size !';
                exit(json_encode($message));
            }
        }
        $message['type'] = 'success';
        $message['message'] = 'Thành công !';
        exit(json_encode($message));
    }
    private function _convertData(){
        $this->_validate();
        $data = $this->input->post();
        $data['name'] = $data['title']['vi'];
        $data['_content'] = $data['description']['vi'];
        return $data;
    }
    //Kiêm tra thông tin post lên
    private function _validate()
    {
        if($this->input->server('REQUEST_METHOD') == 'POST' && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            
            $config = array(
                'catalog'   => array(
                    'field'  => 'catalog',
                    'label'  => 'price',
                    'rules'  => 'required',
                    'errors' => array(
                        'required'  => 'Không được để trống !',
                   ),
                ),
                'maker_id'   => array(
                    'field'  => 'maker_id',
                    'label'  => 'price',
                    'rules'  => 'required',
                    'errors' => array(
                        'required'  => 'Không được để trống !',
                   ),
                ),
                'price'   => array(
                    'field'  => 'price',
                    'label'  => 'price',
                    'rules'  => 'required|numeric',
                    'errors' => array(
                        'required'  => 'Không được để trống !',
                        'numeric'   => 'Không phải là số !'
                   ),
                ),
                'total'   => array(
                    'field'  => 'total',
                    'label'  => 'total',
                    'rules'  => 'required|numeric',
                    'errors' => array(
                        'required'  => 'Không được để trống !',
                        'numeric'   => 'Không phải là số !'
                   ),
                ),
            );


            if (!empty($this->config->item('cms_language'))) foreach ($this->config->item('cms_language') as $lang_code => $lang_name) {
                
                // if ($lang_code === $this->config->item('default_language')) {
                    $config['title['.$lang_code.']'] = array(
                        'field'  => "title[".$lang_code."]",
                        'label'  => 'title_'.$lang_name,
                        'rules'  => 'required|min_length[5]',
                        'errors' => array(
                            'required'  => 'Không được để trống !',
                            'min_length'=> 'Nhập độ dài lớn hơn 5 ký tự !'
                        ),
                    );
                    // $config['content['.$lang_code.']'] = array(
                    //     'field'  => "content[".$lang_code."]",
                    //     'label'  => 'content_'.$lang_name,
                    //     'rules'  => 'required',
                    //     'errors' => array(
                    //         'required'  => 'Không được để trống !',
                    //     ),
                    // );
                    $config['meta_title['.$lang_code.']'] = array(
                        'field'  => "meta_title[".$lang_code."]",
                        'label'  => 'meta_title_'.$lang_name,
                        'rules'  => 'required|trim|min_length[5]|max_length[300]',
                        'errors' => array(
                            'required'  => 'Không được để trống !',
                            'trim'      => '',
                            'min_length' => 'Độ dài chưa đủ !',
                            'max_length' => 'Độ dài vượt quá quy định !'
                        ),
                    );
                    $config['meta_description['.$lang_code.']'] = array(
                        'field'  => "meta_description[".$lang_code."]",
                        'label'  => 'meta_description_'.$lang_name,
                        'rules'  => 'required|min_length[9]',
                        'errors' => array(
                            'required'  => 'Không được để trống !',
                            'min_length' => 'Độ dài không đủ !'
                        ),
                    );
                    $config['meta_keyword['.$lang_code.']'] = array(
                        'field'  => "meta_keyword[".$lang_code."]",
                        'label'  => 'meta_keyword_'.$lang_name,
                        'rules'  => 'required',
                        'errors' => array(
                            'required'  => 'Không được để trống !',
                        ),
                    );
                // }
            }
            // exit();
            $post = $this->input->post();
            foreach ($post['quantity'] as $key => $value) {
                $config['quantity['.$key.']'] = array(
                    'field'  => "quantity[".$key."]",
                    'label'  => 'quantity_'.$key,
                    'rules'  => 'required|numeric',
                    'errors' => array(
                        'required'  => 'Không được để trống !',
                        'numeric'   => 'Không phải là số !'
                    ),
                );
                $config['textsize['.$key.']'] = array(
                    'field'  => "textsize[".$key."]",
                    'label'  => 'textsize_'.$key,
                    'rules'  => 'required',
                    'errors' => array(
                        'required'  => 'Không được để trống !',
                    ),
                );
            }

            $result = array();
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
        $size['product_id'] = $id;
        $tablename['product'] = $this->_data->table;
        $tablename['size'] = $this->_data->table_product;
        $tablename['product_translations'] = $this->_data->table_trans;
        if( $this->_data->delete($conditions, $tablename['product_translations'])){
            if ($this->_data->delete($size, $tablename['size'])) {
                if ($this->_data->delete($conditions, $tablename['product'])) {
                    $message['type'] = 'success';
                    $message['message'] = "Xóa thành công !";
                    die(json_encode($message));
                }
            }
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
        $data    = $this->_data->filter_maker($keyword);
        if ($check == 1) {
            $data = $this->_data->filter_catalog($keyword);
            if(!empty($data)) foreach ($data as $item) {
                $item = (object) $item;
                $json[] = ['id'=>$item->id, 'text'=>$item->name_catalog];
            }
        }else{
            if(!empty($data)) foreach ($data as $item) {
                $item = (object) $item;
                $json[] = ['id'=>$item->id, 'text'=>$item->name_maker];
            }
        }
        // var_dump($data); exit();
        
        die(json_encode($json));
    }
}