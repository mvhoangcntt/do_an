<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Home_model extends APS_Model
{
   public function __construct()
   {
      parent::__construct();
      $this->table                  = "product";
      $this->table_catalog          = "catalog";
      $this->table_maker            = "maker";
      $this->table_trans            = "product_translations";//bảng bài viết
      $this->table_category         = "product_category";
      $this->table_dvhc = "don_vi_hanh_chinh";
      $this->table_product = "size";//bảng quan hệ sản phẩm
      $this->table_contact = 'contact';
      $this->table_account = 'account';
      $this->column_order  = array("$this->table.id","$this->table.id","$this->table.name","$this->table.catalog","$this->table.thumbnail","","$this->table.maker_id","$this->table.price","$this->table.created","$this->table.total"); //thiết lập cột sắp xếp
      $this->column_bosuutap  = array("$this->table.id","$this->table_trans.title","$this->table_trans.slug","$this->table.thumbnail","$this->table.price","$this->table.discount");
      $this->column_search = array("$this->table.id","$this->table.name","$this->table.catalog","$this->table.maker_id","$this->table.price","$this->table.created","$this->table.view","$this->table.total"); //thiết lập cột search
   }

   public function moinhat(){
      $this->db->select($this->column_bosuutap);
      $this->db->from("$this->table");
      $this->db->join($this->table_trans, "$this->table.id = $this->table_trans.id");
      $this->db->where("$this->table_trans.language_code", "vi");
      $this->db->limit(6, 0);
      $this->db->order_by("$this->table.id", 'DESC');
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->result();
   }
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
      $this->db->limit(6, 0);
      $this->db->order_by("$this->table_catalog.id", 'DESC');
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->result();
   }
   public function giamgia(){
      $max = $this->maxdiscount();
      $this->db->select($this->column_bosuutap);
      $this->db->from("$this->table");
      $this->db->join($this->table_trans, "$this->table.id = $this->table_trans.id");
      $this->db->where("$this->table_trans.language_code", "vi");
      $this->db->where("$this->table.discount <= ", $max);
      $this->db->limit(6, 0);
      $this->db->order_by("$this->table.discount", 'DESC');
      $query = $this->db->get();
      return $query->result();
   }
   public function timkiem(){
      $max = $this->maxview();
      $this->db->select($this->column_bosuutap);
      $this->db->from("$this->table");
      $this->db->join($this->table_trans, "$this->table.id = $this->table_trans.id");
      $this->db->where("$this->table_trans.language_code", "vi");
      $this->db->where("$this->table.view <= ", $max);
      $this->db->limit(6, 0);
      $this->db->order_by("$this->table.view", 'DESC');
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->result();
   }
   public function phukien(){
      $max = $this->maxview();
      $this->db->select($this->column_bosuutap);
      $this->db->from("$this->table");
      $this->db->join($this->table_trans, "$this->table.id = $this->table_trans.id");
      $this->db->where("$this->table_trans.language_code", "vi");
      $this->db->where("$this->table.view <= ", $max);
      $this->db->limit(6, 0);
      $this->db->order_by("$this->table.view", 'DESC');
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->result();
   }
   public function maxdiscount(){
      $this->db->select_max("$this->table.discount");
      $query = $this->db->get("$this->table");
      $kq = $query->row();
      return $kq->discount;
   }
   public function maxview(){
      $this->db->select_max("$this->table.view");
      $query = $this->db->get("$this->table");
      $kq = $query->row();
      return $kq->view;
   }
// ---------------------------------------------------------------------- end select home -------------------------------------------------------------

   public function filter_tinhthanh_auth($params){
      $this->db->select("$this->table_dvhc.id_tp, $this->table_dvhc.tinh_tp")
         ->from($this->table_dvhc);
      $this->db->distinct();
      if (!empty($params['keyword'])) $this->db->like("$this->table_dvhc.tinh_tp", $params['keyword']);
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->result();
   }
   public function filter_quanhuyen_auth($params){
      $this->db->select("$this->table_dvhc.id_qh, $this->table_dvhc.quan_huyen")
         ->from($this->table_dvhc);
      $this->db->distinct();
      $this->db->where("$this->table_dvhc.id_tp", $params['id']);
      if (!empty($params['keyword'])) $this->db->like("$this->table_dvhc.quan_huyen", $params['keyword']);
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->result();
   }
   public function filter_xaphuong_auth($params){
      $this->db->select("$this->table_dvhc.id, $this->table_dvhc.name")
         ->from($this->table_dvhc);
      $this->db->distinct();
      $this->db->where("$this->table_dvhc.id_qh", $params['id']);
      if (!empty($params['keyword'])) $this->db->like("$this->table_dvhc.name", $params['keyword']);
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->result();
   }
   public function getDVHC($id){
      // var_dump($id); exit;
      $this->db->select("*")->from($this->table_dvhc);
      $this->db->where("$this->table_dvhc.id", $id);
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->row();
   }

// ---------------------------------------------------------------------- end filter đơn vị hành chính ------------------------------------------------

