<?php 
$slide1 = getImageThumb($this->settings['home'][$this->session->public_lang_code]['image_home1'],1920,880);
$title1 = !empty($this->settings['home'][$this->session->public_lang_code]['title1']) ? $this->settings['home'][$this->session->public_lang_code]['title1'] : '' ;
$home_link1 = !empty($this->settings['home'][$this->session->public_lang_code]['home_link1']) ? $this->settings['home'][$this->session->public_lang_code]['home_link1'] : '' ;

$slide2 = getImageThumb($this->settings['home'][$this->session->public_lang_code]['image_home2'],1920,880);
$title2 = !empty($this->settings['home'][$this->session->public_lang_code]['title2']) ? $this->settings['home'][$this->session->public_lang_code]['title2'] : '' ;
$home_link2 = !empty($this->settings['home'][$this->session->public_lang_code]['home_link2']) ? $this->settings['home'][$this->session->public_lang_code]['home_link2'] : '' ;

$slide3 = getImageThumb($this->settings['home'][$this->session->public_lang_code]['image_home3'],1920,880);
$title3 = !empty($this->settings['home'][$this->session->public_lang_code]['title2']) ? $this->settings['home'][$this->session->public_lang_code]['title2'] : '' ;
$home_link3 = !empty($this->settings['home'][$this->session->public_lang_code]['home_link3']) ? $this->settings['home'][$this->session->public_lang_code]['home_link3'] : '' ;

 ?>
<section class="banner-home">
    <div class="sl-home owl-carousel">
        <div class="item">
            <img src="<?php echo $slide1;?>" alt="<?php echo $slide1;?>">
            <div class="ct" data-animation="animated zoomIn delay08">
                <div class="caption">
                    <h2 class="title">
                        <?php echo $title1; ?>
                    </h2>
                    <div class="view-primary v2">
                        <a href="<?php echo $home_link1; ?>" title=""><?php echo lang('heading_slide');?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="<?php echo $slide2;?>" alt="<?php echo $slide2;?>">
            <div class="ct" data-animation="animated zoomIn delay08">
                <div class="caption">
                    <h2 class="title">
                        <?php echo $title2; ?>
                    </h2>
                    <div class="view-primary v2">
                        <a href="<?php echo $home_link2; ?>" title=""><?php echo lang('heading_slide');?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="<?php echo $slide3;?>" alt="<?php echo $slide3;?>">
            <div class="ct" data-animation="animated zoomIn delay08">
                <div class="caption">
                    <h2 class="title">
                        <?php echo $title3; ?>
                    </h2>
                    <div class="view-primary v2">
                        <a href="<?php echo $home_link3; ?>" title=""><?php echo lang('heading_slide');?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pr-mouse">
        <div class="mouse">
            <div class="scroll"></div>
        </div>
    </div>
    <div class="scale"></div>
    <div class="scale"></div>
    <div class="scale"></div>
