<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends Public_Controller
{
    protected $_all_category;
    protected $_data_category;
    public $Course_model;

    public function __construct()
    {
        parent::__construct();
        $this->lang->load('home');
        $this->load->model('Page_contact_model');
        $this->_data = new Page_contact_model();
    }
    public function news()
    {
        $data['main_content'] = $this->load->view($this->template_path . 'news/news_details', $data, TRUE);
        $this->load->view($this->template_main, $data);
    }
    public function slide()
    {
        $data['abc'] = 'thay r';
        print $this->load->view($this->template_path . 'items/img-list-show', $data, TRUE);
    }
    public function index($slug = '', $id = '')
    {
        // Chi tiết
        // die($slug." ".$id);
        $data['heading_title'] = 'Tin tức';
        $data['detail'] = $this->_data->get_detail($id);
        $data['detail']->timeAgo = timeAgo(strtotime($data['detail']->created_time));
        // ------- sidebar ------
        $data['new_limit'] = $this->_data->get_sidebar();
        foreach ($data['new_limit'] as $key => $value) {
            $optional['id'] = $value->id;
            $optional['slug'] = $value->slug;
            $data['new_limit'][$key]->url = getSlugUrlNews($optional);
        }
        $data['main_content'] = $this->load->view($this->template_path . 'news/news_details', $data, TRUE);
        $this->load->view($this->template_main, $data);
    }
    public function featured($page = ''){
        $data['heading_title'] = 'Tin tức';
        // ----------------- list news -----------------
        $featured = 1;
        $config['total_rows']     = $this->Page_contact_model->count($featured);
        // var_dump($config['total_rows']); exit;
        $config['base_url']       = base_url()."news/featured";
        $config['per_page']       = 1;
        if(!empty($page)) $limit  = $config['per_page'] * $page - $config['per_page'];
        // custom paging configuration 
        // chèn thêm thẻ span
        $config['next_link']      =  '<span class="arrow_right"></span>';
        $config['prev_link']      =  '<span class="arrow_left"></span>';
        // cái đang chọn
        $config['cur_tag_open']   =  '<li class="active page-item"><a class="page-link">';
        $config['cur_tag_close']  =  '</a></li>';
        // ở giữa
        $config['num_tag_open']   = '<li class="page-item">';
        $config['num_tag_close']  = '</li>';
        // cái đầu
        $config['prev_tag_open']  = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        // thang cuoi
        $config['next_tag_open']  = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        // cac thẻ a
        $config['attributes']     = array('class' => 'page-link');
        // Div tổng
        $config['full_tag_open']  = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        // end custom page
        $this->pagination->initialize($config);
        $data['page']             = $this->pagination->create_links();
        $data['news']             = $this->Page_contact_model->getList($config['per_page'] , $limit, $featured);
        // tạo link url
        foreach ($data['news'] as $key => $value) {
            $optional['id']            = $value['id'];
            $optional['slug']          = $value['slug'];
            $data['news'][$key]['url'] = getSlugUrlNews($optional);
        }
        // -------------------- end list ----------------------

        // var_dump($data['new_limit']); exit;
        $data['main_content'] = $this->load->view($this->template_path . 'news/news_featured', $data, TRUE);
        $this->load->view($this->template_main, $data);
    }
    public function internal($page = ''){
        // nội bộ
        $data['heading_title'] = 'Tin tức';
        // ----------------- list news -----------------
        $featured = '0';
        $config['total_rows']     = $this->Page_contact_model->count($featured);
        
        $config['base_url']       = base_url()."news/internal";
        $config['per_page']       = 1;
        if(!empty($page)) $limit  = $config['per_page'] * $page - $config['per_page'];
        // custom paging configuration 
        // chèn thêm thẻ span
        $config['next_link']      =  '<span class="arrow_right"></span>';
        $config['prev_link']      =  '<span class="arrow_left"></span>';
        // cái đang chọn
        $config['cur_tag_open']   =  '<li class="active page-item"><a class="page-link">';
        $config['cur_tag_close']  =  '</a></li>';
        // ở giữa
        $config['num_tag_open']   = '<li class="page-item">';
        $config['num_tag_close']  = '</li>';
        // cái đầu
        $config['prev_tag_open']  = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        // thang cuoi
        $config['next_tag_open']  = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        // cac thẻ a
        $config['attributes']     = array('class' => 'page-link');
        // Div tổng
        $config['full_tag_open']  = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        // end custom page
        $this->pagination->initialize($config);
        $data['page']             = $this->pagination->create_links();
        $data['news']             = $this->Page_contact_model->getList($config['per_page'] , $limit, $featured);
        // tạo link url
        foreach ($data['news'] as $key => $value) {
            $optional['id']            = $value['id'];
            $optional['slug']          = $value['slug'];
            $data['news'][$key]['url'] = getSlugUrlNews($optional);
        }
        // -------------------- end list ----------------------

        // var_dump($data['new_limit']); exit;
        $data['main_content'] = $this->load->view($this->template_path . 'news/news_internal', $data, TRUE);
        $this->load->view($this->template_main, $data);
    }
}
