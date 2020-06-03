<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Orders extends Admin_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->lang->load('orders');
        $this->load->model('orders_model');
        $this->_data = new Orders_model();
        $this->_name_controller = $this->router->fetch_class();
        $this->session->category_type = $this->_name_controller;
    }
    public function index(){
		$data['heading_title'] = 'Quản lý đơn hàng';
		$data['heading_description'] = "Đơn hàng";
		$this->breadcrumbs->push('Home', base_url());
		$this->breadcrumbs->push($data['heading_title'], '#');
		$data['breadcrumbs'] = $this->breadcrumbs->show();
		$data['main_content'] = $this->load->view($this->template_path . $this->_name_controller. '/index', $data, TRUE);
		$this->load->view($this->template_main, $data);
    }
    public function ajax_list()
    {
        $length =  $this->input->post('length');
        $no = $this->input->post('start');
        $page = $no/$length + 1;
        $params['parent_id'] = $this->input->post('parent_id');
        $params['page'] = $page;
        $params['limit'] = $length;
        $list = $this->_data->getData($params);
        // var_dump($list); exit;
        $data = array();
        if(!empty($list)) foreach ($list as $item) {
            $row = array();
            $row[] = $item->id;
            $row[] = "#".$item->id;
            $row[] = $item->full_name;
            $row[] = $item->phone;
            $row[] = formatDate($item->created_time);
            switch ($item->is_status){
                case '1':
                $row[] = '<span class="label label-default">Chờ xử lý</span>';
                break;
                case '2':
                $row[] = '<span class="label label-success">Đã xác nhận</span>';
                break;
                case '3':
                $row[] = '<span class="label label-success">Đang vận chuyển</span>';
                break;
                case '4':
                $row[] = '<span class="label label-success">Hoàn tất</span>';
                break;
                default:
                $row[] = '<span class="label label-default">Hủy đơn hàng</span>';
                break;
            }
            switch ($item->payment_id){
                case '1':
                $row[] = '<span class="label label-default">Thanh Toán Tại nhà</span>';
                break;
                case '2':
                $row[] = '<span class="label label-success">MoMo online</span>';
                break;
                default:
                $row[] = '<span class="label label-default">Đơn hàng lỗi</span>';
                break;
            }
            switch ($item->is_status_payment){
                case '1':
                $row[] = '<span class="label label-success">Đã thanh toán</span>';
                break;
                default:
                $row[] = '<span class="label label-default">Chưa thanh toán</span>';
                break;
            }
            $action = '<div class="text-center">';
            $action .= '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="'.$this->lang->line('btn_detail').'" onclick="detail_form('."'".$item->id."'".')">Xem chi tiết</a>';
            $action .= '</div>';
            $row[] = $action;
            $data[] = $row;
        }

        $product = array(
         "data"            => $data,
         "recordsTotal"    => $this->_data->getTotalAll(),
         "recordsFiltered" => $this->_data->getTotal($params),
         "draw"            => $input_post['draw'],
        );
        exit(json_encode($product));
    }
    // load select 2 status
    public function ajax_load(){
        $this->checkRequestGetAjax();
        $keyword = toSlug(toNormal($this->input->get("q")));
        $data    = $this->_data->get_status_filter($keyword);
        if(!empty($data)) foreach ($data as $item) {
            $item = (object) $item;
            $json[] = ['id'=>$item->id, 'text'=>$item->name_status];
        }
        die(json_encode($json));
    }

    public function ajax_detail_product($id){
    	$list = $this->_data->get_datatable($id);
        // var_dump($list); exit;
    	$data = array();
        if(!empty($list)) foreach ($list as $item) {
        	$row = array();
            // $row[] = $item->id;
            $row[] = '#'.$item->id;
            $row[] = $item->title;
            $row[] = '<img style="width: 50px" src="../public/media/'.$item->thumbnail.'">';
            $row[] = number_format($item->amount)." vnđ";
            $row[] = $item->quantity;
            $row[] = "Màu ".$item->text_coler.", size ".$item->text_size;
            
            $row[] = '<div class="total_price">'.number_format($item->amount * $item->quantity).' vnđ</div>';
            $data[] = $row;
        }
        $product = array(
         "data"            => $data,
        );
        exit(json_encode($product));
    }

    public function ajax_detail($id){
        $data = $this->_data->get_datatable($id);
        $tongtien = 0;
        foreach ($data as $key => $value) {
            $tongtien += $value->amount;
        }

    	$list = $this->_data->get_data_detail($id);
        $list->tongtien = ''.$tongtien.'';
    	$list->status = $this->_data->get_table_status($id);
    	die(json_encode($list));
    }

    public function ajax_update($id,$status){ // bỏ sung cập nhật thời gian và gửi mail cho khách hàng
    	$data['is_status'] = $status;
        // var_dump(date("Y-m-d H:i:s")); exit;
    	if($this->_data->update_status($id,$data)){
    		$message['type'] = 'warning';
            $message['message'] = 'Đã sảy ra lỗi !';
            exit(json_encode($message));
    	}else{
            $time['time'.$status] = date("Y-m-d H:i:s");
            $this->_data->update_status($id,$time);
            $get_order = $this->_data->get_order_row($id);
            // var_dump($get_order); exit;
            $this->sendMail($get_order);
            $message['type'] = 'success';
	        $message['message'] = 'Thành công !';
	        exit(json_encode($message));
    	}
    }
    private function sendMail($data){
       if(!empty($data->email)){
        // var_dump($data); exit;
        /*Config setting*/
        $this->load->library('email');
            $emailTo   = $data->email; //Send mail cho khach hang
            $emailToCC = $data->email; //Send mail cho ban quan tri
            $emailFrom = $emailToCC;
            $nameFrom  = $data->full_name;
            $status = '';
            switch ($data->is_status){
                case '1':
                $status = '<span class="label label-default">Chờ xử lý</span>';
                break;
                case '2':
                $status = '<span class="label label-success">Đã xác nhận</span>';
                break;
                case '3':
                $status = '<span class="label label-success">Đang vận chuyển</span>';
                break;
                case '4':
                $status = '<span class="label label-success">Hoàn tất</span>';
                break;
                default:
                $status = '<span class="label label-default">Hủy đơn hàng</span>';
                break;
            }

            $contentHtml = '
            <h2>Thông tin đơn hàng</h2></br>

            <p>Họ và tên: ' . $data->full_name . '</p>
            <p>Email: ' . $data->email . '</p>
            <p>Số điện thoại: ' . $data->phone . '</p>
            <p>Mã đơn hàng: #' . $data->id . '</p>
            <p>Đơn hàng: ' . $status . '</p>
            <p>Để biết thêm chi tiết vui lòng truy cập website '.base_url('account').' !</p>
            ';

            $this->email->from($emailFrom, $nameFrom);

            $this->email->to($emailTo);
            if(!empty($emailToCC)) $this->email->cc($emailToCC);
            if(!empty($emailToBCC)) $this->email->bcc($emailToBCC);
            $this->email->subject('Thông tin đơn hàng '.base_url());
            $this->email->message($contentHtml);
            $this->email->send();
        }
    }
}

?>