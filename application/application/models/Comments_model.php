<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Comments_model extends APS_Model{

    public function __construct()
    {
        parent::__construct();
        $this->table   = "comment";

        $this->column_order     = array("$this->table.id","$this->table.id","$this->table.is_status","$this->table.created_time","$this->table.updated_time",); //thiết lập cột sắp xếp
        $this->column_search    = array("$this->table.id"); //thiết lập cột search
        $this->order_default    = array("$this->table.created_time" => "DESC"); //cột sắp xếp mặc định
    }
    public function get_by_parent_id($id, $typeGet){
    	$this->db->select('A.content, A.created_time, B.full_name, A.id, A.parent_id, B.avatar');
        $this->db->from("comment A");
        $this->db->join('account B', 'B.id = A.account_id', 'inner');
        $this->db->where('A.parent_id', $id);
        if($typeGet == 1) { // được phê duyệt
            $this->db->where('A.is_status', 1);
        }
    	$this->db->order_by("A.created_time","DESC");
    	return $this->db->get()->result_array();
    }

    public function get_comment_by_id($id, $typeGet){
    	$this->db->select('A.content, A.created_time, B.full_name, A.id, A.parent_id, B.avatar');
        $this->db->from("comment A");
        $this->db->join('account B', 'B.id = A.account_id', 'inner');
        $this->db->where('A.id', $id);
        if($typeGet == 1) { // được phê duyệt
            $this->db->where('A.is_status', 1);
        }
    	$this->db->order_by("A.created_time","DESC");
    	$this->db->limit(1);
        $data = $this->db->get()->row();
        if(!empty($data)) return $data;
        return 0;
    }

    public function _where_before($args){
        $select = "*";
        //$lang_code = $this->session->admin_lang; //Mặc định lấy lang của Admin

        extract($args);
        //$this->db->distinct();
        $this->db->select($select);
        $this->db->from($this->table);

        if (!empty($is_status))
            $this->db->where("$this->table.is_status",$is_status);

        if (isset($parent_id))
            $this->db->where("$this->table.parent_id",$parent_id);

        if (!empty($course_id))
            $this->db->where("$this->table.course_id",$course_id);

        if (!empty($account_id))
            $this->db->where("$this->table.account_id",$account_id);
    }

    public function getListCommetByCourseId($course_id, $typeGetCmt,$page,$limit=6) {
        
        $resul = [];
        $this->db->select('A.content, A.created_time, A.created_time, B.full_name, A.id, A.parent_id, B.avatar');
        $this->db->from('comment A');
        $this->db->join('account B', 'B.id = A.account_id');
        $this->db->where('A.course_id', $course_id);
        $this->db->where('A.parent_id', 0);
        // if($typeGetCmt == 0) {
        //     $this->db->where('A.is_status', 1);
        // }elseif($typeGetCmt == 2) {
        //     $this->db->where('A.is_status', 1);
        //     $this->db->or_where_in('A.account_id', $this->session->userdata['account']['account_id']);
        // }
        $this->db->where('A.is_status', 1);
        $this->db->order_by("A.created_time","DESC");
        $offset = ($page - 1) * $limit;
        $this->db->limit($limit, $offset);
        $data = $this->db->get()->result_array();
        if(!empty($data)) foreach ($data as $cmt_parent => $value) {
            $cmt_child = $this->get_by_parent_id($value['id'], 0);
            array_push($value, $cmt_child);
            array_push($resul, $value);
        }
    	return $resul;
    }

    public function insert_comment($data = []) {
        $this->db->insert('comment', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    public function total_comment_course($course_id, $typeGetCmt,$parent_id=null) {
        $this->db->select('1');
        $this->db->from('comment A');
        $this->db->join('account B', 'B.id = A.account_id');
        $this->db->where('A.course_id', $course_id);
        if($parent_id!=null) $this->db->where('A.parent_id', 0);
        // if($typeGetCmt == 0) {
        //     $this->db->where('A.is_status', 1);
        // }elseif($typeGetCmt == 2) {
        //     $this->db->where('A.is_status', 1);
        //     $this->db->or_where_in('A.account_id', $this->session->userdata['account']['account_id']);
        // }
        $this->db->where('A.is_status', 1);
        return  $this->db->get()->num_rows();
    }
    public function get_by_comment_id_parent($id){
        $this->db->select('A.content, A.created_time, B.full_name, A.id, A.parent_id, B.avatar,A.account_id');
        $this->db->from("comment A");
        $this->db->join('account B', 'B.id = A.account_id', 'inner');
        $this->db->where('A.parent_id', $id);
        $this->db->order_by("A.created_time","DESC");
        return $this->db->get()->result();
    }
}