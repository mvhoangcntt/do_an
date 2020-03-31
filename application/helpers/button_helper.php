<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('button_admin')) {

//    dd($this->session->admin_permission);

    //       if($this->session->admin_permission[$controller]['add'])
    function button_admin($args = array('add', 'delete'))
    {
        $_this =& get_instance();
        $controller = $_this->uri->segment(2);
//        dd($_this->session->userdata->user_id);
        if ($_this->session->userdata['user_id'] == 1) {
            showButtonAdd().showButtonCopy().showButtonDelete();
        } else {
            if (in_array('add', $args)) {
                //dd($args);
                if (isset($_this->session->admin_permission[$controller]['add'])) {

                    showButtonAdd();
                }
            }

            if (in_array('copy', $args)) {
                if (isset($_this->session->admin_permission[$controller]['copy'])) {
                    showButtonCopy();
                }
            }

            if (in_array('delete', $args)) {
                if (isset($_this->session->admin_permission[$controller]['delete'])) {
                    showButtonDelete();
                }
            }


            if (in_array('export', $args)) {
                if (isset($_this->session->admin_permission[$controller]['export'])) {
                    showButtonExport();
                }
            }
        }

    }
}


// button view

if (!function_exists('button_action')) {

    function button_action($id = '', $args = array('edit', 'delete'))
    {
        // dd($args);
        //var_dump($args); die;
        $_this =& get_instance();

        $controller = $_this->uri->segment(2);
        $action='';
        $action .= '<div class="text-center" style="width: 100px">';
        if (in_array('edit', $args)) {
            if (isset($_this->session->admin_permission[$controller]['edit']) || $_this->session->userdata['user_id'] == 1) {

                $action .= '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="' . $_this->lang->line('btn_edit') . '" onclick="edit_form(' . "'" . $id . "'" . ')"><i class="glyphicon glyphicon-pencil"></i></a>';
                //var_dump($action); die;
            }

        }
        if (in_array('delete', $args)) {
            if (isset($_this->session->admin_permission[$controller]['delete']) || $_this->session->userdata['user_id'] == 1) {

                $action .= '&nbsp;<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="' . $_this->lang->line('btn_remove') . '" onclick="delete_item(' . "'" . $id . "'" . ')"><i class="glyphicon glyphicon-trash"></i></a>';
            }

        }
        $action .= '<div>';
        return $action;

    }
}
if(!function_exists('button_action_user_admin')){

    function button_action_user_admin($id = '', $args = array('delete')){
        $_this =& get_instance();

        $controller = $_this->uri->segment(2);
        $action='';
        $action .= '<div class="text-center" style="width: 100px">';
        if (in_array('delete', $args)) {
            if (isset($_this->session->admin_permission[$controller]['delete']) || $_this->session->userdata['user_id'] == 1) {

                if($id == 1){
                    $action .= '&nbsp;<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="' . $_this->lang->line('btn_remove') . '" onclick=""><i class="glyphicon glyphicon-lock"></i></a>';

                }else{
                    $action .= '&nbsp;<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="' . $_this->lang->line('btn_remove') . '" onclick="delete_item(' . "'" . $id . "'" . ')"><i class="glyphicon glyphicon-trash"></i></a>';
                }
            }

        }
        $action .= '<div>';
        return $action;
    }

}
if (!function_exists('showButtonAdd')) {
    function showButtonAdd()
    {
        echo '<button style="margin: 2px" class="btn btn-success" onclick="add_form()">
                <i class="glyphicon glyphicon-plus"></i> Thêm
                </button>';
    }
}
if (!function_exists('showButtonCopy')) {
    function showButtonCopy()
    {
        echo '<button class="btn btn-info" onclick="copy_multiple()">
                   <i class="fa fa-fw fa-copy"></i>  Copy
                 </button>';
    }
}
if (!function_exists('showButtonDelete')) {
    function showButtonDelete()
    {
        echo ' <button  class="btn btn-danger" onclick="delete_multiple()">
                   <i class="glyphicon glyphicon-trash"></i>Delete
                   </button>';
    }
}
if (!function_exists('showButtonExport')) {
    function showButtonExport()
    {
        echo '<button class="btn btn-success" title="' . lang("tooltip_export_excel") . '"
                onclick="window.location.href
                    =' . '&#39;' . site_url("admin/newsletter/export_excel") . '&#39;' . '">
                <i class="glyphicon glyphicon-floppy-save"></i> ' .
    lang("btn_export_excel") . '
            </button>';
    }
}

if(!function_exists('button_action_approve')){

    function button_action_change_approve($id = ''){

        $_this =& get_instance();
        $controller = $_this->uri->segment(2);
        if($_this->session->admin_permission[$controller]['approved']==1 || $_this->session->userdata['user_id']==1){
            return 1;
        }
        else{
            return 0;
        }
    }

}
if(!function_exists('button_action_status')){

  function button_action_status($id = '',$action=''){

    $_this =& get_instance();
    $controller = $_this->uri->segment(2);
    if((!empty($_this->session->admin_permission[$controller][$action]) && $_this->session->admin_permission[$controller][$action]==1) || $_this->session->userdata['user_id']==1){
      return 1;
    }
    else{
      return 0;
    }
  }

}
if(!function_exists('show_select_status')){

    function show_select_status($id = ''){
        $_this =& get_instance();
        $controller = $_this->uri->segment(2);
        if($_this->session->admin_permission[$controller]['add']==1|| $_this->session->userdata['edit']==1){
            ?>
            <div class="form-group">
                <label><?php echo lang('form_status');?></label>
                <select class="form-control" name="is_status">
                    <option value="0"><?php echo lang('text_status_0');?></option>
                    <option value="1" selected><?php echo lang('text_status_1');?></option>
                    <option value="2"><?php echo lang('text_status_2');?></option>
                </select>
            </div>
            <?php
        }else{
            echo '<input type="hidden" value="0" name="is_status" />';
        }
    }

}
if(!function_exists('show_select_adv')){

  function show_select_adv($id = ''){
    $_this =& get_instance();
    $controller = $_this->uri->segment(2);
    if($_this->session->admin_permission[$controller]['approved']==1|| $_this->session->userdata['user_id']==1){
      ?>
      <div class="form-group">
        <label><?php echo lang('form_status');?></label>
        <select class="form-control" name="is_status">
          <option value="1">Đang hoạt động</option>
          <option value="3">Dừng</option>
          <option value="4">Từ chối</option>
        </select>
      </div>
      <?php
    }else{
      echo '<input type="hidden" value="0" name="is_status" />';
    }
  }

}