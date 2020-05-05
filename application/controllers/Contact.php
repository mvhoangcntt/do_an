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
        $this->load->model('Home_model');
        $this->_data = new Home_model();
    }

    public function index()
    {
        $data['heading_title'] = 'MV Hoàng';
        $data['main_content'] = $this->load->view($this->template_path . 'contact/contact', $data, TRUE);
        $this->load->view($this->template_main, $data);
    }
    public function post_contact(){
        $data = $this->_convertData();
        // exit(json_encode($data));
        if ($this->_data->save_contact($data)) {
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
}
