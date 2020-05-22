<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Comments extends Admin_Controller
{
    protected $_data;
    protected $_name_controller;


    const STATUS_CANCEL = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DRAFT = 2;

    public function __construct()
    {
        parent::__construct();
        //tải thư viện
        $this->lang->load('page');
        $this->load->model(['comments_model','account_model','course_model']);
        $this->_data = new Comments_model();
        $this->account = new Account_model();
        $this->course = new Course_model();
        $this->_name_controller = $this->router->fetch_class();
    }

    public function index()
    {
        $data['heading_title'] = ucfirst($this->_name_controller);
        $data['heading_description'] = "Danh sách $this->_name_controller";
        /*Breadcrumbs*/
        $this->breadcrumbs->push('Home', base_url());
        $this->breadcrumbs->push($data['heading_title'], '#');
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        /*Breadcrumbs*/
        $data['main_content'] = $this->load->view($this->template_path . $this->_name_controller. '/index', $data, TRUE);
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
            $params['parent_id'] = 0;
            if ($this->input->post('account_id')) $params['account_id'] = $this->input->post('account_id');
            if ($this->input->post('course_id')) $params['course_id'] = $this->input->post('course_id');
            $list = $this->_data->getData($params);
            $data = array();
            if(!empty($list)) foreach ($list as $item) {
                $users  = getUserAccountById($item->account_id);
                $course = getByIdCourse($item->course_id);
                $no++;
                $row = array();
                $row[] = $item->id;
                $row[] = $item->id;
                $row[] = !empty($users) ? $users->full_name : 'Người dùng ẩn danh';
                $row[] = !empty($course) ? $course->title : '';
                $row[] = $item->content;
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
                $action .= '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="'.$this->lang->line('btn_edit').'" onclick="edit_form('."'".$item->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>';
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
    /*
     * Ajax xử lý thêm mới
     * */
    public function ajax_add()
    {
        $data_store = $this->_convertData();
        if($this->_data->save($data_store)){
            // log action
            $action = $this->router->fetch_class();
            $note = "Insert $action: ".$this->db->insert_id();
            $this->addLogaction($action,$note);
            $message['type'] = 'success';
            $message['message'] = $this->lang->line('mess_add_success');
        }else{
            $message['type'] = 'error';
            $message['message'] = $this->lang->line('mess_add_unsuccess');
        }
        die(json_encode($message));
    }

    public function ajax_edit($id){
        $data['comment'] = (array) $this->_data->getById($id);
        $oneUser = $this->account->getById($data['comment']['account_id'], '*', $this->session->admin_lang);
        $data['comment']['account_id'] = !empty($oneUser) ? $oneUser->full_name : '';
        $data['comment']['created_time'] = timeAgo($data['comment']['created_time']);
        die(json_encode($data));
    }
    public function ajax_ListRepCommnet($id){
        $data['data'] = $this->_data->get_by_comment_id_parent($id);
        echo $this->load->view($this->template_path . 'comments/item_list_rep_comment', $data, TRUE);
        exit;
    }
    public function ajax_ListRep(){
        if($this->input->server('REQUEST_METHOD') == 'POST' && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
          $data = $this->input->post();
          $data['account_id'] = 1;
          $data['is_status']  = 1;
          
          $html = '';
          $response = $this->_data->save($data);
          $id = $this->db->insert_id();
          if (!empty($data)) {
            $html = '<li id="list">
            <div class="comment-avatar"><img src="https://gravatar.com/avatar/412c0b0ec99008245d902e6ed0b264ee?s=80" alt=""></div>
            <div class="comment-box">
            <div class="comment-head">
            <h6 class="comment-name by-reply"><a href="javascript:;">Admin</a></h6>
            <a href="javascript:;" onclick="delete_comment('."'".$id."'".',this)"><i class="fa fa-trash"></i></a>                        
            </div>
            <div class="comment-content">'.$data['content'].'</div>
            </div>
            </li>';
            $status = true;
            $data_mess = array(
              'stauts' => $status, 
              'html' => $html, 
              'mess' => 'Bình luận thành công'
          );
        }else{
            $data_mess = array(
              'mess' => 'Lỗi vui lòng thử lại'
          );
        }
        echo json_encode($data_mess);
    }
        exit;
    }

    public function ajax_delete($id)
    {
        $response = $this->_data->delete(['id'=>$id]);
        if($response != false){
            //Xóa translate của post
            $this->_data->delete(["id"=>$id],$this->_data->table_trans);
            // log action
            $action = $this->router->fetch_class();
            $note = "Update $action: $id";
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
