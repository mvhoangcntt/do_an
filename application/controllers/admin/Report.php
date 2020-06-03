<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Report extends Admin_Controller
{
    protected $_data;
    protected $_name_controller;
    protected $category_tree;

    const STATUS_CANCEL = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DRAFT = 2;

	public function __construct()
    {
        parent::__construct();
        $this->lang->load('product');
        $this->load->model('Report_model');
        $this->_data = new Report_model();
        $this->_name_controller = $this->router->fetch_class();
        $this->session->category_type = $this->_name_controller;
    }
    public function index(){
        // tong giao dịch
        $data['tonggd'] = $this->_data->tonggd();
        $data['gd_success'] = $this->_data->gd_success();// thanh toán thành công
        $data['gd_failure'] = $this->_data->gd_failure();// thanh toán thất bại/ đã hủy
        $data['transport_fee'] = $this->_data->transport_fee();// đang vận chuyển
        $data['waiting'] = $this->_data->waiting();// đang chờ xác nhận
        $data['confirm'] = $this->_data->confirm();// đã xác nhận
        $data['cash'] = $this->_data->cash();// thanh toán tại nhà
        $data['online'] = $this->_data->online();// thanh toán online
        $data['total_money'] = $this->_data->total_money();// tổng doanh số đã bán
        $data['total_product'] = $this->_data->tongsp();// tổng sản phẩm

        $date = date("Y-m-d H:i:s");
        $sau30 = date('Y-m-d H:i:s', strtotime($date. ' - 30 days'));
        $id_product = $this->_data->get_id();// lấy tất cả id sản phẩm
        $dem = 0;
        $dem1 = 0;
        $hangton = array();
        $hanghet = array();
        foreach ($id_product as $value) {
            $result = '';
            $result = $this->_data->over($value->id);
            if ($result->quantity == 0) {// đếm sản phẩm đã hết
                $dem++;
                if ($this->input->get('hanghet') == 'all') {
                    array_push($hanghet,$this->_data->get_over($value->id));
                }else{
                    if ($dem < 6) {
                        array_push($hanghet,$this->_data->get_over($value->id));
                    }
                }
            }
            if ($value->total == $result->quantity) {// đếm sản phẩm sau 30 ngày chưa có người mua
                // var_dump($value->id , $result->quantity); exit;
                if (strtotime($value->created_time) < strtotime($sau30)) {
                    $dem1++;
                    if ($this->input->get('hangton') == 'all') {
                        array_push($hangton,$this->_data->get_over($value->id));
                    }else{
                        if ($dem1 <6) {
                            array_push($hangton,$this->_data->get_over($value->id));
                        }
                    }
                }
            }
        }
        // xem nhiều
        $listview = $this->_data->get_view();
        foreach ($hangton as $key => $value) {
            $optional['id'] = $value->id;
            $optional['slug'] = $value->slug;
            $hangton[$key]->url = getUrlProduct($optional);
        }
        foreach ($hanghet as $key => $value) {
            $optional['id'] = $value->id;
            $optional['slug'] = $value->slug;
            $hanghet[$key]->url = getUrlProduct($optional);
        }
        foreach ($listview as $key => $value) {
            $optional['id'] = $value->id;
            $optional['slug'] = $value->slug;
            $listview[$key]->url = getUrlProduct($optional);
        }
        $data['listview'] = $listview;
        $data['hangton'] = $hangton;
        $data['hanghet'] = $hanghet;
        // var_dump($this->input->get('hangton')); exit;
        $data['total_over'] = $dem;// tổng sản phẩm đã hết hàng
        $data['total_conhang'] = $data['total_product'] - $dem;// tổng sản phẩm còn hàng
        $data['total_inventory'] = $dem1; // số sản phẩm sau 30 ngày chưa có người mua

        $day = $this->input->get('day');
        $month = $this->input->get('month');
        $year = $this->input->get('year');
        // hiển thị tên form
        $data['title_form'] = 'Ngày hôm nay';
        if (!empty($day)) {
            $data['title_form'] = 'Thống kê ngày '.$day;
        }else{
            if (!empty($month)) {
                $data['title_form'] = 'Thống kê tháng '.$month;
            }else{
                if (!empty($year)) {
                    $data['title_form'] = 'Thống kê năm '.$year;
                }
            }
        }
        

        // if (date('H:i') == '00:03') {
        //     var_dump(date('H:i')); exit;
        // }

        // var_dump(date('H:i')); exit;
    	$data['heading_title'] = 'Báo cáo';
        $data['heading_description'] = "Báo cáo thống kê";
        $this->breadcrumbs->push('Home', base_url());
        $this->breadcrumbs->push($data['heading_title'], '#');
        $data['breadcrumbs'] = $this->breadcrumbs->show();
    	$data['main_content'] = $this->load->view($this->template_path . $this->_name_controller. '/index', $data, TRUE);
        // var_dump($data); exit();
        $this->load->view($this->template_main, $data);
    }
    public function bieudothang(){
        // var_dump($this->input->get('year')); exit;
        $year = $this->input->get('year');
        if (empty($year)) {
            $year = date("Y");
        }
        $array = array();
        $num = array();
        for ($i=1; $i <= 12 ; $i++) { 
            $number = $this->_data->get_month($i, $year);
            array_push($array, $number);
            array_push($num, $i);
        }
        $data['numberday'] = $num;
        $data['data'] = $array;
        // var_dump($data); exit;
        print $this->load->view($this->template_path . $this->_name_controller. '/thang', $data, TRUE);
    }
    public function bieudongay(){
        // Biểu đồ phát triển theo ngày
        $alldata['data'] = $this->data_bieudo();
        $data['data'] = $alldata['data']['data'];
        $data['numberday'] = $alldata['data']['number'];
        // $data['slide'] = $this->_data->get_slide();
        print $this->load->view($this->template_path . $this->_name_controller. '/ngay', $data, TRUE);
    }
    public function data_bieudo(){
        $t = $this->input->get('month1');
        $year = $this->input->get('year1');
        $d;
        if (empty($t)) {
            $t = date("m");
        }
        if (empty($year)) {
            $year = date("Y");
        }
        switch ( $t ) {
            case 1:
            case 3:
            case 5:
            case 7:
            case 8:
            case 10:
            case 12:
                $d    = 31;
                break;
            case 4:
            case 6:
            case 9:
            case 11:
                $d    = 30;
                break;
            case 2:
                if( $year % 100 != 0 && $year % 4 == 0 ) {
                    $d    = 29;
                } else {
                    $d    = 28;
                }
                break;
            default: $d    = 0;
        }
        $data1 = array();
        $number = array();
        for ($i=1; $i <= $d ; $i++) {
            $day = $this->_data->sogd($i,$t,$year);
            array_push($data1, $day);
            array_push($number, $i);
        }
        $data['number'] = $number;
        $data['data'] = $data1;
        // var_dump($data); exit();
        return $data;
    }
   
}