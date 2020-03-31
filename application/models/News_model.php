<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends APS_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->table = "news";
    $this->table_trans = "news_translations";//bảng bài viết
    $this->table_news_category = "category";//bảng bài viết
    $this->table_category = "news_category";//bảng bài viết
    $this->table_category_trans = "category_translations";//bảng bài viết

    $this->column_order = array("$this->table.id", "$this->table.id", "$this->table_trans.title", "$this->table.is_status", "$this->table.created_time", "$this->table.updated_time",); //thiết lập cột sắp xếp
    $this->column_search = array("$this->table.id", "$this->table_trans.title"); //thiết lập cột search
    $this->order_default = array("$this->table.created_time" => "DESC"); //cột sắp xếp mặc định
  }
  public function filter_internal($params){
    $this->db->select("$this->table_news_category.id, $this->table_category_trans.title")
          ->from($this->table_news_category)
          ->join($this->table_category_trans, "$this->table_news_category.id = $this->table_category_trans.id")
          ->where("$this->table_news_category.type", "news")
          ->where("$this->table_category_trans.language_code", $this->config->item('default_language'));
    if (!empty($params['keyword'])) $this->db->like("$this->table_category_trans.title", $params['keyword']);
    $query = $this->db->get();//var_dump($this->db->last_query()); exit();
    return $query->result();
  }



}