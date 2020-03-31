<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends Public_Controller
{
    protected $cid = 0;
    protected $_data;
    protected $_data_category;
    protected $_lang_code;
    protected $_all_category;

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['category_model', 'Product_model', 'Project_model','property_model']);
        $this->_data = new Product_model();
        $this->_data_category = new Category_model();

        if ($this->input->get('lang'))
            $this->_lang_code = $this->input->get('lang');
        else
            $this->_lang_code = $this->session->public_lang_code;
        $this->_all_category = $this->_data_category->getAll($this->_lang_code, 1);
    }


    public function category($id)
    {
        $page = !empty($this->input->post('page')) ? $this->input->post('page') : 1;
        $project_model = new Project_model();
        $property_model = new Property_model();
        $oneItem = $this->_data_category->getById($id, '', $this->_lang_code);
        if (empty($oneItem)) show_404();

        if ($this->input->get('lang')) {
            redirect(getUrlCateProduct(['slug' => $oneItem->slug, 'id' => $oneItem->id]));
        }
        $data['list_category'] = $this->_data_category->getListChildLv1($this->_all_category, 1, $id);
        if (!empty($this->input->get())) $id = 0;
        $params = [
            'is_status' => 1, //0: Huỷ, 1: Hiển thị, 2: Nháp
            'lang_code' => $this->_lang_code,
            'category_id' => $id,
            'limit' => 1000,
            'order' => array('created_time' => 'DESC')
        ];
        $product = $this->_data->getData($params);
        $data['data'] = array_merge($listProductByProperty,$product);

        $this->breadcrumbs->push($this->lang->line('home'), base_url());
        $this->_data_category->_recursive_parent($this->_all_category, $id);
        if (!empty($this->_data_category->_list_category_parent)) foreach (array_reverse($this->_data_category->_list_category_parent) as $item) {
            $this->breadcrumbs->push($item->title, getUrlCateProduct($item));
        }
        $this->breadcrumbs->push($oneItem->title, getUrlCateProduct($oneItem));
        $data['breadcrumb'] = $this->breadcrumbs->show();
        $data['SEO'] = [
            'meta_title' => !empty($oneItem->meta_title) ? $oneItem->meta_title : $oneItem->title,
            'meta_description' => !empty($oneItem->meta_description) ? $oneItem->meta_description : $oneItem->description,
            'meta_keyword' => !empty($oneItem->meta_title) ? $oneItem->meta_keyword : '',
            'url' => getUrlCateProduct($oneItem),
            'image' => getImageThumb($oneItem->thumbnail, 400, 200)
        ];
        $data['main_content'] = $this->load->view($this->template_path . 'product/list_product', $data, TRUE);
        $this->load->view($this->template_main, $data);
    }


    public function detail($id)
    {
        $oneItem = $this->_data->getById($id, '', $this->_lang_code);
        if (empty($oneItem)) redirect('404');
        //Check xem co chuyen lang hay khong thi redirect ve lang moi
        if ($this->input->get('lang')) {
            redirect(getUrlProduct(['slug' => $oneItem->slug, 'id' => $oneItem->id]));
        }
        $data['oneCategory'] = $oneCategory = $this->_data->getOneCateIdById($id);
        $data['oneParent'] = $oneCategoryParent = $this->_data_category->_recursive_one_parent($this->_all_category, $data['oneCategory']->id);


        $this->_data_category->_recursive_parent($this->_all_category, $oneItem->id);
        $data['list_category'] = $this->_data_category->getListChildLv1($this->_all_category, 1);
        $data['oneItem'] = $oneItem;

        /*Get product related*/
        $this->_data_category->_recursive_child_id($this->_all_category, $oneCategory->id);
        $listCateId = $this->_data_category->_list_category_child_id;

        $params = [
            'is_status' => 1, //0: Huỷ, 1: Hiển thị, 2: Nháp
            'lang_code' => $this->_lang_code,
            'limit' => 16,
            'category_id' => $listCateId,
            'not_in' => $id,
            'order' => array('created_time' => 'DESC')
        ];
        $data['list_related'] = $this->_data->getData($params);

        $this->breadcrumbs->push($this->lang->line('home'), base_url());
        $this->_data_category->_recursive_parent($this->_all_category, $oneCategory->id);
        if (!empty($this->_data_category->_list_category_parent)) foreach (array_reverse($this->_data_category->_list_category_parent) as $item) {
            $this->breadcrumbs->push($item->title, getUrlCateProduct($item));
        }
        $this->breadcrumbs->push($oneItem->title, getUrlProduct($oneItem));
        $data['breadcrumb'] = $this->breadcrumbs->show();
        $data['SEO'] = [
            'meta_title' => !empty($oneItem->meta_title) ? $oneItem->meta_title : $oneItem->title,
            'meta_description' => !empty($oneItem->meta_title) ? $oneItem->meta_description : $oneItem->description,
            'meta_keyword' => !empty($oneItem->meta_title) ? $oneItem->meta_keyword : '',
            'url' => getUrlProduct(['slug' => $oneItem->slug, 'id' => $oneItem->id]),
            'image' => getImageThumb($oneItem->thumbnail, 400, 200)
        ];
        if (!empty($oneCategoryParent->style)) $layoutView = '-' . $oneCategoryParent->style;
        else $layoutView = '';
        $data['main_content'] = $this->load->view($this->template_path . 'product/detail' . $layoutView, $data, TRUE);
        $this->load->view($this->template_main, $data);
    }

    private function _updateLastViewed($id)
    {
        $key = 'last_viewed';
        $data = get_cookie($key);
        if (!empty($data)) {
            $data = json_decode($data, true);
            array_push($data, $id);
            $data = array_unique($data);
            set_cookie($key, json_encode($data), 0);
        } else {
            set_cookie($key, json_encode([$id]), 0);
        }
    }


}