// ----------- contact -----------
   public function save_contact($data)
   {
      if($this->db->insert($this->table_contact, $data)){
         return true;
      }else{ //var_dump($this->db->last_query()); exit();
         return false;
      }
   }
   public function get_id($email){
      $this->db->select("$this->table_account.id")->from($this->table_account);
      $this->db->where("$this->table_account.email", $email);
      $query = $this->db->get();
      return $query->row();

   }
// ----------------------------------------------------- end contact ---------------------------
   
   public function getData($args = array(), $returnType = "object", $select = '')
   {
      $this->__where($args, '', $select);
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      if ($returnType === "array") return $query->result_array(); //Check kiểu data trả về
      else return $query->result();
   }
   
   private function __where($args = array(), $count = '', $select = '')
   {
      $page = 1;
      $limit = 10;
      extract($args);
      if (empty($select)) $select = '*';
      // if (!empty($parent_id)) {
         $select = $this->column_order;
      // }  
      $this->db->select($select);

      $this->db->from("$this->table");
      $this->db->join($this->table_trans, "$this->table.id = $this->table_trans.id");
      $this->db->join($this->table_catalog, "$this->table.catalog = $this->table_catalog.id");
      if (empty($lang_code)) $lang_code = $this->session->admin_lang;
      if (!empty($lang_code)) $this->db->where("$this->table_trans.language_code", $lang_code);

      if (!empty($parent_id)) {
         $this->db->join("$this->table_product", "$this->table.id = $this->table_product.{$this->table}_id");
         $this->db->where("$this->table_product.text_size", $parent_id);
      }
      if (!empty($catalog)) {
         $this->db->where("$this->table.catalog", $catalog);
      }
      if (!empty($maker_id)) {
         $this->db->where("$this->table.maker_id", $maker_id);
      }

      if (!empty($search)) {
         $this->db->group_start();
         $this->db->like("$this->table_trans.title", trim(xss_clean($search)));
         $this->db->group_end();
      }
      $this->_get_datatables_query();
      if (empty($count) || $count == null) {

         if (!empty($order) && is_array($order)) {
            foreach ($order as $k => $v)
            $this->db->order_by($k, $v);
         } else if (isset($this->order_default)) {
            $order = $this->order_default;
            $this->db->order_by(key($order), $order[key($order)]);
         }
         $offset = ($page - 1) * $limit;
         $this->db->limit($limit, $offset);
      }
   }

   public function getTotal($args = [])
   {
      $this->__where($args, "count", '1');
      $query = $this->db->get();
      return $query->num_rows();
   }


   // -------------- load filter -------------
   public function list_size_datatable($keyword){
      $this->db->select("$this->table_product.text_size");
      $this->db->distinct();
      if (!empty($keyword)) {
         $this->db->like('text_size', $keyword);
      }
      $query = $this->db->get($this->table_product); 
      return $query->result();
   }
   public function filter_catalog($keyword){
      if (!empty($keyword)) {
         $this->db->like("$this->table_catalog.name_catalog", $keyword);
      }
      $this->db->where("$this->table_catalog.parents_id != 0");

      $query = $this->db->get($this->table_catalog);//var_dump($this->db->last_query()); exit();
      return $query->result();
   }
   public function filter_maker($keyword){
      if (!empty($keyword)) {
         $this->db->like("$this->table_maker.name_maker", $keyword);
      }
      $query = $this->db->get($this->table_maker);
      return $query->result();
   }
   // ------------ lấy ra size theo product ------------
   public function get_size($id){
      $this->db->select("$this->table_product.text_size")
         ->distinct()
         ->from($this->table_product)->where("$this->table_product.product_id",$id);
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->result();
   }
   public function get_catalog($id){
      $this->db->select("$this->table_catalog.name_catalog")->from($this->table_catalog)->where("$this->table_catalog.id",$id);
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->result();
   }
   public function get_maker($id){
      $this->db->select("$this->table_maker.name_maker")->from($this->table_maker)->where("$this->table_maker.id",$id);
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->result();
   }
   
   // ----------- get form update -----------
   // get json form update
   public function get_json($id){
      $this->db->where("$this->table.id",$id);
      $query = $this->db->get($this->table);
      return $query->row();
   }
   public function get_size_come_product($id){
      $this->db->select('*')->from($this->table_product)->where("$this->table_product.product_id",$id);
      $query = $this->db->get();
      return $query->result();
   }
   public function get_table_trans($id){
      $this->db->select('*')->from($this->table_trans)->where("$this->table_trans.id",$id);
      $query = $this->db->get();
      return $query->result();
   }
   public function get_table_catalog($id){
      $this->db->select("$this->table_catalog.*")
            ->from($this->table_catalog)
            ->join($this->table, "$this->table.catalog = $this->table_catalog.id")
            ->where("$this->table.id",$id);
      $query = $this->db->get();
      return $query->row();
   }
   public function get_table_maker($id){
      $this->db->select("$this->table_maker.*")
            ->from($this->table_maker)
            ->join($this->table, "$this->table.maker_id = $this->table_maker.id")
            ->where("$this->table.id",$id);
      $query = $this->db->get();
      return $query->row();
   }
   //------ insert -----------
   public function set_size($data)
   {
      if($this->db->insert('size', $data)){
         return true;
      }else{
         return false;
      }
   }
}



 ?>