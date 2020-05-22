<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends Public_Controller {

    protected $order;
    protected $vnPay;
    public function __construct(){
        parent::__construct();
        $this->load->library(array('Payment/VnPay','session'));
        $this->load->model(array('order_model','voucher_model'));
        $this->order    = new Order_model();
        $this->vnPay    = new VnPay();
        $this->voucher  = new Voucher_model();
    }
    public function response_callback(){
        $request = $this->input->get();
        log_message('info',"Log return: " . json_encode($_REQUEST));
        if ($request['vnp_TransactionNo'] == 0) {
            redirect('cart/checkout');
            $message['type'] = 'waning';
            $message['message'] = 'Bạn vừa hủy thanh toán online';
            $this->session->set_flashdata('message', $message);
        }else{
            if(!empty($request)){
                $response = $this->vnPay->response($request);
                $response = (array) json_decode($response);
                if($response['type'] == 'success') {
                    $data_order = $this->order->getByIdPayment($response['order_id']);
                    $this->sendMail($data_order);
                    $this->cart->destroy();
                    $message['type'] = 'success';
                    $message['message'] = lang('successful_payment').' - Order ID : '.$response['order_id'];
                    $this->session->set_flashdata('message', $message);
                } else {
                    $message['type'] = 'error';
                    $message['message'] = lang('Payment_failed').' - Order ID : '.$response['order_id'];
                    $this->session->set_flashdata('message', $message);
                }
            } else {
                $message['type'] = 'error';
                $message['message'] = lang('not_cart');
                $this->session->set_flashdata('message', $message);
            }
            sleep(1);
            redirect(base_url());
        }
    }
    public function ipn_url(){ //Nhận và check xong gửi lại sang vnpay
        $request = $this->input->get();
        log_message('info',"Log ipn : " . json_encode($_REQUEST));
        if(!empty($request)){
            $vnPay = new VnPay();
            $response = $vnPay->ipn($request);
            $message = (array) json_decode($response);
            $order_model = new Order_model();
            if($message['RspCode'] === '00'){
                $order_model->update(['id_payment'=>$message['order_id']], (array)$message['info_pay_bank']); //Update đã thanh toán
            } elseif (in_array($message['RspCode'], array('97', '99', '01', '02'))) {
                $order_model->update(['id_payment'=>$response['order_id']], array('status_payment' => 2, 'response' => json_encode($request))); //Update giao dich loi
            }
            print json_encode(array(
                'RspCode' => $message['RspCode'],
                'Message' => $message['Message']
            ));
        }
        exit;
    }
    private function sendMail($data){
       if(!empty($data->email)){
        /*Config setting*/
        $this->load->library('email');
            $emailTo   = $data->email; //Send mail cho khach hang
            $emailToCC = $data->email; //Send mail cho ban quan tri
            $emailFrom = $emailToCC;
            $nameFrom  = $data->full_name;
            $contentHtml = '
            <h2>Thông tin mã kích hoạt khóa học</h2></br>

            <p>Họ và tên: ' . $data->full_name . '</p>
            <p>Email: ' . $data->email . '</p>
            <p>Số điện thoại: ' . $data->phone . '</p>
            <p>Mã kích hoạt: ' . $data->activation_code . '</p>
            <p>Vui lòng truy cập website '.base_url().' để kích hoạt khóa học !</p>
            ';

            $this->email->from($emailFrom, $nameFrom);

            $this->email->to($emailTo);
            if(!empty($emailToCC)) $this->email->cc($emailToCC);
            if(!empty($emailToBCC)) $this->email->bcc($emailToBCC);
            $this->email->subject('Thông tin mã kích hoạt khóa học từ '.base_url());
            $this->email->message($contentHtml);
            $this->email->send();
        }
    }
    
}
