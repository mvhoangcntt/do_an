<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#tab_general" data-toggle="tab">Custom link</a>
        </li>

        <li>
            <a href="#tab_page" data-toggle="tab"><?=lang('txt_page')?></a>
        </li>
        <?php if(!empty($list_category_type)) foreach ($list_category_type as $k => $catg):?>
            <li>
                <a href="#tab_<?php echo $k ?>" data-toggle="tab"><?php echo lang('cat_'.$catg); ?></a>
            </li>
        <?php endforeach; ?>


    </ul>
    <div id="listDataItem" class="tab-content">
        <div class="tab-pane active" id="tab_general">
            <input type="hidden" value="other" name="type">
            <select class="form-control select2"   style="width: 100%;" tabindex="-1" aria-hidden="true">
                <option value="#">Link ngoài</option>
            </select>
        </div>
        <div class="tab-pane" id="tab_page">
            <input type="hidden" value="page" name="type"   style="width: 100%;" tabindex="-1" aria-hidden="true">
            <select class="form-control select2"   style="width: 100%;" tabindex="-1" aria-hidden="true">
              <option value="/">Trang chủ</option>
              <option value="#">Link khác</option>
                <?php
                if(!empty($list_pages)) foreach ($list_pages as $p):
                    $linkPage = str_replace(base_url(),'',getUrlPage($p));
                    ?>
                    <option value="<?php echo $linkPage; ?>">
                        <?php echo $p->title; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <!-- /.tab-pane -->
        <?php if(!empty($list_category_type)) foreach ($list_category_type as $k => $categ):?>
            <div class="tab-pane" id="tab_<?php echo $k ?>">
                <input type="hidden" value="<?php echo $categ ?>" name="type">
                <select class="form-control select2"  style="width: 100%;" tabindex="-1" aria-hidden="true">
                    <?php
                    if(!empty($list[$categ])) foreach ($list[$categ] as $cat):
                        switch ($categ){
                            case 'business':
                                $linkPage = str_replace(base_url(),'',getUrlCateFields($cat));
                                break;
                                case 'project':
                                $linkPage = str_replace(base_url(),'',getUrlCateProject($cat));
                                break;
                            default:
                                $linkPage = str_replace(base_url(),'',getUrlCateNews($cat));
                        }
                        ?>
                        <option value="<?php echo $linkPage; ?>"><?php echo $cat->title; ?></option>
                    <?php endforeach; ?>
                </select>
                <br/>
            </div>
        <?php endforeach; ?>



        <!-- /.tab-pane -->
      <button type="button" class="btn btn-success addtonavmenu" style="margin-top: 20px"><i class="glyphicon glyphicon-plus"></i> Thêm vào menu</button>

    </div>
    <!-- /.tab-content -->
</div>
<!-- nav-tabs-custom -->
