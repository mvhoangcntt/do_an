<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Career_model extends APS_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table            = "career";
        $this->column_order     = array("$this->table.id","$this->table.id","$this->table.fullname","$this->table.is_status","$this->table.created_time","$this->table.updated_time"); //thiết lập cột sắp xếp
        $this->column_search    = array("$this->table.title","$this->table.email","$this->table.fullname","$this->table.phone"); //thiết lập cột search
        $this->order_default    = array("$this->table.created_time" => "DESC"); //cột sắp xếp mặc định
    }
}