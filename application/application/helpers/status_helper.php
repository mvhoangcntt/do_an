<?php

if (!function_exists('statusOrder')) {
  function statusOrder($status)
  {
    switch ($status) {
      case 1:
        $title = lang('dangcho');
        break;
      case 2:
        $title = lang('success_order');
        break;
      default:
        $title = lang('cancel');
        break;
    }
    return $title;
  }
}
if (!function_exists('methodPayment')) {
    function methodPayment($type){
      switch ($type){
        case 1:
          $title='COD';
          break;
          case 2:
          $title=lang('chuyenkhoan');
          break;
          case 3:
          $title=lang('tructuyen');
          break;
        default:
          $title='Momo';
          break;
      }
      return $title;
    }
}

if (!function_exists('showFeatured')) {
    function showFeatured($status, $language_code = '')
    {
        return ($status == true) ? '<i data-value="1" class="text-primary fa fa-lg fa-star btnUpdateFeatured" data-lang="' . $language_code . '"></i>' : '<i data-value="0" class="text-primary fa fa-lg fa-star-o btnUpdateFeatured"  data-lang="' . $language_code . '"></i>';
    }
}
if (!function_exists('showStatus')) {
    function showStatus($status)
    {
        $_this =& get_instance();
        switch ($status) {
            case 1:
                $row = '<span class="label label-success" data-value="1" >' . $_this->lang->line('text_status_1') . '</span>';
                break;
            case 2:
                $row = '<span class="label label-default" data-value="2" >' . $_this->lang->line('text_status_2') . '</span>';
                break;
            case 3:
                $row = '<span class="label label-info" data-value="3" >' . $_this->lang->line('text_status_3') . '</span>';
                break;
            default:
                $row = '<span class="label label-danger" data-value="0">' . $_this->lang->line('text_status_0') . '</span>';
                break;
        }
        return $row;
    }
}

if (!function_exists('showSelectStatus')) {
    function showSelectStatus($selected = 1, $status = [0, 1, 2])
    {
        $html = '<label>Trạng thái</label><select class="form-control" name="is_status">';
        foreach ($status as $item) {
            $html .= '<option value="' . $item . '" ' . ($selected == $item ? 'selected' : '') . '>' . lang('text_status_' . $item) . '</option>';
        }


        $html .= '</select>';
        echo $html;
    }
}

if (!function_exists('showLayoutStyles')) {
    function showLayoutStyles($type)
    {
        $_this =& get_instance();
        $index = 0;
        $_this->config->load('cms');
        $layout = $_this->config->item('layout');
        $type = explode('.', $type);
        foreach ($type as $item) {
            if (in_array($item, array_keys($layout))) {
                if (!empty($layout[$item])) {
                    $layout = $layout[$item];
                } else {
                    break;
                }
            } else {
                $layout = [];
            }
        }
        $html = '<label>Layout Style</label><select class="form-control" name="style">';
        foreach ($layout as $key => $item) {
            if (!is_array($item)) {
                $html .= '<option value="' . $key . '" '.($index == 0 ? 'selected' : '').'>' . $item . '</option>';
                $index++;
            } else {
                continue;
            }
        }
        $html .= '</select>';
        echo $html;
    }
}
if (!function_exists('showOrder')) {
    function showOrder($id, $order)
    {
        return '<input class="change_order" data-id="' . $id . '" value="' . $order . '" />';
    }
}
if (!function_exists('showThumbnail')) {
    function showThumbnail($thumbnail)
    {
        return '<a class="fancybox" href="' . getImageThumb($thumbnail) . '"><img class="img-thumbnail" src="' . getImageThumb($thumbnail, 30, 30) . '"></a>';
    }
}
