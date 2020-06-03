<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_contact_model extends APS_Model
{
  public function __construct()
  {
    $this->table = "contact";
    $this->table_news = "news";
    $this->table_library = "media_library";
    $this->table_translations = "news_translations";
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
      ->limit($total, $start);
      $this->db->order_by("$this->table_news.id", 'DESC');
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
  //-------------- news detail -------------
  public function get_detail($id){
    $this->db->select("$this->table_news.id, $this->table_news.thumbnail, $this->table_news.created_time, $this->table_translations.slug, $this->table_translations.title, $this->table_translations.content, $this->table_translations.meta_description")
      ->from($this->table_news)
      ->join($this->table_translations, "$this->table_news.id = $this->table_translations.id")
      ->where("$this->table_translations.language_code",$this->config->item('default_language'))
      ->where("$this->table_news.id",$id);
    $query = $this->db->get();//var_dump($this->db->last_query()); exit();
    return $query->row();
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