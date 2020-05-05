<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_model extends APS_Model
{
  public function __construct()
  {
      parent::__construct();
      $this->table                  = "product";
      $this->table_catalog          = "catalog";
      $this->table_maker            = "maker";
      $this->table_trans            = "product_translations";//bảng bài viết
      $this->table_category         = "product_category";
      $this->table_product_category = "product_category";
      $this->table_product = "size";//bảng quan hệ sản phẩm
      $this->column_order  = array("$this->table.id","$this->table.id","$this->table.name","$this->table.catalog","$this->table.thumbnail","","$this->table.maker_id","$this->table.price","$this->table.created","$this->table.total"); //thiết lập cột sắp xếp
      $this->column_bosuutap  = array("$this->table.id","$this->table_trans.title","$this->table_trans.slug","$this->table.thumbnail","$this->table.price","$this->table.discount");
      $this->column_search = array("$this->table.id","$this->table.name","$this->table.catalog","$this->table.maker_id","$this->table.price","$this->table.created","$this->table.view","$this->table.total"); //thiết lập cột search
  }
  //-------------- product detail -------------
  public function get_detail($id){
    $this->db->select("*")
      ->from($this->table)
      ->join($this->table_trans, "$this->table.id = $this->table_trans.id")
      ->where("$this->table_trans.language_code",$this->config->item('default_language'))
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


  // ----------- contact -----------
  public function save_contact($data)
  {
    if($this->db->insert($this->table, $data)){
      return true;
    }else{ //var_dump($this->db->last_query()); exit();
      return false;
    }
  }
  // ------------- news -------------
  public function getList($total, $start, $featured = ''){
    // var_dump($featured); exit;
    $this->db->select("$this->table_news.id, $this->table_news.thumbnail, $this->table_news.created_time, $this->table_translations.slug, $this->table_translations.title, $this->table_translations.content")
      ->from($this->table_news)
      ->join($this->table_translations, "$this->table_news.id = $this->table_translations.id")
      ->where("$this->table_translations.language_code",$this->config->item('default_language'))
      ->where("$this->table_news.is_status", 1)
      // ->order_by("is_featured", "DESC")
      ->limit($total, $start);
    if (!empty($featured) || $featured == '0') $this->db->where("$this->table_news.is_featured", $featured);
    $query = $this->db->get();//var_dump($this->db->last_query()); exit();
    return $query->result_array();
  }
  public function count($featured = ''){
    $this->db->select('*')->from($this->table_news)->where("$this->table_news.is_status", 1);
    if (!empty($featured) || $featured == '0') $this->db->where("$this->table_news.is_featured", $featured);
    $query = $this->db->get();
    return $query->num_rows();
  }
  public function get_sidebar(){
    $this->db->select("$this->table_news.id, $this->table_news.thumbnail, $this->table_news.created_time, $this->table_translations.slug, $this->table_translations.title, $this->table_translations.content, $this->table_translations.meta_description")
      ->from($this->table_news)
      ->join($this->table_translations, "$this->table_news.id = $this->table_translations.id")
      ->where("$this->table_translations.language_code",$this->config->item('default_language'))
      ->limit(4,0);
    $query = $this->db->get();
    return $query->result();
  }
  // -------------- new home --------------
  public function getList_new_home(){
    $this->db->select("$this->table_news.id, $this->table_news.thumbnail, $this->table_news.created_time, $this->table_translations.slug, $this->table_translations.title")
      ->from($this->table_news)
      ->join($this->table_translations, "$this->table_news.id = $this->table_translations.id")
      ->where("$this->table_translations.language_code",$this->config->item('default_language'))
      ->where("$this->table_news.is_status", 1)
      ->limit(4,0);
    $query = $this->db->get();//var_dump($this->db->last_query()); exit();
    return $query->result();
  }
  // ----------------- libraly ---------------------
  public function getList_libraly($total = '', $start = '', $featured = ''){
    $this->db->select("*")
      ->from($this->table_library)
      ->where("$this->table_library.is_status", 1)
      ->limit($total, $start);
    if (!empty($featured) && $featured == 'album') $this->db->where("$this->table_library.href_video", '');
    if (!empty($featured) && $featured == 'video') $this->db->where("$this->table_library.thumbnail", '');
    $query = $this->db->get();//var_dump($this->db->last_query()); exit();
    return $query->result_array();
  }
  public function count_libraly($featured = ''){
    $this->db->select('*')->from($this->table_library)->where("$this->table_library.is_status", 1);
    if (!empty($featured) && $featured == 'album') $this->db->where("$this->table_library.href_video", '');
    if (!empty($featured) && $featured == 'video') $this->db->where("$this->table_library.thumbnail", '');
    $query = $this->db->get();
    return $query->num_rows();
  }

}