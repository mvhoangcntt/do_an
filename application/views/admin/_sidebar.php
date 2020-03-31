<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Trình đơn</li>
            <?php
            $this->session->admin_permission == null ? $permission[] = null : $permission = array_keys($this->session->admin_permission);
            $list_menu = $this->load->get_var('list_menu');
                foreach ($list_menu as $value):
                    if (count($this->system_menu_model->child($value['id'])) || in_array($value['controller'], $permission) || $this->session->admin_group_id == 1):
                        ?>
                        <li class="<?php echo $value['class'] ?>">
                            <?php
                            if (count($value['children'])):
                            ?>
                            <a href="<?php echo $value['href'] ?>">
                                <?php
                                else:
                                ?>
                                <a href="<?php echo BASE_ADMIN_URL . $value['href'] ?>">
                                    <?php

                                    endif;
                                    ?>
                                    <i class="<?php echo $value['icon'] ?>"></i>
                                    <span><?php echo $value['text'] ?></span>
                                    <?php
                                    if (count($value['children'])):
                                        ?>
                                        <span class="pull-right-container"><i
                                                    class="fa fa-angle-left pull-right"></i></span>
                                    <?php
                                    endif;
                                    ?>
                                </a>
                                <?php
                                if (count($value['children'])):
                                    $this->load->view($this->template_path . '_tree_view',array('childs' => $value['children'], 'permission' => $permission));
                                    ?>
                                <?php
                                endif;
                                ?>
                        </li>
                    <?php
                    endif;
                endforeach;
                ?>
            <li class="header">Cài đặt</li>
            <li>
                <a href="<?php echo site_url('admin/setting'); ?>">
                    <i class="fa fa-cogs"></i> <span>Cấu hình chung</span>
                </a>
            </li>

            <li>
                <a href="<?php echo site_url('admin/logaction'); ?>">
                    <i class="fa fa-exclamation-triangle"></i> <span>Logs</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
