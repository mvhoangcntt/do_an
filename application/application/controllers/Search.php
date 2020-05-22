<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Search extends Public_Controller {

    protected $_data_post;
    protected $_lang_code;
    protected $_list_category_title_queue;
    protected $_link;
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['course_model']);
        $this->course  = new Course_model();
        if($this->input->get('lang'))
            $this->_lang_code = $this->input->get('lang');
        else
            $this->_lang_code = $this->session->public_lang_code;
    }
    public function index($keyword = ''){
        if(empty($keyword)) show_404();
        $keyword = xss_clean($keyword);
        $this->_link = getUrlSearch($keyword);
        $oneItem['title'] = str_replace('-',' ',$keyword);
        $oneItem['url'] =  $this->_link;
        $oneItem = (object) $oneItem;
        $data['oneItem'] = $oneItem;
        $limit = 18;
        $page = $this->input->get('page') ? $this->input->get('page') : 1;
        $data = array_merge($data,$this->LoadCourse($keyword, $limit, $page));
        $total = $data['total_course'];
        /*Pagination*/
        $this->load->library('pagination');
        $paging['page_query_string'] = TRUE;
        $paging['first_url'] = getUrlSearch($keyword);
        $paging['total_rows'] = $total;
        $paging['per_page'] = $limit;
        $paging['attributes'] = array('class'=>"");
        $this->pagination->initialize($paging);
        $data['pagination'] = $this->pagination->create_links();
        /*Pagination*/
        //SEO Meta
        $data['SEO'] = array(
            'meta_title'        => $oneItem->title,
            'meta_description'  => "Search result: $oneItem->title",
            'meta_keyword'      => "Keyword $oneItem->title",
            'url'               => $oneItem->url,
            'image'             => getImageThumb('',400,200)
        );
        // dd($data);
        $data['main_content'] = $this->load->view($this->template_path.'search/index', $data, TRUE);
        $this->load->view($this->template_main, $data);
    }
    private function LoadCourse($keyword, $limit ,$page){
        $limit = 18;
        $params = array(
            'A.is_status'     => 1,
            'F.language_code' => $this->session->public_lang_code,
            'G.language_code' => $this->session->public_lang_code,
        );
        $data['data']         = $this->course->getDataSearch($params,$keyword,$page);
        $data['total_course'] = $this->course->getTotalSearch($params,$keyword);
        $data['stt']          = round($data['total_course']/$limit);
        return $data;
    }


}
