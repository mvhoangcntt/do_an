<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Project_model extends APS_Model{

    protected $table_product;
    public function __construct()
    {
        parent::__construct();
        $this->table            = "project";
        $this->table_trans      = "project_translations";//bảng bài viết
        $this->table_category   = "project_category";//bảng bài viết
        $this->column_order     = array("$this->table.id","$this->table.id","$this->table_trans.title","$this->table.is_featured","$this->table.is_status","$this->table.created_time","$this->table.updated_time",); //thiết lập cột sắp xếp
        $this->column_search    = array("$this->table_trans.title"); //thiết lập cột search
        $this->order_default    = array("$this->table.created_time" => "DESC"); //cột sắp xếp mặc định

    }
    public function getCategoryByPostId($postId, $lang_code = null){
        if(empty($lang_code)) $lang_code = $this->session->admin_lang ? $this->session->admin_lang : $this->session->public_lang_code;
        $this->db->select();
        $this->db->from($this->table_category);
        $this->db->join("category_translations","$this->table_category.category_id = category_translations.id");
        $this->db->join("category","$this->table_category.category_id = category.id");
        $this->db->where('category_translations.language_code', $lang_code);
        $this->db->where($this->table_category.".post_id", $postId);
        $data = $this->db->get()->result();
        return $data;
    }
    public function getCategorySelect2($project, $lang_code = null){
        if(empty($lang_code)) $lang_code = $this->session->admin_lang ? $this->session->admin_lang : $this->session->public_lang_code;
        $this->db->select("$this->table_category.category_id AS id, category_translations.title AS text");
        $this->db->from($this->table_category);
        $this->db->join("category_translations","$this->table_category.category_id = category_translations.id");
        $this->db->where('category_translations.language_code', $lang_code);
        $this->db->where($this->table_category.".project_id", $project);
        $data = $this->db->get()->result();
        //ddQuery($this->db);
        return $data;
    }

    public function listIdByCategory($category_id){
        $this->db->from($this->table_category);
        $this->db->where('category_id',$category_id);
        $result = $this->db->get()->result();
        $listPostId = [];
        if(!empty($result)) foreach ($result as $item){
            $listPostId[] = $item->post_id;
        }
        return $listPostId;
    }

    public function getOneCateIdById($id, $lang = null)
    {
        $data = $this->getCategoryByPostId($id,$lang);
        return !empty($data)?$data[0]:null;
    }

    public function getCateIdById($id)
    {
        $this->db->select('category_id');
        $this->db->from($this->table_category);
        $this->db->where('post_id', $id);
        $data = $this->db->get()->result();
        $listId = [];
        if (!empty($data)) foreach ($data as $item) {
            $listId[] = $item->category_id;
        }
        return $listId;
    }


    public function getPostByTagName($params){
        $this->db->from($this->table);
        $this->db->join("$this->table_trans", "$this->table.id =  $this->table_trans.id");
        $this->db->where("$this->table_trans.language_code", $params['lang_code']);
        $this->db->where("$this->table.is_status", $params['is_status']);
        $this->db->like("$this->table_trans.meta_keyword", $params['search']);
        $this->db->limit($params['limit'], $params['limit']*($params['page']-1));

        return $this->db->get()->result();
    }

    public function countPostByTagName($params){
        $this->db->from($this->table);
        $this->db->join("$this->table_trans", "$this->table.id =  $this->table_trans.id");
        $this->db->where("$this->table_trans.language_code", $params['lang_code']);
        $this->db->where("$this->table.is_status", $params['is_status']);
        $this->db->like("$this->table_trans.meta_keyword", $params['search']);
        return $this->db->count_all_results();
    }
}
