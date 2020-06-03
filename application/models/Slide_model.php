<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Slide_model extends APS_Model
{
   public function __construct()
   {
      parent::__construct();
      $this->table                  = "slide";
      $this->column_order  = array("$this->table.id","$this->table.id","$this->table.thumbnail","$this->table.href_video","$this->table.created_time","$this->table.updated_time"); //thiết lập cột sắp xếp
      $this->column_search = array("$this->table.id","$this->table.thumbnail","$this->table.href_video"); //thiết lập cột search
   }
}



 ?>