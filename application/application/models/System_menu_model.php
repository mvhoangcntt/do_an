<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System_menu_model extends APS_Model
{
    private $listmenu = array();

    public function __construct()
    {
        parent::__construct();
        $this->table = 'system_menu';
        $this->column_order = array("$this->table.id", "$this->table.id", "$this->table.text", "$this->table.icon", "$this->table.href", "$this->table.order", "$this->table.class"); //thiết lập cột sắp xếp
        $this->column_search = array("$this->table.id", "$this->table.text"); //thiết lập cột search
        $this->order_default = array("$this->table.created_time" => "DESC"); //cột sắp xếp mặc định
    }


    public function getMenu()
    {
        $data = $this->getRootMenu();
        $list_menus = array();
        foreach ($data as $value) {
            $children = $this->child($value['id']);
            if(count($children)>0) {
                $value['children'] = $this->getChildren($children);
            } else {
                $value['children'] = [];
            }
            $list_menus[] = $value;
        }
        return $list_menus;
    }

    private function getChildren($children)
    {
        $child_branch = array();
        foreach ($children as $child) {
            $children = $this->child($child['id']);
            if (count($children) > 0) {
                $child['children'] = $this->getChildren($children);
            } else {
                $child['children'] = [];
            }
            $child_branch[] = $child;
	    }
        return $child_branch;
    }

    public function getRootMenu() {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('order', 'DESC');
        $this->db->where('parent_id', 0);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function child ($id) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('order', 'DESC');
        $this->db->where('parent_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
}
