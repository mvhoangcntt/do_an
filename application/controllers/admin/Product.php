<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends Admin_Controller
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
        $this->lang->load('product');
        $this->load->model('product_model');
        $this->_data = new Product_model();
        $this->_name_controller = $this->router->fetch_class();
        $this->session->category_type = $this->_name_controller;
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
        $data['main_content'] = $this->load->view($this->template_path . $this->_name_controller. '/index', $data, TRUE);
        $this->load->view($this->template_main, $data);
    }

    public function _queue_select($categories, $parent_id = 0, $char = ''){
        foreach ($categories as $key => $item)
        {
            if ($item->parent_id == $parent_id)
            {
                $tmp['name'] = $parent_id ? $char.'|----'.$item->title : $char.$item->title;
                $tmp['id'] = $item->id;
                $this->category_tree[] = $tmp;
                unset($categories[$key]);
                $this->_queue_select($categories,$item->id,$char.'----');
            }
        }
    }

    /*
     * Ajax trả về datatable
     * */
    public function ajax_list()
    {
        if(!empty($this->input->post('category_id'))){
            $this->load->model('category_model');
            $categoryModel = new Category_model();
            $allCategory = $categoryModel->getAll($this->session->admin_lang_code);
            $categoryModel->_recursive_child_id($allCategory,$this->input->post('category_id'));
            $listCateId = $categoryModel->_list_category_child_id;
        }
        if($this->input->server('REQUEST_METHOD') == 'POST' && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
            $length = $this->input->post('length');
            $no = $this->input->post('start');
            $page = $no/$length + 1;
            $params['category_id'] = !empty($listCateId)?$listCateId:null;
            $params['page'] = $page;
            $params['limit'] = $length;
            $params['order'] = array('created_time' => 'ASC');
            $list = $this->_data->getData($params);
            $data = array();
            if(!empty($list)) foreach ($list as $item) {
                $no++;
                $row = array();
                $row[] = $item->id;
                $row[] = $item->id;
                $row[] = $item->title;
                $row[] = ($item->is_featured == true)?'<i data-value="1" class="text-primary fa fa-lg fa-star btnUpdateFeatured"></i>':'<i data-value="0" class="text-primary fa fa-lg fa-star-o btnUpdateFeatured"></i>';
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
    /*
     * Ajax xử lý thêm mới
     * */
    public function ajax_add(){
        $data_store                 = $this->_convertData();
        if($id_product  = $this->_data->save($data_store)){
            // log action
            $action = $this->router->fetch_class();
            $note = "Insert $action: ".$id_product;
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
     * Ajax copy
     * */
    function ajax_copy($id){
        $this->load->model('category_model');
        $categoryModel = new Category_model();
        $data = $this->_data->getById($id);
        $data_store = array();
        $data_trans = array();
        $randId = rand(1000,9999);
        $title = "Sản phẩm test $randId";
        foreach ($data as $key => $item){
            unset($item->created_time);
            unset($item->updated_time);
            unset($item->id);
            unset($item->order);
            if(!empty($item)) foreach ($item as $k => $v){
                $data_store[$k] = $v;
            }
            if(!empty($this->config->item('cms_language'))) foreach ($this->config->item('cms_language') as $lang_code => $lang_name) {
                if($item->language_code === $lang_code){
                    $data_trans['title'][$lang_code] = $title;
                    $data_trans['meta_title'][$lang_code] = $title;
                    //$data_trans['language_code'][$lang_code] = $lang_code;
                    $data_trans['slug'][$lang_code] = $this->toSlug($title);
                    $data_trans['description'][$lang_code] = $title;
                    $data_trans['meta_description'][$lang_code] = $title;
                    $data_trans['meta_keyword'][$lang_code] = $title;
                    $data_trans['content'][$lang_code] = $title;
                    $data_trans['content_more'][$lang_code] = !empty($item->content_more) ? $item->content_more : '';
                    $data_trans['content_tab'][$lang_code] = !empty($item->content_tab) ? $item->content_tab : '';
                    $data_trans['property'][$lang_code] = !empty($item->property) ? $item->property : '';
                }
            }

        }

        $data_store = array_merge($data_store,$data_trans);
        $data_store['category_id'] = $categoryModel->getRandomId();
        unset($data_store['language_code']);
        $response = $this->_data->save($data_store);
        if($response !== false){
            $message['type'] = 'success';
            $message['message'] = "Nhân bản thành công !";
        }else{
            $message['type'] = 'error';
            $message['message'] = "Nhân bản thất bại !";
            $message['error'] = $response;
            log_message('error',$response);
        }
        print json_encode($message);

        exit;
    }

    /*
     * Ajax lấy thông tin
     * */
    public function ajax_edit($id)
    {
        $data = $this->_data->getById($id);
        $data['category_id'] = $this->_data->getCategorySelect2($id);
        $data['brand'] = $this->_data->getPropertySelect2($id,'brand');
        $data['code'] = $this->_data->getPropertySelect2($id,'code');
        $data['surface'] = $this->_data->getPropertySelect2($id,'surface');
        $data['material'] = $this->_data->getPropertySelect2($id,'material');
        $data['size'] = $this->_data->getPropertySelect2($id,'size');
        $data['rectification'] = $this->_data->getPropertySelect2($id,'rectifi');
        $data['technology'] = $this->_data->getPropertySelect2($id,'tech');
        $data['application'] = $this->_data->getPropertySelect2($id,'appli');
        $data['feature'] = $this->_data->getPropertySelect2($id,'feature');
        $data['look'] = $this->_data->getPropertySelect2($id,'look');
        $data['color'] = $this->_data->getPropertySelect2($id,'color');
        die(json_encode($data));
    }

    /*
     * Ajax xử lý thêm mới
     * */
    public function ajax_update()
    {
        $data_store  = $this->_convertData();
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
            //Xóa translate của post
            $this->_data->delete(["id"=>$id],$this->_data->table_trans);
            //Xóa category của post
            $this->_data->delete(["{$this->_name_controller}_id"=>$id],$this->_data->table_category);
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
                $this->form_validation->set_rules('title[' . $lang_code . ']', $this->lang->line('error_title') . ' - ' . $lang_name, 'required|trim|min_length[5]|max_length[300]');
                $this->form_validation->set_rules('meta_title[' . $lang_code . ']', $this->lang->line('error_title') . ' - ' . $lang_name, 'required|trim|min_length[5]|max_length[300]');
                $this->form_validation->set_rules('description[' . $lang_code . ']', $this->lang->line('error_description') . ' - ' . $lang_name, 'required');
                $this->form_validation->set_rules('meta_description[' . $lang_code . ']', $this->lang->line('error_description') . ' - ' . $lang_name, 'required');
                //$this->form_validation->set_rules('meta_keyword[' . $lang_code . ']', $this->lang->line('error_keyword') . ' - ' . $lang_name, 'required');
                //$this->form_validation->set_rules('content[' . $lang_code . ']', $this->lang->line('error_content') . ' - ' . $lang_name, 'required');
                $this->form_validation->set_rules('packing[' . $lang_code . ']', 'Thông tin đóng gói - ' . $lang_name, 'required');
            }
            $this->form_validation->set_rules('category_id[]', $this->lang->line('from_category'), 'required');
            $this->form_validation->set_rules('model', "Mã sản phẩm", 'required');
            $this->form_validation->set_rules('property[code]', "Dòng sản phẩm", 'required');
            $this->form_validation->set_rules('property[size]', "Kích thước", 'required');
            $this->form_validation->set_rules('property[brand]', "Nhà phân phối", 'required');
            $this->form_validation->set_rules('property[surface]', "Bề mặt", 'required');
            $this->form_validation->set_rules('property[material]', "Chủng loại", 'required');
            $this->form_validation->set_rules('property[rectifi]', "Mài", 'required');
            $this->form_validation->set_rules('property[tech]', "Công nghệ", 'required');
            $this->form_validation->set_rules('property[appli]', "Ứng dụng", 'required');
            $this->form_validation->set_rules('thumbnail', $this->lang->line('error_image'), 'required');
            $this->form_validation->set_rules('album[]', 'Ảnh album', 'required');
            if ($this->form_validation->run() === false) {
                $message['type'] = "warning";
                $message['message'] = $this->lang->line('mess_validation');
                $valid = [];
                if (!empty($this->config->item('cms_language'))) foreach ($this->config->item('cms_language') as $lang_code => $lang_name) {
                    $valid["title[$lang_code]"] = form_error("title[$lang_code]");
                    $valid["meta_title[$lang_code]"] = form_error("meta_title[$lang_code]");
                    $valid["description[$lang_code]"] = form_error("description[$lang_code]");
                    $valid["meta_description[$lang_code]"] = form_error("meta_description[$lang_code]");
                    //$valid["content[$lang_code]"] = form_error("content[$lang_code]");
                    $valid["packing[$lang_code]"] = form_error("packing[$lang_code]");
                    //$valid["meta_keyword[$lang_code]"] = form_error("meta_keyword[$lang_code]");
                }
                $valid["category_id[]"] = form_error("category_id[]");
                $valid["model"] = form_error("model");
                $valid["property[code]"] = form_error("property[code]");
                $valid["property[size]"] = form_error("property[size]");
                $valid["property[brand]"] = form_error("property[brand]");
                $valid["property[surface]"] = form_error("property[surface]");
                $valid["property[material]"] = form_error("property[material]");
                $valid["property[rectifi]"] = form_error("property[rectifi]");
                $valid["property[tech]"] = form_error("property[tech]");
                $valid["property[appli]"] = form_error("property[appli]");
                $valid["thumbnail"] = form_error("thumbnail");
                $valid["album[]"] = form_error("album[]");
                $message['validation'] = $valid;
                $message['validation_message'] = validation_errors();
                die(json_encode($message));
            }
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
        $data_store['category_id'] = $data['category_id'];
        $data_store['property'] = $data['property'];
        return $data_store;
    }


}
