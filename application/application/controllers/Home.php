<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_Controller
{
    protected $_all_category;
    protected $_data_category;
    public $Course_model;

    public function __construct()
    {
        parent::__construct();
        $this->lang->load('home');
        $this->lang->load('footer');
        $this->load->model(array('Home_model','Seemore_model'));
        $this->_data = new Home_model();
        $this->_data_seemore = new Seemore_model();
    }

    public function index()
    {
        // --- viewed 3 -----
        $data['viewed3'] = $this->_data_seemore->list_viewed3();
        foreach ($data['viewed3'] as $key => $value) {
            $optional['id'] = $value->id;
            $optional['slug'] = $value->slug;
            $data['viewed3'][$key]->url = getUrlProduct($optional);
        }
        // -------------
        
        $data['moinhat']  = $this->_data->moinhat();
        $bst['get_parent_0'] = $this->_data->parent_catalog();
        // var_dump($bst['get_parent_0']); exit;
        $bst_ = array();
        foreach ($bst['get_parent_0'] as $value) {
            $item = ''; $item_bst = '';
            $item = $this->_data->catalog($value->id);
            $item_bst = $this->_data->bosuutap($item->id);
            array_push($bst_, $item_bst);
        }
        $data['bosuutap'] = $bst_;
        $data['timkiem']  = $this->_data->timkiem();
        $data['giamgia']  = $this->_data->giamgia();// dành riêng cho bạn
        $data['phukien']  = $this->_data->phukien();// phụ kiện
        
        foreach ($data as $key1 => $value1) {
            foreach ($data[$key1] as $key => $value) {
                $optional['id'] = $value->id;
                $optional['slug'] = $value->slug;
                $data[$key1][$key]->url = getUrlProduct($optional);
            }
        }

        // var_dump($data['timkiem']); exit;
        $data['main_content'] = $this->load->view($this->template_path . 'home/home', $data, TRUE);
        $this->load->view($this->template_main, $data);
    }
    public function slide()
    {
        $data['slide'] = $this->_data->get_slide();
        print $this->load->view($this->template_path . 'items/slide_home', $data, TRUE);
    }
    public function viewed()
    {
        $data['viewed'] = $this->_data_seemore->list_viewed();
        foreach ($data['viewed'] as $key => $value) {
            $optional['id'] = $value->id;
            $optional['slug'] = $value->slug;
            $data['viewed'][$key]->url = getUrlProduct($optional);
        }
        print $this->load->view($this->template_path . 'items/list_viewed', $data, TRUE);
    }
    public function update_view($id = ''){
        $get_view = $this->_data->get_view($id);
        $data['view'] = $get_view->view + 1;
        // var_dump($data['view']); exit;
        $conditions['id'] = $id;
        $this->_data->update($conditions,$data);
        //--------------
        // Kiểm tra sự tồn tại của id sản phẩm trong bảng
        $check = $this->_data_seemore->check_viewed($id);
        if (!empty($check)) {
            // xóa đi để cập nhật lại vị trí ở đầu vừa xem
            $this->_data_seemore->delete_viewed($id);
        }
        // insert table viewed
        $this->_data_seemore->viewed($id);

    }
}
