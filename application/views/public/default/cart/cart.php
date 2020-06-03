
<section class="page-news">
    <div class="container">
        <div class="row details">
            <div class="col-lg-8 col-md-6">
                <div class="row">
                <div class="col-lg-12 col-md-6">
                    <div class="text-link">
                        <nav>
                            <ol>
                                <a href="<?php echo base_url() ?>"><?php echo str_replace(array('http://','https://'), '', substr(base_url(),0,strlen(base_url())-1)); ?></a>
                                <li><a href="">Giỏ hàng</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-12 col-md-6">
                    <div class="total-cart">
                        <div class="name-cart">
                            GIỎ HÀNG CỦA BẠN
                        </div>
                        <div class="number-cart">
                            ( <?php echo count($cart);  ?> Sản phẩm )
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="display-flex">
                    <div class="btn btn-primary pull-left" id="checkbox_all">Chọn tất cả</div>
                    <div class="btn btn-primary pull-left" id="delete_all">Xóa các mục đã chọn</div>
                </div>
            </div>
        </div>
        <form id="form_view_cart_" method="POST" action="<?php echo base_url('order/list_cart_order'); ?>">
        <div class="row details-cart">
            <div class="col-lg-10 col-md-6 border-cart-item">
                <?php $i = 0; foreach ($cart as $news_item): $i++; ?>
                <div class="row cart-bottom remove_<?php echo $news_item->id_cart; ?>">
                    <div class="col-lg-4 col-md-6 border-cart">
                        <div class="item-cart">
                            <div class="item-cart-image">
                                <div class="checkbox_">
                                    <div class="_i">
                                        <?php echo $i." "; ?>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="cart[<?php echo $i; ?>]" class="check_cart" value="<?php echo $news_item->id_cart; ?>">
                                    </div>
                                </div>
                                <div class="item-cart-img">
                                    <a href="<?php echo $news_item->url; ?>" title="<?php echo $news_item->title; ?>">
                                        <img class="img-with" src="<?php echo base_url('public/media/'.$news_item->thumbnail); ?>" alt="<?php echo $news_item->title; ?>">
                                    </a>
                                </div>
                                <div class="item-name-cart">
                                    <a href="<?php echo $news_item->url; ?>" title="<?php echo $news_item->title; ?>"><?php echo $news_item->title; ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 border-cart">
                        <div class="coler-cart-item">
                            <div class="coler-cart border-cart">
                                <button class="text-size-cart" disabled><?php echo $news_item->text_size; ?></button>
                            </div>
                            <div class="size-cart">
                                <button class="text-coler-cart" disabled><?php echo $news_item->text_coler; ?></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="cart-flex">
                            <div class="number-buy">
                                <div class="cart-price">
                                    <?php echo number_format($news_item->price); ?>đ
                                </div>
                                <div class="cart-discount">
                                    <?php echo number_format($news_item->price + $news_item->discount); ?>đ
                                </div>
                            </div>
                            <div class="number-cart-buy">
                                <input class="input_number" type="number" name="quantity" value="<?php echo $news_item->quantity_cart; ?>" readonly>
                            </div>
                            <div class="edit-cart-buy ">
                                <div class="edit-cart">
                                    <button>SỬA</button>
                                    <input type="hidden" class="id_cart_" value="<?php echo $news_item->id_cart; ?>">
                                </div>
                                <div class="delete-cart">
                                    <input type="hidden" class="id_cart" value="<?php echo $news_item->id_cart; ?>">
                                    <button>XÓA</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?> 
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="pay-cart-item">
                    <div class="amuont-cart">
                        <div class="text-amuont">
                            Tổng tiền :
                        </div>
                        <div class="number-amuont">
                            0đ
                        </div>
                    </div>
                    <div class="cartAmount_2XUC">
                        <button type="submit" class="btn-submit-cart thanhtoan_cart">Thanh toán</button>
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
                            <div class="title-text">Đầm Suông Dài Dáng Chữ A S&M Đẹp Cao Cấp, Giá Tốt - GR0015</div>
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
                <form id="addcart_" method="post">
                    <input type="hidden" class="id_product" name="id" value="">
                    <input type="hidden" id="soluong" value="">
                    <input type="hidden" id="id_cart_edit" name="id_cart_edit" value="">
                <div class="">
                    <div class="coler-product">
                        <div class="item-information">
                            Màu sắc :
                        </div>
                        <div class="coler-item-produc">
                            <!-- <button class="colorOption colorOption-active">Xanh</button>
                            <button class="colorOption">Đỏ</button>
                            <button class="colorOption">Tím</button>
                            <button class="colorOption">Xanh Vàng</button> -->
                        </div>
                    </div>
                    <div class="size-product">
                        <div class="item-information">
                            Kích cỡ :
                        </div>
                        <div class="add-text_size">
                            <!-- <button class="textOption size-active">S</button>
                            <button class="textOption">M</button>
                            <button class="textOption">L</button>
                            <button class="textOption">XL</button>
                            <button class="textOption">XXL</button> -->
                        </div>
                    </div>
                    <div id="error"></div>
                    <div class="number-product">
                        <div class="item-information">
                            Số lượng :
                        </div>
                        <div class="qtyInput">
                            <input type="button" class="btn_decrease disabled" value="-">
                            <input class="input_number" name="quantity" type="number" value="1">
                            <input type="button" class="btn_increase" value="+">
                        </div>
                    </div>
                    <div id="error_pty"></div>
                    <div class="group-item-button">
                        <div class="btn-confirm-item">
                            <button type="submit" id="save_edit_cart" class="btn-confirm-item-cart">Xác nhận</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end form -->