<header>
    <div class="container">
        <div class="wrap-header">
            <div class="icon-header-show">
                <a href="<?php echo base_url() ?>" title="" class="logo"><!-- <img src="<?php echo base_url() ?>public/images/logo.png" alt=""> -->Hoàn Tuyết</a>
                <div>
                    <!-- <a href="<?php echo base_url() ?>home" title=""> -->
                        <i class="fa fa-bars iconmenu" aria-hidden="true"></i>
                    <!-- </a> -->
                </div>
            </div>
            <div class="show_menu">
                <div class="s_menu">
                    <?php //echo topNavBar('','',''); ?>
                    <ul>
                        <li>
                            <div class=""></i><a href="">Áo sơ mi</a></div>
                            <ul>
                                <li>
                                    <div><a href="">Áo len</a></div>
                                    <ul>
                                        <li><div><a href="">Áo len</a></div>
                                            <ul>
                                                <li><div><a href="">Áo len</a></div></li>
                                                <li><div><a href="">Áo len</a></div></li>
                                            </ul>
                                        </li>
                                        <li><div><a href="">Áo len</a></div></li>
                                    </ul>
                                </li>
                                <li><div><a href="">Áo len</a></div></li>
                            </ul>
                        </li>
                        <li>
                            <div><a href="">Quần jin</a></div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="header-right">
                <nav class="d-nav">
                    <?php //echo topNavBar('','',''); ?>
                    <ul>
                        <li><form>    
                            <div class="header-search">
                                <div><input class="ip_search" type="text" name="search" placeholder="Tìm kiếm sản phẩm !"></div>
                                <div><button type="submit" class="_search"><i class="icon_search"></i> Tìm kiếm</button></div>
                                <div><button type="submit" class="_search2"><i class="icon_search"></i></button></div>
                            </div>
                            </form>
                        </li>
                        <li><a class="smooth _contact" href="<?php echo base_url() ?>contact/" title="">Liên hệ</a></li>
                        <!-- <li><a class="smooth" href="<?php echo base_url() ?>about/" title="">Kiểm tra đơn hàng</a></li> -->
                        <?php if (!isset($this->session->userdata['account']['account_identity'])) { ?>
                            <li id="login"><a class="smooth login" href="#login" title="Đăng nhập">Đăng nhập</a>
                            </li>
                        <?php }else{ ?>
                            <li id="login">
                                <a class="smooth logout" onclick="click_account()" href="#logout" title="<?php echo $this->session->userdata['account']['full_name']; ?>"><?php echo $this->session->userdata['account']['full_name']; ?></a>
                                <div class="user_header">
                                    <div>
                                        <a href="<?php echo base_url() ?>account/"><i class="fa fa-user-circle-o" aria-hidden="true"></i>Thông tin tài khoản</a>
                                    </div>
                                    <div>
                                        <a class="smooth logout" onclick="click_logout()" href="#out" title="Đăng xuất"><i class="fa fa-sign-out" aria-hidden="true"></i>Đăng xuất</a>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                        <li>
                            <div class="viewed">
                                <div>
                                    <a id="a-viewed" href="">
                                        <img class="img-viewed" width="32px" height="32px" src="<?php echo base_url() ?>public/images/img1.jpg" alt="ĐẦM HỌA TIẾT HOA VÀNG GUMAC MS129107_VANG">
                                    </a>
                                </div>
                                <div>
                                    <a id="a-viewed" href="">
                                        <img class="img-viewed" width="32px" height="32px" src="<?php echo base_url() ?>public/images/img1.jpg" alt="Váy xinh đón tết [Được xem hàng]">
                                    </a>
                                </div>
                                <div>
                                    <a id="a-viewed" href="#">
                                        <img class="img-viewed" width="32px" height="32px" src="<?php echo base_url() ?>public/images/img1.jpg" alt="Váy xinh đón tết [Được xem hàng]">
                                    </a>
                                </div>
                                <div><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                <div class="list_viewed">
                                    
                                    


                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
                
                <div class="header-crt">
                    <a href="" title="" class="header-lang"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                    <div class="number">4</div>
                </div>
                <div class="icon-menu open-mnav">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            
        </div>
    </div>
</header>

<div class="screen_hide"></div>
<div class="hide-viewed">
    <iframe data-src="<?php echo base_url() ?>home/viewed" width = "100%" height = "100%" scrolling="no" frameborder="0" src="<?php echo base_url() ?>home/viewed"></iframe>
</div>
<div class="screen_login-hide"></div>
<div class="hide-login" id="hide-login">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-6">
                <h2>Đăng nhập</h2>
            </div>
        </div>
        <div class="row cart-bottom">
            <div class="col-lg-12 col-md-6">
                <?php //if (!isset($this->session->userdata['account']['account_identity'])) { ?>
                <form method="POST" id="formDangnhap" class="dangnhap">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nhập địa chỉ Email đăng ký</label>
                        <input type="email" class="form-control" name="email" id="Email1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password" id="Password1" placeholder="Password">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="check" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Nhớ mật khẩu</label>
                    </div>
                    <div class="form-button-submit">
                        <button type="submit" id="btndangnhap" onclick="dangnhap()" class="btn btn-primary submit">Đăng nhập</button>
                        <input type="button" class="btn btn-primary cancel" value="Hủy bỏ">
                    </div>
                </form>
                <?php //} ?>
                <?php //if (!isset($this->session->userdata['account']['account_identity'])) { ?>
                <form method="POST" class="dangky" id="formdangky">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="email">Nhập địa chỉ Email đăng ký</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="phone">Số điện thoại:</label>
                                <input type="number" class="form-control" id="phone" placeholder="Enter phone" name="phone">
                            </div>
                            <div class="form-group">
                                <label for="full-name">Họ và tên:</label>
                                <input type="text" class="form-control" id="full-name" placeholder="Enter full-name" name="full_name">
                            </div>
                            <div class="form-group">
                                <label for="birthday">Ngày sinh:</label>
                                <input type="date" class="form-control" id="birthday" placeholder="01/01/2000" name="birthday">
                            </div>
                            <div class="form-group">
                                <label for="address">Địa chỉ:</label>
                                <input type="text" class="form-control" id="address" placeholder="Nhập địa chỉ" name="address">
                            </div>
                            <div class="form-group">
                                <label for="full-name">Giới tính:</label>
                                <div class="radio">
                                    <label class="radio-inline">
                                        <input type="radio" name="gender" value="1" checked> Nam 
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="gender" value="2"> Nữ
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="gender" value="3"> Giới tính Khác
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
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
                                <label for="password">Mật khẩu:</label>
                                <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu" name="password">
                            </div>
                            <div class="form-group">
                                <label for="re-password">Nhập lại mật khẩu:</label>
                                <input type="password" class="form-control" id="re-password" placeholder="Nhập lại mật khẩu" name="re-password">
                            </div>
                            <div class="form-group tinhthanh">
                                <label for="tinhthanh">Tỉnh / Thành:</label>
                                <select class="form-control select2 filter_tinhthanh" title="filter" name="tinhthanh" style="width: 100%;" tabindex="-1" aria-hidden="true"></select>
                            </div>
                            <div class="form-group quanhuyen">
                                <label for="quanhuyen">Quận / Huyện:</label>
                                <select class="form-control select2 filter_quanhuyen" title="filter" name="quanhuyen" style="width: 100%;" tabindex="-1" aria-hidden="true"></select>
                            </div>
                            <div class="form-group">
                                <label for="xaphuong">Xã / Phường:</label>
                                <select class="form-control select2 filter_xaphuong" title="filter" name="xaphuong" style="width: 100%;" tabindex="-1" aria-hidden="true"></select>
                            </div>
                        </div>
                    </div>
                    <div class="form-button-submit">
                        <button type="submit" id="btndangky" onclick="dangky()" class="btn btn-primary submit">Đăng Ký</button>
                        <input type="button" class="btn btn-primary cancel" value="Hủy bỏ">
                    </div>
                    
                </form>
                <?php //} ?>
                <?php //if (!isset($this->session->userdata['account']['account_identity'])) { ?>
                <form class="quenmatkhau" method="POST" id="forgotPassword">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nhập địa chỉ Email đăng ký</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <!-- <small id="emailHelp" class="form-text text-muted">Hệ thống sẽ gửi mật khẩu mới về email của bạn.</small> -->
                    </div>
                    <div class="form-button-submit">
                        <button type="submit" id="quenmatkhau" onclick="forgot()" class="btn btn-primary submit">Nhận mật khẩu mới</button>
                        <input type="button" class="btn btn-primary cancel" value="Hủy bỏ">
                    </div>
                </form>
                <?php //} ?>

                <div class="form-button">
                    <?php //if (!isset($this->session->userdata['account']['account_identity'])) { ?>
                    <div class="div-quenmatkhau"><a href="#quenmatkhau">Quên mật khẩu</a></div>
                    <?php //} ?>
                    <?php //if (!isset($this->session->userdata['account']['account_identity'])) { ?>
                    <div class="div-dangky"><a href="#dangky">Đăng ký</a></div>
                    <?php //} ?>
                    <?php //if (!isset($this->session->userdata['account']['account_identity'])) { ?>
                    <div class="div-dangnhap"><a href="#dangnhap">Đăng nhập</a></div>
                    <?php //} ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
if (isset($_GET['login'])=='error') {
   echo "<script type='text/javascript'>alert('Vui lòng đăng nhập vào tài khoản trước !')</script>";
}

 ?>