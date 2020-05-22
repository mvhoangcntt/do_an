<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Catalog_model extends APS_Model
{
   public function __construct()
   {
      parent::__construct();
      $this->table          = "catalog";
      $this->column_order  = array("$this->table.id","$this->table.id","$this->table.name_catalog","$this->table.parents_id","$this->table.created","$this->table.created_time"); //thiết lập cột sắp xếp
      $this->column_search = array("$this->table.id","$this->table.name_catalog","$this->table.parents_id","$this->table.created","$this->table.created_time"); //thiết lập cột search
   }

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
         $this->db->like("$this->table.name_catalog", $keyword);
      }
      $this->db->where("$this->table.parents_id",'0');
      $query = $this->db->get($this->table);
      // var_dump($this->db->last_query()); exit();
      return $query->result();
   }
   
  
   public function get_catalog($id){
      $this->db->select("*")->from($this->table)->where("$this->table.id",$id);
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->row();
   }
  
   
   // ----------- get form update -----------
   // get json form update
   public function get_json($id){
      $this->db->where("$this->table.id",$id);
      $query = $this->db->get($this->table);
      return $query->row();
   }
   public function check_table_catalog($id){
      $this->db->select("*")
            ->from($this->table)
            ->where("$this->table.parents_id",$id);
      $query = $this->db->get();
      return $query->num_rows();
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