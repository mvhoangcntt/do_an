<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Page_model extends APS_Model{

    public function __construct()
    {
        parent::__construct();
        // $this->table            = "page";
        // $this->table_tore       = "store";
        // $this->table_trans      = "page_translations";//bảng bài viết
        // $this->table_category   = "category";//bảng bài viết

        // $this->column_order     = array("$this->table.id","$this->table.id","$this->table_trans.title","$this->table.is_status","$this->table.created_time","$this->table.updated_time",); //thiết lập cột sắp xếp
        // $this->column_search    = array("$this->table_trans.title"); //thiết lập cột search
        // $this->order_default    = array("$this->table.created_time" => "DESC"); //cột sắp xếp mặc định
    }
}
