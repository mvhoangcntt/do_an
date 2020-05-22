<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('int_number')) {
    function int_number($number)
    {
        if ((int)$number == $number) $number = $number;
        return $number;
    }
}
if (!function_exists('title_video')) {
    function title_video($index)
    {
        $prefix = lang('lesson');
        return ucfirst($prefix) . " " . ($index + 1) . ": ";
    }
}
if (!function_exists('show_checked')) {
    function show_checked($value1, $value2)
    {
        $checked = '';
        if ($value1 == $value2) $checked = 'checked';
        return $checked;
    }
}
if (!function_exists('show_selected')) {
    function show_selected($value1, $value2)
    {
        $selected = '';
        if (!empty($value1) && $value1 == $value2) $selected = 'selected';
        return $selected;
    }
}
if (!function_exists('getLastKeyArr')) {
    function getLastKeyArr($arr = array())
    {
        $b = array_keys($arr);
        $last = end($b);
        return $last;
    }
}
if (!function_exists('qrcode')) {
    function qrcode($reponse)
    {
        $qrcode = 'https://chart.googleapis.com/chart?chs=175x175&cht=qr&chl=' . $reponse;
        return $qrcode;
    }
}
if (!function_exists('cutString')) {
    function cutString($chuoi,$max,$format='...')
    {
        $length_chuoi = strlen($chuoi);
        if ($length_chuoi <= $max) {
            return $chuoi;
        } else {
            return mb_substr($chuoi, 0, $max, 'UTF-8') . $format;
        }
    }
}
if (!function_exists('remove_duplicate_values_array')){
    function remove_duplicate_values_array($arr_merge){
        $arr_merge = $arr_merge;
        $count_array = count($arr_merge);
        for ($i = 0; $i < $count_array; $i++) {
            if (isset($arr_merge[$i])) {
                for ($j = $i+1; $j < $count_array; $j++) {
                    if (isset($arr_merge[$j])) {
                                    //this is where you do your comparison for dupes
                        if ($arr_merge[$i]->model == $arr_merge[$j]->model) {
                            unset($arr_merge[$j]);
                        }
                    }
                }
            }
        }
        return $arr_merge;
    }
}