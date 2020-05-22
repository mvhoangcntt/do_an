<section class="bn-page">
    <img src="<?php echo base_url() ?>public/images/bn-media.jpg" alt="">
    <h2 class="title-page"><?php echo lang('heading_library');?></h2>
    <div class="pr-mouse">
        <div class="mouse">
            <div class="scroll"></div>
        </div>
    </div>
    <div class="scale"></div>
    <div class="scale"></div>
    <div class="scale"></div>
</section>
<section class="page-media page-primary">
    <div class="container">
        <ul class="link-page">
            <li class="active"><a href="" title="">Tất cả</a></li>
            <li><a href="<?php echo base_url('media_library/album/'); ?>" title="">hình ảnh</a></li>
            <li><a href="<?php echo base_url('media_library/video/'); ?>" title="">video</a></li>
        </ul>
        <div class="row">
            <?php $i = 0; foreach ($libraly as $item) { ?>
                <?php if ($item['thumbnail'] == '') { ?>
                    <div class="col-lg-4 col-sm-6">
                        <div class="item-video">
                            <a data-fancybox href="<?php echo $item['href_video']; ?>">
                                <img style="height: 240px; width: 370px;" src="https://i.ytimg.com/vi/<?php echo $item['url_video']; ?>/maxresdefault.jpg" alt="">
                                <span class="icon-play"><img src="<?php echo base_url() ?>public/images/ic-play.png" alt=""></span>
                            </a>
                        </div>
                    </div>
                <?php }else{ $i++; ?>
                    <div class="col-lg-4 col-sm-6">
                        <div class="item-album">
                            <div class="img">
                                <img src="<?php echo getImageThumb($item['thumbnail'],370,240); ?>" alt="">
                            </div>
                            <h3 class="title">Album <?php echo $i; ?></h3>
                            <div class="gallery-img">
                                <a href="<?php echo getImageThumb($item['thumbnail'],370,240); ?>" class="fancy" data-fancybox="album1"><img style="display: none;" src="<?php echo getImageThumb($item['thumbnail'],370,240); ?>" alt=""></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
        <nav aria-label="Page navigation">
            <div class="page"><?php echo $page; ?></div>
        </nav>
    </div>
</section>
