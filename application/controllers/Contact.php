<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends Public_Controller
{
    protected $_all_category;
    protected $_data_category;
    public $Course_model;

    public function __construct()
    {
        parent::__construct();
        $this->lang->load('footer');
        $this->lang->load('home');
    }

    public function index()
    {
        $data['heading_title'] = 'MV Hoàng';
        $data['main_content'] = $this->load->view($this->template_path . 'contact/contact', $data, TRUE);
        $this->load->view($this->template_main, $data);
    }
}
