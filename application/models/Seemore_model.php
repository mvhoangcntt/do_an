<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Seemore_model extends APS_Model
{
   public function __construct()
   {
      parent::__construct();
      $this->table          = "product";
      $this->table_catalog  = "catalog";
      $this->table_maker    = "maker";
      $this->table_trans    = "product_translations";//bảng bài viết
      $this->table_category = "product_category";
      $this->table_dvhc     = "don_vi_hanh_chinh";
      $this->table_product  = "size";//bảng quan hệ sản phẩm
      $this->table_contact  = 'contact';
      $this->table_account  = 'account';
      $this->table_viewed  = 'viewed';
      $this->table_count_views  = 'count_views';
      $this->column_order  = array("$this->table.id","$this->table.id","$this->table.name","$this->table.catalog","$this->table.thumbnail","","$this->table.maker_id","$this->table.price","$this->table.created","$this->table.total"); //thiết lập cột sắp xếp database
      $this->column_bosuutap  = array("$this->table.id","$this->table_trans.title","$this->table_trans.slug","$this->table.thumbnail","$this->table.price","$this->table.discount");
      $this->column_search = array("$this->table.id","$this->table.name","$this->table.catalog","$this->table.maker_id","$this->table.price","$this->table.created","$this->table.view","$this->table.total"); //thiết lập cột search
   }

   public function get_product($slug = '',$id_children = ''){
      $this->db->select($this->column_bosuutap);
      $this->db->from("$this->table");
      $this->db->join($this->table_trans, "$this->table.id = $this->table_trans.id");
      $this->db->join($this->table_catalog, "$this->table.catalog = $this->table_catalog.id");
      $this->db->where("$this->table_trans.language_code", "vi");
      if ($id_children == '') {
         $this->db->where("$this->table_catalog.link", $slug );
      }else{
         $this->db->where("$this->table_catalog.id", $id_children );
      }
      $this->db->limit(6, 0);
      $this->db->order_by("$this->table.id", 'DESC');
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->result();
   }
   
   public function check_parent($slug = ''){
      $this->db->select("$this->table_catalog.id , $this->table_catalog.parents_id , $this->table_catalog.name_catalog")
               ->from("$this->table_catalog")
               ->where("$this->table_catalog.link", $slug );
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->row();
   }
   public function get_children($id = ''){
      $this->db->select("$this->table_catalog.id")
               ->from("$this->table_catalog")
               ->where("$this->table_catalog.parents_id", $id );
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->result();
   }

   // ------------------------------------------- filter coler size seemore -------------------

   public function filter_coler($params){
      $this->db->select("$this->table_product.text_coler")
         ->from($this->table_product);
      $this->db->distinct();
      if (!empty($params['keyword'])) $this->db->like("$this->table_product.text_coler", $params['keyword']);
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->result();
   }
   public function itemfilter_coler($params){
      $this->db->select("$this->table_product.text_coler")
         ->from($this->table_product)
         ->where("$this->table_product.product_id", $params['id']);
      $this->db->distinct();
      if (!empty($params['keyword'])) $this->db->like("$this->table_product.text_coler", $params['keyword']);
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->result();
   }
   public function get_coler_($params){
      $this->db->select("$this->table_product.text_coler")
         ->from($this->table_product)
         ->where("$this->table_product.product_id", $params['id']);
      $this->db->distinct();
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->result();
   }
   public function filter_size($params){
      $this->db->select("$this->table_product.text_size")
         ->from($this->table_product);
      $this->db->distinct();
      if (!empty($params['keyword'])) $this->db->like("$this->table_product.text_size", $params['keyword']);
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->result();
   }
   public function itemfilter_size($params){
      $this->db->select("$this->table_product.text_size")
         ->from($this->table_product)
         ->where("$this->table_product.product_id", $params['id']);
      $this->db->distinct();
      if (!empty($params['keyword'])) $this->db->like("$this->table_product.text_size", $params['keyword']);
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->result();
   }
   public function get_size_($params){
      $this->db->select("$this->table_product.text_size")
         ->from($this->table_product)
         ->where("$this->table_product.product_id", $params['id']);
      $this->db->distinct();
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->result();
   }

   // ----------------------------------------- end seemore -------------------------
   // ----------------------------------------- search ------------------------------
   public function product_search($search = ''){
      $this->db->select($this->column_bosuutap);
      $this->db->from("$this->table");
      $this->db->join($this->table_trans, "$this->table.id = $this->table_trans.id");
      if (!empty($search)) $this->db->like("$this->table_trans.title", $search);
      $this->db->where("$this->table_trans.language_code", "vi");
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->result();
   }
   // ------------------ laays xem them tu home -------------------
   public function moinhat(){
      $this->db->select($this->column_bosuutap);
      $this->db->from("$this->table");
      $this->db->join($this->table_trans, "$this->table.id = $this->table_trans.id");
      $this->db->where("$this->table_trans.language_code", "vi");
      $this->db->order_by("$this->table.id", 'DESC');
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->result();
   }
   // bst chi lấy mỗi danh mục cha 1 con
   public function bosuutap($value){
      $this->db->select($this->column_bosuutap);
      $this->db->from("$this->table");
      $this->db->join($this->table_trans, "$this->table.id = $this->table_trans.id");
      $this->db->where("$this->table_trans.language_code", "vi");
      $this->db->where("$this->table.catalog", $value);
      // $this->db->distinct();
      // $this->db->limit(6, 0);
      // $this->db->order_by("$this->table.id", 'DESC');
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->row();
   }
   public function catalog($value){
      $this->db->select("$this->table_catalog.id");
      $this->db->from("$this->table_catalog");
      $this->db->where("$this->table_catalog.parents_id", $value);
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->row();
   }
   public function parent_catalog(){
      $this->db->select("$this->table_catalog.id");
      $this->db->from("$this->table_catalog");
      $this->db->where("$this->table_catalog.parents_id", "0");
      $this->db->order_by("$this->table_catalog.id", 'DESC');
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->result();
   }
   // ---------------
   public function giamgia(){
      $max = $this->maxdiscount();
      $this->db->select($this->column_bosuutap);
      $this->db->from("$this->table");
      $this->db->join($this->table_trans, "$this->table.id = $this->table_trans.id");
      $this->db->where("$this->table_trans.language_code", "vi");
      $this->db->where("$this->table.discount <= ", $max);
      $this->db->order_by("$this->table.discount", 'DESC');
      $query = $this->db->get();
      return $query->result();
   }
   public function maxdiscount(){
      $this->db->select_max("$this->table.discount");
      $query = $this->db->get("$this->table");
      $kq = $query->row();
      return $kq->discount;
   }
   public function timkiem(){
      $max = $this->maxview();
      $this->db->select($this->column_bosuutap);
      $this->db->from("$this->table");
      $this->db->join($this->table_trans, "$this->table.id = $this->table_trans.id");
      $this->db->where("$this->table_trans.language_code", "vi");
      $this->db->where("$this->table.view <= ", $max);
      $this->db->order_by("$this->table.view", 'DESC');
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->result();
   }
   public function maxview(){
      $this->db->select_max("$this->table.view");
      $query = $this->db->get("$this->table");
      $kq = $query->row();
      return $kq->view;
   }
   public function phukien(){
      $this->db->select($this->column_bosuutap);
      $this->db->from("$this->table");
      $this->db->join($this->table_trans, "$this->table.id = $this->table_trans.id");
      $this->db->join($this->table_catalog, "$this->table.catalog = $this->table_catalog.id");
      $this->db->where("$this->table_trans.language_code", "vi");
      $this->db->where("$this->table_catalog.parents_id = ", 10);
      $this->db->order_by("$this->table.view", 'DESC');
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->result();
   }
   // ---------------- viewed ------------------ home
   public function list_viewed(){
      $this->db->select("$this->table_trans.title , $this->table.thumbnail , $this->table.id , $this->table_trans.slug " );
      $this->db->from("$this->table_viewed");
      $this->db->join($this->table, "$this->table.id = $this->table_viewed.product_id");
      $this->db->join($this->table_trans, "$this->table.id = $this->table_trans.id");
      $this->db->where("$this->table_viewed.account_id", $this->session->account['account_id']);
      $this->db->where("$this->table_trans.language_code", "vi");
      $this->db->order_by("$this->table_viewed.id", 'DESC');
      $this->db->limit(20, 0);
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->result();
   }
   public function check_viewed($product_id = ''){
      $this->db->select('*');
      $this->db->from("$this->table_viewed");
      $this->db->where("$this->table_viewed.product_id", $product_id);
      $this->db->where("$this->table_viewed.account_id", $this->session->account['account_id']);
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->row();
   }
   public function delete_viewed($product_id = ''){
      $this->db->where("$this->table_viewed.product_id", $product_id);
      $this->db->where("$this->table_viewed.account_id", $this->session->account['account_id']);
      $this->db->delete("$this->table_viewed");
   }
   public function viewed($product_id = ''){
      $data['product_id'] = $product_id;
      $data['account_id'] = $this->session->account['account_id'];
      $this->db->insert("$this->table_viewed", $data);
   }
   public function check_count_views($product_id = ''){
      $this->db->select('*');
      $this->db->from("$this->table_count_views");
      $this->db->where("$this->table_count_views.product_id", $product_id);
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->row();
   }
   public function insert_count_views($product_id = ''){
      $data['product_id'] = $product_id;
      $data['day'] = 1;
      $this->db->insert("$this->table_count_views", $data);
   }
   
   // ---------------- viewed ------------------ home
   public function list_viewed3(){
      $this->db->select("$this->table_trans.title , $this->table.thumbnail , $this->table.id , $this->table_trans.slug " );
      $this->db->from("$this->table_viewed");
      $this->db->join($this->table, "$this->table.id = $this->table_viewed.product_id");
      $this->db->join($this->table_trans, "$this->table.id = $this->table_trans.id");
      $this->db->where("$this->table_viewed.account_id", $this->session->account['account_id']);
      $this->db->where("$this->table_trans.language_code", "vi");
      $this->db->order_by("$this->table_viewed.id", 'DESC');
      $this->db->limit(3, 0);
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->result();
   }
}

 ?>