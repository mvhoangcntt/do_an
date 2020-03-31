<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends Public_Controller
{
    protected $_data;
    protected $_data_category;
    protected $_lang_code;
    protected $_all_category;

    public function __construct()
    {
        parent::__construct();
        //tải model
        $this->load->model(['page_model','category_model', 'post_model', 'account_model', 'location_model','Page_contact_model']);
        $this->_data         = new Post_model();
        $this->account       = new Account_model();
        $this->locationModel = new Location_model();
        $this->Page_contact_model = new Page_contact_model();
        $this->lang->load('home');

        if ($this->input->get('lang'))
            $this->_lang_code = $this->input->get('lang');
        else
            $this->_lang_code = $this->session->public_lang_code;
    }
    public function index($slug = null, $page = ''){ //Slug là của category page
        // die($slug);

        if($slug == 'news'){
            $config['base_url']   = base_url()."news/";
            $config['total_rows'] = $this->Page_contact_model->count();
        }
        if($slug == 'media_library'){
            $config['base_url']   = base_url()."media_library/";
            $config['total_rows'] = $this->Page_contact_model->count_libraly();
        }
        //----------- custom paging configuration ----------
        $config['per_page']       = 5;
        if(!empty($page)) $limit  = $config['per_page'] * $page - $config['per_page']; 
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
        $this->pagination->initialize($config);
        $data['page']             = $this->pagination->create_links();
        //------------------ end custom page -------------
        // ----------------- list news -------------------
        $data['news']             = $this->Page_contact_model->getList($config['per_page'] , $limit);
        // tạo link url
        foreach ($data['news'] as $key => $value) {
            $optional['id']            = $value['id'];
            $optional['slug']          = $value['slug'];
            $data['news'][$key]['url'] = getSlugUrlNews($optional);
        }
        // -------------------- end list news ----------------------
        // -------------------- list news home ---------------------
        $data['new_home'] = $this->Page_contact_model->getList_new_home();
        foreach ($data['new_home'] as $key => $value) {
            $optional['id']              = $value->id;
            $optional['slug']            = $value->slug;
            $data['new_home'][$key]->url = getSlugUrlNews($optional);
        }
        // --------------------- end --------------------------
        // --------------------- list library -----------------
        $data['libraly'] = $this->Page_contact_model->getList_libraly($config['per_page'] , $limit);
        foreach ($data['libraly'] as $key => $value) {
            $data['libraly'][$key]['url_video'] = getYoutubeKey($value['href_video']);
        }
        // --------------------- end --------------------------
        //---------------------- list library home ------------
        $data['libraly_home'] = $this->Page_contact_model->getList_libraly();
        foreach ($data['libraly'] as $key => $value) {
            $data['libraly'][$key]['url_video'] = getYoutubeKey($value['href_video']);
        }
        //---------------------- end library home -------------
        // ---------- lấy stype page gán link menu ------------
        $data['heading_title']                   = 'MV Hoàng';
        //add breadcrumbs
        $this->breadcrumbs->push(" <i class      ='fa fa-home'></i>", base_url());
        $this->breadcrumbs->push($oneItem->title, getUrlPage($oneItem));
        $data['breadcrumb']                      = $this->breadcrumbs->show();
        $pageModel                               = new Page_model();
        $id                                      = $pageModel->slugToId($slug);
        $oneItem                                 = $pageModel->getById($id, '', $this->session->public_lang_code);
        if (empty($oneItem)) show_404();
        if ($this->input->get('lang')) redirect(getUrlPage($oneItem));
        $data['oneItem']                         = $oneItem;
        $data['SEO']                             = $this->blockSEO($oneItem, getUrlPage($oneItem));
        if (!empty($oneItem->style)) $layoutView = '-' . $oneItem->style;
        else $layoutView                         = '';
        $data['main_content']                    = $this->load->view($this->template_path . 'page/page' . $layoutView, $data, TRUE);
        $this->load->view($this->template_main, $data);
    }

    public function _404(){
        $data['main_content'] = $this->load->view($this->template_path . 'page/_404', NULL, TRUE);
        $this->load->view($this->template_main, $data);
    }
//-------- save contact email ----------
    public function post_contact(){
        $data = $this->_convertData();
        // exit(json_encode($data));
        if ($this->Page_contact_model->save_contact($data)) {
            $data['message'] = $data['content'];
            unset($data['content']);
            sendMail('', $data['email'],'Admin','contact',$data);
            $message['type'] = 'success';
            $message['message'] = 'Đã gửi hành công !';
            exit(json_encode($message));
        }
        $message['type'] = 'warning';
        $message['message'] = 'Đã sảy ra lỗi, Vui lòng kiểm tra lại !';
        exit(json_encode($message));
    }
    private function _convertData(){
        $this->_validate();
        $data = $this->input->post();
        unset($data['g-recaptcha-response']);
        return $data;
    }
    private function _validate(){
        if($this->input->server('REQUEST_METHOD') == 'POST' && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $config = array(
                'fullname'   => array(
                    'field'  => 'fullname',
                    'label'  => 'fullname',
                    'rules'  => 'required|min_length[5]',
                    'errors' => array(
                        'required'  => 'Tên không được để trống !',
                        'min_length'=> 'Độ dài tên không đủ !'
                   ),
                ),
                'email'   => array(
                    'field'  => 'email',
                    'label'  => 'Email',
                    'rules'  => 'required|min_length[5]|valid_email',
                    'errors' => array(
                        'required'  => 'Emai không được để trống !',
                        'min_length'=> 'Độ dài email không đủ !',
                        'valid_email' => 'Không phải là email !',
                   ),
                ),
                'address'   => array(
                    'field'  => 'address',
                    'label'  => 'address',
                    'rules'  => 'required|min_length[5]',
                    'errors' => array(
                        'required'  => 'Địa chỉ không được để trống !',
                        'min_length'=> 'Độ dài địa chỉ không đủ !'
                   ),
                ),
                'phone'   => array(
                    'field'  => 'phone',
                    'label'  => 'phone',
                    'rules'  => 'required|numeric|min_length[10]|max_length[10]',
                    'errors' => array(
                        'required'  => 'Vui lòng nhập số điện thoại !',
                        'numeric'   => 'Không phải là số !',
                        'min_length' => 'Độ dài của số điện thoại là 10',
                        'max_length' => 'Độ dài của số điện thoại là 10',
                   ),
                ),
                'fax'   => array(
                    'field'  => 'fax',
                    'label'  => 'fax',
                    'rules'  => 'required',
                    'errors' => array(
                        'required'  => 'Không được để trống !',
                   ),
                ),
                'company'   => array(
                    'field'  => 'company',
                    'label'  => 'company',
                    'rules'  => 'required',
                    'errors' => array(
                        'required'  => 'Không được để trống !',
                   ),
                ),
                'content'   => array(
                    'field'  => 'content',
                    'label'  => 'content',
                    'rules'  => 'required|max_length[300]',
                    'errors' => array(
                        'required'  => 'Không được để trống !',
                        'max_length'   => 'Nhập không quá 300 ký tự !'
                   ),
                ),
            );

            $result = array();
            foreach ($config as $value) {
                $this->form_validation->set_rules(
                    $value['field'],
                    $value['label'],
                    $value['rules'],
                    $value['errors']
                );
            }
           
            if ($this->form_validation->run() === false) {
                $message['type'] = "warning";
                $message['message'] = "Đã có lỗi sảy ra vui lòng kiểm tra lại !";
                $valid = [];
                foreach ($config as $key => $value) {
                    $valid[$key] = form_error($value['field']);
                }
                $message['validation'] = $valid;
                die(json_encode($message));
            }
        }
    }
    public function custom_paging(){

    }
}
