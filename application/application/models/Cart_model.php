<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Cart_model extends APS_Model
{
   public function __construct()
   {
      parent::__construct();
      $this->table               = "cart";
      $this->table_maker         = "maker";
      $this->table_category      = "product_category";
      $this->table_dvhc          = "don_vi_hanh_chinh";
      $this->table_product       = "product";
      $this->table_product_trans = "product_translations";//bảng bài viết
      $this->table_contact       = 'contact';
      $this->table_account       = 'account';
      $this->table_size          = 'size';
      $this->table_voucher       = 'voucher';
      $this->column_cart         = array("$this->table_product.id","$this->table_product.thumbnail","$this->table_product.price","$this->table_product.discount","$this->table_product_trans.title","$this->table_product_trans.slug","$this->table_size.text_size","$this->table_size.text_coler","$this->table_size.quantity as quantity_size","$this->table.quantity as quantity_cart","$this->table.id as id_cart");
   }
   public function get_cart(){
      $this->db->select($this->column_cart);
      $this->db->from("$this->table");
      $this->db->join($this->table_product, "$this->table.product_id = $this->table_product.id");
      $this->db->join($this->table_product_trans, "$this->table_product.id = $this->table_product_trans.id");
      $this->db->join($this->table_account, "$this->table.account_id = $this->table_account.id");
      $this->db->join($this->table_size, "$this->table.size_id = $this->table_size.id");
      $this->db->where("$this->table_product_trans.language_code", "vi");
      $this->db->where("$this->table_account.id", $this->session->account['account_id']);
      // $this->db->limit(6, 0);
      $this->db->order_by("$this->table.id", 'DESC');
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->result();
   }
   public function get_row_cart($id = ''){
      $this->db->select("*");
      $this->db->from("$this->table");
      $this->db->where("$this->table.id", $id);
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->row();
   }
   public function get_row_price_product($id = ''){
      $this->db->select("$this->table_product.price, $this->table.quantity");
      $this->db->from("$this->table");
      $this->db->join($this->table_product, "$this->table.product_id = $this->table_product.id");
      $this->db->join($this->table_account, "$this->table.account_id = $this->table_account.id");
      $this->db->where("$this->table.id", $id);
      $this->db->where("$this->table_account.id", $this->session->account['account_id']);
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->row();
   }
   public function get_cart_account($account_id = ''){
      $this->db->select("$this->table.id, $this->table.product_id, $this->table.size_id, $this->table.quantity");
      $this->db->from("$this->table");
      $this->db->where("$this->table.account_id", $account_id);
      $this->db->join($this->table_size, "$this->table.size_id = $this->table_size.id");
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->result();
   }
   public function get_cart_id($id_cart = ''){
      array_push($this->column_cart, "$this->table.size_id");
      $this->db->select($this->column_cart);
      $this->db->from("$this->table");
      $this->db->join($this->table_product, "$this->table.product_id = $this->table_product.id");
      $this->db->join($this->table_product_trans, "$this->table_product.id = $this->table_product_trans.id");
      $this->db->join($this->table_account, "$this->table.account_id = $this->table_account.id");
      $this->db->join($this->table_size, "$this->table.size_id = $this->table_size.id");
      $this->db->where("$this->table_product_trans.language_code", "vi");
      $this->db->where("$this->table.id", $id_cart);
      $this->db->where("$this->table_account.id", $this->session->account['account_id']);
      // $this->db->limit(6, 0);
      $this->db->order_by("$this->table.id", 'DESC');
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->result();
   }
   public function get_cart_row_product($id = ''){
      $this->db->select($this->column_cart);
      $this->db->from("$this->table");
      $this->db->join($this->table_product, "$this->table.product_id = $this->table_product.id");
      $this->db->join($this->table_product_trans, "$this->table_product.id = $this->table_product_trans.id");
      $this->db->join($this->table_account, "$this->table.account_id = $this->table_account.id");
      $this->db->join($this->table_size, "$this->table.size_id = $this->table_size.id");
      $this->db->where("$this->table_product_trans.language_code", "vi");
      $this->db->where("$this->table.id", $id);
      $this->db->where("$this->table_account.id", $this->session->account['account_id']);
      // $this->db->limit(6, 0);
      $this->db->order_by("$this->table.id", 'DESC');
      $query = $this->db->get();//var_dump($this->db->last_query()); exit();
      return $query->row();
   }
   // -------------------- order -------------
   public function check_gift($gift = ''){
      $this->db->select('*');
      $this->db->from($this->table_voucher);
      $this->db->where("$this->table_voucher.code", $gift);
      $this->db->where("$this->table_voucher.is_status", '1');
      return $this->db->get()->row();
   }

}



 ?>