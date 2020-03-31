<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Public_Controller
{
    protected $cid = 0;
    protected $_lang_code;
    protected $_all_agency;
    protected $zalo;
    protected $data;

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('ion_account', 'hybridauth'));
        $this->load->model(array('Account_model', 'category_model','collaborators_model','lecturers_form_model'));
        $this->_data = new Account_model();
        $this->lecturers_form = new Lecturers_form_model();
        $this->collaborators = new Collaborators_model();
    }

    public function login()
    {
        $data = array();
        $this->sb_login();
        $data['main_content'] = $this->load->view($this->template_path . 'account/login', $data, TRUE);
        $this->load->view($this->template_account, $data);
    }

    public function register()
    {
        $data = array();
        $this->sb_register();
        $data['link_zalo'] = $this->getUrlLogin();
        $data['main_content'] = $this->load->view($this->template_path . 'auth/register', $data, TRUE);
        $this->load->view($this->template_account, $data);
    }

    public function sb_login(){
        $data = array();
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->load->library('ion_account');
            $this->load->model('Account_model');
            $accountModel = new Account_model();
            $message = array();
            $rules = array(
                array(
                    'field' => 'email',
                    'label' => 'Email',
                    'rules' => 'required|trim'
                ),    
                array(
                    'field' => 'password',
                    'label' => lang('text_password'),
                    'rules' => 'required|trim'
                ),
            );
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() === TRUE) {
                if ($account = $this->ion_account->login($this->input->post('email'), $this->input->post('password'), FALSE)) {
              //if the login is successful
              //redirect them back to the home page
                    $account = $accountModel->getById($account->id, '', $this->session->public_lang_code);
                    $rule = $accountModel->getRule($account->id);
                    switch ($account->active) {
                        case '1':
                        $this->session->is_account_logged = true;
                        $this->session->userdata['account']['account_id'] = $account->id;
                        $this->session->userdata['account']['account_identity'] = $account->username;
                        $this->session->userdata['account']['rule'] = $rule;
                        die(json_encode(array(
                            'message' => lang('successfully'),
                            'type' => 'success'
                        )));
                        break;
                        case '2':
                        die(json_encode(array(
                            'message' => lang('pending_approval'),
                            'type' => 'warning'
                        )));
                        break;
                        default:
                        die(json_encode(array(
                            'message' => lang('locked_'),
                            'type' => 'warning'
                        )));
                        break;
                    }
                } else {
                  // if the login was un-successful
                    die(json_encode(array(
                        'message' => strip_tags($this->ion_account->errors()),
                        'type' => 'warning'
                    )));
                }
            }else{
                $message['type'] = "warning";
                $message['message'] = $this->lang->line('mess_validation');
                $valid = array();
                if (!empty($rules)) foreach ($rules as $item) {
                    if (!empty(form_error($item['field']))) $valid[$item['field']] = form_error($item['field']);
                }
                $message['validation'] = $valid;
                die(json_encode($message));
            }
        }
    }

    public function sb_register(){
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $rules = array(
                array(
                    'field' => 'email',
                    'label' => 'Email',
                    'rules' => 'required|trim|valid_email|callback_validate_email'
                ),
                array(
                    'field' => 'phone',
                    'label' => lang('text_phone'),
                    'rules' => 'required|trim|min_length[9]|max_length[12]|regex_match[/^(09|012|08|016|03|05|07|08)\d{8,}/]'
                ),
                array(
                    'field' => 'full_name',
                    'label' => lang('text_fullname'),
                    'rules' => 'trim|required'
                ),
                array(
                    'field' => 'password',
                    'label' => lang('text_password'),
                    'rules' => 'required|trim'
                ),
                array(
                  'field' => 'gender',
                  'label' => lang('sex'),
                  'rules' => 'required|trim'
                ),
                array(
                    'field' => 're-password',
                    'label' => lang('re-password'),
                    'rules' => 'trim|matches[password]|min_length[6]|max_length[32]|required'
                )
            );
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() === TRUE) {
                $remoteIp = $this->input->ip_address();

                $identity = strip_tags(trim($this->input->post('email')));

                $password = strip_tags(trim($this->input->post('password')));
                $email = strip_tags(trim($this->input->post('email')));
                $check_email = $this->_data->checkExistByField('email',$email);
                if ($check_email!="") {
                    $message['type'] = 'warning';
                    $message['message'] = lang('email_exists');
                    echo json_encode($message);
                    exit;
                }
                if ($this->input->post('full_name')) {
                    $data_store['full_name'] = strip_tags(trim($this->input->post('full_name')));
                }
                $full_name = strip_tags(trim($this->input->post('full_name')));
                $phone_number = strip_tags(trim($this->input->post('phone')));

                $data_store['full_name'] = $full_name;
                $data_store['phone'] = $phone_number;
                $data_store['gender'] = $this->input->post('gender');
                $data_store['active'] = 1;
                $id_user = $this->ion_account->register($identity, $password, $email, $data_store, ['group_id' => 1]);

                if ($id_user !== false) {
                    die(json_encode(array(
                        'message' => lang('sign_up'),
                        'type' => 'success',
                        'status'=>200
                  )));
                } else {
                    die(json_encode(array(
                        'message' => lang('mess_validation'),
                        'type' => 'warning'
                    )));
                }
            } else {
                $message['type'] = "warning";
                $message['message'] = $this->lang->line('mess_validation');
                $valid = array();
                if (!empty($rules)) foreach ($rules as $item) {
                    if (!empty(form_error($item['field']))) $valid[$item['field']] = form_error($item['field']);
                }
                $message['validation'] = $valid;
                die(json_encode($message));
            }
        }
    }

    public function forgotPassword(){
        $data = array();
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->sbForgotPassword();
        }
        $data['main_content'] = $this->load->view($this->template_path . 'auth/forgot_password', $data, TRUE);
        $this->load->view($this->template_main, $data);
    }

    public function resetPassword()
    {

        $code = $this->input->get('key_forgotten');

        $user = $this->ion_account->forgotten_password_check($code);

        if ($user) {
            $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_account');
            $this->data['new_password'] = array(
                'name' => 'new',
                'id' => 'new',
                'class' => 'form-control',
                'type' => 'password',
                'placeholder'=>'Mật khẩu mới',
                'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
            );
            $this->data['new_password_confirm'] = array(
                'name' => 'new_confirm',
                'id' => 'new_confirm',
                'class' => 'form-control',
                'type' => 'password',
                'placeholder'=>'nhập lại mật khẩu mới',
                'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
            );
            $this->data['user_id'] = array(
                'name' => 'user_id',
                'id' => 'user_id',
                'type' => 'hidden',
                'value' => $user->id,
            );
            $this->data['csrf'] = $this->_get_csrf_nonce();
            $this->data['code'] = $code;
        }
        echo $this->load->view($this->template_path . 'account/reset_password', $this->data, TRUE);
        exit();
    }


    public function logout($calback = ''){
        if (!empty($calback)) $calback = base_url();
        $this->ion_account->logout();
        // redirect them to the login page
        $account = $this->_data->getById($this->session->userdata['account']['account_id']);
        if (!empty($account->oauth_provider) && $account->oauth_provider != 'Zalo') $this->hybridauth->HA->logoutAllProviders();
        if ($account->oauth_provider == 'Zalo') {
            delete_cookie("call_back_url");
            delete_cookie("access_token");
        }
        $this->session->set_flashdata('message', $this->ion_account->messages());
        $this->session->set_flashdata('type', 'success');
        redirect($calback, 'refresh');
    }

    public function forgot_password(){
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $message = array();
        // setting validation rules by checking whether identity is username or email
            $this->form_validation->set_rules('identity', 'Email', 'required|valid_email');

            if ($this->form_validation->run() === FALSE) {
          // set any errors and display the form
                $message['type'] = 'warning';
                $message['message'] = 'Vui lòng kiểm tra lại thông tin!';
                $message['validation']['identity'] = validation_errors();
            } else {
                $data_input = $this->input->post('identity');
                if (is_numeric($data_input)) {
                    $identity_column = 'phone';
                    $identity_des=lang('text_phone');
                } else {
                    $identity_column = 'email';
                    $identity_des='Email';
                }
                $user_data = $this->_data->getUserByField($identity_column, $data_input,1);
                if (empty($user_data)) {
                    $message['type'] = 'warning';
                    $message['message'] = $identity_des . lang('does_not_exist');
                    die(json_encode($message));
                }
                // run the forgotten password method to email an activation code to the user
                $this->forgot($identity_column, $data_input, $user_data);
            }
        die(json_encode($message));
        }
    }

    private function forgot($identity_column, $data_input, $data_user){
        $data_mess = array();
        if ($identity_column === 'phone') {
            $pass = rand(1000, 9999);
        //      Lấy mk đã được mã hóa và update mk mới
            $hashPass = $this->ion_account->hash_password($pass, true);
            $this->_data->updateField($data_user->id, 'password', $hashPass);

        } else {
            $forgotten = $this->ion_account->forgotten_password($data_user->{$identity_column});
            if ($forgotten) {
                // if there were no errors
                $data_mess['type'] = 'success';
                $data_mess['message'] = 'Vui lòng kiểm tra hòm thư để reset mật khẩu';
    //                redirect(BASE_ADMIN_URL."auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
            } else {
                $data_mess['type'] = 'error';
                $data_mess['message'] = $this->ion_account->errors();
            }
        }
    die(json_encode($data_mess));
    }

    public function ajax_reset_password()
    {
        $code = $this->input->post('key_forgotten');
        $user = $this->ion_account->forgotten_password_check($code);
        $message=array();
        if ($user) {
            $rules = array(
                array(
                    'field' => 'new',
                    'label' => $this->lang->line('reset_password_validation_new_password_label'),
                    'rules' => 'required|min_length[' . $this->config->item('min_password_length', 'ion_account') . ']|max_length[' . $this->config->item('max_password_length', 'ion_account') . ']|matches[new_confirm]'
                ),
                array(
                    'field' => 'new_confirm',
                    'label' => $this->lang->line('reset_password_validation_new_password_confirm_label'),
                    'rules' => 'required'
                )

            );
            // if the code is valid then display the password reset form

            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() === TRUE) {
            // display the form
            // set the flash data error message if there is one
            // finally change the password
            $identity = $user->{$this->config->item('identity', 'ion_account')};
            $change = $this->ion_account->reset_password($identity, $this->input->post('new'));
                if ($change) {
                  // if the password was successfully changed
                    $message['type'] = 'success';
                    $message['message'] = lang('change_password');
                } else {
                    $message['type'] = 'warning';
                    $message['message'] = lang('mess_validation');
                }
            } else {
                $message['type'] = "warning";
                $message['message'] = lang('mess_validation');
                $valid = array();
                if(!empty($rules)) foreach ($rules as $item){
                    if(!empty(form_error($item['field']))) $valid[$item['field']] = form_error($item['field']);
                }
                $message['validation'] = $valid;
                die(json_encode($message));
            }

        } else {
            $message['type'] = 'warning';
            $message['message'] = $this->ion_account->errors();
        }
        die(json_encode($message));
    }
  /**
   * Try to authenticate the user with a given provider
   *
   * @param string $provider_id Define provider to login
   */
    public function window($provider_id){
        $data_store = array();
        $params = array(
            'hauth_return_to' => site_url("auth/window/{$provider_id}"),
        );
        if (isset($_REQUEST['openid_identifier'])) {
            $params['openid_identifier'] = $_REQUEST['openid_identifier'];
        }
        try {
            $adapter = $this->hybridauth->HA->authenticate($provider_id, $params);
            $profile = $adapter->getUserProfile();
            $user_name = str_replace(' ', '', $this->toNormal(strtolower($profile->displayName)));
            $check_auth = $this->_data->check_oauth('oauth_uid', $profile->identifier);
            $check_email = $this->_data->check_oauth('email', $profile->email);
            $check_username = $this->_data->check_oauth('username', $user_name);
            $check_phone = !(empty($profile->phone)) ? $this->_data->check_oauth('phone', $profile->phone) : 0;
            $data_store['oauth_provider'] = $provider_id;
            $data_store['oauth_uid'] = $profile->identifier;
            $data_store['full_name'] = $profile->displayName;
            $data_store['avatar'] = $profile->photoURL;
            switch ($profile->gender) {
                case 'male':
                $data_store['gender'] = 2;
                break;
                case 'female':
                $data_store['gender'] = 1;
                break;
                default:
                $data_store['gender'] = 3;
                break;
            }
        $data_store['birth_day'] = $profile->birthYear.'-'.$profile->birthMonth.'-'.$profile->birthDay;
        $data_store['display_name'] = $data_store['full_name'] = trim($profile->displayName);
        $data_store['phone'] = $profile->phone;
        $email = $profile->email;
        $file = $profile->photoURL;
        $identity = ($check_username <= 0) ? $user_name : time();
        $dir = 'public/media/avatar';
        if (isset($this->session->userdata)) unset($this->session->userdata['account']);
            if ($check_auth <= 0) {
                $group_id = 1;
                $data_store['active'] = 1;
                if ($check_email == 0 && $check_phone == 0) {
                // copy avatar
                    $newfile = $dir . '/' . $profile->identifier . '.png';
                    copy($file, $newfile);
                    $data_store['avatar'] = 'avatar/' . $profile->identifier . '.png';
                    // End avatar
                    $id_user = $this->ion_account->register($identity, $profile->identifier, $email, $data_store, ['group_id' => $group_id]);

                    $this->session->is_account_logged = true;
                    $this->session->userdata['account']['account_identity'] = $identity;
                    $this->session->userdata['account']['account_id'] = $id_user;
                    $this->session->set_flashdata('message', lang('successfully'));
                    $this->session->set_flashdata('type', 'success');
                    redirect(base_url(), 'refresh');
            } else {
                $field=($check_email!=0)?'email':'phone';
                if($check_email!=0){
                    $field='email';
                    $value=$profile->email;
                }else{
                    $field='phone';
                    $value=$profile->phone;
                }
                $account = $this->_data->getUserByField($field, $value);
                $this->_data->update(array('id'=>$account->id),array('oauth_uid'=>$profile->identifier,'oauth_provider'=>$provider_id));
                $this->session->is_account_logged = true;
                $this->session->userdata['account']['account_id'] = $account->id;
                $this->session->userdata['account']['account_identity'] = $account->username;
                $message['type'] = 'success';
                $message['message'] = lang('successfully');
                $this->session->set_flashdata('message', $message);
                redirect(base_url(), 'refresh');
            }

        } else {
            $account = $this->_data->getUserByField('oauth_uid', $profile->identifier);
        //                $account =$this->ion_account->login($infoAcount->username, $profile->identifier);
                //if the login is successful
                //redirect them back to the home page
            $this->session->is_account_logged = true;

            $this->session->userdata['account']['account_id'] = $account->id;
            $this->session->userdata['account']['account_identity'] = $account->username;
            if (empty($account->avatar)) {
              if (!is_dir($dir)) {
                mkdir('public/media/avatar', '0755');
            }
            chmod($dir, 755);
            $newfile = $dir . '/' . $profile->identifier . '.png';
            copy($file, $newfile);
            $avatar = 'avatar/' . $profile->identifier . '.png';
            $this->_data->updateField($account->id, 'avatar', $avatar);
        }
            $message['type'] = 'success';
            $message['message'] = lang('successfully');
            $this->session->set_flashdata('message', $message);
            redirect(base_url(''), 'refresh');
        }
        } catch (Exception $e) {
          show_error($e->getMessage());
        }
   }

  /**
   * Handle the OpenID and OAuth endpoint
   */
    public function endpoint(){
        $data = $this->input->get();
        if ($data['hauth_done'] == 'Facebook' && $data['error'] == 'access_denied') {
             redirect(site_url(), 'refresh');
        }
        $this->hybridauth->process();
    }
    public function getUrlLogin(){
        $url = $this->zalo->getUrlLogin();
        return $url;
    }
    public function validate_email(){
        $email_collaborators = $this->collaborators->checkExistByField('email',$this->input->post('email'),'collaborators');
        $email_lecturers     = $this->lecturers_form->checkExistByField('email',$this->input->post('email'),'lecturers_form');
        $email_account       = $this->_data->checkExistByField('email',$this->input->post('email'),'account');
        if ($email_collaborators==1 || $email_lecturers==1 || $email_account==1) {
            $this->form_validation->set_message('validate_email', lang('email_exists'));
            return false;
        }else{
            return true;
        }
    }


}
