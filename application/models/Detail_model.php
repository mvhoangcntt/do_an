<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_model extends APS_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table                  = "product";
        $this->table_catalog          = "catalog";
        $this->table_cart          = "cart";
        $this->table_maker            = "maker";
        $this->table_product_trans            = "product_translations";//bảng bài viết
        $this->table_category         = "product_category";
        $this->table_product_category = "product_category";
        $this->table_product = "size";//bảng quan hệ sản phẩm
        $this->column_order  = array("$this->table.id","$this->table.id","$this->table.name","$this->table.catalog","$this->table.thumbnail","","$this->table.maker_id","$this->table.price","$this->table.created","$this->table.total"); //thiết lập cột sắp xếp
        $this->column_bosuutap  = array("$this->table.id","$this->table_product_trans.title","$this->table_product_trans.slug","$this->table.thumbnail","$this->table.price","$this->table.discount");
        $this->column_search = array("$this->table.id","$this->table.name","$this->table.catalog","$this->table.maker_id","$this->table.price","$this->table.created","$this->table.view","$this->table.total"); //thiết lập cột search
    }
    //-------------- product detail -------------
    public function get_detail($id){
        $this->db->select("*")
        ->from($this->table)
        ->join($this->table_product_trans, "$this->table.id = $this->table_product_trans.id")
        ->where("$this->table_product_trans.language_code",$this->config->item('default_language'))
        ->where("$this->table.id",$id);
        $query = $this->db->get();//var_dump($this->db->last_query()); exit();
        return $query->row();
    }
    public function get_detail_size($id){
        $this->db->select("$this->table_product.*")
        ->from($this->table_product)
        ->join($this->table, "$this->table_product.product_id = $this->table.id")
        ->where("$this->table.id",$id);
        $query = $this->db->get();//var_dump($this->db->last_query()); exit();
        return $query->result();
    }

    public function giamgia(){
        $max = $this->maxdiscount();
        $this->db->select($this->column_bosuutap);
        $this->db->from("$this->table");
        $this->db->join($this->table_product_trans, "$this->table.id = $this->table_product_trans.id");
        $this->db->where("$this->table_product_trans.language_code", "vi");
        $this->db->where("$this->table.discount <= ", $max);
        $this->db->limit(12, 0);
        $this->db->order_by("$this->table.discount", 'DESC');
        $query = $this->db->get();//var_dump($this->db->last_query()); exit();
        return $query->result();
    }
    public function maxdiscount(){
        $this->db->select_max("$this->table.discount");
        $query = $this->db->get("$this->table");
        $kq = $query->row();
        return $kq->discount;
    }
    

}