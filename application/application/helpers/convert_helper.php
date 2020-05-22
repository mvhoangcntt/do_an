<?php
/**
 * Created by PhpStorm.
 * User: askeyh3t
 * Date: 3/13/2019
 * Time: 12:03 PM
 */

if (!function_exists('add_redis_convert_video')) {
  function add_redis_convert_video($id)
  {
    $_this =& get_instance();
    $key1 = CONVERT_VIDEO_1;
    $key2 = CONVERT_VIDEO_2;
    $key3 = CONVERT_VIDEO_3;
    $_this->_redis->rPush($key1, $id);
    $_this->_redis->rPush($key2, $id);
    $_this->_redis->rPush($key3, $id);
  }
}