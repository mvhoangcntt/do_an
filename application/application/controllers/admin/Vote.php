<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vote extends Admin_Controller {
	var $action = '';
	var $note = '';
	protected $_dataCategory;
	protected $_data;
	protected $_name_controller;
	protected $category_tree;
    const STATUS_CANCEL = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DRAFT = 2;
	public function __construct()
	{
		parent::__construct();
		//tải file ngôn ngữ
		$this->lang->load('banner');
		$this->load->model(['vote_model','account_model','course_model']);
		$this->_data = new Vote_model();
        $this->account = new Account_model();
        $this->course = new Course_model();
		$this->_name_controller = $this->router->fetch_class();
	}

	public function index()
	{
		$data['heading_title'] = 'Vote';
		$data['heading_description'] = "Danh sách vote";
		/*Breadcrumbs*/
		$this->breadcrumbs->push('Home', base_url());
		$this->breadcrumbs->push($data['heading_title'], '#');
		$data['breadcrumbs'] = $this->breadcrumbs->show();
		/*Breadcrumbs*/
		$data['main_content'] = $this->load->view($this->template_path.$this->_name_controller.'/index', $data, TRUE);
		$this->load->view($this->template_main, $data);
	}

	/*
     * Ajax trả về datatable
     * */
	public function ajax_list()
	{
		if($this->input->server('REQUEST_METHOD') == 'POST' && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
			$length = $this->input->post('length');
			$no = $this->input->post('start');
			$page = $no/$length + 1;
			$params['page'] = $page;
			$params['limit'] = $length;
			if ($this->input->post('account_id')) $params['account_id'] = $this->input->post('account_id');
			if ($this->input->post('course_id')) $params['course_id'] = $this->input->post('course_id');
			$list = $this->_data->getData($params);
			$data = array();
			if(!empty($list)) foreach ($list as $item) {
				$account = getUserAccountById($item->account_id);
				$course = getByIdCourse($item->course_id);
				$no++;
				$row = array();
				$row[] = $item->id;
				$row[] = $item->id;
				$row[] = !empty($account) ? $account->full_name : '';
				$row[] = !empty($course) ? $course->title : '';
				$row[] = $item->vote;
                switch ($item->is_status){
                    case self::STATUS_ACTIVE:
                        $row[] = '<span class="label label-success btnUpdateStatus" data-value="'.self::STATUS_ACTIVE.'">'.$this->lang->line('text_status_'.self::STATUS_ACTIVE).'</span>';
                        break;
                    case self::STATUS_DRAFT:
                        $row[] = '<span class="label label-default btnUpdateStatus" data-value="'.self::STATUS_DRAFT.'">'.$this->lang->line('text_status_'.self::STATUS_DRAFT).'</span>';
                        break;
                    default:
                        $row[] = '<span class="label label-danger btnUpdateStatus" data-value="'.self::STATUS_CANCEL.'">'.$this->lang->line('text_status_'.self::STATUS_CANCEL).'</span>';
                        break;
                }
				$row[] = date('d/m/Y H:i',strtotime($item->created_time));
				//thêm action
				$action = '<div class="text-center">';
				$action .= '&nbsp;<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="' . $this->lang->line('btn_remove') . '" onclick="delete_item(' . "'" . $item->id . "'" . ')"><i class="glyphicon glyphicon-trash"></i></a>';
				$action .= '</div>';
				$row[] = $action;
				$data[] = $row;
			}

			$output = array(
				"draw" => $this->input->post('draw'),
				"recordsTotal" => $this->_data->getTotalAll(),
				"recordsFiltered" => $this->_data->getTotal($params),
				"data" => $data,
			);
			//trả về json
			echo json_encode($output);
		}
		exit;
	}
	public function ajax_delete($id)
	{
		$response = $this->_data->delete(['id'=>$id]);
		if($response != true){
			$message['type'] = 'error';
			$message['message'] = "Xóa bản ghi thất bại !";
		}else{
			$message['type'] = 'success';
			$message['message'] = "Xóa bản ghi thành công !";
		}
		die(json_encode($message));
	}

	public function ajax_update_field()
	{
		if($this->input->server('REQUEST_METHOD') == 'POST' && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
			$id = $this->input->post('id');
			$field = $this->input->post('field');
			$value = $this->input->post('value');
			$response = $this->_data->update(['id' => $id], [$field => $value]);
			if($response != false){
				$message['type'] = 'success';
				$message['message'] = $this->lang->line('mess_update_success');
			}else{
				$message['type'] = 'error';
				$message['message'] = $this->lang->line('mess_update_unsuccess');
			}
			print json_encode($message);
		}
		exit;
	}
	public function load_account(){
        $account_id = [];
        $dataJson   = [];
        $keyword    = $this->toSlug($this->input->get("q"));
        $keyword    = $this->toSlug($this->toNormal($keyword));
        $list_account_vote = $this->_data->getData(['limit'=>1000]);
        if (!empty($list_account_vote)) foreach ($list_account_vote as $value) {
            $account_id[] = $value->account_id;
        }
        $array_ac = array_unique($account_id);
        $data = $this->account->getAccount($array_ac);
        if (!empty($data)) foreach ($data as $value) {
        	if(!empty($keyword)){
        		if(strpos($value->email,$keyword)!==false){
        			$dataJson[] = ['id'=>$value->id, 'text'=>$value->email.' ('.$value->full_name.')'];
        		}
        	}else{
        		$dataJson[] = ['id'=>$value->id, 'text'=>$value->email.' ('.$value->full_name.')'];
        	}
        }
        die(json_encode($dataJson));
    }
    public function load_course(){
        $course_id = [];
        $dataJson  = [];
        $keyword   = $this->toSlug($this->input->get("q"));
        $keyword   = $this->toSlug($this->toNormal($keyword));
        $list_course = $this->_data->getData(['limit'=>1000]);
        if (!empty($list_course)) foreach ($list_course as $value) {
            $course_id[] = $value->course_id;
        }
        $array_course = array_unique($course_id);
        $data = $this->course->getCourse($array_course);
        if (!empty($data)) foreach ($data as $value) {
        	 if(!empty($keyword)){
                if(strpos($value->slug,$keyword)!==false){
        			$dataJson[] = ['id'=>$value->id, 'text'=>$value->title];
                }
            }else{
        		$dataJson[] = ['id'=>$value->id, 'text'=>$value->title];
            }
        }
        die(json_encode($dataJson));
    }
}
