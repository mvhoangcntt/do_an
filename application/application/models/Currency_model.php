<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Currency_model extends APS_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'currency';
        $this->column_order = array("$this->table.id", "$this->table.id", "$this->table.name", "$this->table.code", "$this->table.order", "$this->table.symbol", "$this->table.created_time", "$this->table.updated_time"); //thiết lập cột sắp xếp
        $this->column_search = array("$this->table.id", "$this->table.name"); //thiết lập cột search
        $this->order_default = array("$this->table.created_time" => "DESC"); //cột sắp xếp mặc định
    }

    public function findWithCode($code)
    {
        $this->db->select('table.id, table.name, table.is_status, table.code, table.order, table.country, table.symbol, table.created_time, table.updated_time');
        $this->db->from($this->table.' AS table');
        $this->db->where('table.code',$code);
        $data = $this->db->get()->row();
        return !empty($data)?$data:null;
    }
}