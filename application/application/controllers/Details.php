<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Details extends Public_Controller
{
    protected $_all_category;
    protected $_data_category;
    public $Course_model;

    public function __construct()
    {
        parent::__construct();
        $this->lang->load('home');
        $this->load->model(array('Home_model','Detail_model','Account_model','Cart_model','Seemore_model'));
        $this->_data = new Detail_model();
        $this->_data_home = new Home_model();
        $this->_data_account = new Account_model();
        $this->_data_cart = new Cart_model();
        $this->_data_seemore = new Seemore_model();
    }
    public function details($slug = null, $page = '')
    {
        // var_dump($slug, $page); exit;
        // $data['main_content'] = $this->load->view($this->template_path . 'details/news_details', $data, TRUE);
        // $this->load->view($this->template_main, $data);
        $data['main_content'] = $this->load->view($this->template_path . 'details/detail', $data, TRUE);
        $this->load->view($this->template_main, $data);
    }
    public function slide()
    {
        $data['abc'] = 'thay r';
        print $this->load->view($this->template_path . 'items/img-list-show', $data, TRUE);
    }
    public function index($slug = '', $id = '')
    {
        // --- viewed 3 -----
        $data['viewed3'] = $this->_data_seemore->list_viewed3();
        foreach ($data['viewed3'] as $key => $value) {
            $optional['id'] = $value->id;
            $optional['slug'] = $value->slug;
            $data['viewed3'][$key]->url = getUrlProduct($optional);
        }
        // -------------
        $data['detail'] = $this->_data->get_detail($id);
        $data['detail_size'] = $this->_data->get_detail_size($id);
        $data['soluong'] = $data['detail_size'][0]->quantity;
        // loại bỏ trùng màu sắc
        $coler = array();
        $size = array();
        $dem = 0;
        foreach ($data['detail_size'] as $value1) {
            foreach ($value1 as $key => $value) {
                $dem++;
                if ($key == 'text_coler') {
                    if ($dem == 1) {
                        array_push($coler, $value);
                    }
                    $i = 0;
                    foreach ($coler as $key2 => $value2) {
                        if ($value == $value2) {
                            $i++;
                        }
                    }
                    if ($i == 0) {
                        array_push($coler, $value);
                    }
                    
                }
                if ($key == 'text_size') {
                    if ($dem == 1) {
                        array_push($size, $value);
                    }
                    $i = 0;
                    foreach ($size as $key2 => $value2) {
                        if ($value == $value2) {
                            $i++;
                        }
                    }
                    if ($i == 0) {
                        array_push($size, $value);
                    }
                    
                }
            }
        }
        $data['detail_size'] = array("text_size" => $size, "text_coler" => $coler);
       
        $data['detail']->timeAgo = timeAgo(strtotime($data['detail']->created_time));
        $optional['id'] = $data['detail']->id;
        $optional['slug'] = $data['detail']->slug;
        $data['detail']->url = getUrlProduct($optional);
        $data['giamgia']  = $this->_data->giamgia();
         // var_dump($data['detail']); exit;
        foreach ($data['giamgia'] as $key => $value) {
            $optional['id'] = $value->id;
            $optional['slug'] = $value->slug;
            $data['giamgia'][$key]->url = getUrlProduct($optional);
        }
        // var_dump($data['detail_size']); exit;
        // $data['main_content'] = $this->load->view($this->template_path . 'details/detail', $data, TRUE);
        // $this->load->view($this->template_main, $data);

//------ sử lý lỗi sản phẩm mua ngay không ảnh hưởng khu vào thẳng xem thông tin sản phẩm khi không có dữ liệu post -----------

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('text_size', 'text_size', 'required',
            array(
                'required' => 'Không được để trống !',
            )
        );
        $insert_id = $this->check_data();
        // var_dump($insert_id); exit;
        if ($this->form_validation->run() == FALSE)
        {
            $data['main_content'] = $this->load->view($this->template_path . 'details/detail', $data, TRUE);
            $this->load->view($this->template_main, $data);
            // header('location:'.base_url(uri_string()."");
        }
        else
        {   
            header('location:'.base_url('order/index/'.$insert_id).'');
        }
    }
    public function check($get = ''){
        $id = $this->input->post('id');
        $text_size = $this->input->post('text_size');
        $text_coler = $this->input->post('text_coler');
        $quantity = $this->input->post('quantity');
        $data = $this->_data->get_detail_size($id);
        // var_dump($data); exit;
        $json = array();
        $dem = 0;
        foreach ($data as $key => $value) {
            // var_dump($value->text_size); exit;
            if ($value->text_size == $text_size && $value->text_coler == $text_coler) {
                $json['soluong'] = $value->quantity;
                $dem++;
            }
        }
        if ($get == 'size') {
            if ($dem == 0) {
                $coler = '';
                foreach ($data as $key => $value) {
                    if ($value->text_coler == $text_coler) {
                       $coler .= ' '.$value->text_size;
                    }
                }
                $message['type'] = 'warning';
                $message['message'] = 'Màu '.$text_coler.' có size '.$coler.' !';
                die(json_encode($message));
            }
            $message['soluong'] = $json['soluong'];
            die(json_encode($message));
        }else{
            if ($dem == 0) {
                $size = '';
                foreach ($data as $key => $value) {
                    if ($value->text_size == $text_size) {
                       $size .= ' '.$value->text_coler;
                    }
                }
                $message['type'] = 'warning';
                $message['message'] = 'Size '.$text_size.' có màu '.$size.' !';
                die(json_encode($message));
            }
            $message['soluong'] = $json['soluong'];
            die(json_encode($message));
        }
    }
    public function add_cart(){
        $this->user_login = $this->_data_account->getById($this->session->account['account_id']);
        if (empty($this->user_login)){
            $message['type'] = 'warning';
            $message['message'] = 'Hãy đăng nhập để được thêm vào giỏ hàng !';
            die(json_encode($message));
        }
        $id = $this->input->post('id');
        $text_size = $this->input->post('text_size');
        $text_coler = $this->input->post('text_coler');
        $quantity = $this->input->post('quantity');
        $data = $this->_data->get_detail_size($id);
        $dem = 0;
        $size_id = 0;
        foreach ($data as $key => $value) {
            if ($value->text_size == $text_size && $value->text_coler == $text_coler) {
                if ($quantity <= $value->quantity) {
                    $size_id = $value->id;
                    $dem++;
                }else{
                    $message['type'] = 'warning';
                    $message['error'] = 'pty';
                    $message['message'] = 'Số lượng sản phẩm tối đa là '.$value->quantity.' !';
                    $message['error_pty'] = 'Số lượng sản phẩm tối đa là '.$value->quantity.' !';
                    die(json_encode($message));
                }
            }
        }
        
        if ($dem > 0) {
            $datainsert['product_id'] = $id;
            $datainsert['size_id'] = $size_id;
            $datainsert['quantity'] = $quantity;
            $datainsert['account_id'] = $this->user_login->id;

            $check_cart = $this->_data_cart->get_cart_account($this->user_login->id);
            foreach ($check_cart as $key => $value) {
                if ($id == $value->product_id && $size_id == $value->size_id) {
                    $message['type'] = 'warning';
                    $message['message'] = 'Đã có trong giỏ hàng !';
                    die(json_encode($message));
                }
            }
            $insert_id = $this->_data->save($datainsert,'cart');
            if (!empty($insert_id)) {
                $message['type'] = 'success';
                $message['message'] = 'Đã thêm vào giỏ hàng !';
                die(json_encode($message));
            }else{
                $message['type'] = 'warning';
                $message['message'] = 'Đã sảy ra lỗi !';
                die(json_encode($message));
            }
        }else{
            $message['type'] = 'warning';
            $message['message'] = 'Vui lòng kiểm tra lại !';
            die(json_encode($message));
        }
    }
    public function update_view_cart(){
        $this->user_login = $this->_data_account->getById($this->session->account['account_id']);
        if (empty($this->user_login)){
            $message['count'] = 0;
            die(json_encode($message));
        }
        $count = $this->_data->get_count_cart();
        $message['count'] = $count;
        die(json_encode($message));
    }

    public function check_data(){
        $this->user_login = $this->_data_account->getById($this->session->account['account_id']);
        if (empty($this->user_login)){
            $this->form_validation->set_rules('dangnhap', 'dangnhap', 'required',
                array(
                    'required' => 'Vui lòng đăng nhập !',
                )
            );
        }else{
            $id = $this->input->post('id');;
            $text_size = $this->input->post('text_size');
            $text_coler = $this->input->post('text_coler');
            $quantity = $this->input->post('quantity');
            $data = $this->_data->get_detail_size($id);
            // check số luong
            $dem = 0;
            $size_id = 0;
            foreach ($data as $key => $value) {
                if ($value->text_size == $text_size && $value->text_coler == $text_coler) {
                    if ($quantity <= $value->quantity) {
                        $size_id = $value->id;
                        $dem++;
                    }else{
                        $this->form_validation->set_rules('quantity2', 'quantity2', 'required',
                            array(
                                'required' => 'Số lượng tối đa là '.$value->quantity.' !',
                            )
                        );
                    }
                }
            }
            
            if ($dem > 0) {
                $datainsert['product_id'] = $id;
                $datainsert['size_id'] = $size_id;
                $datainsert['quantity'] = $quantity;
                $datainsert['account_id'] = $this->user_login->id;
                $check_cart = $this->_data_cart->get_cart_account($this->user_login->id);
                foreach ($check_cart as $key => $value) {
                    if ($id == $value->product_id && $size_id == $value->size_id) {
                        return $value->id;
                    }
                }
                $insert_id = $this->_data->save($datainsert,'cart');
                if (!empty($insert_id)) {
                    return $insert_id;
                }
            }else{
                $this->form_validation->set_rules('quantity1', 'quantity', 'required',
                    array(
                        'required' => 'Vui lòng kiểm tra thông tin trước khi mua !',
                    )
                );
            }
        }
    }
}
