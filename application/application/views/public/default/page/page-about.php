<?php 
$tabs3     = getImageThumb($this->settings['about'][$this->session->public_lang_code]['image_cotloi'], 1170, 360);
$sumenh    = getImageThumb($this->settings['about'][$this->session->public_lang_code]['image_sumenh'], 1170, 360);
$tamnhin   = getImageThumb($this->settings['about'][$this->session->public_lang_code]['image_tamnhin'], 1170, 360);
$gioithieu = getImageThumb($this->settings['about'][$this->session->public_lang_code]['image_gioithieu'], 670, 300);
// $root = str_replace('//','/',$tabs3);
 ?>
<section class="bn-page">
    <img src="<?php echo base_url() ?>public/images/bg-about.jpg" alt="">
    <h2 class="title-page"><?php echo lang('text_myself');?></h2>
    <div class="pr-mouse">
        <div class="mouse">
            <div class="scroll"></div>
        </div>
    </div>
    <div class="scale"></div>
    <div class="scale"></div>
    <div class="scale"></div>
</section>
<section class="page-primary">
    <div class="container">
        <div class="intro-about">
            <div class="row">
                <div class="col-lg-5">
                    <div class="ct">
                        <h2 class="title">giới thiệu</h2>
                        <div class="desc">
                            <?php echo !empty($this->settings['about'][$this->session->public_lang_code]['gioithieu']) ? $this->settings['about'][$this->session->public_lang_code]['gioithieu'] : '' ; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="img">
                        <img src="<?php echo $gioithieu; ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="about-tab">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabs1"><span><img src="<?php echo base_url() ?>public/images/ic-ab1.jpg" alt=""></span>Tầm nhìn</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabs2"><span><img src="<?php echo base_url() ?>public/images/ic-ab2.jpg" alt=""></span>sứ mệnh</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tabs3"><span><img src="<?php echo base_url() ?>public/images/ic-ab3.jpg" alt=""></span>giá trị cốt lõi</a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane fade" id="tabs1">
                    <img src="<?php echo $tamnhin ;?>" alt="<?php echo $tamnhin ;?>">
                    <div class="row">
                        <div class="col-lg">
                            <?php echo !empty($this->settings['about'][$this->session->public_lang_code]['tamnhin1']) ? $this->settings['about'][$this->session->public_lang_code]['tamnhin1'] : '' ; ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tabs2">
                    <?php if (isset($sumenh)) {
                       echo "<img src=".$sumenh." alt=".$sumenh.">";
                    } ?>
                    <div class="row">
                        <div class="col-lg">
                            <?php echo !empty($this->settings['about'][$this->session->public_lang_code]['sumenh1']) ? $this->settings['about'][$this->session->public_lang_code]['sumenh1'] : '' ; ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade active show" id="tabs3">
                    <img src="<?php echo $tabs3 ;?>" alt="<?php echo $tabs3 ;?>">
                    <div class="row">
                        <div class="col-lg">
                            <div class="item-ab">
                                <?php echo !empty($this->settings['about'][$this->session->public_lang_code]['cotloi1']) ? $this->settings['about'][$this->session->public_lang_code]['cotloi1'] : '' ; ?>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="item-ab">
                                <?php echo !empty($this->settings['about'][$this->session->public_lang_code]['cotloi2']) ? $this->settings['about'][$this->session->public_lang_code]['cotloi2'] : '' ; ?>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="item-ab">
                                <?php echo !empty($this->settings['about'][$this->session->public_lang_code]['cotloi3']) ? $this->settings['about'][$this->session->public_lang_code]['cotloi3'] : '' ; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
