
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo $this->templates_assets; ?>img/avatar.png" class="img-circle"
                     alt="<?php echo $this->session->user; ?>">
            </div>
            <div class="pull-left info">
                <p><?php echo $this->session->user; ?></p>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menu</li>
            <li>
                <a href="<?php echo BASE_ADMIN_URL ?>">
                    <i class="fa fa-dashboard"></i> <span>Bảng điều khiển</span>
                </a>
            </li>
            <!-- Thành viên-->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Quản lý thành viên</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="<?php echo site_url('admin/groups'); ?>">
                            <i class="fa fa-users"></i> Danh sách nhóm
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/users'); ?>">
                            <i class="fa fa-user"></i> Danh sách thành viên
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/account'); ?>">
                            <i class="fa fa-user"></i> Quản lý khách hàng
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Thành viên-->

            <!-- Nội dung MODULE-->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-newspaper-o"></i> <span>Quản trị nội dung</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">
                    <li>
                        <a href="<?php echo site_url('admin/category/post'); ?>">
                            <i class="fa fa-list-ol"></i> <span>Danh mục tin tức</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('admin/post'); ?>">
                            <i class="fa fa-file-pdf-o"></i> <span>Danh sách tin tức</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('admin/menus'); ?>">
                            <i class="fa fa-bars"></i> <span>Quản lý Menu</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/contact'); ?>">
                            <i class="fa fa-bars"></i> <span>Quản lý liên hệ</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/career'); ?>">
                            <i class="fa fa-bars"></i> <span>Quản lý đơn tuyển dụng</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/newsletter'); ?>">
                            <i class="fa fa-bars"></i> <span>Quản lý newsletter</span>
                        </a>
                    </li>
                    
                </ul>
            </li>
            <!-- nội dung MODULE-->

            <!-- Đa phương tiện-->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-picture-o"></i> <span>Đa phương tiện</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="<?php echo site_url('admin/media'); ?>">
                            <i class="fa fa-image"></i> <span>Quản lý Media</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/property/banner');?>">
                            <i class="fa fa-list-ol"></i> <span>Vị trí banner</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/banner');?>">
                            <i class="fa fa-file-text "></i> <span>Danh sách banner</span>
                        </a>
                    </li>
                </ul>
            </li>
          
            <!-- Giới thiệu -->
            <li>
                <a href="<?php echo site_url('admin/page'); ?>">
                    <i class="fa fa-picture-o"></i> <span>Quản lý page</span>
                </a>
            </li>
          
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-line-chart"></i> <span>Thống kê & Báo cáo</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="">
                        <a href="<?php echo site_url('admin/order');?>">
                            <i class="fa fa-shopping-cart"></i> <span>Quản lý đơn hàng</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Quản lý khóa học -->

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
    <!-- /.sidebar -->
</aside>
