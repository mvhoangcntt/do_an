
<section class="page-news">
    <div class="container">
        <div class="row details">
            <div class="col-lg-12 col-md-6">
                <div class="text-link">
                    <nav>
                        <ol>
                            <a href="<?php echo base_url() ?>"><?php echo str_replace(array('http://','https://'), '', substr(base_url(),0,strlen(base_url())-1)); ?></a>
                            <li><a href="">Giỏ hàng</a></li>
                            <li><a href="">Thanh toán</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-lg-12 col-md-6">
                <div class="total-cart">
                    <div class="name-cart">
                        XÁC NHẬN - THANH TOÁN
                        <?php //var_dump($user); ?>
                    </div>
                </div>
            </div>
        </div>
        <form id="form_dathang_" method="POST" action="<?php echo base_url('order/add_order') ?>">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="margin-10">
                    <div class="row">
                    <div class="col-lg-12 col-md-6 details-order">
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="delivery-address">
                                <div class="delivery-address-order">
                                    <div>
                                        <i class="fa fa-map-marker icon-order-cart" aria-hidden="true"></i>
                                    </div>
                                    <div>Địa chỉ nhận hàng</div>
                                </div>
                                <div><a href="<?php echo base_url('account') ?>" title="Thay đổi">Thay đổi <i class="fa fa-caret-right" aria-hidden="true"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="delivery-address-details">
                                <div class="delivery-address-details-item">
                                    <div class="delivery-address-name-user"><?php echo $user->full_name; ?></div>
                                    <div class="delivery-address-phone-user"><?php echo $user->phone; ?></div>
                                </div>
                                <div class="address-details">
                                    <?php echo $user->address.' , '.$diachi->name.' , '.$diachi->quan_huyen.' , '.$diachi->tinh_tp; ?>
                                    <!-- Xóm Héo cũ, Xã Phượng Tiến, Huyện Định Hóa, Thái Nguyên -->
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-lg-12 col-md-6 details-order">
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="delivery-address">
                                <div class="delivery-address-order">
                                    <div>
                                        <i class="fa fa-car icon-order-cart" aria-hidden="true"></i>
                                    </div>
                                    <div>Phương thức vận chuyển</div>
                                </div>
                                <div></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="delivery-address-item">
                                <div class="delivery-address-details-order">
                                    <div class="delivery-address-name-user">Chuyển phát tiêu chuẩn</div>
                                    <div class="address-details">Dự kiến giao hàng : 2 - 3 ngày</div>
                                </div>
                                <div>
                                    <div class="number-order">
                                        <div class="delivery-order-price">
                                            34.000đ
                                        </div>
                                        <div class="delivery-order-discount">
                                            54.000đ
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-lg-12 col-md-6 details-order">
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="delivery-address">
                                <div class="delivery-address-order">
                                    <div>
                                        <i class="fa fa-credit-card-alt icon-order-cart" aria-hidden="true"></i>
                                    </div>
                                    <div>Phương thức thanh toán</div>
                                </div>
                                <div></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="radio-cart-item">
                                <div class="ip-radio">
                                    <input type="radio" name="thanhtoan" value="1" checked>
                                </div>
                                <div>
                                    <div class="delivery-address-details-order">
                                        <div class="delivery-address-name-user">Tiền mặt khi nhận hàng</div>
                                        <div class="address-details">Phí thu hộ : Miễn phí</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="radio-cart-item">
                                <div class="ip-radio">
                                    <input type="radio" name="thanhtoan" value="2">
                                </div>
                                <div>
                                    <div class="delivery-address-details-order">
                                        <div class="delivery-address-name-user">Thanh toán qua ví điện tử momo</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="radio-cart-item">
                                <div class="ip-radio">
                                    <input type="radio" name="thanhtoan" value="3">
                                </div>
                                <div>
                                    <div class="delivery-address-details-order">
                                        <div class="delivery-address-name-user">Chuyển khoản</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 col-md-6">
                <div class="row">
                    <div class="col-lg-12 col-md-6 details-order">
                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="delivery-address">
                                    <div class="delivery-address-order">
                                        <div>
                                            <i class="fa fa-gift icon-order-cart" aria-hidden="true"></i>
                                        </div>
                                        <div>Mã khuyến mãi</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="form-gift-code">
                                    <div class="form-gift-code-ip">
                                        <input class="form-gift-code-input" type="text" name="gift-code" placeholder="Nhập mã giảm giá nếu có !">
                                    </div>
                                    <div class="form-gift-code-bt">
                                        <button class="bt-gift-code" type="submit"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-6 details-order">
                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="delivery-address">
                                    <div class="delivery-address-order">
                                        <div>
                                            <i class="fa fa-calendar-check-o icon-order-cart" aria-hidden="true"></i>
                                        </div>
                                        <div>Thông tin sản phẩm</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- thông tin sản phâm -->
                        <?php $i = 0; $count = count($cart);
                        foreach ($cart as $news_item): 
                            $i++; ?>
                        <div class="row order-bottom">
                            <input type="hidden" name="id_cart[<?php echo $i; ?>]" value="<?php echo $news_item->id_cart; ?>">
                            <div class="col-lg-6 col-md-6 border-cart">
                                <div class="item-cart">
                                    <div class="item-cart-image">
                                        <div class="stt"><?php echo $i."."; ?></div>
                                        <div class="item-cart-img">
                                            <a href="<?php echo $news_item->url; ?>" title="<?php echo $news_item->title; ?>">
                                                <img class="img-with" src="<?php echo base_url('public/media/'.$news_item->thumbnail); ?>" alt="<?php echo $news_item->title; ?>">
                                            </a>
                                        </div>
                                        <div class="item-name-cart">
                                            <a href="<?php echo $news_item->url; ?>" title="<?php echo $news_item->title; ?>">Đầm Suông Dài Dáng Chữ A S&M Đẹp Cao Cấp, Giá Tốt - GR0015</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 border-cart">
                                <div class="coler-cart-item">
                                    <div class="coler-cart border-cart">
                                        <button class="text-size-order"><?php echo $news_item->text_size; ?></button>
                                    </div>
                                    <div class="size-cart">
                                        <button class="text-coler-order"><?php echo $news_item->text_coler; ?></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="cart-flex">
                                    <div class="number-buy">
                                        <div class="cart-price">
                                            <?php echo number_format($news_item->price); ?> đ 
                                        </div>
                                        <div class="cart-discount">
                                            <?php echo number_format($total = $news_item->price + $news_item->discount); ?> đ 
                                        </div>
                                    </div>
                                    <div class="number-order-buy">
                                        <input class="input_order_number" type="number" value="<?php echo $news_item->quantity_cart; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php if ($i < $count) { ?>
                            <div class="bottom-dotted-order"></div>
                        <?php } endforeach; ?> 
                        <!-- ---------- -->
                        
                        <!-- end thông tin -->
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-6 details-order">
                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="delivery-address">
                                    <div class="delivery-address-order">
                                        <div>
                                            <i class="fa fa-money icon-order-cart" aria-hidden="true"></i>
                                        </div>
                                        <div>Thông tin thanh toán</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 col-md-6">
                                <div class="free-ship">Miễn phí vận chuyển đơn hàng lớn hơn 200.000đ</div>
                            </div>
                            <div class="col-lg-7 col-md-6">
                                <div class="money-order">
                                    <div class="money-order-item">Tổng tiền hàng</div>
                                    <div class="money-order-item-coler"><?php echo number_format($tongtien); ?> vnđ</div>
                                </div>
                                <div class="money-order">
                                    <div class="money-order-item">Phí vận chuyển</div>
                                    <div class="money-order-item-coler"><?php echo number_format($viettel_post); ?> vnđ</div>
                                </div>
                                <div class="money-order">
                                    <div class="money-order-item">Tổng tiền thanh toán</div>
                                    <div class="money-order-item-coler tongtientt"><?php echo number_format($tongtien + $viettel_post); ?> vnđ</div>
                                </div>
                                <div class="money-order voucher_add">
                                    
                                </div>
                                <input type="hidden" class="tiensanpham" value="<?php echo ($tongtien + $viettel_post); ?>">
                                
                                <!-- <input type="hidden" name="gift-code" value=""> -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-6 details-order">
                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="delivery-address">
                                    <div class="delivery-address-order">
                                        <div>
                                            <i class="fa fa-pencil icon-order-cart" aria-hidden="true"></i>
                                        </div>
                                        <div>Ghi chú</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="note-ship">
                                    <textarea rows="6" tabindex="5" name="content" class="textarea-note" placeholder="Nội dung liên hệ"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-6 details-order">
                        <div class="row">
                            <div class="col-lg-4 col-md-6"></div>
                            <div class="col-lg-4 col-md-6">
                                <div class="btn-thanhtoan">
                                    <button class="button_fKtq" tabindex="6"><span>Đặt hàng</span></button>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <div class="row list-product-form-detais">
            <div class="col-lg-12 col-md-6"><div class="row"><div class="tieude"><div class="tieude_"><div class="_left">Có thể bạn quan tâm</div><div class="_right"><a href="<?php echo base_url('seemore/search/giamgia'); ?>">Xem Thêm</a><i class="fa fa-caret-right" aria-hidden="true"></i></div></div></div></div></div>
            <div class="col-lg-12 col-md-6">
                <div class="list-news">
                    <div class="row">
                        <?php foreach ($giamgia as $news_item): ?>
                            <div class="col-lg-2 col-md-4 col-6">
                                <div class="item-news" id="<?php echo $news_item->id; ?>">
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
<!-- form edit -->
<div class="screen_cart_hide"></div>
<div class="form_cart_hide">
    <div class="container">
        <div class="row cart-bottom">
            <div class="col-lg-12 col-md-6">
                <div class="item-cart">
                    <div class="item-cart-image">
                        <div class="item-cart-img">
                            <a href="" title="">
                                <img class="img-with" src="<?php echo base_url() ?>public/images/img1.jpg" alt="">
                            </a>
                        </div>
                        <div class="number-text-cart">
                            <div>Đầm Suông Dài Dáng Chữ A S&M Đẹp Cao Cấp, Giá Tốt - GR0015</div>
                            <div class="cart-price">
                                150.000đ
                            </div>
                        </div>
                        <div class="icon-x"><i class="fa fa-times" aria-hidden="true"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row cart-bottom">
            <div class="col-lg-12 col-md-6">
                <div class="">
                    <div class="coler-product">
                        <div class="item-information">
                            Màu sắc :
                        </div>
                        <div class="coler-item-produc">
                            <button class="colorOption colorOption-active">Xanh</button>
                            <button class="colorOption">Đỏ</button>
                            <button class="colorOption">Tím</button>
                            <button class="colorOption">Xanh Vàng</button>
                        </div>
                    </div>
                    <div class="size-product">
                        <div class="item-information">
                            Kích cỡ :
                        </div>
                        <div>
                            <button class="textOption size-active">S</button>
                            <button class="textOption">M</button>
                            <button class="textOption">L</button>
                            <button class="textOption">XL</button>
                            <button class="textOption">XXL</button>
                        </div>
                    </div>
                    <div class="number-product">
                        <div class="item-information">
                            Số lượng :
                        </div>
                        <div class="qtyInput">
                            <button class="btn_decrease disabled">-</button>
                            <input class="input_number" type="number" value="1">
                            <button class="btn_increase">+</button>
                        </div>
                    </div>
                    <div class="group-item-button">
                        <div class="btn-confirm-item">
                            <button type="submit" class="btn-confirm-item-cart">Xác nhận</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end form -->