<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

    public function __construct(){
        parent::__construct();
        $this->lang->load('dash_lang');
        $this->load->model(['order_model','account_model']);
        $this->order        = new Order_model();
        $this->account      = new Account_model();
    }

    public function index(){
        $data['heading_title'] = ucfirst($this->router->fetch_class());
        $data['heading_description'] = 'Tổng quan CMS';
        /*Breadcrumbs*/
        $this->breadcrumbs->push('Home', base_url());
        $this->breadcrumbs->push($data['heading_title'], '#');
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        /*Breadcrumbs*/
        $data['main_content'] = $this->load->view($this->template_path.'dashboard/index', $data, TRUE);
        $this->load->view($this->template_main, $data);
    }

    public function ajax_total(){
        sleep(1);
        $output['total_order']      = $this->order->getTotalAll();
        $output['total_student']    = $this->account->getTotalPro(['group_id'=>1]);
        echo json_encode($output);
        exit;
    }

    public function notPermission(){
        $data['heading_title'] = 'Cấm truy cập !';
        $data['heading_description'] = 'Trang không được quyền truy cập !';
        /*Breadcrumbs*/
        $this->breadcrumbs->push('Home', base_url());
        $this->breadcrumbs->push($data['heading_title'], '#');
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        /*Breadcrumbs*/
        $data['main_content'] = $this->load->view($this->template_path.'not_permission', $data, TRUE);
        $this->load->view($this->template_main, $data);
    }

    public function notFound(){
        $data['heading_title'] = '404 Not found !';
        $data['heading_description'] = 'Trang không tồn tại !';
        /*Breadcrumbs*/
        $this->breadcrumbs->push('Home', base_url());
        $this->breadcrumbs->push($data['heading_title'], '#');
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        /*Breadcrumbs*/
        $data['main_content'] = $this->load->view($this->template_path.'404', $data, TRUE);
        $this->load->view($this->template_main, $data);
    }
}
