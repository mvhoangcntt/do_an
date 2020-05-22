<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seemore extends Public_Controller
{
    protected $_all_category;
    protected $_data_category;
    public $Course_model;

    public function __construct()
    {
        parent::__construct();
        $this->lang->load('home');
        $this->lang->load('footer');
        $this->load->model(array('Home_model','Seemore_model'));
        $this->_data_home = new Home_model();
        $this->_data = new Seemore_model();
    }

    public function index($slug = null, $page = '')
    {
        // var_dump($slug, $page); exit;
        // nếu slug = link thì suất data
        if (isset($slug)) {
            $slug = 'seemore/'.$slug;
        }
        $data['product'] = $this->product($slug);
        
        $check = $this->_data->check_parent($slug);
        $data['name_catalog'] = $check->name_catalog;
        $data['title_h2'] = 'Xem thêm';
        $data['main_content'] = $this->load->view($this->template_path . 'seemore/seemore', $data, TRUE);
        $this->load->view($this->template_main, $data);
    }
    public function product($slug = ''){
        $data = array();
        $check = $this->_data->check_parent($slug);
        if ($check->parents_id == 0) {
            // lấy tất cả id con
            $children = $this->_data->get_children($check->id);
            $i = 0;
            foreach ($children as $value) {
                $product[$i] = $this->_data->get_product($slug, $value->id);
                $i++;
            }
            // sửa lại dạng data
            $dem = 0;
            foreach ($product as $key => $val) {
                foreach ($product[$key] as $key2 => $val2) {
                    $adddata[$dem] = $val2;
                    $dem++;
                }
            }
            // add link
            foreach ($adddata as $key => $value) {
                $optional['id'] = $value->id;
                $optional['slug'] = $value->slug;
                $adddata[$key]->url = getUrlProduct($optional);
            }
            return $adddata;
        }else{
            $adddata = $this->_data->get_product($slug);
            foreach ($adddata as $key => $value) {
                $optional['id'] = $value->id;
                $optional['slug'] = $value->slug;
                $adddata[$key]->url = getUrlProduct($optional);
            }
            return $adddata;
        }
    }

    public function ajax_filter_coler(){
        $this->checkRequestGetAjax();
        $keyword = $this->input->get("q");
        $params['keyword'] = $keyword;
        $slug = substr($this->input->get('link'),0,-5);
        $data = $this->product($slug);
        $coler = array();
        foreach ($data as $key => $value) {
            $params['id'] = $value->id;
            array_push($coler, $this->_data->itemfilter_coler($params));
            // var_dump($this->_data->itemfilter_coler($params)); exit;
        }
        $add_item = array();
        // đưa về dạng chuẩn đàu ra
        foreach ($coler as $key => $value) {
            foreach ($value as $key1 => $value1) {
                array_push($add_item, $value1);
            }
        }
        // loại bỏ chùng nhau
        $array = array();
        $dem = 0;
        foreach ($add_item as $value1) {
            $dem++;
            $i = 0;
            if ($dem == 1) {
                array_push($array, $value1);
            }
            foreach ($array as $value) {
                if ($value1->text_coler == $value->text_coler) {
                    $i++;
                }
            }
            if ($i == 0) {
                array_push($array, $value1);
            }
        }
        // add filter
        if(!empty($array)) foreach ($array as $item) {
            $item = (object) $item;
            $json[] = ['id'=>$item->text_coler, 'text'=>$item->text_coler];
        }
        die(json_encode($json));
    }
    public function ajax_filter_size(){
        $this->checkRequestGetAjax();
        $keyword = $this->input->get("q");
        $params['keyword'] = $keyword;
        $slug = substr($this->input->get('link'),0,-5);
        $data = $this->product($slug);
        $size = array();
        foreach ($data as $key => $value) {
            $params['id'] = $value->id;
            array_push($size, $this->_data->itemfilter_size($params));
            // var_dump($this->_data->itemfilter_coler($params)); exit;
        }
        $add_item = array();
        // đưa về dạng chuẩn đàu ra
        foreach ($size as $key => $value) {
            foreach ($value as $key1 => $value1) {
                array_push($add_item, $value1);
            }
        }
        // loại bỏ chùng nhau
        $array = array();
        $dem = 0;
        foreach ($add_item as $value1) {
            $dem++;
            $i = 0;
            if ($dem == 1) {
                array_push($array, $value1);
            }
            foreach ($array as $value) {
                if ($value1->text_size == $value->text_size) {
                    $i++;
                }
            }
            if ($i == 0) {
                array_push($array, $value1);
            }
        }
        // var_dump($array); exit;
        // data add filter
        if(!empty($array)) foreach ($array as $item) {
            $item = (object) $item;
            $json[] = ['id'=>$item->text_size, 'text'=>$item->text_size];
        }
        die(json_encode($json));
    }
    // lấy ajax add lại dữ liệu 
    public function reload_seemore(){
        $slug = substr($this->input->post('get_url'),0,-5);

        $data = $this->product($slug);
        
        // var_dump($data); exit;
        if ($this->input->post('giamgia') == 'on') { // sắp xếp dữ liệu giảm dần
            $arr = array();
            for ($i=0; $i < count($data) - 1 ; $i++) { 
                for ($j= $i+1; $j < count($data) ; $j++) {
                    if ($data[$i]->discount < $data[$j]->discount) {
                        $arr      = $data[$i];
                        $data[$i] = $data[$j];
                        $data[$j] = $arr;
                    }
                }
            }
        }

        // lọc theo giá
        $min = $this->input->post('min_price');
        $max = $this->input->post('max_price');
        $minmax = array();
        if ($min >= 0) {
            if ($min < $max) {
                foreach ($data as $key => $value) {
                    // var_dump($value); exit;
                    if ($value->price <= $max && $value->price >= $min) {
                        array_push($minmax, $value);
                    }
                }
                $data = $minmax;
            }
        }
        // lọc theo màu sắc
        $get_coler = $this->input->post('text_coler');
        if ($get_coler != '') {
            $addcoler = array();
            $coler = array();
            foreach ($data as $key => $value) {
                $params['id'] = $value->id;
                $coler = $this->_data->get_coler_($params);
                if (is_array($coler)) {
                    foreach ($coler as $key1 => $value1) {
                        if ($value1->text_coler == $get_coler) {
                            array_push($addcoler, $value);
                        }
                    }
                    
                }
            }
            $data = $addcoler;
        }
        // lọc theo size
        $get_size = $this->input->post('text_size');
        if ($get_size != '') {
            $addsize = array();
            $size = array();
            foreach ($data as $key => $value) {
                $params['id'] = $value->id;
                $size = $this->_data->get_size_($params);
                if (is_array($size)) {
                    foreach ($size as $key1 => $value1) {
                        if ($value1->text_size == $get_size) {
                            array_push($addsize, $value);
                        }
                    }
                    
                }
            }
            $data = $addsize;
        }

        // var_dump($this->input->post()); exit;
        $data['count'] = count($data);
        die(json_encode($data));
    }




    public function search($get_url = '')
    {
        // echo $get_url; exit;
        if ($get_url == 'new') {
            $data['product'] = $this->_data->moinhat();
            $data['name_catalog'] = 'Mới nhất';
        }
        if ($get_url == 'timkiem') {
            $data['product']  = $this->_data->timkiem();
            $data['name_catalog'] = 'Tim kiếm nhiều nhất';
        }
        if ($get_url == 'giamgia') {
            $data['product']  = $this->_data->giamgia();
            $data['name_catalog'] = 'Giảm giá nhiều nhất';
        }
        if ($get_url == 'phukien') {
            $data['product']  = $this->_data->phukien();
            $data['name_catalog'] = 'Phụ kiện';
        }
        if ($get_url == 'bst') {
            $bst_ = array();
            $bst['get_parent_0'] = $this->_data->parent_catalog();
            foreach ($bst['get_parent_0'] as $value) {
                $item = ''; $item_bst = '';
                $item = $this->_data->catalog($value->id);
                $item_bst = $this->_data->bosuutap($item->id);
                array_push($bst_, $item_bst);
            }
            $data['product'] = $bst_;
            $data['name_catalog'] = 'Bộ sưu tập';
        }
        $search = $this->input->post('search');
        if (!empty($search)) {
            $data['product'] = $this->_data->product_search($search);
            $data['name_catalog'] = $search;
        }
        foreach ($data['product'] as $key => $value) {
            $optional['id'] = $value->id;
            $optional['slug'] = $value->slug;
            $data['product'][$key]->url = getUrlProduct($optional);
        }
        
        $data['main_content'] = $this->load->view($this->template_path . 'seemore/seemore', $data, TRUE);
        $this->load->view($this->template_main, $data);
    }
    public function reload_search(){
        $search = $this->input->post('get_search');
        $get_url = $this->input->post('get_url');
        if ($get_url == 'seemore/search/new') {
            $data = $this->_data->moinhat();
        }
        if ($get_url == 'seemore/search/timkiem') {
            $data  = $this->_data->timkiem();
        }
        if ($get_url == 'seemore/search/giamgia') {
            $data  = $this->_data->giamgia();
        }
        if ($get_url == 'seemore/search/phukien') {
            $data  = $this->_data->phukien();
        }
        if ($get_url == 'seemore/search/bst') {
            $bst_ = array();
            $bst['get_parent_0'] = $this->_data->parent_catalog();
            foreach ($bst['get_parent_0'] as $value) {
                $item = ''; $item_bst = '';
                $item = $this->_data->catalog($value->id);
                $item_bst = $this->_data->bosuutap($item->id);
                array_push($bst_, $item_bst);
            }
            $data = $bst_;
        }
        if (!empty($search)) {
            $data = $this->_data->product_search($search);
        }
        if ($this->input->post('giamgia') == 'on') { // sắp xếp dữ liệu giảm dần
            $arr = array();
            for ($i=0; $i < count($data) - 1 ; $i++) { 
                for ($j= $i+1; $j < count($data) ; $j++) {
                    if ($data[$i]->discount < $data[$j]->discount) {
                        $arr      = $data[$i];
                        $data[$i] = $data[$j];
                        $data[$j] = $arr;
                    }
                }
            }
        }

        // lọc theo giá
        $min = $this->input->post('min_price');
        $max = $this->input->post('max_price');
        $minmax = array();
        if ($min >= 0) {
            if ($min < $max) {
                foreach ($data as $key => $value) {
                    // var_dump($value); exit;
                    if ($value->price <= $max && $value->price >= $min) {
                        array_push($minmax, $value);
                    }
                }
                $data = $minmax;
            }
        }
        // lọc theo màu sắc
        $get_coler = $this->input->post('text_coler');
        if ($get_coler != '') {
            $addcoler = array();
            $coler = array();
            foreach ($data as $key => $value) {
                $params['id'] = $value->id;
                $coler = $this->_data->get_coler_($params);
                if (is_array($coler)) {
                    foreach ($coler as $key1 => $value1) {
                        if ($value1->text_coler == $get_coler) {
                            array_push($addcoler, $value);
                        }
                    }
                    
                }
            }
            $data = $addcoler;
        }
        // lọc theo size
        $get_size = $this->input->post('text_size');
        if ($get_size != '') {
            $addsize = array();
            $size = array();
            foreach ($data as $key => $value) {
                $params['id'] = $value->id;
                $size = $this->_data->get_size_($params);
                if (is_array($size)) {
                    foreach ($size as $key1 => $value1) {
                        if ($value1->text_size == $get_size) {
                            array_push($addsize, $value);
                        }
                    }
                    
                }
            }
            $data = $addsize;
        }

        foreach ($data as $key => $value) {
            $optional['id'] = $value->id;
            $optional['slug'] = $value->slug;
            $data[$key]->url = getUrlProduct($optional);
        }
        $data['count'] = count($data);
        die(json_encode($data));
    }
    public function search_filter_coler(){
        $this->checkRequestGetAjax();
        $keyword = $this->input->get("q");
        $params['keyword'] = $keyword;
        $search = $this->input->get('link');
        $get_url = $this->input->get('get_url');
        if ($get_url == 'seemore/search/new') {
            $data = $this->_data->moinhat();
        }
        if ($get_url == 'seemore/search/timkiem') {
            $data  = $this->_data->timkiem();
        }
        if ($get_url == 'seemore/search/giamgia') {
            $data  = $this->_data->giamgia();
        }
        if ($get_url == 'seemore/search/phukien') {
            $data  = $this->_data->phukien();
        }
        if ($get_url == 'seemore/search/bst') {
            $bst_ = array();
            $bst['get_parent_0'] = $this->_data->parent_catalog();
            foreach ($bst['get_parent_0'] as $value) {
                $item = ''; $item_bst = '';
                $item = $this->_data->catalog($value->id);
                $item_bst = $this->_data->bosuutap($item->id);
                array_push($bst_, $item_bst);
            }
            $data = $bst_;
        }
        if (!empty($search)) {
            $data = $this->_data->product_search($search);
        }
        $coler = array();
        foreach ($data as $key => $value) {
            $params['id'] = $value->id;
            array_push($coler, $this->_data->itemfilter_coler($params));
            // var_dump($this->_data->itemfilter_coler($params)); exit;
        }
        $add_item = array();
        // đưa về dạng chuẩn đàu ra
        foreach ($coler as $key => $value) {
            foreach ($value as $key1 => $value1) {
                array_push($add_item, $value1);
            }
        }
        // loại bỏ chùng nhau
        $array = array();
        $dem = 0;
        foreach ($add_item as $value1) {
            $dem++;
            $i = 0;
            if ($dem == 1) {
                array_push($array, $value1);
            }
            foreach ($array as $value) {
                if ($value1->text_coler == $value->text_coler) {
                    $i++;
                }
            }
            if ($i == 0) {
                array_push($array, $value1);
            }
        }
        // add filter
        if(!empty($array)) foreach ($array as $item) {
            $item = (object) $item;
            $json[] = ['id'=>$item->text_coler, 'text'=>$item->text_coler];
        }
        die(json_encode($json));
    }
    public function search_filter_size(){
        $this->checkRequestGetAjax();
        $keyword = $this->input->get("q");
        $params['keyword'] = $keyword;
        $search = $this->input->get('link');
        $get_url = $this->input->get('get_url');
        if ($get_url == 'seemore/search/new') {
            $data = $this->_data->moinhat();
        }
        if ($get_url == 'seemore/search/timkiem') {
            $data  = $this->_data->timkiem();
        }
        if ($get_url == 'seemore/search/giamgia') {
            $data  = $this->_data->giamgia();
        }
        if ($get_url == 'seemore/search/phukien') {
            $data  = $this->_data->phukien();
        }
        if (!empty($search)) {
            $data = $this->_data->product_search($search);
        }
        if ($get_url == 'seemore/search/bst') {
            $bst_ = array();
            $bst['get_parent_0'] = $this->_data->parent_catalog();
            foreach ($bst['get_parent_0'] as $value) {
                $item = ''; $item_bst = '';
                $item = $this->_data->catalog($value->id);
                $item_bst = $this->_data->bosuutap($item->id);
                array_push($bst_, $item_bst);
            }
            $data = $bst_;
        }
        $size = array();
        foreach ($data as $key => $value) {
            $params['id'] = $value->id;
            array_push($size, $this->_data->itemfilter_size($params));
            // var_dump($this->_data->itemfilter_coler($params)); exit;
        }
        $add_item = array();
        // đưa về dạng chuẩn đàu ra
        foreach ($size as $key => $value) {
            foreach ($value as $key1 => $value1) {
                array_push($add_item, $value1);
            }
        }
        // loại bỏ chùng nhau
        $array = array();
        $dem = 0;
        foreach ($add_item as $value1) {
            $dem++;
            $i = 0;
            if ($dem == 1) {
                array_push($array, $value1);
            }
            foreach ($array as $value) {
                if ($value1->text_size == $value->text_size) {
                    $i++;
                }
            }
            if ($i == 0) {
                array_push($array, $value1);
            }
        }
        // var_dump($array); exit;
        // data add filter
        if(!empty($array)) foreach ($array as $item) {
            $item = (object) $item;
            $json[] = ['id'=>$item->text_size, 'text'=>$item->text_size];
        }
        die(json_encode($json));
    }
}