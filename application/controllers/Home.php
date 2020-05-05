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
        $this->load->model('Home_model');
        $this->_data = new Home_model();
    }

    public function index()
    {
        $data['moinhat']  = $this->_data->moinhat();
        $bst['get_parent_0'] = $this->_data->parent_catalog();
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
        // var_dump($data['timkiem']); exit;
        $data['main_content'] = $this->load->view($this->template_path . 'home/home', $data, TRUE);
        $this->load->view($this->template_main, $data);
    }
    public function slide()
    {
        $data['abc'] = 'thay r';
        print $this->load->view($this->template_path . 'items/slide_home', $data, TRUE);
    }
    public function viewed()
    {
        $data['abc'] = 'thay r';
        print $this->load->view($this->template_path . 'items/list_viewed', $data, TRUE);
    }
}
