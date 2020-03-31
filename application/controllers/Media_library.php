<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media_library extends Public_Controller
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
        $data['main_content'] = $this->load->view($this->template_path . 'page/page-media_library', $data, TRUE);
        $this->load->view($this->template_main, $data);
    }
    public function album($page = ''){
        $data['heading_title'] = 'Album';
        $album = 'album';
        // ----------------- list news -----------------
        $config['total_rows']     = $this->Page_contact_model->count_libraly($album);
        // var_dump($config['total_rows']); exit;
        $config['base_url']       = base_url()."media_library/album/";
        $config['per_page']       = 5;
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
        $data['page']    = $this->pagination->create_links();
        $data['libraly'] = $this->Page_contact_model->getList_libraly($config['per_page'] , $limit,  $album);
        foreach ($data['libraly'] as $key => $value) {
            $data['libraly'][$key]['url_video'] = getYoutubeKey($value['href_video']);
        }
        // -------------------- end list ----------------------

        $data['main_content'] = $this->load->view($this->template_path . 'media_library/album', $data, TRUE);
        $this->load->view($this->template_main, $data);
    }
    public function video($page = ''){
        $data['heading_title'] = 'Album';
        $album = 'video';
        // ----------------- list news -----------------
        $config['total_rows']     = $this->Page_contact_model->count_libraly($album);
        // var_dump($slug); exit;
        $config['base_url']       = base_url()."media_library/video/";
        $config['per_page']       = 5;
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
        $data['page']    = $this->pagination->create_links();
        $data['libraly'] = $this->Page_contact_model->getList_libraly($config['per_page'] , $limit,  $album);
        foreach ($data['libraly'] as $key => $value) {
            $data['libraly'][$key]['url_video'] = getYoutubeKey($value['href_video']);
        }
        // -------------------- end list ----------------------

        // var_dump($data['new_limit']); exit;
        $data['main_content'] = $this->load->view($this->template_path . 'media_library/video', $data, TRUE);
        $this->load->view($this->template_main, $data);
    }
}
