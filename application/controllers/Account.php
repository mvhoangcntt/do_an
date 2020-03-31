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
        $this->load->library(array('ion_account', 'hybridauth'));
        $this->load->model(array('account_model','questions_model','course_model'));
        $this->_data     = new Account_model();
        $this->questions = new Questions_model();
        $this->course    = new Course_model();

        $this->user_login = $this->_data->getById($this->session->account['account_id']);
        if (empty($this->user_login)) redirect(site_url());
    }

    public function index(){
        if ($this->session->is_account_logged != true) redirect();
        $data['heading_title'] =$this->lang->line('pagePersonal');
        $data['oneAccount'] = getUserAccountById($this->session->userdata('account')['account_id'], '', $this->session->public_lang_code);
        /*Breadcrumbs*/
        $this->breadcrumbs->push(" <i class='fa fa-home'></i>", base_url());
        $this->breadcrumbs->push($data['heading_title'], '#');
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        /*Breadcrumbs*/
        switch ($data['oneAccount']->group_id) {
            case 1:
            $data['main_content'] = $this->load->view($this->template_path . 'account/profile_student', $data, TRUE);
            break;
            case 2:
            $data['main_content'] = $this->load->view($this->template_path . 'account/profile_lecturers', $data, TRUE);
            break;
            default:
            $data['main_content'] = $this->load->view($this->template_path . 'account/profile_collaborators', $data, TRUE);
            break;
        }

        $this->load->view($this->template_main, $data);
    }

    public function lang_js(){
        $lang_curent = $this->session->public_lang_code == 'vi' ? 'vietnamese' : 'english';
        $lang_text = '';
        $lang_code = $this->lang->load('account',$lang_curent, true);
        foreach ($lang_code as $key => $lang){
            $lang_text .= "language['".$key."'] = '".$lang."';";
        }
        print_r($lang_text);exit;
    }
    //
    //profile_
    public function change_password(){
        if ($this->session->is_account_logged != true) redirect();
        $data['heading_title'] =$this->lang->line('pagePersonal');

        $data['oneAccount'] = getUserAccountById($this->session->userdata('account')['account_id'], '', $this->session->public_lang_code);
        /*Breadcrumbs*/
        $this->breadcrumbs->push(" <i class='fa fa-home'></i>", base_url());
        $this->breadcrumbs->push($data['heading_title'], '#');
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        /*Breadcrumbs*/

        $data['main_content'] = $this->load->view($this->template_path . 'account/change_password', $data, TRUE);

        $this->load->view($this->template_main, $data);
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
            $oneAccount = getUserAccountById($this->session->userdata('account')['account_id'], '', $this->session->public_lang_code);
            if($oneAccount->group_id==1){
                $this->form_validation->set_rules('gender', 'giới tính', 'required');
            }
            $this->form_validation->set_rules('full_name', lang('text_fullname'), 'required|trim|max_length[300]');
            $this->form_validation->set_rules('email', lang('text_email'), 'required|trim|min_length[5]|max_length[50]|valid_email');
            $this->form_validation->set_rules('phone',lang('text_phone'), 'required|trim|min_length[10]|max_length[12]|regex_match[/^(09|012|08|016|03|05|07|08)\d{8,}/]');
            $this->form_validation->set_rules('idcart',lang('text_IDcard'), 'trim|numeric|max_length[12]');
            $this->form_validation->set_rules('cmnd','cmnd', 'callback_cmnd');
            if ($this->form_validation->run() === false) {
                $message['type']        = "warning";
                $message['message']     = $this->lang->line('mess_validation');
                $valid['full_name']     = form_error('full_name');
                $valid['email']         = form_error('email');
                $valid['idcart']        = form_error('idcart');
                $valid['cmnd']          = form_error('cmnd');
                $valid['phone']         = form_error('phone');
                
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
    private function do_upload(){
        $dir = 'public/media/';
        $config['upload_path'] = $dir;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload('file');
        $data = $this->upload->data();
        return $data;
    }

    private function unlinkOld(){
        return $this->_data->unlinkOld();
    }
    public function logout(){
        $logout = $this->ion_account->logout();
        redirect('/', 'refresh');
    }

}
