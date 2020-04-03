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
        // $this->load->model('Page_contact_model');
        // $this->_data = new Page_contact_model();
    }

    public function index()
    {
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
