<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Location_model
{
    public function loadCity(){
        $url = FCPATH.'application/third_party/location/tinh_tp.json';
        $data = file_get_contents($url);
        $data = json_decode($data);
        return $data;
    }
    public function loadDistrict($cityId){
        $url = FCPATH.'application/third_party/location/quan_huyen.json';
        $data = file_get_contents($url);
        $data = json_decode($data);
        $dataNew = [];
        if(!empty($data)) foreach ($data as $key => $item){
            if($item->parent_code === $cityId) $dataNew[] = $item;
        }
        return $dataNew;
    }
    public function loadXaphuong($cityId){
        $url = FCPATH.'application/third_party/location/xa_phuong.json';
        $data = file_get_contents($url);
        $data = json_decode($data);
        $dataNew = [];
        if(!empty($data)) foreach ($data as $key => $item){
            if($item->parent_code === $cityId) $dataNew[] = $item;
        }
        return $dataNew;
    }

    public function getCityById($city_id){
        $data = $this->loadCity();
        if(!empty($city_id) && !empty($data)) foreach ($data as $item){
            if($item->code == $city_id) return $item;
        }
        return false;
    }
     public function getDistrictById($district_id){
         $url = FCPATH.'application/third_party/location/quan_huyen.json';
         $data = file_get_contents($url);
         $data = json_decode($data);
        if(!empty($district_id) && !empty($data)) foreach ($data as $item){
            if($item->code == $district_id) return $item;
        }
        return false;
    }

    private function loadContent($url){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);
        return $data;
    }
}