</section>
<section class="intro-home">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 order-lg-2">
                <div class="head-intro">
                    <h3 class="title">giới thiệu</h3>
                    <span class="desc"><?php echo $this->settings['home'][$this->session->public_lang_code]['lecturers']; ?></span>
                    <img src="<?php echo base_url() ?>public/images/bg-intro.png" alt="">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="block-intro">
                    <img src="<?php echo base_url() ?>public/images/intro1.png" alt="">
                    <div class="ct">
                        <h3 class="title">Tầm nhìn</h3>
                        <?php echo $this->settings['home'][$this->session->public_lang_code]['course']; ?>
                    </div>
                </div>
                <div class="block-intro">
                    <img src="<?php echo base_url() ?>public/images/intro2.png" alt="">
                    <div class="ct">
                        <h3 class="title">Sứ mệnh</h3>
                        <?php echo $this->settings['home'][$this->session->public_lang_code]['t_course']; ?>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 order-lg-2">
                <div class="block-intro">
                    <img src="<?php echo base_url() ?>public/images/intro3.png" alt="">
                    <div class="ct">
                        <h3 class="title">giá trị cốt lõi</h3>
                        <?php echo $this->settings['home'][$this->session->public_lang_code]['t_lecturers']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="member-home sec-pri">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="wrap-member">
                    <h2 class="title-primary v2"><?php echo lang('heading_company');?></h2>
                    <div class="member-cas owl-carousel">
                        <div class="item">
                            <div class="img">
                                <img src="<?php echo base_url() ?>public/images/member.jpg" alt="" title="" />
                                <span class="outline"></span>
                                <span class="logo-mem"><img src="<?php echo base_url() ?>public/images/logo-mb1.png" alt=""></span>
                            </div>
                            <div class="ct">
                                <h3 class="title"><a class="smooth" href="#" title="">tomita mart <span>tomitamart.vn</span></a></h3>
                                <p>TOMITA MART - Siêu thị thực phẩm cao cấp ra đời với mong muốn mang đến cho mọi người, mọi gia đình niềm vui, sự hài lòng trong sinh hoạt hàng ngày thông qua những sản phẩm ưu việt và dịch vụ mua hàng tiện lợi.</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img">
                                <img src="<?php echo base_url() ?>public/images/member1.jpg" alt="" title="" />
                                <span class="outline"></span>
                                <span class="logo-mem"><img src="<?php echo base_url() ?>public/images/logo-mb1.png" alt=""></span>
                            </div>
                            <div class="ct">
                                <h3 class="title"><a class="smooth" href="#" title="">tomita mart<span>tomitamart.vn</span></a></h3>
                                <p>TOMITA MART - Siêu thị thực phẩm cao cấp ra đời với mong muốn mang đến cho mọi người, mọi gia đình niềm vui, sự hài lòng trong sinh hoạt hàng ngày thông qua những sản phẩm ưu việt và dịch vụ mua hàng tiện lợi.</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img">
                                <img src="<?php echo base_url() ?>public/images/member.jpg" alt="" title="" />
                                <span class="outline"></span>
                                <span class="logo-mem"><img src="<?php echo base_url() ?>public/images/logo-mb1.png" alt=""></span>
                            </div>
                            <div class="ct">
                                <h3 class="title"><a class="smooth" href="#" title="">Tomita oroshi<span>tomitamart.vn</span></a></h3>
                                <p>TOMITA MART - Siêu thị thực phẩm cao cấp ra đời với mong muốn mang đến cho mọi người, mọi gia đình niềm vui, sự hài lòng trong sinh hoạt hàng ngày thông qua những sản phẩm ưu việt và dịch vụ mua hàng tiện lợi.</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img">
                                <img src="<?php echo base_url() ?>public/images/member1.jpg" alt="" title="" />
                                <span class="outline"></span>
                                <span class="logo-mem"><img src="<?php echo base_url() ?>public/images/logo-mb1.png" alt=""></span>
                            </div>
                            <div class="ct">
                                <h3 class="title"><a class="smooth" href="#" title="">Tomita oroshi<span>tomitamart.vn</span></a></h3>
                                <p>TOMITA MART - Siêu thị thực phẩm cao cấp ra đời với mong muốn mang đến cho mọi người, mọi gia đình niềm vui, sự hài lòng trong sinh hoạt hàng ngày thông qua những sản phẩm ưu việt và dịch vụ mua hàng tiện lợi.</p>
                            </div>
                        </div>
                    </div>
                    <div class="member-list">
                        <div class="item smooth view-primary active"><a href="" title="">Tomita mart</a></div>
                        <div class="item smooth view-primary"><a href="" title="">Tomita mart</a></div>
                        <div class="item smooth view-primary"><a href="" title="">Tomita oroshi</a></div>
                        <div class="item smooth view-primary"><a href="" title="">Tomita oroshi</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="news-home sec-pri">
    <div class="container">
        <h2 class="title-primary"><?php echo lang('heading_news');?></h2>
        <div class="row">
            <div class="col-lg-6">
                <?php //var_dump($new_home);
                //echo $new_home[0]->id; ?>
                <div class="item-news-home v2">
                    <div class="time">
                        <strong><?php echo date("d",strtotime($new_home[0]->created_time));?></strong>
                        <span><?php echo date("m-Y",strtotime($new_home[0]->created_time));?></span>
                    </div>
                    <a href="<?php echo $new_home[0]->url; ?>" title="<?php echo $new_home[0]->title; ?>" class="img"><img src="<?php echo getImageThumb($new_home[0]->thumbnail, 570, 390); ?>" alt="<?php echo $new_home[0]->title; ?>"></a>
                    <div class="ct">
                        <h3 class="title"><a href="<?php echo $new_home[0]->url; ?>" title="<?php echo $new_home[0]->title; ?>"><?php echo $new_home[0]->title; ?></a></h3>
                    </div>
                    <a href="<?php echo $new_home[0]->url; ?>" title="<?php echo $new_home[0]->title; ?>" class="view-all"><span><?php echo lang('heading_view_new');?><i class="fa fa-arrow-right"></i></span></a>
                    <a href="<?php echo $new_home[0]->url; ?>" title="<?php echo $new_home[0]->title; ?>" class="link"></a>
                </div>
            </div>
            <div class="col-lg-6">
                <?php foreach ($new_home as $key => $value) { ?>
                <?php if ($key > 0){?>    
                <div class="item-news-home">
                    <div class="time">
                        <strong><?php echo date("d",strtotime($value->created_time));?></strong>
                        <span><?php echo date("m-Y",strtotime($value->created_time));?></span>
                    </div>
                    <div class="ct">
                        <h3 class="title"><a href="<?php echo $value->url; ?>" title="<?php echo $value->title; ?>"><?php echo $value->title; ?></a></h3>
                    </div>
                </div>
                <?php }} ?>
                <a href="<?php echo base_url('news'); ?>" title="<?php echo lang('heading_view_new_all');?>" class="view-all"><span><?php echo lang('heading_view_new_all');?></span></a>
            </div>
        </div>
    </div>
</section>
<section class="gallery-home sec-pri">
    <div class="container">
        <h2 class="title-primary"><?php echo lang('heading_library');?></h2>
        <div class="cas-gallery owl-carousel">
            <?php foreach ($libraly_home as $item) { 
                if ($item['thumbnail'] != ''){ ?>
            <div class="item">
                <a href="<?php echo getImageThumb($item['thumbnail'], 370, 240); ?>" title="<?php echo getImageThumb($item['thumbnail'], 370, 240); ?>" data-fancybox="gallery">
                    <img src="<?php echo getImageThumb($item['thumbnail'], 370, 240); ?>" alt="<?php echo getImageThumb($item['thumbnail'], 370, 240); ?>">
                </a>
            </div>
            <?php }} ?>
        </div>
    </div>
</section>
<section class="tomita-member">
    <div class="container">
        <div class="cas-member owl-carousel">
            <a href="" title="" class="item"><img src="<?php echo base_url() ?>public/images/logo-member1.png" alt=""></a>
            <a href="" title="" class="item"><img src="<?php echo base_url() ?>public/images/logo-member2.png" alt=""></a>
            <a href="" title="" class="item"><img src="<?php echo base_url() ?>public/images/logo-member3.png" alt=""></a>
            <a href="" title="" class="item"><img src="<?php echo base_url() ?>public/images/logo-member4.png" alt=""></a>
            <a href="" title="" class="item"><img src="<?php echo base_url() ?>public/images/logo-member5.png" alt=""></a>
        </div>
    </div>
</section>

<!-- footer -->
 

