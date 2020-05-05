
<section class="page-news">
    <div class="container">
        <div class="row details">
            <div class="col-lg-4 col-md-6">
                <div class="item-list-img">
                    <!-- <iframe data-src="<?php echo base_url() ?>news/slide" width = "100%" height = "100%" scrolling="no" frameborder="0" src="<?php echo base_url() ?>news/slide"></iframe> -->
                  <div class="swiper-container gallery-top">
                    <div class="swiper-wrapper">

                        <?php 
                            $album = str_replace('"',"",str_replace(']',"",str_replace('[',"",$detail->album )));
                            $data_album = explode( ',', $album); 
                            foreach ($data_album as $item_album):
                        ?>
                            <div class="swiper-slide" style="background-image:url(<?php echo base_url() ?>public/media/<?php echo $item_album; ?>)">
                                <div class="item-album show-img">
                                    <div class="gallery-img">
                                        <a href="<?php echo base_url() ?>public/media/<?php echo $item_album; ?>" class="fancy" data-fancybox="album1"><img style="display: none;" src="<?php echo base_url() ?>public/media/<?php echo $item_album; ?>" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?> 
                      
                      
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next swiper-button-white"></div>
                    <div class="swiper-button-prev swiper-button-white"></div>
                  </div>
                  <div class="swiper-container gallery-thumbs">
                    <div class="swiper-wrapper">
                        <?php foreach ($data_album as $item_album): ?>
                            <div class="swiper-slide" style="background-image:url(<?php echo base_url() ?>public/media/<?php echo $item_album; ?>)"></div>
                        <?php endforeach; ?> 
                    </div>
                  </div>
                </div>
                <div class="facebook-item">
                    <div class="like-face">
                        <div id="fb-root"></div>
                            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0"></script>
                            <div class="fb-like" data-href="https://business.facebook.com/Ban.Hang.Tiep.Thi.VN/?business_id=864716300635917&amp;modal=admin_todo_tour" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="false"></div>
                    </div>
                    <div class="share-face">
                        <a href="https://www.facebook.com/sharer.php?u=<?php echo base_url(uri_string()); ?>" target="_blank" title=""><i class="fa fa-facebook-square"></i>&nbsp; Share</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-6 text-details-product">
                <div class="name-details">
                    <div class="text-link">
                        <nav>
                            <ol>
                                <a href="">Localhost</a>
                                <li><a href="">Thời trang nam</a></li>
                                <li><a href="">Áo sơ mi</a></li>
                                <li><a href="">Chất</a></li>

                            </ol>
                        </nav>
                    </div>
                    <div class="name-product-details">
                        <h1><?php echo $detail->title; ?></h1>
                    </div>
                </div>
                <div class="price-details">
                    <div class="discount-details">
                        <div class="discountTag">Giảm <?php echo round(($detail->discount/($detail->price + $detail->discount))*100,1); ?>%</div>
                        <div class="currentPrice"><?php echo number_format($detail->price); ?> đ</div>
                        <div class="oldPrice"><?php echo number_format($detail->price + $detail->discount); ?> đ</div>
                    </div>
                    <div class="start-details">
                        <div>
                            <span class="fa fa-star checked" title="1"></span>
                            <span class="fa fa-star checked" title="2"></span>
                            <span class="fa fa-star checked" title="3"></span>
                            <span class="fa fa-star checked" title="4"></span>
                            <span class="fa fa-star" title="5"></span>    
                        </div>
                    </div>
                </div>
                <div class="transport-details">
                    <div class="transport-details-item1">
                        Miễn phí vận chuyển :
                    </div>
                    <div class="transport-details-item2">
                        Trong bán kính 10km
                    </div>
                </div>
                <form action="<?php echo base_url('cart/add_cart'); ?>" id="form" method="POST" accept-charset="utf-8">
                <div class="basic-information">
                    <div class="coler-product">
                        <div class="item-information">
                            Màu sắc :
                        </div>
                        <div class="">
                            <?php //var_dump($detail_size); ?>
                            <?php $i = 0; foreach ($detail_size as $item_size):
                            $i++;
                            if ($i == 1) { ?>
                                <input type="button" class="colorOption colorOption-active" name="coler" value="<?php echo $item_size->text_coler; ?>">
                            <?php }else{ ?>
                                <input type="button" class="colorOption" name="coler" value="<?php echo $item_size->text_coler; ?>">
                            <?php }
                            endforeach; ?> 
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
                        <div>
                            <?php $i = 0; foreach ($detail_size as $item_size):
                            $i++;
                            if ($i == 1) { ?>
                                <input type="button" class="textOption size-active" name="size" value="<?php echo $item_size->text_size; ?>">
                            <?php }else{ ?>
                                <input type="button" class="textOption" name="size" value="<?php echo $item_size->text_size; ?>">
                            <?php }
                            endforeach; ?> 
                            <!-- <button class="textOption size-active">S</button>
                            <button class="textOption">M</button>
                            <button class="textOption">L</button>
                            <button class="textOption">XL</button>
                            <button class="textOption">XXL</button> -->
                        </div>
                    </div>
                    <div class="number-product">
                        <div class="item-information">
                            Số lượng :
                        </div>
                        <div class="qtyInput">
                            <input type="button" class="btn_decrease disabled" value="-">
                            <input class="input_number" type="number" maxlength="100" minlength="1" value="1">
                            <input type="button" class="btn_increase" value="+">
                        </div>
                    </div>
                    <div class="group-item-button">
                        <div class="btn-check-group">
                            <button type="submit" onclick="save_cart()" class="save_cart btn-addCart btn-addCart-item">Thêm vào giỏ hàng</button>
                            <!-- <a href="<?php echo base_url() ?>order" title=""> --><button type="submit" class="btn_buy btn_buy-item">Mua ngay</button>
                        </div>
                    </div>
                </div>
                </form>
                <div class="time-48">
                    <div class="time-item">
                        <div class="time-item-check">
                            <i class="fa fa-check-square-o" aria-hidden="true"></i>
                        </div>
                        <div class="time-item-48">
                            48 giờ hoàn trả
                        </div>
                    </div>
                    <div class="time-item-k">
                        <div class="time-item-check">
                            <i class="fa fa-check-square-o" aria-hidden="true"></i>
                        </div>
                        <div class="time-item-48">
                            Kiểm hàng khi nhận
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row text-details">
            <div class="col-lg-12 col-md-6">
                <ul class="nav nav-tabs">
                    <li><a data-toggle="tab" href="#home" class="active show">CHI TIẾT SẢN PHẨM</a></li>
                    <li><a data-toggle="tab" href="#menu1">ĐÁNH GIÁ</a></li>
                    <li><a data-toggle="tab" href="#menu2">HỎI ĐÁP</a></li>
                </ul>
            </div>
            <div class="col-lg-12 col-md-6">
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active show">
                        <div class="details-news details-product-text" style="border-right: 0px solid #cccccc; margin-bottom: 10px;">
                            <h1 class="title-news"><?php echo $detail->title; ?></h1>
                            <div class="control">
                                <div class="time"><?php echo date("d.m.Y",strtotime($detail->created_time));?><span> 
                                    <?php echo $detail->timeAgo; ?></span>
                                </div>
                                <div class="s-social">
                                    <a class="smooth f" href="https://www.facebook.com/sharer.php?u=<?php echo base_url(uri_string()); ?>" target="_blank" title="<?php echo $detail->title; ?>"><i class="fa fa-facebook-square"></i>&nbsp; Share 3M</a>
                                    <a class="smooth" href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site <?php echo base_url(uri_string()); ?>" title="<?php echo $detail->title; ?>"><i class="fa fa-envelope"></i></a>
                                    <a class="smooth" media="print" href="#" title="<?php echo $detail->title; ?>"><i class="fa fa-print"></i></a>
                                </div>
                            </div>
                            <div class="desc">
                                <?php echo $detail->meta_description; ?>
                            </div>   
                            <div class="s-content">
                                <?php echo $detail->content; ?>
                            </div>
                            <div class="control v2">
                                <div class="s-social">
                                    <a class="smooth f" href="https://www.facebook.com/sharer.php?u=<?php echo base_url(uri_string()); ?>" target="_blank" title=""><i class="fa fa-facebook-square"></i>&nbsp; Share 3M</a>
                                    <a class="smooth" href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site <?php echo base_url(uri_string()); ?>" title=""><i class="fa fa-envelope"></i></a>
                                    <a class="smooth" media="print" href="#" title=""><i class="fa fa-print"></i></a>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                          
                        <div class="fb-comments" data-href="https://www.facebook.com/mvhoangcntt/<?php echo $detail->id; ?>" data-width="" data-numposts="5"></div>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <h3>Menu 2</h3>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
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