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
                        <li><a class="smooth" href="<?php echo base_url() ?>contact/" title="">Liên hệ</a></li>
                        <!-- <li><a class="smooth" href="<?php echo base_url() ?>about/" title="">Kiểm tra đơn hàng</a></li> -->
                        <li><a class="smooth login" href="#login" title="">Đăng nhập</a></li>
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
<div class="hide-login">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-6">
                <h2>Đăng nhập</h2>
            </div>
        </div>
        <div class="row cart-bottom">
            <div class="col-lg-12 col-md-6">
                <form class="dangnhap">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nhập địa chỉ Email đăng ký</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Nhớ mật khẩu</label>
                    </div>
                    <div class="form-button-submit">
                        <button type="submit" class="btn btn-primary submit">Đăng nhập</button>
                        <button class="btn btn-primary cancel">Hủy bỏ</button>
                    </div>
                </form>
                <form class="dangky" action="/action_page.php">
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
                                <input type="text" class="form-control" id="full-name" placeholder="Enter full-name" name="full-name">
                            </div>
                            <div class="form-group">
                                <label for="full-name">Giới tính:</label>
                                <div class="radio">
                                    <label class="radio-inline">
                                        <input type="radio" name="optradio" checked> Nam 
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="optradio"> Nữ
                                    </label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="birthday">Ngày sinh:</label>
                                <input type="date" class="form-control" id="birthday" placeholder="01/01/2000" name="birthday">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="address">Địa chỉ:</label>
                                <input type="text" class="form-control" id="address" placeholder="Nhập địa chỉ" name="address">
                            </div>
                            <div class="form-group">
                                <label for="birthday">Tỉnh / Thành:</label>
                                <select class="form-control" id="sel1">
                                    <option> -- Chọn Tỉnh / Thành Phố -- </option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="birthday">Quận / Huyện:</label>
                                <select class="form-control" id="sel1">
                                    <option> -- Chọn Quận / Huyện -- </option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="birthday">Xã / Phường:</label>
                                <select class="form-control" id="sel1">
                                    <option> -- Chọn Xã / Phường -- </option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-button-submit">
                        <button type="submit" class="btn btn-primary submit">Đăng Ký</button>
                        <button class="btn btn-primary cancel">Hủy bỏ</button>
                    </div>
                    
                </form>
                <form class="quenmatkhau">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nhập địa chỉ Email đăng ký</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <!-- <small id="emailHelp" class="form-text text-muted">Hệ thống sẽ gửi mật khẩu mới về email của bạn.</small> -->
                    </div>
                    <div class="form-button-submit">
                        <button type="submit" class="btn btn-primary submit">Nhận mật khẩu mới</button>
                        <button class="btn btn-primary cancel">Hủy bỏ</button>
                    </div>
                </form>
                <form class="doimatkhau">
                    <div class="form-group">
                        <label for="email">Nhập địa chỉ Email đăng ký</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="matkhaucu">Nhập nhật khẩu cũ</label>
                        <input type="password" class="form-control" id="matkhaucu" placeholder="Nhạp mật khẩu cũ">
                    </div>
                    <div class="form-group">
                        <label for="matkhaumoi">Nhập mật khẩu mới</label>
                        <input type="password" class="form-control" id="matkhaumoi" placeholder="Nhập mật khẩu mới">
                    </div>
                    <div class="form-group">
                        <label for="nhaplaimatkhau">Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" id="nhaplaimatkhau" placeholder="Nhập lại mật khẩu">
                    </div>
                    <div class="form-button-submit">
                        <button type="submit" class="btn btn-primary submit">Đổi mật khẩu</button>
                        <button class="btn btn-primary cancel">Hủy bỏ</button>
                    </div>
                </form>

                <div class="form-button">
                    <div class="div-quenmatkhau"><a href="#quenmatkhau">Quên mật khẩu</a></div>
                    <div class="div-doimatkhau"><a href="#doimatkhau">Thay đổi mật khẩu</a></div>
                    <div class="div-dangky"><a href="#dangky">Đăng ký</a></div>
                    <div class="div-dangnhap"><a href="#dangnhap">Đăng nhập</a></div>
                </div>
            </div>
        </div>
    </div>
</div>