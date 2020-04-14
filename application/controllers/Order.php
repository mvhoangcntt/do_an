<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends Public_Controller
{
    protected $_all_category;
    protected $_data_category;
    public $Course_model;
    
    public function __construct()
    {
        parent::__construct();
        $this->lang->load('cart');
        // $this->lang->load('home');
        // $this->load->library('cart');
        // $this->load->model(['Course_model','order_model','voucher_model', 'Account_model']);
        // $this->order    = new Order_model();
        // $this->voucher  = new Voucher_model();
    }

    public function index(){
        $data['main_content'] = $this->load->view($this->template_path . 'order/order', $data, TRUE);
        $this->load->view($this->template_main, $data);
    }
    public function viettel()
    {
        $data['abc'] = 'thay r';
        // print $this->load->view($this->template_path . 'items/viettel_post', $data, TRUE);
        $data['main_content'] = $this->load->view($this->template_path . 'items/viettel_post', $data, TRUE);
        $this->load->view($this->template_main, $data);
    }

}