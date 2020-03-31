<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Orders_model extends APS_Model
{
   public function __construct()
   {
      parent::__construct();
		$this->table              = "orders";
		$this->table_detail_order = "detail_order";
		$this->table_product      = "product";
		$this->table_status      = "status";
		$this->table_users      = "users";
      $this->table_maker      = "maker";
      $this->column_order  = array("$this->table.id","$this->table.id","$this->table_product.id","$this->table_product.name","$this->table.date_create"); //thiết lập cột sắp xếp
      $this->column_search = array("$this->table.id","$this->table.id","$this->table_product.id","$this->table_product.name","$this->table.date_create"); //thiết lập cột search
   }

   public function getData($args = array(), $returnType = "object", $select = '')
   {
      $this->__where($args, '', $select);
      $this->db->distinct();
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      if ($returnType === "array") return $query->result_array(); //Check kiểu data trả về
      else return $query->result();
   }
   
   private function __where($args = array(), $count = '', $select = '')
   {
      $page = 1;
      $limit = 10;
      extract($args);
      if (empty($select)) $select = "$this->table.*";
      $this->db->select($select);
      $this->db->from("$this->table");
      $this->db->join($this->table_detail_order, "$this->table.id = $this->table_detail_order.order_id");
      $this->db->join($this->table_product, "$this->table_detail_order.product_id = $this->table_product.id");

      if (!empty($parent_id)) {
         $this->db->where("$this->table.status", $parent_id);
      }
      if (!empty($search)) {
         $this->db->group_start();
         $this->db->like("$this->table.id", trim(xss_clean($search)));
         $this->db->group_end();
      }
      $this->_get_datatables_query();
      if (empty($count) || $count == null) {
         $offset = ($page - 1) * $limit;
         $this->db->limit($limit, $offset);
      }
   }

   public function getTotal($args = [])
   {
      $this->__where($args, "count","$this->table.*");
      $this->db->distinct();
      $query = $this->db->get();
      return $query->num_rows();
   }

   //------------- lấy product cho order -----------
   public function get_product($id){
   	$this->db->select("$this->table_product.id , $this->table_product.name,$this->table_maker.name_maker ")
   			->from($this->table)
   			->join($this->table_detail_order, "$this->table.id = $this->table_detail_order.order_id")
   			->join($this->table_product, "$this->table_detail_order.product_id = $this->table_product.id")
            ->join($this->table_maker, "$this->table_product.maker_id = $this->table_maker.id")
				->where("$this->table.id",$id);
      $query = $this->db->get();
      return $query->result();

   }
   public function get_status($id){
      $this->db->select("$this->table_status.name_status")->from($this->table_status)->where("$this->table_status.id",$id);
      $query = $this->db->get();
      return $query->result();
   }

   // ------------ filter --------------------
   public function get_status_filter($keyword){
      $this->db->select("*");
      if (!empty($keyword)) {
         $this->db->like("$this->table_status.name_status", $keyword);
      }
      $query = $this->db->get($this->table_status);
      return $query->result();
   }
   // ----------- chi tiết đơn hàng -----------------
   public function get_datatable($id){
   	$this->db->select("$this->table_product.id, $this->table_product.name, $this->table_product.thumbnail, $this->table_detail_order.amount, $this->table_detail_order.total, $this->table_product.gift_code")
   			->from($this->table_product)
   			->join($this->table_detail_order, "$this->table_product.id = $this->table_detail_order.product_id")
   			->join($this->table, "$this->table_detail_order.order_id = $this->table.id")
				->where("$this->table.id",$id);
		$query = $this->db->get();
      return $query->result();
   }
   public function get_data_detail($id){
   	$this->db->select("$this->table_users.full_name, $this->table_users.phone, $this->table_users.email, $this->table_users.address, $this->table.status, $this->table.id, $this->table.amount_total")
   			->from($this->table)
   			->join($this->table_users, "$this->table.user_id = $this->table_users.id")
				->where("$this->table.id",$id);
		$query = $this->db->get();
      return $query->row();
   }
   // ----------------- filter chi tiết ------------------
   public function get_table_status($id){
      $this->db->select("$this->table_status.*")
            ->from($this->table_status)
            ->join($this->table, "$this->table.status = $this->table_status.id")
            ->where("$this->table.id",$id);
      $query = $this->db->get();
      return $query->row();
   }

   //----------- update status -----------
   public function update_status($id,$data){
   	$this->db->where('id',$id);
   	$this->db->update($this->table, $data);
   }
}



 ?>