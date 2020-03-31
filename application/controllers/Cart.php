<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends Public_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->lang->load('cart');
        $this->load->library('cart');
        $this->load->model(['Course_model','order_model','voucher_model', 'Account_model']);
        $this->order    = new Order_model();
        $this->voucher  = new Voucher_model();
    }

    public function index(){
        $cart = $this->cart->contents();
        $data['content_cart'] = $cart;
        unset($_SESSION['code_sale']);
        $data['main_content'] = $this->load->view($this->template_path . 'cart/index', $data, TRUE);
        $this->load->view($this->template_main, $data);
    }
    public function checkout(){
        $data['code_sale'] = isset($_SESSION['code_sale']) ? $_SESSION['code_sale'] : '';
        if (!empty($data['code_sale'])) {
            $code_sale = $this->voucher->get_code_voucher($data['code_sale']);
            $data['price_sale']    =  ($this->cart->total()*$code_sale->percent_sale/100);
            $data['percent_sale']  =  $code_sale->percent_sale;
            $data['total_cart']     = $this->cart->total()-($this->cart->total()*$data['percent_sale']/100);
        }else{
            $data['total_cart'] = $this->cart->total();
        }

        $data['main_content'] = $this->load->view($this->template_path . 'cart/checkout', $data, TRUE);
        $this->load->view($this->template_main, $data);
    }
    public function add_cart(){
        if ($this->input->server('REQUEST_METHOD') == 'POST' && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $data   = $this->input->post('data');
            $course = $this->Course_model->get_course_by_id($data['id']);
            $check  = check_addtocart($data['id']);
            $oneAccount = getUserAccountById($this->session->userdata('account')['account_id']);
            if (!empty($oneAccount)) {
                if ($oneAccount->group_id != 1) {
                    die(json_encode(['mess'=>lang('Only_students_order'),'type'=>'warning']));
                }
            }
            if($check==false) {
                die(json_encode(['mess'=>lang('course_exists'),'type'=>'warning']));
            }
            if (!empty($data)) {
                $price_course = priceCart($data['id'], $course->price_old, $course->price_new);
                $item = array(
                    'id'                => $data['id'],
                    'qty'               => 1,
                    'name'              => $course->title,
                    'price'             => $price_course,
                    'thumbnail'         => $course->thumbnail
                );
                $data_cart      = $this->cart->insert($item);
                $total_item     = $this->cart->total_items();
                $data_mess = array(
                    'status'        => true,
                    'mess'          => lang('add_cart'),
                    'type'          => 'success',
                    'total_item'    => $total_item
                );
                die(json_encode($data_mess));
            }
            exit;
        }
    }
   
    public function remove_item_cart(){
        if($this->input->server('REQUEST_METHOD') == 'POST' && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $id     = $this->input->post('id');
            $row    = $this->input->post('identifier');
            if (isset($id) && is_numeric($id)) {
                foreach ($this->cart->contents() as $key => $item) {
                    if ($item['id'] == $id && $key == $row) {
                        $this->cart->remove($row);
                        $data_mess = array(
                            'status'        => true,
                            'total_cart'    => number_format($this->cart->total(),0,'',',').'đ',
                            'total_item'    => $this->cart->total_items()
                        );
                        echo json_encode($data_mess);
                        break;
                    }
                }
            }
        }
    }

    
    public function ajax_order(){
        if($this->input->server('REQUEST_METHOD') == 'POST' && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

            $rules = array(
                array(
                    'field' => 'email',
                    'label' => 'Email',
                    'rules' => 'trim|required|valid_email'
                ),
                array(
                    'field' => 'full_name',
                    'label' => lang('text_fullname'),
                    'rules' => 'required|trim'
                ),
                array(
                    'field' => 'phone',
                    'label' => lang('text_phone'),
                    'rules' => 'required|trim|min_length[9]|max_length[12]|regex_match[/^(09|012|08|016|03|05|07|08)\d{8,}/]'
                ),
                array(
                    'field' => 'city',
                    'label' => lang('province_city'),
                    'rules' => 'required|trim'
                ),
                array(
                    'field' => 'method',
                    'label' => lang('method_'),
                    'rules' => 'required'
                ),
                array(
                    'field' => 'district',
                    'label' => lang('district'),
                    'rules' => 'required|trim'
                ),
                array(
                    'field' => 'address',
                    'label' => lang('text_address'),
                    'rules' => 'required|trim'
                )
            );
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == true) {
                $data['order_detail'] = $this->cart->contents();
                $oneAccount = getUserAccountById($this->session->userdata('account')['account_id']);
                if (!empty($oneAccount)) {
                    if ($oneAccount->group_id != 1) {
                        die(json_encode(['message'=>lang('Only_students_order'),'type'=>'warning']));
                    }
                    if (empty($data['order_detail'])) {
                        $message['type'] = "warning";
                        $message['message'] = lang('please_check_cart');
                        die(json_encode($message));
                    }
                    $dataPost = $this->input->post();
                    $total_amount = $this->cart->total();
                    if(!empty($_SESSION['code_sale'])) {
                        $code_sale = $this->voucher->get_code_voucher($_SESSION['code_sale']);
                        if (!empty($code_sale)) {
                            $this->check_date($code_sale->start_time, $code_sale->end_time);
                            $this->check_total_use($code_sale->remaining_use);
                            $this->receivingedAccount($code_sale->id,$oneAccount->id);
                            $price =  ($this->cart->total()*$code_sale->percent_sale/100);
                            $total_amount = $this->cart->total()-$price;

                        } else {
                            $message = array(
                                'mess'   => lang('voucher_not'),
                                'type'   => 'warning'
                            );
                            die(json_encode($message));
                        }
                    }

                    $data['order_info'] = array(
                        'account_id'      => $oneAccount->id,
                        'code'            => 'newtech-'.time(),
                        'full_name'       => $dataPost['full_name'],
                        'address'         => $dataPost['address'],
                        'note'            => $dataPost['note'],
                        'phone'           => $dataPost['phone'],  
                        'email'           => $dataPost['email'],
                        'city'            => $dataPost['city'],
                        'district'        => $dataPost['district'],
                        'total_amount'    => $total_amount,
                        'method'          => $dataPost['method'],
                        'activation_code' => $this->active_code(),
                        'voucher_id'      => !empty($code_sale->id) ? $code_sale->id : ''
                    );
                    $orderId    = $this->order->saveOrder($data);
                    $data_order = $this->order->get_order($orderId);
                    if ($orderId != false) {
                        if(!empty($_SESSION['code_sale'])) {
                            unset($_SESSION['code_sale']);
                        }
                    //case thanh toán trực tuyến
                        if($dataPost['method'] == 3){
                            $checksum         = md5($oneAccount->id.'abc!$#@$&345HDA'.$orderId);
                            $message['url']   = url_pay($orderId,$oneAccount->id,$checksum);
                            $message['method'] = 3;
                            die(json_encode($message));
                        }
                        if($dataPost['method'] == 4){
                            $reponse            = $this->pay_momo($orderId,$this->cart->total());
                            $message['qrcode']  = qrcode($reponse);
                            $message['method']  = 4;
                            die(json_encode($message));
                        }
                        if (!empty($code_sale)) {
                            $remaining_voucher = $code_sale->remaining_use - 1;
                            $update_remaining_voucher    = $this->voucher->update_remaining_voucher($code_sale->id,$remaining_voucher);
                        }
                        $message['type'] = "success";
                        $message['message'] = lang('successful_payment');
                        $this->cart->destroy();
                        die(json_encode($message));
                    }
                }else{
                    die(json_encode(['type'=>'error']));
                }

            }else{
                $message['type'] = "warning";
                $message['message'] = $this->lang->line('mess_validation');
                $valid = array();
                if(!empty($rules)) foreach ($rules as $item){
                    if(!empty(form_error($item['field']))) $valid[$item['field']] = form_error($item['field']);
                }
                $message['validation'] = $valid;
                die(json_encode($message));
            }
        }
    }
   
    public function ajax_check_voucher(){
        if($this->input->server('REQUEST_METHOD') == 'POST' && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $code = $this->input->post('code_sale');
            if (empty($code)) {
                $data_mess = array(
                    'message'   => lang('Please_voucher'),
                    'type'   => 'warning'
                );
                die(json_encode($data_mess));
            }
            $id_account = $this->session->userdata('account')['account_id'];
            $code_sale = $this->voucher->get_code_voucher($code);

            if (!empty($code_sale)) {
                if ($code_sale->is_status==2) {
                    $data_mess = array(
                        'message'   => lang('Voucher_canceled'),
                        'type'   => 'warning'
                    );
                    die(json_encode($data_mess));
                }
                $this->check_date($code_sale->start_time, $code_sale->end_time);
                $this->check_total_use($code_sale->remaining_use);

                $this->receivingedAccount($code_sale->id,$id_account);
                $price =  ($this->cart->total()*$code_sale->percent_sale/100);
                $_SESSION['code_sale']      = $code;

                $data_mess = array(
                    'message'   => lang('apply_successful'),
                    'type'      => 'success',
                    'total'     => number_format($this->cart->total()-$price,0,'',',').'đ',
                    'html'      => '<p class="sale_">'.lang('reduction').' <span>-'.$code_sale->percent_sale.'% ('.number_format($price,0,'','.').'đ'.')</span> '.lang('for_total').'</p>'
                );
            } else {
                $data_mess = array(
                    'message'   => lang('voucher_not'),
                    'total'     => number_format($this->cart->total(),0,'',',').'đ',
                    'type'      => 'warning'
                );
            }
            die(json_encode($data_mess));
            exit;
        }
    }

    private function receivingedAccount($voucher_id,$account_id){
        $order_voucer = $this->order->receivingedAccount($voucher_id, $account_id);
        if (!empty($order_voucer)) {
            $message = array(
                'message'   => lang('you_have_used'),
                'type'   => 'warning'
            );
            die(json_encode($message));
        }
        return true;
    }
    private function check_date($start_time, $end_time){
        $start_time = date('Y-m-d',strtotime($start_time));
        $end_time   = date('Y-m-d',strtotime($end_time));
        $today      = date('Y-m-d');

        if ($today > $end_time) {
            $message     = array(
                'message'   => lang('voucher_expired'),
                'type'   => 'warning'
            );
            die(json_encode($message));
        }else if($end_time > $today && $start_time > $today ){
            $message = array(
                'message'   => lang('voucher_not_time'),
                'type'   => 'warning'
            );
            die(json_encode($message));
        }else{
            return true;
        }
    }
    private function check_total_use($remaining_use){
        if ($remaining_use == 0) {
            $message = array(
                'message'   => lang('voucher_has_been'),
                'type'   => 'warning'
            );
            die(json_encode($message));
        }
        return true;
    }
    public function active_code(){
        $code = rand(111111,999999);
        $checkExitsCode = $this->order->checkExitsCode($code);
        if(!empty($checkExitsCode)){
            $this->active_code();
        }
        return $code;
    }

    private function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}