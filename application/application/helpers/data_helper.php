<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('getCatById')) {
  function getCatById($cateId)
  {
    $_this =& get_instance();
    $_this->load->model('category_model');
    $catModel = new Category_model();
    $_all_category = $catModel->getAll($_this->session->public_lang_code);
    $data = $catModel->getByIdCached($_all_category, $cateId);
    return $data;
  }
}
if (!function_exists('gender')) {
  function gender($arg)
  {
    switch ($arg) {
      case '1':
        $data = 'Nam';
        break;
      case '2':
        $data = 'Nữ';
        break;
      default:
        $data = 'Khác';
        break;
    }
    return $data;
  }
}

