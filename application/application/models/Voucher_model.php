<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Voucher_model extends APS_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'voucher';
        $this->column_order = array('id', 'id', 'code', 'event', 'start_time', 'end_time','percent_sale','total_use','remaining_use'); //thiết lập cột sắp xếp
        $this->column_search = array('event', 'code'); //thiết lập cột search
        $this->order_default = array('id' => 'desc'); //cột sắp xếp mặc định
}

    public function get_by_id($id)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }
    public function check_code($code)
    {
        $this->db->select('1');
        $this->db->from($this->table);
        $this->db->where('code', $code);
        $data = $this->db->get()->num_rows();
        return $data;
    }

    public function get_code_voucher($code)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        // $this->db->where("is_status", 1);
        $this->db->where('code', $code);
        $data = $this->db->get()->row();
        return $data;
    }
    public function update_remaining_voucher($voucher_id,$remaining){
        $this->db->set('remaining_use',$remaining);
        $this->db->where("$this->table.id", $voucher_id);
        $this->db->update($this->table);
        return true;
    }

}