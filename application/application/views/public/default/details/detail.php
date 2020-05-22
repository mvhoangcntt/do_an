
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
                                <a href="<?php echo base_url(); ?>"><?php echo str_replace(array('http://','https://'), '', substr(base_url(),0,strlen(base_url())-1)); ?></a>
                                <li><a href="">Chi tiết</a></li>
                                <li><a href=""><?php echo $detail->title; ?></a></li>

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
                <div class="basic-information">
                    <form id="addcart_" method="post" action="<?php echo $detail->url; ?>">
                        <input type="hidden" name="id" value="<?php echo $detail->id; ?>">
                        <input type="hidden" id="soluong" value="<?php echo $soluong; ?>">
                    <div class="coler-product">
                        <div class="item-information">
                            Màu sắc :
                        </div>
                        <div class="">
                            <?php //var_dump($detail_size['text_size']); ?>
                            <?php $i = 0; foreach ($detail_size['text_coler'] as $item_size):
                            $i++;
                            if ($i == 1) { ?>
                                <input type="button" class="colorOption colorOption-active" value="<?php echo $item_size; ?>">
                            <?php }else{ ?>
                                <input type="button" class="colorOption" value="<?php echo $item_size; ?>">
                            <?php }
                            endforeach; ?> 
                            <input type="hidden" id="text_coler" name="text_coler" value="<?php echo $detail_size['text_coler'][0]; ?>">
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
                            <?php $i = 0; foreach ($detail_size['text_size'] as $item_size):
                            $i++;
                            if ($i == 1) { ?>
                                <input type="button" class="textOption size-active" value="<?php echo $item_size ?>">
                            <?php }else{ ?>
                                <input type="button" class="textOption" value="<?php echo $item_size; ?>">
                            <?php }
                            endforeach; ?> 
                            <input type="hidden" id="text_size" name="text_size" value="<?php echo $detail_size['text_size'][0]; ?>">
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
                            <input class="input_number" type="number" name="quantity" maxlength="100" minlength="1" value="1">
                            <input type="button" class="btn_increase" value="+">
                        </div>
                    </div>
                    <div id="error_pty"></div>
                    <?php echo validation_errors(); ?>
                    <div class="group-item-button">
                        <div class="btn-check-group">
                            <button id="btn_add_cart" onclick="save_cart()" class="save_cart btn-addCart btn-addCart-item">Thêm vào giỏ hàng</button>
                            <button type="submit" id="btn_muangay" class="btn_buy btn_buy-item">Mua ngay</button>
                        </div>
                    </div>
                    </form>
                </div>
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