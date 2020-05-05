
<section class="page-news">
    <div class="container">
        <div class="row details">
            <div class="col-lg-12 col-md-6">
                <div class="text-link">
                    <nav>
                        <ol>
                            <a href="">Localhost</a>
                            <li><a href="">Thông tin tài khoản</a></li>
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
                    <img class="icon-account-img" src="<?php echo base_url() ?>public/images/icon-account.jpg" alt="">
                    <div class="div-name-account">
                        <div class="my-name-account">MV Hoàng</div>
                    </div>
                </div>
                <ul class="nav nav-tabs flex-column">
                    <li class="no-active"><a data-toggle="tab" href="#home" >Thông tin tài khoản</a></li>
                    <li class="no-active"><a data-toggle="tab" href="#menu1">Địa chỉ nhận hàng</a></li>
                    <li class="no-active account-list-active"><a data-toggle="tab" href="#menu2" class="active show">Đơn hàng</a></li>
                </ul>
            </div>
            <div class="col-lg-9 col-md-6">
                <div class="tab-content tab-content-remove">
                    <div id="home" class="tab-pane fade ">
                        <div class="about-account">
                            <div class="information-account">Thông tin tài khoản</div>
                            <div class="row">
                                <div class="col-lg-2 col-md-6">
                                
                                </div>
                                <div class="col-lg-8 col-md-6">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-6">
                                            <div class="avatar-account">
                                                <div>
                                                    <img src="<?php echo base_url() ?>public/images/icon-account.jpg" title="Hoàng">
                                                    <button>Thay đổi</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="container">
                                            <form class="" action="/action_page.php">
                                                <div class="form-group">
                                                    <label for="email">Email:</label>
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
                                                <div class="center-button">
                                                    <button type="submit" class="btn btn-primary submit">Cập nhật</button>
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
                                                        MV Hoàng
                                                    </div>
                                                    <div class="icon-edit-address">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                                <div class="text-address-go">
                                                    <div>
                                                        Xóm Héo cũ - Xã Phượng Tiến - Huyện Định Hóa - Thái Nguyên
                                                    </div>
                                                    <div>
                                                        Điện thoại: 0379749836
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="container">
                                            <form class="" action="/action_page.php">
                                                <div class="form-group">
                                                    <label for="phone">Số điện thoại:</label>
                                                    <input type="number" class="form-control" id="phone" placeholder="Enter phone" name="phone">
                                                </div>
                                                <div class="form-group">
                                                    <label for="full-name">Họ và tên:</label>
                                                    <input type="text" class="form-control" id="full-name" placeholder="Enter full-name" name="full-name">
                                                </div>
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
                                                
                                                <div class="center-button">
                                                    <button type="submit" class="btn btn-primary submit">Cập nhật</button>
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
                    <div id="menu2" class="tab-pane fade in active show">
                        <div class="about-account donhang">
                            <div class="information-account">Quản lý đơn hàng</div>
                            <div class="row">
                                <div class="col-lg-12 col-md-6">
                                    <ul class="nav nav-tabs list">
                                        <li><a data-toggle="tab" href="#choxacnhan" class="active show">Cờ xác nhận</a></li>
                                        <li><a data-toggle="tab" href="#daxacnhan">Đã xác nhận</a></li>
                                        <li><a data-toggle="tab" href="#dangvanchuyen">Đang vận chuyển</a></li>
                                        <li><a data-toggle="tab" href="#dagiaohang">Đã giao hàng</a></li>
                                        <li><a data-toggle="tab" href="#dahuy">Đã hủy</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-6">
                                    <div class="tab-content">
                                        <div id="choxacnhan" class="tab-pane fade in active show">
                                            <div class="flex-order-item">
                                                <div>
                                                    <div>
                                                        <!-- Mã đơn hàng <a href="" title="">#123456 | Chi Tiết</a> -->
                                                        <ul class="nav nav-tabs">
                                                            <li>
                                                                Mã đơn hàng <a data-toggle="tab" href="#details-order" style="border-bottom: 0rem solid #e5101d!important;" class="details-show active show" id="123456">#123456 | Chi Tiết</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div>Ngày đặt : 11/04/2020</div>
                                                </div>
                                                <div>
                                                    <div>Người nhận</div>
                                                    <div>MV Hoàng</div>
                                                </div>
                                                <div>
                                                    <div>Tổng tiền</div>
                                                    <div>170.000đ</div>
                                                </div>
                                            </div>
                                            <div class="">
                                                <div class="row flex-order-item-product">
                                                    <div class="col-lg-8 col-md-6">
                                                        <div class="flex-order-item-product-img">
                                                            <div class="order-item-product-img">
                                                                <img src="<?php echo base_url() ?>public/images/img1.jpg" alt="">
                                                            </div>
                                                            <div class="order-item-product-text">
                                                                <div>
                                                                    Đầm Suông Dài Dáng Chữ A S&M Đẹp Cao Cấp, Giá Tốt - GR0015
                                                                </div>
                                                                <div>170.000đ</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 flex-order-item-product">
                                                    <div>
                                                        <div>Màu sắc</div>
                                                        <div>Xanh</div>
                                                    </div>
                                                    <div> 
                                                        <div>Số lượng</div>
                                                        <div>1</div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="bottom-dotted"></div>
                                                <div class="row flex-order-item-product">
                                                    <div class="col-lg-8 col-md-6">
                                                        <div class="flex-order-item-product-img">
                                                            <div class="order-item-product-img">
                                                                <img src="<?php echo base_url() ?>public/images/img1.jpg" alt="">
                                                            </div>
                                                            <div class="order-item-product-text">
                                                                <div>
                                                                    Đầm Suông Dài Dáng Chữ A S&M Đẹp Cao Cấp, Giá Tốt - GR0015
                                                                </div>
                                                                <div>170.000đ</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 flex-order-item-product">
                                                    <div>
                                                        <div>Màu sắc</div>
                                                        <div>Xanh</div>
                                                    </div>
                                                    <div> 
                                                        <div>Số lượng</div>
                                                        <div>1</div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="daxacnhan" class="tab-pane fade">
                                              2
                                            
                                        </div>
                                        <div id="dangvanchuyen" class="tab-pane fade">
                                            3
                                        </div>
                                        <div id="dagiaohang" class="tab-pane fade">
                                            4
                                        </div>
                                        <div id="dahuy" class="tab-pane fade">
                                            5
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
                                        <div>
                                            Mã đơn hàng : #123456
                                        </div>
                                        <div>
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
                                                <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="icon-trangthai">
                                            <div><i class="fa fa-check-square-o" aria-hidden="true"></i></div>
                                            <div>Đã xác nhận</div>
                                            <div class="checked-icon">
                                                <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="icon-trangthai">
                                            <div><i class="fa fa-car" aria-hidden="true"></i></div>
                                            <div>Đang vận chuyển</div>
                                            <div class="checked-icon">
                                                <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="icon-trangthai">
                                            <div><i class="fa fa-check-circle-o" aria-hidden="true"></i></div>
                                            <div>Hoàn tất</div>
                                            <div class="checked-icon">
                                                <i class="fa fa-check-circle-o" aria-hidden="true"></i>
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
                                            <div class="time-trangthai">
                                                22:00
                                            </div>
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
                                            <div class="time-trangthai">
                                                22:00
                                            </div>
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
                                            <div class="time-trangthai">
                                                22:00
                                            </div>
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
                                            <div class="time-trangthai">
                                                22:00
                                            </div>
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
                                                    <div class="">MV Hoàng</div>
                                                    <div class="phone-user">0379749836</div>
                                                </div>
                                                <div class="">Xóm Héo cũ, Xã Phượng Tiến, Huyện Định Hóa, Thái Nguyên</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bottom-solid"></div>
                            </div>
                            <div class="row margin-top margin-top">
                                <div class="col-lg-12 col-md-6 margin-bottom">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-6">
                                            <div class="flex-bye">
                                                <div>Hình thức thanh toán : </div>
                                                <div class="thanhtoan">Thanh toán tận nơi</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-5 col-md-6 border-cart">
                                            <div class="item-cart">
                                                <div class="item-cart-image">
                                                    <div class="item-cart-img">
                                                        <a href="" title="">
                                                            <img class="img-with" src="http://localhost/do-an/public/images/img1.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="item-name-cart">
                                                        <a href="" title="">Đầm Suông Dài Dáng Chữ A S&amp;M Đẹp Cao Cấp, Giá Tốt - GR0015</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 border-cart">
                                            <div class="coler-cart-item">
                                                <div class="coler-cart border-cart">
                                                    <button class="text-size-cart">M</button>
                                                </div>
                                                <div class="size-cart">
                                                    <button class="text-coler-cart">Xanh Vàng</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="cart-flex">
                                                <div class="number-buy">
                                                    <div class="cart-price">
                                                        150.000đ
                                                    </div>
                                                    <div class="cart-discount">
                                                        270.000đ
                                                    </div>
                                                </div>
                                                <div class="number-cart-buy">
                                                    <input class="input_number" type="number" value="1" readonly="">
                                                </div>
                                                <div class="total">
                                                    <div>Tổng tiền</div>
                                                    <div>150.000đ</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bottom-dotted"></div>
                                    <div class="row margin-top">
                                        <div class="col-lg-5 col-md-6 border-cart">
                                            <div class="item-cart">
                                                <div class="item-cart-image">
                                                    <div class="item-cart-img">
                                                        <a href="" title="">
                                                            <img class="img-with" src="http://localhost/do-an/public/images/img1.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="item-name-cart">
                                                        <a href="" title="">Đầm Suông Dài Dáng Chữ A S&amp;M Đẹp Cao Cấp, Giá Tốt - GR0015</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 border-cart">
                                            <div class="coler-cart-item">
                                                <div class="coler-cart border-cart">
                                                    <button class="text-size-cart">M</button>
                                                </div>
                                                <div class="size-cart">
                                                    <button class="text-coler-cart">Xanh Vàng</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="cart-flex">
                                                <div class="number-buy">
                                                    <div class="cart-price">
                                                        150.000đ
                                                    </div>
                                                    <div class="cart-discount">
                                                        270.000đ
                                                    </div>
                                                </div>
                                                <div class="number-cart-buy">
                                                    <input class="input_number" type="number" value="1" readonly="">
                                                </div>
                                                <div class="total">
                                                    <div>Tổng tiền</div>
                                                    <div>150.000đ</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="bottom-solid"></div>
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
                                                    0379749836
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-6">
                                            <div class="money-order">
                                                <div class="money-order-item">Tổng tiền hàng</div>
                                                <div class="money-order-item-coler">150.000đ</div>
                                            </div>
                                            <div class="money-order">
                                                <div class="money-order-item">Phí vận chuyển</div>
                                                <div class="money-order-item-coler">150.000đ</div>
                                            </div>
                                            <div class="money-order">
                                                <div class="money-order-item">Tổng tiền thanh toán</div>
                                                <div class="money-order-item-coler">150.000đ</div>
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
            <div class="col-lg-12 col-md-6"><div class="row"><div class="tieude"><div class="tieude_"><div class="_left">Có thể bạn quan tâm</div><div class="_right"><a href="">Xem Thêm</a><i class="fa fa-caret-right" aria-hidden="true"></i></div></div></div></div></div>
            <div class="col-lg-12 col-md-6">
            <div class="list-news">
                <div class="row">
                    <div class="col-lg-2 col-md-6">
                        <div class="item-news">
                            <a href="http://localhost/tomita/thong-bao-dong-cua-tomita-mart-trung-hoa-tu-ngay-28072018-x3" title="THÔNG BÁO ĐÓNG CỬA TOMITA MART - TRUNG HÒA TỪ NGÀY 28/07/2018" class="img"><img src="http://localhost/tomita/public/media/img-about2.jpg" alt="THÔNG BÁO ĐÓNG CỬA TOMITA MART - TRUNG HÒA TỪ NGÀY 28/07/2018"></a>
                            <div class="ct">
                                <span class="time">200.000đ</span>
                                <h3 class="title"><a href="http://localhost/tomita/thong-bao-dong-cua-tomita-mart-trung-hoa-tu-ngay-28072018-x3" title="THÔNG BÁO ĐÓNG CỬA TOMITA MART - TRUNG HÒA TỪ NGÀY 28/07/2018">Chỉ còn 100.000đ</a></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6">
                        <div class="item-news">
                            <a href="http://localhost/tomita/3-dieu-khong-the-bo-qua-khi-chon-mua-thuc-pham-huu-co-x16" title="3 điều không thể bỏ qua khi chọn mua thực phẩm hữu cơ" class="img"><img src="http://localhost/tomita/public/media/thumb/sl-home2-1920x880.jpg" alt="3 điều không thể bỏ qua khi chọn mua thực phẩm hữu cơ"></a>
                            <div class="ct">
                                <span class="time">200.000đ</span>
                                <h3 class="title"><a href="http://localhost/tomita/thong-bao-dong-cua-tomita-mart-trung-hoa-tu-ngay-28072018-x3" title="THÔNG BÁO ĐÓNG CỬA TOMITA MART - TRUNG HÒA TỪ NGÀY 28/07/2018">Chỉ còn 100.000đ</a></h3>
                            </div>
                        </div>
                    </div>

                                    <div class="col-lg-2 col-md-6">
                        <div class="item-news">
                            <a href="http://localhost/tomita/e-ndf-jgd-fjg-j-x17" title="TỔ HỢP SIÊU THỊ TOMITA MART VÀ NHÀ HÀNG TOMITA BENTO TƯNG BỪNG KHAI TRƯƠNG CƠ SỞ MỚI TẠI A2- SO.05 VINHOMES GARDENIA HÀM NGHI" class="img"><img src="http://localhost/tomita/public/media/thumb/1553349954wgdkee_simg_de2fe0_500x500_maxb.jpg" alt="TỔ HỢP SIÊU THỊ TOMITA MART VÀ NHÀ HÀNG TOMITA BENTO TƯNG BỪNG KHAI TRƯƠNG CƠ SỞ MỚI TẠI A2- SO.05 VINHOMES GARDENIA HÀM NGHI"></a>
                            <div class="ct">
                                <span class="time">200.000đ</span>
                                <h3 class="title"><a href="http://localhost/tomita/thong-bao-dong-cua-tomita-mart-trung-hoa-tu-ngay-28072018-x3" title="THÔNG BÁO ĐÓNG CỬA TOMITA MART - TRUNG HÒA TỪ NGÀY 28/07/2018">Chỉ còn 100.000đ</a></h3>
                            </div>
                        </div>
                    </div>

                                    <div class="col-lg-2 col-md-6">
                        <div class="item-news">
                            <a href="http://localhost/tomita/thuc-pham-huu-co-la-gi-x19" title="Thực phẩm hữu cơ là gì?" class="img"><img src="http://localhost/tomita/public/media/img-about.jpg" alt="Thực phẩm hữu cơ là gì?"></a>
                            <div class="ct">
                                <span class="time">200.000đ</span>
                                <h3 class="title"><a href="http://localhost/tomita/thong-bao-dong-cua-tomita-mart-trung-hoa-tu-ngay-28072018-x3" title="THÔNG BÁO ĐÓNG CỬA TOMITA MART - TRUNG HÒA TỪ NGÀY 28/07/2018">Chỉ còn 100.000đ</a></h3>
                            </div>
                        </div>
                    </div>

                                    <div class="col-lg-2 col-md-6">
                        <div class="item-news">
                            <a href="http://localhost/tomita/tomita-farm-chinh-thuc-khai-truong-to-hop-tomita-mart-tomita-bento-ciputra-26112018-x20" title="TOMITA FARM CHÍNH THỨC KHAI TRƯƠNG TỔ HỢP TOMITA MART &amp; TOMITA BENTO CIPUTRA 26/11/2018" class="img"><img src="http://localhost/tomita/public/media/1552818066ao2.jpg" alt="TOMITA FARM CHÍNH THỨC KHAI TRƯƠNG TỔ HỢP TOMITA MART &amp; TOMITA BENTO CIPUTRA 26/11/2018"></a>
                            <div class="ct">
                                <span class="time">200.000đ</span>
                                <h3 class="title"><a href="http://localhost/tomita/thong-bao-dong-cua-tomita-mart-trung-hoa-tu-ngay-28072018-x3" title="THÔNG BÁO ĐÓNG CỬA TOMITA MART - TRUNG HÒA TỪ NGÀY 28/07/2018">Chỉ còn 100.000đ</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="item-news">
                            <a href="http://localhost/tomita/thong-bao-dong-cua-tomita-mart-trung-hoa-tu-ngay-28072018-x3" title="THÔNG BÁO ĐÓNG CỬA TOMITA MART - TRUNG HÒA TỪ NGÀY 28/07/2018" class="img"><img src="http://localhost/tomita/public/media/img-about2.jpg" alt="THÔNG BÁO ĐÓNG CỬA TOMITA MART - TRUNG HÒA TỪ NGÀY 28/07/2018"></a>
                            <div class="ct">
                                <span class="time">200.000đ</span>
                                <h3 class="title"><a href="http://localhost/tomita/thong-bao-dong-cua-tomita-mart-trung-hoa-tu-ngay-28072018-x3" title="THÔNG BÁO ĐÓNG CỬA TOMITA MART - TRUNG HÒA TỪ NGÀY 28/07/2018">Chỉ còn 100.000đ</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="item-news">
                            <a href="http://localhost/tomita/thong-bao-dong-cua-tomita-mart-trung-hoa-tu-ngay-28072018-x3" title="THÔNG BÁO ĐÓNG CỬA TOMITA MART - TRUNG HÒA TỪ NGÀY 28/07/2018" class="img"><img src="http://localhost/tomita/public/media/img-about2.jpg" alt="THÔNG BÁO ĐÓNG CỬA TOMITA MART - TRUNG HÒA TỪ NGÀY 28/07/2018"></a>
                            <div class="ct">
                                <span class="time">200.000đ</span>
                                <h3 class="title"><a href="http://localhost/tomita/thong-bao-dong-cua-tomita-mart-trung-hoa-tu-ngay-28072018-x3" title="THÔNG BÁO ĐÓNG CỬA TOMITA MART - TRUNG HÒA TỪ NGÀY 28/07/2018">Chỉ còn 100.000đ</a></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6">
                        <div class="item-news">
                            <a href="http://localhost/tomita/3-dieu-khong-the-bo-qua-khi-chon-mua-thuc-pham-huu-co-x16" title="3 điều không thể bỏ qua khi chọn mua thực phẩm hữu cơ" class="img"><img src="http://localhost/tomita/public/media/thumb/sl-home2-1920x880.jpg" alt="3 điều không thể bỏ qua khi chọn mua thực phẩm hữu cơ"></a>
                            <div class="ct">
                                <span class="time">200.000đ</span>
                                <h3 class="title"><a href="http://localhost/tomita/thong-bao-dong-cua-tomita-mart-trung-hoa-tu-ngay-28072018-x3" title="THÔNG BÁO ĐÓNG CỬA TOMITA MART - TRUNG HÒA TỪ NGÀY 28/07/2018">Chỉ còn 100.000đ</a></h3>
                            </div>
                        </div>
                    </div>

                                    <div class="col-lg-2 col-md-6">
                        <div class="item-news">
                            <a href="http://localhost/tomita/e-ndf-jgd-fjg-j-x17" title="TỔ HỢP SIÊU THỊ TOMITA MART VÀ NHÀ HÀNG TOMITA BENTO TƯNG BỪNG KHAI TRƯƠNG CƠ SỞ MỚI TẠI A2- SO.05 VINHOMES GARDENIA HÀM NGHI" class="img"><img src="http://localhost/tomita/public/media/thumb/1553349954wgdkee_simg_de2fe0_500x500_maxb.jpg" alt="TỔ HỢP SIÊU THỊ TOMITA MART VÀ NHÀ HÀNG TOMITA BENTO TƯNG BỪNG KHAI TRƯƠNG CƠ SỞ MỚI TẠI A2- SO.05 VINHOMES GARDENIA HÀM NGHI"></a>
                            <div class="ct">
                                <span class="time">200.000đ</span>
                                <h3 class="title"><a href="http://localhost/tomita/thong-bao-dong-cua-tomita-mart-trung-hoa-tu-ngay-28072018-x3" title="THÔNG BÁO ĐÓNG CỬA TOMITA MART - TRUNG HÒA TỪ NGÀY 28/07/2018">Chỉ còn 100.000đ</a></h3>
                            </div>
                        </div>
                    </div>

                                    <div class="col-lg-2 col-md-6">
                        <div class="item-news">
                            <a href="http://localhost/tomita/thuc-pham-huu-co-la-gi-x19" title="Thực phẩm hữu cơ là gì?" class="img"><img src="http://localhost/tomita/public/media/img-about.jpg" alt="Thực phẩm hữu cơ là gì?"></a>
                            <div class="ct">
                                <span class="time">200.000đ</span>
                                <h3 class="title"><a href="http://localhost/tomita/thong-bao-dong-cua-tomita-mart-trung-hoa-tu-ngay-28072018-x3" title="THÔNG BÁO ĐÓNG CỬA TOMITA MART - TRUNG HÒA TỪ NGÀY 28/07/2018">Chỉ còn 100.000đ</a></h3>
                            </div>
                        </div>
                    </div>

                                    <div class="col-lg-2 col-md-6">
                        <div class="item-news">
                            <a href="http://localhost/tomita/tomita-farm-chinh-thuc-khai-truong-to-hop-tomita-mart-tomita-bento-ciputra-26112018-x20" title="TOMITA FARM CHÍNH THỨC KHAI TRƯƠNG TỔ HỢP TOMITA MART &amp; TOMITA BENTO CIPUTRA 26/11/2018" class="img"><img src="http://localhost/tomita/public/media/1552818066ao2.jpg" alt="TOMITA FARM CHÍNH THỨC KHAI TRƯƠNG TỔ HỢP TOMITA MART &amp; TOMITA BENTO CIPUTRA 26/11/2018"></a>
                            <div class="ct">
                                <span class="time">200.000đ</span>
                                <h3 class="title"><a href="http://localhost/tomita/thong-bao-dong-cua-tomita-mart-trung-hoa-tu-ngay-28072018-x3" title="THÔNG BÁO ĐÓNG CỬA TOMITA MART - TRUNG HÒA TỪ NGÀY 28/07/2018">Chỉ còn 100.000đ</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="item-news">
                            <a href="http://localhost/tomita/thong-bao-dong-cua-tomita-mart-trung-hoa-tu-ngay-28072018-x3" title="THÔNG BÁO ĐÓNG CỬA TOMITA MART - TRUNG HÒA TỪ NGÀY 28/07/2018" class="img"><img src="http://localhost/tomita/public/media/img-about2.jpg" alt="THÔNG BÁO ĐÓNG CỬA TOMITA MART - TRUNG HÒA TỪ NGÀY 28/07/2018"></a>
                            <div class="ct">
                                <span class="time">200.000đ</span>
                                <h3 class="title"><a href="http://localhost/tomita/thong-bao-dong-cua-tomita-mart-trung-hoa-tu-ngay-28072018-x3" title="THÔNG BÁO ĐÓNG CỬA TOMITA MART - TRUNG HÒA TỪ NGÀY 28/07/2018">Chỉ còn 100.000đ</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>

