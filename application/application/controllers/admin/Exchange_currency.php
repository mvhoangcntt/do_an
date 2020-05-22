<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Exchange_currency extends Admin_Controller
{

    protected $_data;
    protected $_data_currency;
    protected $_name_controller;

    public function __construct()
    {
        parent::__construct();
        $this->lang->load('exchange_currency');
        $this->load->model(['exchange_currency_model', 'currency_model']);
        $this->_data = new Exchange_currency_model();
        $this->_data_currency = new Currency_model();
        $this->_name_controller = $this->router->fetch_class();
    }

    public function index()
    {
        $data['heading_title'] = $this->lang->line('heading_title');
        $data['heading_description'] = $this->lang->line('heading_description');
        /*Breadcrumbs*/
        $this->breadcrumbs->push('Home', base_url());
        $this->breadcrumbs->push($data['heading_title'], '#');
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        /*Breadcrumbs*/
        $data['display_button'] = ['add', 'delete', 'sync_vietcombank', 'sync_dongabank'];
        $data['main_content'] = $this->load->view($this->template_path . $this->_name_controller . '/index', $data, TRUE);
        $this->load->view($this->template_main, $data);
    }

    public function ajax_list()
    {
        if($this->input->server('REQUEST_METHOD') == 'POST' && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
            $length = $this->input->post('length');
            $no = $this->input->post('start');
            $page = $no/$length + 1;
            $params['page'] = $page;
            $params['limit'] = $length;
            $list = $this->_data->getData($params);
            $data = array();
            if(!empty($list)) foreach ($list as $item) {
                $no++;
                $row = array();
                $row[] = $item->id;
                $row[] = $item->id;
                $row[] = $item->type;
                $row[] = number_format($item->sell,2);
                $row[] = $item->created_time;
                $row[] = $item->updated_time;
                $action = '<div class="text-center">';
                $action .= '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="'.$this->lang->line('btn_edit').'" onclick="edit_form('."'".$item->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>';
                $action .= '&nbsp;<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="' . $this->lang->line('btn_remove') . '" onclick="delete_item(' . "'" . $item->id . "'" . ')"><i class="glyphicon glyphicon-trash"></i></a>';
                $action .= '</div>';
                $row[] = $action;
                $data[] = $row;
            }

            $output = array(
                "draw" => $this->input->post('draw'),
                "recordsTotal" => $this->_data->getTotalAll(),
                "recordsFiltered" => $this->_data->getTotal($params),
                "data" => $data,
            );
            //trả về json
            echo json_encode($output);
        }
        exit;
    }

    public function ajax_add()
    {
        $data_store = $this->_convertData();
        unset($data_store['id']);
        $action = $this->router->fetch_class();
        $data = $this->_data->findWithType($data_store['type']);
        if (!empty($data)) {
            if ($response = $this->_data->update(['id' => $data->id],$data_store)){
                $note = "Insert $action: " . $response;
                $this->addLogaction($action, $note);
                $message['type'] = 'success';
                $message['message'] = $this->lang->line('mess_update_success');
            } else {
                $message['type'] = 'error';
                $message['message'] = $this->lang->line('mess_update_unsuccess');
            }
        } else {
            if ($id_post = $this->_data->save($data_store)) {
                $note = "Insert $action: " . $id_post;
                $this->addLogaction($action, $note);
                $message['type'] = 'success';
                $message['message'] = $this->lang->line('mess_add_success');
            } else {
                $message['type'] = 'error';
                $message['message'] = $this->lang->line('mess_add_unsuccess');
            }
        }

        die(json_encode($message));
    }

    public function ajax_edit($id)
    {
        $data['data'] = (array) $this->_data->getById($id);
        if(!empty($data['data']['type'])) $data['code'][] = array('id' => $data['data']['type'], 'text' => $data['data']['type']);
        die(json_encode($data));
    }

    public function ajax_update()
    {
        $data_store = $this->_convertData();
        $id = $data_store['id'];
        $response = $this->_data->update(array('id' => $id), $data_store, $this->_data->table);
        if ($response != false) {
            // log action
            $action = $this->router->fetch_class();
            $note = "Update $action: " . $data_store['id'];
            $this->addLogaction($action, $note);
            $message['type'] = 'success';
            $message['message'] = $this->lang->line('mess_update_success');
        } else {
            $message['type'] = 'error';
            $message['message'] = $this->lang->line('mess_update_unsuccess');
        }
        die(json_encode($message));
    }

    public function ajax_delete($id)
    {
        $response = $this->_data->delete(['id' => $id]);
        if ($response != false) {
            $action = $this->router->fetch_class();
            $note = "Delete $action: $id";
            $this->addLogaction($action, $note);
            $message['type'] = 'success';
            $message['message'] = $this->lang->line('mess_delete_success');
        } else {
            $message['type'] = 'error';
            $message['message'] = $this->lang->line('mess_delete_unsuccess');
            $message['error'] = $response;
            log_message('error', $response);
        }
        die(json_encode($message));
    }

    public function ajax_load_currency_code()
    {
        $dataJson   = [];
        $keyword    = toSlug($this->input->get("q"));
        $keyword    = toSlug(toNormal($keyword));
        $data = $this->_data_currency->getData(['limit' => 1000]);
        if (!empty($data)) foreach ($data as $value) {
            if(!empty($keyword)){
                if(strpos(toSlug(toNormal($value->code)),$keyword)!==false){
                    $dataJson[] = ['id'=>$value->code, 'text'=>$value->code];
                }
            }else{
                $dataJson[] = ['id'=>$value->code, 'text'=>$value->code];
            }
        }
        die(json_encode($dataJson));
        exit();
    }

    public function ajax_sync_dongabank()
    {
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $result = callCURL('http://www.dongabank.com.vn/exchange/export');
            $result = substr($result, 1, -1);
            $result = json_decode($result);
            foreach ($result->items as $value) {
                $data_store = [];
                $data_store['type'] = $value->type;
                $data_store['sell'] = $value->bantienmat;
                $data = $this->_data->findWithType($data_store['type']);
                $data_currency = $this->_data_currency->findWithCode($data_store['type']);
                if (!empty($data_currency)) {
                    if (!empty($data)) {
                        unset($data_store['type']);
                       $temp[] = $data_store;
                        $this->_data->update(['id' => $data->id], $data_store);
                    } else {
                        $temp[] = $data_store;
                        $this->_data->save($data_store);
                    }
                }
            }
            $result = array(
                'type' => 'success',
                'message' => $this->lang->line('text_sync_success'),
            );
            echo json_encode($result);
        }
        exit();
    }

    public function ajax_sync_vietcombank()
    {
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $result = callCURL('https://www.vietcombank.com.vn/exchangerates/ExrateXML.aspx');
            $xmlObj = simplexml_load_string($result);
            $arrXml = $this->objectsIntoArray($xmlObj);
            if (!empty($arrXml)) {
                foreach ($arrXml['Exrate'] as $value) {
                    $data_store = [];
                    $data_store['type'] = $value['@attributes']['CurrencyCode'];
                    $data_store['sell'] = $value['@attributes']['Sell'];
                    $data = $this->_data->findWithType($data_store['type']);
                    $data_currency = $this->_data_currency->findWithCode($data_store['type']);
                    if (!empty($data_currency)) {
                        if (!empty($data)) {
                            unset($data_store['type']);
                            $this->_data->update(['id' => $data->id], $data_store);
                        } else {
                            $this->_data->save($data_store);
                        }
                    }
                }
            }
            $result = array(
                'type'    => 'success',
                'message' => $this->lang->line('text_sync_success')
            );
            echo json_encode($result);
        }
        exit();
    }

    private function objectsIntoArray($arrObjData, $arrSkipIndices = array())
    {
        $arrData = array();
        if (is_object($arrObjData)) {
            $arrObjData = get_object_vars($arrObjData);
        }
        if (is_array($arrObjData)) {
            foreach ($arrObjData as $index => $value) {
                if (is_object($value) || is_array($value)) {
                    $value = $this->objectsIntoArray($value, $arrSkipIndices); // recursive call
                }
                if (in_array($index, $arrSkipIndices)) {
                    continue;
                }
                $arrData[$index] = $value;
            }
        }
        return $arrData;
    }

    /**
     * Kiểm tra thông tin trước khi nhập lên
     */
    private function _validate()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST' && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $this->form_validation->set_rules('sell', 'tỉ giá', 'required');
            $this->form_validation->set_rules('type', 'mã tiền tệ', 'required');

            if ($this->form_validation->run() === false) {
                $message['type'] = "warning";
                $message['message'] = $this->lang->line('mess_validation');
                $valid = [];
                $valid["sell"] = form_error("sell");
                $valid["type"] = form_error("type");
                $message['validation'] = $valid;
                die(json_encode($message));
            }
        }
    }

    private function _convertData()
    {
        $this->_validate();
        $data = $this->input->post();
        return $data;
    }

}