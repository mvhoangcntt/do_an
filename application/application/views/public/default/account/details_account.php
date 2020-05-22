
<section class="page-news">
    <div class="container">
        <div class="row details">
            <div class="col-lg-12 col-md-6">
                <div class="text-link">
                    <nav>
                        <ol>
                            <a href="<?php echo base_url() ?>"><?php echo str_replace(array('http://','https://'), '', substr(base_url(),0,strlen(base_url())-1)); ?></a>
                            <li><a href="#">Thông tin tài khoản</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-lg-12 col-md-6">
                <div class="total-cart">
                    <div class="name-cart">
                        TÀI KHOẢN CỦA BẠN
                    </div>
                </div>
            </div>
        </div>
        <div class="row box-shadow-account">
            <div class="col-lg-3 col-md-6 border-rigth-account ">
                <div class="div-account-img">
                    <div class="div-custum-img">
                        <div class="div-account-img-w">
                            <img class="icon-account-img" src="http://localhost/do-an/public/images/icon-account.jpg" alt="">
                        </div>
                    </div>
                    <div class="div-name-account">
                        <div class="my-name-account">MV Hoàng</div>
                    </div>
                </div>
                <ul class="nav nav-tabs flex-column">
                    <li class="no-active account-list-active"><a data-toggle="tab" onclick="form_get_user()" href="#home" >Thông tin tài khoản</a></li>
                    <li class="no-active"><a data-toggle="tab" href="#thay_doi_mat_khau">Thay đổi mật khẩu</a></li>
                    <li class="no-active"><a data-toggle="tab" onclick="form_get_diachi()" href="#menu1">Địa chỉ nhận hàng</a></li>
                    <li class="no-active"><a data-toggle="tab" href="#menu2" class="">Đơn hàng</a></li>
                    <li class="no-active"><a data-toggle="tab" href="#settings" onclick="_get_user()" class="">Cài đặt</a></li>
                </ul>
            </div>
            <div class="col-lg-9 col-md-6">
                <div class="tab-content tab-content-remove">
                    <div id="home" class="tab-pane fade in active show">
                        <div class="about-account">
                            <div class="information-account">Thông tin tài khoản</div>
                            <div class="row">
                                <div class="col-lg-2 col-md-6">
                                <?php  //var_dump($user); exit; ?>
                                </div>
                                <div class="col-lg-8 col-md-6">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-6">
                                            <div class="avatar-account">
                                                <div class="img-avatar">
                                                    <img src="<?php echo base_url() ?>public/images/icon-account.jpg" title="Hoàng">
                                                    <button>Thay đổi</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="container">
                                            <form class="" id="form_user_update">
                                                <div class="form-group">
                                                    <label for="email1" id="verified_email"></label>
                                                    <input type="email" class="form-control" id="email1" placeholder="Enter email" name="email" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone1">Số điện thoại:</label>
                                                    <input type="number" class="form-control" id="phone1" placeholder="Enter phone" name="phone">
                                                </div>
                                                <div class="form-group">
                                                    <label for="full-name1">Họ và tên:</label>
                                                    <input type="text" class="form-control" id="full-name1" placeholder="Enter full-name" name="full_name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="gender">Giới tính:</label>
                                                    <div class="radio">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="gender" value="1"> Nam 
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="gender" value="2"> Nữ
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="gender" value="3"> Giới tính khác
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="birthday1">Ngày sinh:</label>
                                                    <input type="date" class="form-control" id="birthday1" placeholder="01/01/2000" name="birthday">
                                                </div>
                                                <div class="center-button">
                                                    <button type="button" onclick="user_update()" id="_user_update" class="btn btn-primary submit">Cập nhật</button>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <div class="about-account">
                            <div class="information-account">Địa chỉ nhận hàng</div>
                            <div class="row">
                                <div class="col-lg-2 col-md-6">
                                
                                </div>
                                <div class="col-lg-8 col-md-6">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-6">
                                            <div class="address-details-text">
                                                <div class="information-edit-address">
                                                    <div class="name-edit-address">
                                                        <?php echo $this->session->userdata['account']['full_name']; ?>
                                                    </div>
                                                    <div class="icon-edit-address">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                                <div class="text-address-go">
                                                    <div class="content_address">
                                                        <!-- Xóm Héo cũ - Xã Phượng Tiến - Huyện Định Hóa - Thái Nguyên -->
                                                    </div>
                                                    <div class="content_phone">
                                                        <!-- Điện thoại: 0379749836 -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row fa-pencil-square-o_hide">
                                        <div class="container">
                                            <form class="" id="form_address_update">
                                                <input type="hidden" name="msg" value="1">
                                                <div class="form-group">
                                                    <label for="address1">Địa chỉ:</label>
                                                    <input type="text" class="form-control" id="address1" placeholder="Nhập địa chỉ" name="address">
                                                </div>
                                                <style type="text/css">
                                                    .select2-container--default .select2-selection--single{
                                                        height: 38px;
                                                        border: 1px solid #ced4da;
                                                    }
                                                    .select2-container--default .select2-selection--single .select2-selection__placeholder{
                                                        /* line-height: 40px; */
                                                    }    
                                                    .select2-container--default .select2-selection--single .select2-selection__rendered{
                                                        border-radius: 0;
                                                        padding: 4px 12px;
                                                    }
                                                    .select2-container--default .select2-selection--single .select2-selection__arrow{
                                                        height: 38px;
                                                    }

                                                </style>
                                                <div class="form-group tinhthanh">
                                                    <label for="tinhthanh">Tỉnh / Thành:</label>
                                                    <select class="form-control select2 filter_tinhthanh1" title="filter" name="tinhthanh" style="width: 100%;" tabindex="-1" aria-hidden="true"></select>
                                                </div>
                                                <div class="form-group quanhuyen">
                                                    <label for="quanhuyen">Quận / Huyện:</label>
                                                    <select class="form-control select2 filter_quanhuyen1" title="filter" name="quanhuyen" style="width: 100%;" tabindex="-1" aria-hidden="true"></select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="xaphuong">Xã / Phường:</label>
                                                    <select class="form-control select2 filter_xaphuong1" title="filter" name="xaphuong" style="width: 100%;" tabindex="-1" aria-hidden="true"></select>
                                                </div>
                                                
                                                <div class="center-button">
                                                    <button type="button" onclick="address_update()" id="_address_update" class="btn btn-primary submit">Cập nhật</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="thay_doi_mat_khau" class="tab-pane fade">
                        <div class="about-account">
                            <div class="information-account">Thay đổi mật khẩu</div>
                            <div class="row">
                                <div class="col-lg-2 col-md-6">
                                
                                </div>
                                <div class="col-lg-8 col-md-6">
                                    <div class="row">
                                        <div class="container">
                                            <form class="doimatkhau" method="POST" id="doimatkhau">
                                                <div class="form-group">
                                                    <label for="matkhaucu">Nhập nhật khẩu cũ</label>
                                                    <input type="password" name="pass_old" class="form-control" id="matkhaucu" placeholder="Nhạp mật khẩu cũ">
                                                </div>
                                                <div class="form-group">
                                                    <label for="matkhaumoi">Nhập mật khẩu mới</label>
                                                    <input type="password" name="password" class="form-control" id="matkhaumoi" placeholder="Nhập mật khẩu mới">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nhaplaimatkhau">Nhập lại mật khẩu</label>
                                                    <input type="password" name="pass" class="form-control" id="nhaplaimatkhau" placeholder="Nhập lại mật khẩu">
                                                </div>
                                                <div class="form-button-submit">
                                                    <button type="button" id="doimk" onclick="doimatkhau()" class="btn btn-primary submit">Đổi mật khẩu</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="settings" class="tab-pane fade">
                        <div class="about-account">
                            <div class="information-account">Cài đặt hiển thị</div>
                            <div class="row">
                                <div class="col-lg-2 col-md-6">
                                <?php  //var_dump($user); exit; ?>
                                </div>
                                <div class="col-lg-8 col-md-6">
                                    <form id="form_setting_">
                                        <div class="row">
                                            <div class="form-group">
                                                <input type="radio" name="settings" value="0" checked="checked"> Mặc định
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <input type="radio" name="settings" value="1"> Ẩn tên
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <input type="radio" name="settings" value="2"> Ẩn giảm giá
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <input type="radio" name="settings" value="3"> Ẩn cả tên và giảm giá
                                            </div>
                                        </div>
                                        <div class="center-button">
                                            <button type="button" onclick="user_setting()" id="_user_setting" class="btn btn-primary submit">Cập nhật</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-2 col-md-6">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <div class="about-account donhang">
                            <div class="information-account">Quản lý đơn hàng</div>
                            <div class="row">
                                <div class="col-lg-12 col-md-6">
                                    <ul class="nav nav-tabs list">
                                        <li><a data-toggle="tab" href="#choxacnhan" class="active show">Chờ sử lý</a></li>
                                        <li><a data-toggle="tab" href="#daxacnhan">Đã xác nhận</a></li>
                                        <li><a data-toggle="tab" href="#dangvanchuyen">Đang vận chuyển</a></li>
                                        <li><a data-toggle="tab" href="#dagiaohang">Hoàn tất</a></li>
                                        <li><a data-toggle="tab" href="#dahuy">Đã hủy</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-6">
                                    <div class="tab-content">
                                        <div id="choxacnhan" class="tab-pane fade in active show">
                                            <?php foreach ($chosuly as $news_item): ?>
                                            <div class="flex-order-item">
                                                <div>
                                                    <div>
                                                        <ul class="nav nav-tabs">
                                                            <li>
                                                                Mã đơn hàng <a data-toggle="tab" href="#details-order" style="border-bottom: 0rem solid #e5101d!important;" class="details-show active show" id="<?php echo $news_item->id; ?>">#<?php echo $news_item->id; ?> | Chi Tiết</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div>Ngày đặt : <?php echo $news_item->created_time; ?></div>
                                                </div>
                                                <div>
                                                    <div>Người nhận</div>
                                                    <div><?php echo $news_item->full_name; ?></div>
                                                </div>
                                                <div>
                                                    <div>Tổng tiền</div>
                                                    <div><?php echo number_format($news_item->amount_total); ?> vnđ</div>
                                                </div>
                                            </div>
                                            <div class="">
                                                <?php $i = 0; foreach ($news_item->data as $item): $i++; ?>
                                                <div class="row flex-order-item-product">
                                                    <div class="col-lg-8 col-md-6">
                                                        <div class="flex-order-item-product-img">
                                                            <div class="order-item-product-img">
                                                                <img src="<?php echo base_url('public/media/'.$item->thumbnail); ?>" alt="">
                                                            </div>
                                                            <div class="order-item-product-text">
                                                                <div>
                                                                    <?php echo $item->title; ?>
                                                                </div>
                                                                <div><?php echo number_format($item->amount); ?> vnđ</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 flex-order-item-product">
                                                    <div>
                                                        <div>Màu sắc</div>
                                                        <div><?php echo 'Màu '.$item->text_coler.' size '.$item->text_size; ?></div>
                                                    </div>
                                                    <div> 
                                                        <div>Số lượng</div>
                                                        <div><?php echo $item->quantity; ?></div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <?php if ($i < count($news_item->data)): ?>
                                                    <div class="bottom-dotted"></div>
                                                <?php endif ?>
                                                <?php endforeach; ?>
                                                
                                                
                                            </div>
                                            <?php endforeach; ?> 
                                        </div>
                                        <div id="daxacnhan" class="tab-pane fade">
                                            <?php foreach ($daxacnhan as $news_item): ?>
                                            <div class="flex-order-item">
                                                <div>
                                                    <div>
                                                        <ul class="nav nav-tabs">
                                                            <li>
                                                                Mã đơn hàng <a data-toggle="tab" href="#details-order" style="border-bottom: 0rem solid #e5101d!important;" class="details-show active show" id="<?php echo $news_item->id; ?>">#<?php echo $news_item->id; ?> | Chi Tiết</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div>Ngày đặt : <?php echo $news_item->created_time; ?></div>
                                                </div>
                                                <div>
                                                    <div>Người nhận</div>
                                                    <div><?php echo $news_item->full_name; ?></div>
                                                </div>
                                                <div>
                                                    <div>Tổng tiền</div>
                                                    <div><?php echo number_format($news_item->amount_total); ?> vnđ</div>
                                                </div>
                                            </div>
                                            <div class="">
                                                <?php $i = 0; foreach ($news_item->data as $item): $i++; ?>
                                                <div class="row flex-order-item-product">
                                                    <div class="col-lg-8 col-md-6">
                                                        <div class="flex-order-item-product-img">
                                                            <div class="order-item-product-img">
                                                                <img src="<?php echo base_url('public/media/'.$item->thumbnail); ?>" alt="">
                                                            </div>
                                                            <div class="order-item-product-text">
                                                                <div>
                                                                    <?php echo $item->title; ?>
                                                                </div>
                                                                <div><?php echo number_format($item->amount); ?> vnđ</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 flex-order-item-product">
                                                    <div>
                                                        <div>Màu sắc</div>
                                                        <div><?php echo 'Màu '.$item->text_coler.' size '.$item->text_size; ?></div>
                                                    </div>
                                                    <div> 
                                                        <div>Số lượng</div>
                                                        <div><?php echo $item->quantity; ?></div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <?php if ($i < count($news_item->data)): ?>
                                                    <div class="bottom-dotted"></div>
                                                <?php endif ?>
                                                <?php endforeach; ?>
                                                
                                                
                                            </div>
                                            <?php endforeach; ?> 
                                            
                                        </div>
                                        <div id="dangvanchuyen" class="tab-pane fade">
                                            <?php foreach ($dangvanchuyen as $news_item): ?>
                                            <div class="flex-order-item">
                                                <div>
                                                    <div>
                                                        <ul class="nav nav-tabs">
                                                            <li>
                                                                Mã đơn hàng <a data-toggle="tab" href="#details-order" style="border-bottom: 0rem solid #e5101d!important;" class="details-show active show" id="<?php echo $news_item->id; ?>">#<?php echo $news_item->id; ?> | Chi Tiết</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div>Ngày đặt : <?php echo $news_item->created_time; ?></div>
                                                </div>
                                                <div>
                                                    <div>Người nhận</div>
                                                    <div><?php echo $news_item->full_name; ?></div>
                                                </div>
                                                <div>
                                                    <div>Tổng tiền</div>
                                                    <div><?php echo number_format($news_item->amount_total); ?> vnđ</div>
                                                </div>
                                            </div>
                                            <div class="">
                                                <?php $i = 0; foreach ($news_item->data as $item): $i++; ?>
                                                <div class="row flex-order-item-product">
                                                    <div class="col-lg-8 col-md-6">
                                                        <div class="flex-order-item-product-img">
                                                            <div class="order-item-product-img">
                                                                <img src="<?php echo base_url('public/media/'.$item->thumbnail); ?>" alt="">
                                                            </div>
                                                            <div class="order-item-product-text">
                                                                <div>
                                                                    <?php echo $item->title; ?>
                                                                </div>
                                                                <div><?php echo number_format($item->amount); ?> vnđ</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 flex-order-item-product">
                                                    <div>
                                                        <div>Màu sắc</div>
                                                        <div><?php echo 'Màu '.$item->text_coler.' size '.$item->text_size; ?></div>
                                                    </div>
                                                    <div> 
                                                        <div>Số lượng</div>
                                                        <div><?php echo $item->quantity; ?></div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <?php if ($i < count($news_item->data)): ?>
                                                    <div class="bottom-dotted"></div>
                                                <?php endif ?>
                                                <?php endforeach; ?>
                                                
                                                
                                            </div>
                                            <?php endforeach; ?> 
                                        </div>
                                        <div id="dagiaohang" class="tab-pane fade">
                                            <?php foreach ($hoantat as $news_item): ?>
                                            <div class="flex-order-item">
                                                <div>
                                                    <div>
                                                        <ul class="nav nav-tabs">
                                                            <li>
                                                                Mã đơn hàng <a data-toggle="tab" href="#details-order" style="border-bottom: 0rem solid #e5101d!important;" class="details-show active show" id="<?php echo $news_item->id; ?>">#<?php echo $news_item->id; ?> | Chi Tiết</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div>Ngày đặt : <?php echo $news_item->created_time; ?></div>
                                                </div>
                                                <div>
                                                    <div>Người nhận</div>
                                                    <div><?php echo $news_item->full_name; ?></div>
                                                </div>
                                                <div>
                                                    <div>Tổng tiền</div>
                                                    <div><?php echo number_format($news_item->amount_total); ?> vnđ</div>
                                                </div>
                                            </div>
                                            <div class="">
                                                <?php $i = 0; foreach ($news_item->data as $item): $i++; ?>
                                                <div class="row flex-order-item-product">
                                                    <div class="col-lg-8 col-md-6">
                                                        <div class="flex-order-item-product-img">
                                                            <div class="order-item-product-img">
                                                                <img src="<?php echo base_url('public/media/'.$item->thumbnail); ?>" alt="">
                                                            </div>
                                                            <div class="order-item-product-text">
                                                                <div>
                                                                    <?php echo $item->title; ?>
                                                                </div>
                                                                <div><?php echo number_format($item->amount); ?> vnđ</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 flex-order-item-product">
                                                    <div>
                                                        <div>Màu sắc</div>
                                                        <div><?php echo 'Màu '.$item->text_coler.' size '.$item->text_size; ?></div>
                                                    </div>
                                                    <div> 
                                                        <div>Số lượng</div>
                                                        <div><?php echo $item->quantity; ?></div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <?php if ($i < count($news_item->data)): ?>
                                                    <div class="bottom-dotted"></div>
                                                <?php endif ?>
                                                <?php endforeach; ?>
                                                
                                                
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <div id="dahuy" class="tab-pane fade">
                                            <?php foreach ($dahuy as $news_item): ?>
                                            <div class="flex-order-item">
                                                <div>
                                                    <div>
                                                        <ul class="nav nav-tabs">
                                                            <li>
                                                                Mã đơn hàng <a data-toggle="tab" href="#details-order" style="border-bottom: 0rem solid #e5101d!important;" class="details-show active show" id="<?php echo $news_item->id; ?>">#<?php echo $news_item->id; ?> | Chi Tiết</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div>Ngày đặt : <?php echo $news_item->created_time; ?></div>
                                                </div>
                                                <div>
                                                    <div>Người nhận</div>
                                                    <div><?php echo $news_item->full_name; ?></div>
                                                </div>
                                                <div>
                                                    <div>Tổng tiền</div>
                                                    <div><?php echo number_format($news_item->amount_total); ?> vnđ</div>
                                                </div>
                                            </div>
                                            <div class="">
                                                <?php $i = 0; foreach ($news_item->data as $item): $i++; ?>
                                                <div class="row flex-order-item-product">
                                                    <div class="col-lg-8 col-md-6">
                                                        <div class="flex-order-item-product-img">
                                                            <div class="order-item-product-img">
                                                                <img src="<?php echo base_url('public/media/'.$item->thumbnail); ?>" alt="">
                                                            </div>
                                                            <div class="order-item-product-text">
                                                                <div>
                                                                    <?php echo $item->title; ?>
                                                                </div>
                                                                <div><?php echo number_format($item->amount); ?> vnđ</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 flex-order-item-product">
                                                    <div>
                                                        <div>Màu sắc</div>
                                                        <div><?php echo 'Màu '.$item->text_coler.' size '.$item->text_size; ?></div>
                                                    </div>
                                                    <div> 
                                                        <div>Số lượng</div>
                                                        <div><?php echo $item->quantity; ?></div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <?php if ($i < count($news_item->data)): ?>
                                                    <div class="bottom-dotted"></div>
                                                <?php endif ?>
                                                <?php endforeach; ?>
                                                
                                                
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div id="details-order" class="tab-pane fade ">
                        <div class="about-account details-iframe">
                            <div class="information-account">Chi tiết đơn hàng</div>
                            
                            <div class="row margin-top">
                                <div class="col-lg-4 col-md-6 margin-bottom">
                                    <div class="">
                                        <div class="madonhang">
                                            Mã đơn hàng : #123456
                                        </div>
                                        <div class="created_time_">
                                            Đặt hàng : 11/11/2019
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-6 margin-bottom">
                                    <div class="flex-trangthai">
                                        <div class="icon-trangthai">
                                            <div><i class="fa fa-refresh" aria-hidden="true"></i></div>
                                            <div>Chờ xác nhận</div>
                                            <div class="checked-icon">
                                                <!-- <i class="fa fa-check-circle-o" aria-hidden="true"></i> -->
                                            </div>
                                        </div>
                                        <div class="icon-trangthai">
                                            <div><i class="fa fa-check-square-o" aria-hidden="true"></i></div>
                                            <div>Đã xác nhận</div>
                                            <div class="checked-icon">
                                                <!-- <i class="fa fa-check-circle-o" aria-hidden="true"></i> -->
                                            </div>
                                        </div>
                                        <div class="icon-trangthai">
                                            <div><i class="fa fa-car" aria-hidden="true"></i></div>
                                            <div>Đang vận chuyển</div>
                                            <div class="checked-icon">
                                                <!-- <i class="fa fa-check-circle-o" aria-hidden="true"></i> -->
                                            </div>
                                        </div>
                                        <div class="icon-trangthai">
                                            <div><i class="fa fa-check-circle-o" aria-hidden="true"></i></div>
                                            <div>Hoàn tất</div>
                                            <div class="checked-icon">
                                                <!-- <i class="fa fa-check-circle-o" aria-hidden="true"></i> -->
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="bottom-solid"></div>
                            </div>
                            <div class="row margin-top">
                                <div class="col-lg-6 col-md-6 margin-bottom">
                                    <div class="border-rigth-account">
                                        <div class="div-flex">
                                            <div class="number-trangthai">
                                                4
                                            </div>
                                            <div class="text-trangthai">
                                                Đã giao hàng
                                            </div>
                                            <!-- <div class="time-trangthai">
                                                22:00
                                            </div> -->
                                            <div class="date-trangthai">
                                                11/04/2020
                                            </div>
                                        </div>
                                        <div class="div-flex">
                                            <div class="number-trangthai">
                                                3
                                            </div>
                                            <div class="text-trangthai">
                                                Đơn hàng đang được vận chuyển
                                            </div>
                                            <!-- <div class="time-trangthai">
                                                22:00
                                            </div> -->
                                            <div class="date-trangthai">
                                                11/04/2020
                                            </div>
                                        </div>
                                        <div class="div-flex">
                                            <div class="number-trangthai">
                                                2
                                            </div>
                                            <div class="text-trangthai">
                                                Đã xác nhận đơn hàng
                                            </div>
                                            <!-- <div class="time-trangthai">
                                                22:00
                                            </div> -->
                                            <div class="date-trangthai">
                                                11/04/2020
                                            </div>
                                        </div>
                                        <div class="div-flex">
                                            <div class="number-trangthai number-trangthai-check">
                                                1
                                            </div>
                                            <div class="text-trangthai">
                                                Đơn hàng đã được tạo
                                            </div>
                                            <!-- <div class="time-trangthai">
                                                22:00
                                            </div> -->
                                            <div class="date-trangthai">
                                                11/04/2020
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 margin-bottom">
                                    <div class="margin-top">
                                        <div class="">
                                            THÔNG TIN NHẬN HÀNG
                                        </div>
                                        <div>
                                            <div class="delivery-address-details">
                                                <div class="delivery-address-details-item">
                                                    <div class="full_name_add">MV Hoàng</div>
                                                    <div class="phone-user">0379749836</div>
                                                </div>
                                                <div class="diachi-chitiet"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bottom-solid"></div>
                            </div>
                            <div class="row margin-top margin-top">
                                <div class="col-lg-12 col-md-6 margin-bottom add_item_cart_">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-6">
                                            <div class="flex-bye">
                                                <div>Hình thức thanh toán : </div>
                                                <div class="thanhtoan hinhthucthanhtoan">Thanh toán tận nơi</div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <div class="row margin-top">
                                <div class="col-lg-12 col-md-6 margin-bottom">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-6 position-re">
                                            <div class="tt-thanhtoan">
                                                <div class="tt-thanhtoan-icon-phone">
                                                    <i class="fa fa-phone-square" aria-hidden="true"></i>   
                                                </div>
                                                <div class="tt-thanhtoan-phone-number">
                                                    <?php echo $this->settings['contact'][$this->session->public_lang_code]['phone']; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-6">
                                            <div class="money-order">
                                                <div class="money-order-item">Tổng tiền hàng</div>
                                                <div class="money-order-item-coler money-order-item-coler_tt">150.000đ</div>
                                            </div>
                                            <div class="money-order">
                                                <div class="money-order-item">Phí vận chuyển</div>
                                                <div class="money-order-item-coler money-order-item-coler_fee">150.000đ</div>
                                            </div>
                                            <div class="money-order">
                                                <div class="money-order-item">Giảm giá</div>
                                                <div class="money-order-item-coler money-order-item-coler_code">11</div>
                                            </div>
                                            <div class="money-order">
                                                <div class="money-order-item">Tổng tiền thanh toán</div>
                                                <div class="money-order-item-coler money-order-item-coler_all">150.000đ</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="row"> -->
                                <!-- <div class="col-lg-12 col-md-6"> -->
                                    <!-- <div class="iframe-details-show"> -->
                                        <!-- <iframe id="iframe-details" src="http://localhost/do-an/details/details"></iframe> -->
                                    <!-- </div> -->
                                <!-- </div> -->
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row list-product-form-detais">
            <div class="col-lg-12 col-md-6"><div class="row"><div class="tieude"><div class="tieude_"><div class="_left">Có thể bạn quan tâm</div><div class="_right"><a href="<?php echo base_url('seemore/search/giamgia'); ?>">Xem Thêm</a><i class="fa fa-caret-right" aria-hidden="true"></i></div></div></div></div></div>
            <div class="col-lg-12 col-md-6">
                <div class="list-news">
                    <div class="row">
                        <?php foreach ($giamgia as $news_item): ?>
                            <div class="col-lg-2 col-md-4 col-6">
                                <div class="item-news">
                                    <a href="<?php echo $news_item->url; ?>" title="<?php echo $news_item->title; ?>" class="img"><img src="<?php echo base_url('public/media/'.$news_item->thumbnail); ?>" alt="<?php echo $news_item->title; ?>"></a>
                                    <div class="ct">
                                        <a href="<?php echo $news_item->url; ?>" title="<?php echo $news_item->title; ?>">
                                            <span class="time">
                                                <?php echo $news_item->title; ?>
                                            </span>
                                            <div class="discount-pt">
                                                <div class="discount-pt-text-decoration"><?php echo number_format($total = $news_item->price + $news_item->discount); ?> đ </div>
                                                <div> - <?php echo round(($news_item->discount/$total)*100,1); ?>%</div>
                                            </div>
                                        </a>
                                        <h3 class="title"><a href="<?php echo $news_item->url; ?>" title="<?php echo $news_item->title; ?>"><?php echo number_format($news_item->price)?> đ</a></h3>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="screen_avatar_hide"></div>
<div class="hide_avatar" id="hide_avatar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-6">
                <h2 class="h2-avartar">Chọn hình đại diện</h2>
            </div>
        </div>
        <div class="row cart-bottom">
            <div class="col-lg-12 col-md-6">
                <form id="avatar_post" accept-charset="utf-8" enctype="multipart/form-data" autocomplete="off">
                    <div>
                        <input name="avatar" id="input-file"  type="file" style="display: none;">
                        <label for="input-file" class="icon-avatar_label">
                            <i class="fa fa-picture-o icon-avatar_" aria-hidden="true"></i>
                            <div class="avatar-account icon-avatar_show">
                                <div>
                                    <img src="http://localhost/do-an/public/images/icon-account.jpg" id="blah" title="Hoàng">
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="form-button-submit margin-top-20">
                        <button type="button" onclick="change_avatar()" id="avatar_btn" class="btn btn-primary submit">Thay đổi</button>
                        <input type="button" class="btn btn-primary cancel-avatar" value="Hủy bỏ">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

