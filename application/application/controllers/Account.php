<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Account extends Public_Controller
{
    protected $cid = 0;
    protected $_data;
    protected $_lang_code;
    protected $_all_agency;
    protected $user_login;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_account');
        $this->lang->load('account');
        $this->lang->load('home');
        $this->load->library(array('ion_account', 'hybridauth','pagination'));
        $this->load->model(array('Account_model','Home_model','Detail_model','Orders_model','Seemore_model'));
        $this->_data = new Account_model();
        $this->_data_home = new Home_model();
        $this->_data_detail = new Detail_model();
        $this->_data_order = new Orders_model();
        $this->_data_seemore = new Seemore_model();
        
        $this->user_login = $this->_data->getById($this->session->account['account_id']);
        if (empty($this->user_login)) redirect(site_url('?login=error'));
    }

    public function index(){
       // --- viewed 3 -----
        $data['viewed3'] = $this->_data_seemore->list_viewed3();
        foreach ($data['viewed3'] as $key => $value) {
            $optional['id'] = $value->id;
            $optional['slug'] = $value->slug;
            $data['viewed3'][$key]->url = getUrlProduct($optional);
        }
        // -------------
        $data['user'] = $this->user_login;
        unset($data['user']->password);
        unset($data['user']->address);
        //--------------

        $chosuly = $this->_data_order->get_data_form_account(1);
        $data['chosuly'] = $chosuly;
        foreach ($chosuly as $key => $value) {
            $array = array();
            $arr = array();
            $arr = $this->_data_order->get_order_detail_($chosuly[$key]->id);
            foreach ($arr as $key1 => $value1) {
                $optional['id'] = $value1->id;
                $optional['slug'] = $value1->slug;
                $arr[$key1]->url = getUrlProduct($optional);
            }
            $data['chosuly'][$key]->data = $arr;
        }

        $daxacnhan = $this->_data_order->get_data_form_account(2);
        $data['daxacnhan'] = $daxacnhan;
        foreach ($daxacnhan as $key => $value) {
            $array = array();
            $arr = array();
            $arr = $this->_data_order->get_order_detail_($daxacnhan[$key]->id);
            foreach ($arr as $key1 => $value1) {
                $optional['id'] = $value1->id;
                $optional['slug'] = $value1->slug;
                $arr[$key1]->url = getUrlProduct($optional);
            }
            $data['daxacnhan'][$key]->data = $arr;
        }

        $dangvanchuyen = $this->_data_order->get_data_form_account(3);
        $data['dangvanchuyen'] = $dangvanchuyen;
        foreach ($dangvanchuyen as $key => $value) {
            $array = array();
            $arr = array();
            $arr = $this->_data_order->get_order_detail_($dangvanchuyen[$key]->id);
            foreach ($arr as $key1 => $value1) {
                $optional['id'] = $value1->id;
                $optional['slug'] = $value1->slug;
                $arr[$key1]->url = getUrlProduct($optional);
            }
            $data['dangvanchuyen'][$key]->data = $arr;
        }

        $hoantat = $this->_data_order->get_data_form_account(4);
        $data['hoantat'] = $hoantat;
        foreach ($hoantat as $key => $value) {
            $array = array();
            $arr = array();
            $arr = $this->_data_order->get_order_detail_($hoantat[$key]->id);
            foreach ($arr as $key1 => $value1) {
                $optional['id'] = $value1->id;
                $optional['slug'] = $value1->slug;
                $arr[$key1]->url = getUrlProduct($optional);
            }
            $data['hoantat'][$key]->data = $arr;
        }

        $dahuy = $this->_data_order->get_data_form_account(5);
        $data['dahuy'] = $dahuy;
        foreach ($dahuy as $key => $value) {
            $array = array();
            $arr = array();
            $arr = $this->_data_order->get_order_detail_($dahuy[$key]->id);
            foreach ($arr as $key1 => $value1) {
                $optional['id'] = $value1->id;
                $optional['slug'] = $value1->slug;
                $arr[$key1]->url = getUrlProduct($optional);
            }
            $data['dahuy'][$key]->data = $arr;
        }
        // var_dump( $data['daxacnhan']); exit;


        $data['giamgia']  = $this->_data_detail->giamgia();
        foreach ($data['giamgia'] as $key => $value) {
            $optional['id'] = $value->id;
            $optional['slug'] = $value->slug;
            $data['giamgia'][$key]->url = getUrlProduct($optional);
        }
        $data['main_content'] = $this->load->view($this->template_path . 'account/details_account', $data, TRUE);
        $this->load->view($this->template_main, $data);
    }
    public function get_user(){
        $data = $this->user_login;
        unset($data->password);
        unset($data->address);
        // $data->diachi = $this->_data_home->getDVHC($data->xaphuong);
        exit(json_encode($data));
    }
    public function form_get_diachi(){
        $data['diachi'] = $this->_data_home->getDVHC($this->user_login->xaphuong);
        $data['phone'] = $this->user_login->phone;
        $data['address'] = $this->user_login->address;
        exit(json_encode($data));
    }
    public function settings(){
        $data = $this->input->post();
        $response = $this->_data->update(array('id' => $this->session->account['account_id']), $data);
        $this->session->userdata['account']['settings'] = $data['settings'];
        if($response == false){
            $message['type'] = 'warning';
            $message['message'] = lang('error_please_try');
            $message['error'] = $response;
            log_message('error',$response);
        }else{
            $message['data']    = $data_store;
            $message['type']    = 'success';
            $message['message'] = lang('update_successful');
        }
        die(json_encode($message));
    }

    public function ajax_detail($id_order = ''){
        $dahuy = $this->_data_order->get_data_detail_account($id_order);
        $data = $dahuy;
        foreach ($dahuy as $key => $value) {
            $array = array();
            $arr = array();
            $tongtien = 0;
            $arr = $this->_data_order->get_order_detail_list($dahuy[$key]->id);
            foreach ($arr as $key1 => $value1) {
                $tt = 0;
                $optional['id'] = $value1->id;
                $optional['slug'] = $value1->slug;
                $arr[$key1]->url = getUrlProduct($optional);
                $tongtien += $value1->amount * $value1->quantity;
                $tt += $value1->amount * $value1->quantity;
                $arr[$key1]->tongtien = $tt;
            }
            $data[$key]->data = $arr;
            $data[$key]->tongtien = $tongtien;
        }
        exit(json_encode($data[0]));
    }

    // public function index(){
    //     if ($this->session->is_account_logged != true) redirect();
    //     $data['heading_title'] =$this->lang->line('pagePersonal');
    //     $data['oneAccount'] = getUserAccountById($this->session->userdata('account')['account_id'], '', $this->session->public_lang_code);
    //     /*Breadcrumbs*/
    //     $this->breadcrumbs->push(" <i class='fa fa-home'></i>", base_url());
    //     $this->breadcrumbs->push($data['heading_title'], '#');
    //     $data['breadcrumbs'] = $this->breadcrumbs->show();
    //     /*Breadcrumbs*/
    //     switch ($data['oneAccount']->group_id) {
    //         case 1:
    //         $data['main_content'] = $this->load->view($this->template_path . 'account/profile_student', $data, TRUE);
    //         break;
    //         case 2:
    //         $data['main_content'] = $this->load->view($this->template_path . 'account/profile_lecturers', $data, TRUE);
    //         break;
    //         default:
    //         $data['main_content'] = $this->load->view($this->template_path . 'account/profile_collaborators', $data, TRUE);
    //         break;
    //     }

    //     $this->load->view($this->template_main, $data);
    // }

    public function lang_js(){
        $lang_curent = $this->session->public_lang_code == 'vi' ? 'vietnamese' : 'english';
        $lang_text = '';
        $lang_code = $this->lang->load('account',$lang_curent, true);
        foreach ($lang_code as $key => $lang){
            $lang_text .= "language['".$key."'] = '".$lang."';";
        }
        print_r($lang_text);exit;
    }
    
    public function update_password(){
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $pass_old = $this->input->post('pass_old');
            $pass = $this->input->post('password');

            $rules = array(
                array(
                    'field' => 'pass_old',
                    'label' => lang('old_password'),
                    'rules' => 'required|trim|min_length[6]'
                ),
                array(
                    'field' => 'password',
                    'label' => lang('new_password'),
                    'rules' => 'required|trim|min_length[6]|max_length[32]'
                ),
                array(
                    'field' => 'pass',
                    'label' => lang('re-password'),
                    'rules' => 'required|trim|matches[password]|min_length[6]|max_length[32]'
                )
            );

            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() === TRUE) {
                if ($pass_old == $pass) {
                    $message['type'] = 'warning';
                    $message['message'] = lang('cannot_password');
                    die(json_encode($message));
                }
                $identity = $this->session->userdata['account']['account_identity'];
                $change = $this->ion_account->change_password($identity, $pass_old, $pass);
                if (!empty($change)) {
                    $message['type']    = "success";
                    $message['message'] = lang('change_password_s');
                }else {
                    $message['type']    = 'warning';
                    $message['message'] = lang('Please_check_password');
                }
            }else {
                $message['type']    = "warning";
                $message['message'] = $this->lang->line('mess_validation');
                $valid = array();
                if (!empty($rules)) foreach ($rules as $item) {
                    if (!empty(form_error($item['field']))) $valid[$item['field']] = form_error($item['field']);
                }
                $message['validation'] = $valid;
            }
            die(json_encode($message));
        }
    }
    public function updateProfile(){
        $data_store = $this->_convertProfile();
        unset($data_store['email']);
        unset($data_store['msg']);
        // var_dump($data_store); exit;
        $response = $this->_data->update(array('id' => $this->session->account['account_id']), $data_store);
        if($response == false){
            $message['type'] = 'warning';
            $message['message'] = lang('error_please_try');
            $message['error'] = $response;
            log_message('error',$response);
        }else{
            $message['data']    = $data_store;
            $message['type']    = 'success';
            $message['message'] = lang('update_successful');
        }
        die(json_encode($message));
    }

    public function _convertProfile(){
        $this->_validateProfile();
        $data = $this->input->post();
        unset($data['avatar']);
        if (!empty($_FILES["avatar"]["name"])) {
            $ext = substr($_FILES['avatar']['name'], strrpos($_FILES['avatar']['name'],'.'));
            $image_name = 'avatar_'.time().$ext;
            $target_dir = MEDIA_NAME.$image_name;
            move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_dir);
            $unlinkOld  = $this->unlinkOld();
            if($unlinkOld->avatar!='') unlink(MEDIA_NAME.$unlinkOld->avatar);
            $data['avatar'] = $image_name;
        }
        return $data;    
    }

    public function _validateProfile(){
        if($this->input->server('REQUEST_METHOD') == 'POST' && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            // var_dump($this->input->post()); exit;
            // $oneAccount = getUserAccountById($this->session->userdata('account')['account_id'], '', $this->session->public_lang_code);
            // if($oneAccount->group_id==1){
            //     $this->form_validation->set_rules('gender', 'giới tính', 'required');
            // }
            if ($this->input->post('msg') == 1) {
                $this->form_validation->set_rules('address', 'địa chỉ', 'required|min_length[5]');
                $this->form_validation->set_rules('tinhthanh', 'tỉnh thành', 'required');
                $this->form_validation->set_rules('quanhuyen', 'tỉnh thành', 'required');
                $this->form_validation->set_rules('xaphuong', 'tỉnh thành', 'required');
            }else{
            $this->form_validation->set_rules('gender', 'giới tính', 'required');
            $this->form_validation->set_rules('full_name', lang('text_fullname'), 'required|trim|max_length[300]');
            $this->form_validation->set_rules('email', lang('text_email'), 'required|trim|min_length[5]|max_length[50]|valid_email');
            $this->form_validation->set_rules('phone',lang('text_phone'), 'required|trim|min_length[10]|max_length[12]|regex_match[/^(09|012|08|016|03|05|07|08)\d{8,}/]');
            // $this->form_validation->set_rules('idcart',lang('text_IDcard'), 'trim|numeric|max_length[12]');
            // $this->form_validation->set_rules('cmnd','cmnd', 'callback_cmnd');
            }
            if ($this->form_validation->run() === false) {
                $message['type']    = "warning";
                $message['message'] = $this->lang->line('mess_validation');
                $valid['full_name'] = form_error('full_name');
                $valid['email']     = form_error('email');
                $valid['gender']    = form_error('gender');
                $valid['address']   = form_error('address');
                $valid['phone']     = form_error('phone');
                $valid['xaphuong']  = form_error('xaphuong');
                $valid['quanhuyen'] = form_error('quanhuyen');
                $valid['tinhthanh'] = form_error('tinhthanh');
                
                $message['validation']  = $valid;
                die(json_encode($message));
            }
        } 
    }
    public function cmnd(){
        $cmnd = $this->input->post('cmnd');
            if (!empty($cmnd) && $cmnd==9 || $cmnd==12) {
              $this->form_validation->set_message('cmnd', lang('cmnd_error'));
              return false;
          }else{
              return true;
        }
    }
    public function do_upload(){
        // var_dump($this->input->post()); exit;

        $data  = $this->input->post();
        $img = $this->upload("./public/avatar","avatar");
        // var_dump($img); exit;
        if (!empty($img)){
            if (isset($img['error'])) {
                $error = str_replace(array('<p>','</p>'), '', $img['error']);
                $message['type'] = 'warning';
                $message['message'] = $error;
                $message['error'] = $error;
                log_message('error',$error);
            }else{
                $filename = $this->unlinkOld();
                $data['avatar'] = $img;
                $response = $this->_data->update(array('id' => $this->session->account['account_id']), $data);
                if($response == false){
                    $message['type'] = 'warning';
                    $message['message'] = lang('error_please_try');
                    $message['error'] = $response;
                    log_message('error',$response);
                }else{
                    if ($filename->avatar != 'default/anh-cute.jpg') {
                        unlink("./public/avatar/".$filename->avatar);
                    }
                    $message['data']    = $data_store;
                    $message['type']    = 'success';
                    $message['message'] = lang('update_successful');
                }
            }
            
            die(json_encode($message));
        }
    }
    
    // upload file (đường dẫn, tên thẻ input)
    public function upload($upload_path = '', $fileimage = ''){
        $config = $this->config($upload_path);
        $this->load->library('upload', $config);
        $uploaded_name = '';
        if(!$this->upload->do_upload($fileimage)){
            $error = array('error' => $this->upload->display_errors());       
            return $error;
        }
        $uploaded_name = $this->upload->data()['file_name'];
        return $uploaded_name;
    }
    public function config($upload_path = ''){
        $config = array();  
        // thư mục chứa fiile
        $config['upload_path'] = $upload_path;
        // định dạng file được phép 
        $config['allowed_types'] = 'jpg|png|gif';
        $config['max_size']             = 31200;
        $config['max_width']            = 31024;
        $config['max_height']           = 31024;
        return $config;
    }

    private function unlinkOld(){
        return $this->_data->unlinkOld();
    }
    public function logout(){
        $logout = $this->ion_account->logout();
        // redirect('/', 'refresh');
        if ($logout == true) {
            $message['type'] = 'success';
            $message['message'] = 'Đăng xuất thành công !';
            die(json_encode($message));
        }else{
            $message['type'] = 'warning';
            $message['message'] = 'Đăng xuất thất bại !';
            die(json_encode($message));
        }
    }
    
}
