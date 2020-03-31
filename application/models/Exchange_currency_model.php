<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exchange_currency_model extends APS_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'exchange_currency';
        $this->column_order = array("$this->table.id", "$this->table.id", "$this->table.type", "$this->table.sell", "$this->table.created_time", "$this->table.updated_time"); //thiết lập cột sắp xếp
        $this->column_search = array("$this->table.id", "$this->table.type"); //thiết lập cột search
        $this->order_default = array("$this->table.created_time" => "DESC"); //cột sắp xếp mặc định
    }

    public function findWithType($type)
    {
        $this->db->select('table.id, table.sell, table.created_time, table.updated_time');
        $this->db->from($this->table.' AS table');
        $this->db->where('table.type',$type);
        $data = $this->db->get()->row();
        return !empty($data)?$data:null;
    }
}