<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends Public_Controller
{
    protected $_all_category;
    protected $_data_category;
    public $Course_model;
    
    public function __construct()
    {
        parent::__construct();
        $this->lang->load('cart');
        $this->load->model(array('Home_model','Detail_model','Account_model','Order_model','Cart_model','Seemore_model'));
        $this->_data = new Detail_model();
        $this->_data_home = new Home_model();
        $this->_data_account = new Account_model();
        $this->_data_order = new Order_model();
        $this->_data_cart = new Cart_model();
        $this->_data_seemore = new Seemore_model();
        
        $this->user_login = $this->_data_account->getById($this->session->account['account_id']);
        $this->load->library('user_agent');
        $this->$refer =  $this->agent->referrer(); // lấy url trước đó
        if (empty($this->user_login)){
            redirect($this->$refer.'?login=error');
        }

    }

    public function index($id = ''){
        // var_dump($refer); exit;
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
        // thông tin sản phẩm
        $tongtien = 0;
        $data['cart'] = $this->_data_cart->get_cart_id($id);// kiểm tra id đăng nhập phía model
        foreach ($data['cart'] as $key => $value) {
            $optional['id'] = $value->id;
            $optional['slug'] = $value->slug;
            $data['cart'][$key]->url = getUrlProduct($optional);
            $tongtien += $value->price * $value->quantity_cart;

        }
        $data['tongtien'] = $tongtien;
        // var_dump($data['cart']); exit;
        // $data['tongtien'] = 
        // lấy địa chỉ account
        $data['diachi'] = $this->_data_home->getDVHC($this->user_login->xaphuong);
        
        $data['viettel_post'] = $this->phivanchuyen($data['cart']);
        

        $data['giamgia']  = $this->_data->giamgia();
        foreach ($data['giamgia'] as $key => $value) {
            $optional['id'] = $value->id;
            $optional['slug'] = $value->slug;
            $data['giamgia'][$key]->url = getUrlProduct($optional);
        }

        $data['main_content'] = $this->load->view($this->template_path . 'order/order', $data, TRUE);
        $this->load->view($this->template_main, $data);
    }

    public function add_order(){
        $data = $this->input->post();
        // var_dump($data); exit;
        // kiểm tra mã khuyến mãi
        $khuyenmai = 0;
        $gift = array();
        if (!empty($data['gift-code'])) {
            $gift = $this->_data_cart->check_gift($data['gift-code']);
            if (!empty($gift)) {
                $t1 = strtotime($gift->end_time);
                $t2 = strtotime(date("Y-m-d H:i:s"));
                if ($t1 < $t2) {
                    $message_error = 'Mã code đã hết hạn !';
                    $this->erro_add_order($message_error);
                    
                }else{
                    if ($gift->remaining_use < 1) {
                        $message_error = 'Mã code đã sử dụng hết !';
                        $this->erro_add_order($message_error);
                    }else{
                        $khuyenmai = $gift->percent_sale;
                    }
                }
            }else{
                $message_error = 'Mã code Không tồn tại !';
                $this->erro_add_order($message_error);
            }
        }
        // var_dump($gift); exit;
        // var_dump($khuyenmai); exit;
        // kiểm tra bắt lỗi quà tặng k nó sẽ bỏ qua phần lỗi phía trên
        if (!empty($data['gift-code']) && $khuyenmai != 0 || empty($data['gift-code']) && $khuyenmai == 0) {
        // kiểm tra tính chính sác các sản phẩm
            if ($data['id_cart'] == null) { // kiểm tra xem có sản phẩm nào k
                header('location:'.base_url('cart/?dathang=error'));
            }else{
                $dem = 0;
                $tongtien = 0;
                $data['cart'] = array();
                $cart = array();
                foreach ($data['id_cart'] as $key => $value) {
                    $cart = $this->_data_cart->get_cart_id($value);// kiểm tra id đăng nhập phía model
                    if (empty($cart)) {
                        $dem++;
                    }
                    foreach ($cart as $key => $value) {
                        $tongtien += $value->price * $value->quantity_cart;
                    }
                    array_push($data['cart'], $cart[0]);
                }

                $sotienphaitra = 0;
                if ($khuyenmai != 0) {
                    $sotienphaitra = $tongtien - (($tongtien/100) * $khuyenmai) + $this->phivanchuyen($data['cart']);;
                }else{
                    $sotienphaitra = $tongtien + $this->phivanchuyen($data['cart']);;
                }
                // var_dump($tongtien); exit;
                if ($dem != 0) {
                    $message_error = 'Lỗi thông tin sản phẩm. Vui lòng thử lại !';
                    $this->erro_add_order($message_error);
                }
                // lấy địa chỉ chi tiết
                $diachi = $this->_data_home->getDVHC($this->user_login->xaphuong);
                // chọn phương thức thanh toán
                // var_dump($diachi); exit;
                if ($data['thanhtoan'] == 1) {// tiền mặt khi nhận hàng
                    $order['is_status']     = 1;
                    $order['amount_total']  = $sotienphaitra;
                    $order['account_id']    = $this->session->account['account_id'];
                    $order['payment_id']    = 1;
                    $order['transport_fee'] = $this->phivanchuyen($data['cart']);
                    $order['full_name']     = $this->user_login->full_name;
                    $order['phone']         = $this->user_login->phone;
                    $order['address']       = $this->user_login->address.', '.$diachi->name.', '.$diachi->quan_huyen.', '.$diachi->tinh_tp;
                    $order['note']          = $data['content'];
                    $order['gift_code']     = $khuyenmai;
                    $insert_id              = $this->_data->save($order,'orders');
                    $check_add              = 0;
                    if (!empty($insert_id)) {
                        foreach ($data['id_cart'] as $key1 => $value1) {
                            $cart = $this->_data_cart->get_cart_id($value1);// kiểm tra id đăng nhập phía model
                            foreach ($cart as $key => $value) {
                                $detail['order_id']   = $insert_id;
                                $detail['product_id'] = $value->id;
                                $detail['amount']     = $value->price;
                                $detail['quantity']   = $value->quantity_cart;
                                $detail['size_id']    = $value->size_id;
                                $id_detail = $this->_data->save($detail,'order_detail');
                                
                                $result = $this->_data_cart->get_size($value->size_id);
                                $data_size['quantity'] = $result->quantity - $value->quantity_cart;
                                $conditions['id'] = $value->size_id;
                                $this->_data_order->update($conditions,$data_size,'ap_size');
                                if (empty($id_detail)) {
                                    $check_add++;
                                }
                            }
                        }
                        if ($check_add != 0) {
                            $message_error = 'Lỗi thêm thông tin chi tiết order !';
                            $this->erro_add_order($message_error);
                        }else{
                            $delete = 0;
                            foreach ($data['id_cart'] as $key => $value) {
                                $conditions['id'] = $value;
                                if (!$this->_data->delete($conditions, 'cart')) {
                                    $delete++;
                                }
                            }
                            if ($delete == 0) {
                                if ($gift->remaining_use > 0) {
                                    $data_gift['remaining_use'] = $gift->remaining_use - 1;
                                    $con['id'] = $gift->id;
                                    $this->_data_order->update($con,$data_gift,'ap_voucher');
                                }

                                header('location:'.base_url('cart/?dathang=success'));
                            }else{
                                $message_error = 'Lỗi xóa cart !';
                                $this->erro_add_order($message_error);
                            }
                        }   
                    }else{
                        $message_error = 'Lỗi thêm sản phẩm !';
                        $this->erro_add_order($message_error);
                    }
                    // var_dump($order); exit;
                }
                if ($data['thanhtoan'] == 2) {
                    $order['is_status']     = 1;
                    $order['amount_total']  = $sotienphaitra;
                    $order['account_id']    = $this->session->account['account_id'];
                    $order['payment_id']    = 2;
                    $order['transport_fee'] = $this->phivanchuyen($data['cart']);
                    $order['full_name']     = $this->user_login->full_name;
                    $order['phone']         = $this->user_login->phone;
                    $order['address']       = $this->user_login->address.', '.$diachi->name.', '.$diachi->quan_huyen.', '.$diachi->tinh_tp;
                    $order['note']          = $data['content'];
                    $order['gift_code']     = $khuyenmai;
                    $insert_id              = $this->_data->save($order,'orders');
                    $check_add              = 0;
                    if (!empty($insert_id)) {
                        foreach ($data['id_cart'] as $key1 => $value1) {
                            $cart = $this->_data_cart->get_cart_id($value1);// kiểm tra id đăng nhập phía model
                            foreach ($cart as $key => $value) {
                                $detail['order_id']   = $insert_id;
                                $detail['product_id'] = $value->id;
                                $detail['amount']     = $value->price;
                                $detail['quantity']   = $value->quantity_cart;
                                $detail['size_id']    = $value->size_id;
                                $id_detail = $this->_data->save($detail,'order_detail');

                                $result = $this->_data_cart->get_size($value->size_id);
                                $data_size['quantity'] = $result->quantity - $value->quantity_cart;
                                $conditions['id'] = $value->size_id;
                                $this->_data_order->update($conditions,$data_size,'ap_size');
                                
                                if (empty($id_detail)) {
                                    $check_add++;
                                }
                            }
                        }
                        if ($check_add != 0) {
                            $message_error = 'Lỗi thêm thông tin chi tiết order !';
                            $this->erro_add_order($message_error);
                        }else{
                            $delete = 0;
                            foreach ($data['id_cart'] as $key => $value) {
                                $conditions['id'] = $value;
                                if (!$this->_data->delete($conditions, 'cart')) {
                                    $delete++;
                                }
                            }
                            if ($delete == 0) {
                                if ($gift->remaining_use > 0) {
                                    $data_gift['remaining_use'] = $gift->remaining_use - 1;
                                    $con['id'] = $gift->id;
                                    $this->_data_order->update($con,$data_gift,'ap_voucher');
                                }
                                // $this->init_payment($sotienphaitra);
                                header('location:'.base_url('order/init_payment/'.$sotienphaitra.'/'.$insert_id));
                            }else{
                                $message_error = 'Lỗi xóa cart !';
                                $this->erro_add_order($message_error);
                            }
                        }   
                    }else{
                        $message_error = 'Lỗi thêm sản phẩm !';
                        $this->erro_add_order($message_error);
                    }
                    // var_dump($order); exit;
                }
            }
        }
        
    }
    public function init_payment($sotienphaitra = '', $id = ''){//var_dump($sotienphaitra); exit;
        $data['amount'] = $sotienphaitra;
        $data['insert_id'] = $id;
        print $this->load->view($this->template_path . 'paymomo/paymomo/init_payment', $data, TRUE);
    }
    public function NotifyUrl(){
        print $this->load->view($this->template_path . 'paymomo/paymomo/ipn_momo', $data, TRUE);
    }
    public function ReturnUrl($insert_id = ''){
        $data['insert_id'] = $insert_id;
        print $this->load->view($this->template_path . 'paymomo/paymomo/result', $data, TRUE);
    }
    
    public function erro_add_order($message_error = ''){
        // --- viewed 3 -----
        $data['viewed3'] = $this->_data_seemore->list_viewed3();
        foreach ($data['viewed3'] as $key => $value) {
            $optional['id'] = $value->id;
            $optional['slug'] = $value->slug;
            $data['viewed3'][$key]->url = getUrlProduct($optional);
        }
        // -------------
        $post = $this->input->post();

        // var_dump($post); exit;
        $data['user'] = $this->user_login;
        unset($data['user']->password);
        // thông tin sản phẩm
        $tongtien = 0;
        $data['cart'] = array();
        $cart = array();
        foreach ($post['id_cart'] as $key1 => $value1) {
            $cart = $this->_data_cart->get_cart_id($value1);// kiểm tra id đăng nhập phía model
            // var_dump($cart); exit;
            foreach ($cart as $key => $value) {
                $optional['id'] = $value->id;
                $optional['slug'] = $value->slug;
                $cart[$key]->url = getUrlProduct($optional);
                $tongtien += $value->price * $value->quantity_cart;
            }
            array_push($data['cart'], $cart[0]);
        }
        
        $data['tongtien'] = $tongtien;
        // var_dump($data['cart']); exit;
        // $data['tongtien'] = 
        // lấy địa chỉ account
        $data['diachi'] = $this->_data_home->getDVHC($this->user_login->xaphuong);
        
        $data['viettel_post'] = $this->phivanchuyen($data['cart']);
        

        $data['giamgia']  = $this->_data->giamgia();
        foreach ($data['giamgia'] as $key => $value) {
            $optional['id'] = $value->id;
            $optional['slug'] = $value->slug;
            $data['giamgia'][$key]->url = getUrlProduct($optional);
        }
        $data['message_error'] = $message_error;
        $data['main_content'] = $this->load->view($this->template_path . 'order/order', $data, TRUE);
        $this->load->view($this->template_main, $data);
    }

    public function list_cart_order(){
        // --- viewed 3 -----
        $data['viewed3'] = $this->_data_seemore->list_viewed3();
        foreach ($data['viewed3'] as $key => $value) {
            $optional['id'] = $value->id;
            $optional['slug'] = $value->slug;
            $data['viewed3'][$key]->url = getUrlProduct($optional);
        }
        // -------------
        // var_dump($this->input->post()); exit;
        // thông tin sản phẩm
        $post = $this->input->post();

        // var_dump($post); exit;
        $data['user'] = $this->user_login;
        unset($data['user']->password);
        // thông tin sản phẩm
        $tongtien = 0;
        $data['cart'] = array();
        $cart = array();
        foreach ($post['cart'] as $key1 => $value1) {
            $cart = $this->_data_cart->get_cart_id($value1);// kiểm tra id đăng nhập phía model
            // var_dump($cart); exit;
            foreach ($cart as $key => $value) {
                $optional['id'] = $value->id;
                $optional['slug'] = $value->slug;
                $cart[$key]->url = getUrlProduct($optional);
                $tongtien += $value->price * $value->quantity_cart;
            }
            array_push($data['cart'], $cart[0]);
        }
        
        $data['tongtien'] = $tongtien;
        // var_dump($data['cart']); exit;
        // lấy địa chỉ account
        $data['diachi'] = $this->_data_home->getDVHC($this->user_login->xaphuong);
        
        $data['viettel_post'] = $this->phivanchuyen($data['cart']);
        

        $data['giamgia']  = $this->_data->giamgia();
        foreach ($data['giamgia'] as $key => $value) {
            $optional['id'] = $value->id;
            $optional['slug'] = $value->slug;
            $data['giamgia'][$key]->url = getUrlProduct($optional);
        }
        $data['main_content'] = $this->load->view($this->template_path . 'order/order', $data, TRUE);
        $this->load->view($this->template_main, $data);
    }


    public function phivanchuyen($cart = ''){
        // lấy địa chỉ account
        $data['diachi'] = $this->_data_home->getDVHC($this->user_login->xaphuong);
        // lấy địa chỉ cửa hàng
        $data['diachicuahang'] = $this->_data_home->getDVHC('05482');// mã phường tân long

        $cungthanhpho = '';
        $cungtinh     = '';
        $khactinh     = '';
        $lathanhpho   = '';
        $lahuyen      = '';
        
        if ($data['diachi']->MaMien == $data['diachicuahang']->MaMien) {
            
            // cùng miền
            if ($data['diachi']->id_tp == $data['diachicuahang']->id_tp) {
                //  cùng tỉnh
                if ($data['diachi']->id_qh == $data['diachicuahang']->id_qh) {
                    $cungthanhpho = 1;
                    //  cùng huyện quận huyện 10k
                }else{
                    $cungtinh = 1;
                    // khác huyện 22k
                }
            }else{
                
                // var_dump(substr($data['diachi']->tinh_tp,0,12)); exit;
                // kiểm tra thành phố hà nội
                if (substr($data['diachi']->tinh_tp,0,12) == 'Thành phố' ) { 
                    if ($data['diachi']->quan_huyen == 'Quận Ba Đình' || $data['diachi']->quan_huyen == 'Quận Hoàn Kiếm' ||$data['diachi']->quan_huyen == 'Quận Đống Đa' ||$data['diachi']->quan_huyen == 'Quận Tây Hồ' ||$data['diachi']->quan_huyen == 'Quận Hai Bà Trưng' ||$data['diachi']->quan_huyen == 'Quận Cầu Giấy' ||$data['diachi']->quan_huyen == 'Quận Thanh Xuân' ||$data['diachi']->quan_huyen == 'Quận Hà Đông' ||$data['diachi']->quan_huyen == 'Quận Nam Từ Liêm' ||$data['diachi']->quan_huyen == 'Quận Bắc Từ Liêm' || $data['diachi']->quan_huyen == 'Quận Hoàng Mai'|| $data['diachi']->quan_huyen == 'Quận Long Biên' ) {
                        $lathanhpho = 1;
                        // quận huyện là thành phố
                    }else{
                        $lahuyen = 1;
                        // quận huyện không là thành phố
                    }
                }else{
                    // khác tỉnh
                    if (substr($data['diachi']->quan_huyen,0,12) == 'Thành phố' ) {
                        $lathanhpho = 1;
                        // quận huyện là thành phố
                    }else{
                        $lahuyen = 1;
                        // quận huyện không là thành phố
                    }
                }
            }
        }else{
            // liên miền
            // kiểm tra thành phố hồ chí minh
            if (substr($data['diachi']->tinh_tp,0,12) == 'Thành phố' ) {
                if ($data['diachi']->quan_huyen == 'Quận 1' || $data['diachi']->quan_huyen == 'Quận 2' || $data['diachi']->quan_huyen == 'Quận 3' || $data['diachi']->quan_huyen == 'Quận 4' || $data['diachi']->quan_huyen == 'Quận 5' || $data['diachi']->quan_huyen == 'Quận 6' || $data['diachi']->quan_huyen == 'Quận 11' || $data['diachi']->quan_huyen == 'Quận 7' || $data['diachi']->quan_huyen == 'Quận 8' || $data['diachi']->quan_huyen == 'Quận 9' || $data['diachi']->quan_huyen == 'Quận 10' || $data['diachi']->quan_huyen == 'Quận Bình Thạnh' || $data['diachi']->quan_huyen == 'Quận Tân Bình' || $data['diachi']->quan_huyen == 'Quận Phú Nhuận' || $data['diachi']->quan_huyen == 'Quận Gò Vấp' || $data['diachi']->quan_huyen == 'Quận Tân Phú' ) {
                    $lathanhpho = 2;
                    // quận huyện là thành phố
                }else{
                    $lahuyen = 2;
                    // quận huyện không là thành phố
                }
            }else{
                if (substr($data['diachi']->quan_huyen,0,12) == 'Thành phố' ) {
                    $lathanhpho = 2;
                    // quận huyện là thành phố
                }else{
                    $lahuyen = 2;
                    // quận huyện không là thành phố
                }
            }
        }
        // var_dump($cart); exit;
        // quy tiền sau
        $sotien = 0;
        if (count($cart) == 1 && $cart[0]->quantity_cart == 1) { // tính 1 món hàng = 250gram
            if ($cungtinh == 1) { // trong cùng tỉnh
                $sotien = 22000;
            }
            if ($cungthanhpho == 1) { //trong cùng thành phố
                $sotien = 10000;
            }
            if ($lathanhpho == 1) { // huyện là thành phố trong miền
                $sotien = 36000;
            }
            if ($lahuyen == 1) { // là huyện bình thường trong miền
                $sotien = 39500;
            }
            if ($lathanhpho == 2) {  // thành phố liên miền
                $sotien = 41500;
            }
            if ($lahuyen == 2) { // huyện liên miền
                $sotien = 46000;
            }   
        }
        if (count($cart) > 1 || $cart[0]->quantity_cart > 1) { // tính 1 món hàng = 250gram
            if ($cungtinh == 1) {
                $sotien = 22000;
            }
            if ($cungthanhpho == 1) {
                $sotien = 10000;
            }
            if ($lathanhpho == 1) {
                $sotien = 44000;
            }
            if ($lahuyen == 1) {
                $sotien = 54000;
            }
            if ($lathanhpho == 2) {
                $sotien = 49000;
            }
            if ($lahuyen == 2) {
                $sotien = 60000;
            }
        }
        $dem == 0;
        foreach ($cart as $key => $value) {
            for ($i=0; $i < $value->quantity_cart ; $i++) { 
                $dem++;
                if ($dem > 2) {
                    if ($cungtinh == 1) {
                        $sotien += 5000;
                    }
                    if ($cungthanhpho == 1) {
                        $sotien += 3000;
                    }
                    if ($lathanhpho == 1) {
                        $sotien += 4900;
                    }
                    if ($lahuyen == 1) {
                        $sotien += 5700;
                    }
                    if ($lathanhpho == 2) {
                        $sotien += 9700;
                    }
                    if ($lahuyen == 2) {
                        $sotien += 11400;
                    }
                }
            }
            
        }
        // var_dump($sotien); exit;
        return $sotien;
        
    }

    public function gift(){
        $gift = $this->input->post('gift-code');
        $data = $this->_data_cart->check_gift($gift);
        // var_dump($data); exit;
        if (!empty($data)) {
            $t1 = strtotime($data->end_time);
            $t2 = strtotime(date("Y-m-d H:i:s"));
            // echo 'thoi g 1 : '.$t1.'thoi g 2 : '.$t2; exit;
            if ($t1 < $t2) {
                $message['type'] = 'warning';
                $message['message'] = 'Mã code đã hết hạn !';
                die(json_encode($message));
            }
            if ($data->remaining_use < 1) {
                $message['type'] = 'warning';
                $message['message'] = 'Mã code đã sử dụng hết !';
                die(json_encode($message));
            }
            $message['type']         = 'success';
            $message['message']      = 'Đã áp dụng mã khuyến mãi !';
            $message['name_event']   = $data->event;
            $message['percent_sale'] = $data->percent_sale;
            die(json_encode($message));
        }else{
            $message['type'] = 'warning';
            $message['message'] = 'Mã code không tồn tại !';
            die(json_encode($message));
        }
    }
    public function viettel()
    {
        $data['abc'] = 'thay r';
        // print $this->load->view($this->template_path . 'items/viettel_post', $data, TRUE);
        $data['main_content'] = $this->load->view($this->template_path . 'items/viettel_post', $data, TRUE);
        $this->load->view($this->template_main, $data);
    }

}