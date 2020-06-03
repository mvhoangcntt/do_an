<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Report_model extends APS_Model
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
      $this->table_slide    = 'slide';
      $this->table_order    = 'orders';
      $this->table_count_views    = 'count_views';
      $this->column_order  = array("$this->table.id","$this->table.id","$this->table.name","$this->table.catalog","$this->table.thumbnail","","$this->table.maker_id","$this->table.price","$this->table.created","$this->table.total"); //thiết lập cột sắp xếp
      $this->column_bosuutap  = array("$this->table.id","$this->table_trans.title","$this->table_trans.slug","$this->table.thumbnail","$this->table.price","$this->table.discount");
      $this->column_search = array("$this->table.id","$this->table.name","$this->table.catalog","$this->table.maker_id","$this->table.price","$this->table.created","$this->table.view","$this->table.total"); //thiết lập cột search
   }
   public function tonggd(){
      $this->db->select('*')->from("$this->table_order");

      $this->get_post();

      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->num_rows();
   }
   public function gd_success(){
      $this->db->select('*')->from("$this->table_order");
      $this->db->where("$this->table_order.is_status", "4");

      $this->get_post();

      $query = $this->db->get();
      return $query->num_rows();
   }
   public function gd_failure(){
      $this->db->select('*')->from("$this->table_order");
      $this->db->where("$this->table_order.is_status", "5");

      $this->get_post();

      $query = $this->db->get();
      return $query->num_rows();
   }
   public function transport_fee(){
      $this->db->select('*')->from("$this->table_order");
      $this->db->where("$this->table_order.is_status", "3");

      $this->get_post();

      $query = $this->db->get();
      return $query->num_rows();
   }
   public function confirm(){
      $this->db->select('*')->from("$this->table_order");
      $this->db->where("$this->table_order.is_status", "2");

      $this->get_post();

      $query = $this->db->get();
      return $query->num_rows();
   }
   public function waiting(){
      $this->db->select('*')->from("$this->table_order");
      $this->db->where("$this->table_order.is_status", "1");

      $this->get_post();

      $query = $this->db->get();
      return $query->num_rows();
   }
   public function cash(){
      $this->db->select('*')->from("$this->table_order");
      $this->db->where("$this->table_order.payment_id", "1");

      $this->get_post();

      $query = $this->db->get();
      return $query->num_rows();
   }
   public function online(){
      $this->db->select('*')->from("$this->table_order");
      $this->db->where("$this->table_order.payment_id", "2");

      $this->get_post();

      $query = $this->db->get();
      return $query->num_rows();
   }
   public function total_money(){
      $this->db->select('SUM(amount_total) as amount_total')->from("$this->table_order");
      $this->db->where("$this->table_order.is_status", "4");

      $this->get_post();

      $query = $this->db->get();
      return $query->row();
   }
   public function tongsp(){
      $this->db->select('*')->from("$this->table");
      $query = $this->db->get();
      return $query->num_rows();
   }
   public function get_id(){
      $this->db->select("$this->table.id, $this->table.created_time, $this->table.total")->from("$this->table");
      $query = $this->db->get();
      return $query->result();
   }
   public function over($id = ''){
      $this->db->select("SUM(quantity) as quantity")->from("$this->table_product");
      $this->db->where("$this->table_product.product_id", $id);
      $query = $this->db->get();
      return $query->row();
   }
   public function get_over($id = ''){
      $this->db->select($this->column_bosuutap);
      $this->db->from("$this->table");
      $this->db->join($this->table_trans, "$this->table.id = $this->table_trans.id");
      $this->db->where("$this->table_trans.language_code", "vi");
      $this->db->where("$this->table.id", $id);
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->row();
   }

   public function get_view(){
      $this->db->select("$this->table.id,$this->table_trans.title,$this->table_trans.slug,$this->table.thumbnail,$this->table.price,$this->table.discount,$this->table_count_views.week");
      $this->db->from("$this->table");
      $this->db->join($this->table_trans, "$this->table.id = $this->table_trans.id");
      $this->db->join($this->table_count_views, "$this->table.id = $this->table_count_views.product_id");
      $this->db->where("$this->table_trans.language_code", "vi");
      $this->db->limit(5, 0);
      $this->db->order_by("$this->table_count_views.week", 'DESC');
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->result();
   }

   // public function moinhat(){ // không dùng
   //    $this->db->select($this->column_bosuutap);
   //    $this->db->from("$this->table");
   //    $this->db->join($this->table_trans, "$this->table.id = $this->table_trans.id");
   //    $this->db->where("$this->table_trans.language_code", "vi");
   //    $this->db->limit(6, 0);
   //    $this->db->order_by("$this->table.id", 'DESC');
   //    $query = $this->db->get();//var_dump($this->db->last_query()); exit();
   //    return $query->result();
   //    // return $query->num_rows();
   // }

   public function get_post(){
      $day = $this->input->get('day');
      $month = $this->input->get('month');
      $year = $this->input->get('year');
      if (strlen($month) == 1) {
         $month = '0'.$month;
      }
      if (!empty($day)) {
         $this->db->like("$this->table_order.created_time", $day);
      }else{
         if (!empty($month)) {
            if (!empty($year)) {
               $this->db->like("$this->table_order.created_time", $this->input->get('year').'-'.$month);
            }else{
               $this->db->like("$this->table_order.created_time", date("Y").'-'.$month);
            }
         }else{
            if (!empty($year)) {
               $this->db->like("$this->table_order.created_time", $year);
            }else{
               $this->db->like("$this->table_order.created_time", date("Y-m-d"));
            }
         }
      }
   }
   // -------------- biểu đồ --------------------
   public function sogd($day = '', $month = '', $year = ''){
      if (strlen($day) == 1) {
         $day = '0'.$day;
      }
      if (strlen($month) == 1) {
         $month = '0'.$month;
      }
      $this->db->select('*')->from("$this->table_order");
      $this->db->like("$this->table_order.created_time", $year.'-'.$month.'-'.$day);
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->num_rows();
   }
   public function get_month($month = '', $year = ''){
      if (strlen($month) == 1) {
         $month = '0'.$month;
      }
      $this->db->select('*')->from("$this->table_order");
      $this->db->like("$this->table_order.created_time", $year.'-'.$month);
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->num_rows();
   }
}



 ?>