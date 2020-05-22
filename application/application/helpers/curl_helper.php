<?php 
/**
 * User: linhth
 * Date: 25/03/2019
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('callCURL')) {
	/*
	* hàm curl gọi API
	* url: link API
	* data: data với trường hợp POST
	* type: GET/POST
	*/
	
	function callCURL($url, $data = array(), $type = "GET")
    {
        $time_star = microtime(true);
        $resource = curl_init();
        curl_setopt($resource, CURLOPT_URL, $url);

        if ($type == "POST") {
            curl_setopt($resource, CURLOPT_POST, true);
            curl_setopt($resource, CURLOPT_POSTFIELDS, http_build_query($data));
        }
        curl_setopt($resource, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($resource, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($resource, CURLOPT_HTTPHEADER,
               array('Content-Type:application/json',
                      'KEY:'.KEY_ERP.'')
               );
        $httpcode = curl_getinfo($resource, CURLINFO_HTTP_CODE);
        $result = curl_exec($resource);
        curl_close($resource);
        $time_finish = microtime(true);
        // log_message($url, 'Thời gian thược hiện ' . ($time_finish - $time_star));
        log_message('error',json_encode(array('url'=>$url,'data'=>$data,'code'=>$httpcode,'result'=>$result,'time'=>($time_finish - $time_star))));
        return $result;
    }
}