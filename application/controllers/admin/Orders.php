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
		$data['heading_title'] = 'MV Hoàng';
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
        $data = array();
        if(!empty($list)) foreach ($list as $item) {
            $product = $this->_data->get_product($item->id);
            $id_product = '';
            $name_product = '';
            $maker = '';
            foreach ($product as $key) {
                $id_product .= $key->id." <br/>";
                $name_product .= $key->name." <br/>";
                $maker .= $key->name_maker." <br/>";
            }
            $status = $this->_data->get_status($item->status);
            $name_status = '';
            foreach ($status as $key) {
                $name_status .= $key->name_status." ";
            }
            $row = array();
            $row[] = $item->id;
            $row[] = $item->id;
            $row[] = $id_product;
            $row[] = $name_product;
            $row[] = $maker;
            $row[] = $item->date_create;
            $row[] = $name_status;
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
    	$data = array();
        if(!empty($list)) foreach ($list as $item) {
        	$row = array();
            // $row[] = $item->id;
            $row[] = $item->id;
            $row[] = $item->name;
            $row[] = '<img style="width: 50px" src="../public/media/'.$item->thumbnail.'">';
            $row[] = $item->amount;
            $row[] = '<div class="total_sanpham">'.$item->total.'</div>';
            $row[] = '<div class="total_gift">'.$item->gift_code.'</div>';
            $row[] = '<div class="total_price">'.$item->amount * $item->total.'</div>';
            $data[] = $row;
        }
        $product = array(
         "data"            => $data,
        );
        exit(json_encode($product));
    }

    public function ajax_detail($id){
    	$list = $this->_data->get_data_detail($id);
    	$list->status = $this->_data->get_table_status($id);
    	die(json_encode($list));
    }

    public function ajax_update($id,$status){
    	$data['status'] = $status;
    	if($this->_data->update_status($id,$data)){
    		$message['type'] = 'warning';
            $message['message'] = 'Đã sảy ra lỗi !';
            exit(json_encode($message));
    	}else{
            $message['type'] = 'success';
	        $message['message'] = 'Thành công !';
	        exit(json_encode($message));
    	}
    }
}

?>