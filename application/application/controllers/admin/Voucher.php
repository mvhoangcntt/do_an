<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Voucher extends Admin_Controller
{
	protected $_data;

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('voucher_model'));
		$this->_data	= new Voucher_model();
	}

	public function index(){
		$data['heading_title'] = "Voucher";
		$data['heading_description'] = "Danh sách voucher";
		$this->breadcrumbs->push('Home', base_url());
		$this->breadcrumbs->push($data['heading_title'], '#');
		$data['breadcrumbs'] = $this->breadcrumbs->show();
		$data['main_content'] = $this->load->view($this->template_path . 'voucher/index', $data, TRUE);
		$this->load->view($this->template_main, $data);
	}
	public function check_expired_voucher(){
		$list = $this->_data->getData(['is_status'=>1]);
		if (!empty($list)) foreach ($list as $key => $value) {
			$start_time = strtotime($value->start_time);
			$end_time = strtotime($value->end_time);
			$date_cu = strtotime(date('Y-m-d H:i:s'));
			if ($end_time < $date_cu) {
				$this->_data->update(array('id' => $value->id), ['is_status'=>3], $this->_data->table);
			}
		}
	}
  /*
   * Ajax trả về datatable
   * */
  	public function ajax_list()
  	{
	  	if ($this->input->server('REQUEST_METHOD') == 'POST' && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	  		$length = $this->input->post('length');
	  		$no = $this->input->post('start');
	  		$page = $no / $length + 1;
	  		$params['page'] = $page;
	  		if(!empty($this->input->post('is_status'))) $params['is_status'] = $this->input->post('is_status');
	  		$params['limit'] = $length;
	  		$list = $this->_data->getData($params);
	  		$data = array();
	  		foreach ($list as $item) {
	  			$no++;
	  			$row = array();
	  			$row[] = $item->id;
	  			$row[] = $item->id;
	  			$row[] = $item->code;
	  			$row[] = $item->event;
	  			$row[] = formatDate($item->start_time);
	  			$row[] = formatDate($item->end_time);
	  			$row[] = !empty($item->percent_sale) ? $item->percent_sale.'%' : number_format($item->price_sale,0,'','.').'đ';
	  			$row[] = !empty($item->total_use) ? $item->total_use : '_';
	  			$row[] = !empty($item->total_use) ? $item->remaining_use : '_';
	  			switch ($item->is_status) {
	  				case 1;
	  				$row[] = '<span class="label label-success">Áp dụng</span>';
	  				break;
	  				case  2:
	  				$row[] = '<span class="label label-danger">Hủy</span>';
	  				break;
	  				default:
	  				$row[] = '<span class="label label-default">Hết hạn</span>';
	  			}
	  			$action = '<div class="text-center">';
	  			$action .= '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="'.$this->lang->line('btn_edit').'" onclick="edit_form('."'".$item->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>';
	  			$action .= '&nbsp;<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="' . $this->lang->line('btn_remove') . '" onclick="delete_item(' . "'" . $item->id . "'" . ')"><i class="glyphicon glyphicon-trash"></i></a>';
	  			$action .= '</div>';
	  			$row[] = $action;
	  			$data[] = $row;
	  		}
	  		$output = array(
	  			"draw" => $this->input->post('draw'),
	  			"recordsTotal" => $this->_data->getTotal($params),
	  			"recordsFiltered" => $this->_data->getTotal($params),
	  			"data" => $data,
	  		);
	  		echo json_encode($output);
	  	}
	  	exit;
  	}
  	public function ajax_add(){
		$data_store = $this->_convertData();
		$data_user = $this->input->post('user_voucher');
		$data_store['remaining_use'] = $this->input->post('total_use');
		if ($id = $this->_data->save($data_store)) {
			$action = $this->router->fetch_class();
			$note = "Insert $action: " . $id;
			$this->addLogaction($action, $note);
			$message['type'] = 'success';
			$message['message'] = $this->lang->line('mess_add_success');
		} else {
			$message['type'] = 'error';
			$message['message'] = $this->lang->line('mess_add_unsuccess');
		}
		die(json_encode($message));
	}
  	public function ajax_update(){
	  	$data_store = $this->_convertData();
	  	$data_store['remaining_use'] = $this->input->post('total_use');

	  	$response = $this->_data->update(array('id' => $this->input->post('id')), $data_store, $this->_data->table);
	  	if ($response != false) {
		  // log action
	  		$action = $this->router->fetch_class();
	  		$note = "Update $action: " . $data_store['id'];
	  		$this->addLogaction($action, $note);
	  		$message['type'] = 'success';
	  		$message['message'] = $this->lang->line('mess_update_success');
	  	} else {
	  		$message['type'] = 'error';
	  		$message['message'] = $this->lang->line('mess_update_unsuccess');
	  	}
	  	die(json_encode($message));
  	}

  	public function ajax_update_field()
  	{
	  	$id = !empty($this->input->post('id')) ? $this->input->post('id') : 0;
	  	$params['id'] = $id;
	  	$key = $this->input->post('key');
	  	$val = $this->input->post('val');
	  	if ($key == 'payment_status') {
	  		if ($val == 1) $valNew = 0;
	  		else $valNew = 1;
	  		$data[$key] = $valNew;
	  	} else {
	  		$data[$key] = $val;
	  	}
	  	$this->_data->update($params, $data);


	  	$output = [
	  		'message' => 'update success'
	  	];
	  	echo json_encode($output);
  	}

  	public function ajax_edit($id){
  		$data['post']   = (array)$this->_data->getById($id);
  		$data['post']['percent_sale']   = !empty($data['post']['percent_sale']) ? $data['post']['percent_sale'] : '';
  		die(json_encode($data));
  	}

  /*
   * Xóa một bản ghi
   * */
  	public function ajax_delete($id)
  	{
  		$response = $this->_data->delete(['id'=>$id]);
	  	if($response != false){
	  		$action = $this->router->fetch_class();
	  		$note = "Delete $action: $id";
	  		$this->addLogaction($action,$note);
	  		$message['type'] = 'success';
	  		$message['message'] = $this->lang->line('mess_delete_success');
	  	}else{
	  		$message['type'] = 'error';
	  		$message['message'] = $this->lang->line('mess_delete_unsuccess');
	  		$message['error'] = $response;
	  		log_message('error',$response);
	  	}
	  	die(json_encode($message));
 	}

  	function ajax_check_code()
  	{
	  	if ($this->input->server('REQUEST_METHOD') == 'POST' && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

	  		$code = $this->input->post('code');
	  		if (!empty($code)) $result = $this->_data->check_code($code);
	  		echo $result;
	  		exit();
	  	}
  	}

  	private function _validate()
  	{
	  	if ($this->input->server('REQUEST_METHOD') == 'POST' && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	  		if (!empty($this->config->item('cms_language'))) foreach ($this->config->item('cms_language') as $lang_code => $lang_name) {
	  			$this->form_validation->set_rules('event', 'Tiêu đề sự kiện', 'required');
	  			$this->form_validation->set_rules('code', 'Mã voucher', 'required');
	  			$this->form_validation->set_rules('percent_sale', 'Phần trăm khuyến mại', 'numeric');
	  			$this->form_validation->set_rules('start_time', 'Ngày bắt đầu', 'callback_validdate_start');
	  			$this->form_validation->set_rules('end_time', 'Ngày kết thúc', 'callback_validdate_end');

	  		}
	  		if ($this->form_validation->run() === false) {
	  			$message['type'] = "warning";
	  			$message['message'] = $this->lang->line('mess_validation');
	  			$valid = [];
	  			if (!empty($this->config->item('cms_language'))) foreach ($this->config->item('cms_language') as $lang_code => $lang_name) {
	  				if ($lang_code === $this->config->item('default_language')) {
	  					$valid["event"] = form_error("event");
	  					$valid["code"] = form_error("code");
	  					$valid["price_sale"] = form_error("price_sale");
	  					$valid["start_time"] = form_error("start_time");
	  					$valid["end_time"] = form_error("end_time");
	  					$valid["percent_sale"] = form_error("percent_sale");
	  				}
	  			}
	  			$message['validation'] = $valid;
	  			die(json_encode($message));
	  		}
	  	}
  	}
  	public function validdate_start(){
	  	$start_time = strtotime($this->input->post('start_time'));
	  	$end_time   = strtotime($this->input->post('end_time'));
	  	if ($this->input->post('start_time')=="") {
	  		$this->form_validation->set_message('validdate_start', 'Ngày bắt đầu không được để trống');
	  		return false;
	  	}elseif($start_time > $end_time){
	  		$this->form_validation->set_message('validdate_start', 'Ngày bắt đầu không được lớn hơn ngày kết thúc');
	  		return false;
	  	}else {
	  		return true;
	  	}
  	}
  	public function validdate_end(){
	  	if ($this->input->post('end_time')=="") {
	  		$this->form_validation->set_message('validdate_end', 'Ngày kết thúc không được để trống');
	  		return false;
	  	}else{
	  		return true;
	  	}
  	}
  	private function _convertData(){
	  	$this->_validate();
	  	$data = $this->input->post();
	  	$data['price_sale'] = preg_replace('/[.]+/', '', $this->input->post('price_sale'));
	  	return $data;
  	}

}