<section class="bn-page">
    <img src="<?php echo base_url() ?>public/images/bn-news.jpg" alt="">
    <h2 class="title-page"><?php echo lang('heading_news');?></h2>
    <div class="pr-mouse">
        <div class="mouse">
            <div class="scroll"></div>
        </div>
    </div>
    <div class="scale"></div>
    <div class="scale"></div>
    <div class="scale"></div>
</section>
<section class="page-news page-primary">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="details-news">
                    <h1 class="title-news"><?php echo $detail->title; ?></h1>
                    <div class="control">
                        <div class="time"><?php echo date("d.m.Y",strtotime($detail->created_time));?><span> 
                            <?php echo $detail->timeAgo; ?></span>
                        </div>
                        <div class="s-social">
                            <a class="smooth f" href="https://www.facebook.com/sharer.php?u=<?php echo base_url(uri_string()); ?>" target="_blank" title=""><i class="fa fa-facebook-square"></i>&nbsp; Share 3M</a>
                            <a class="smooth" href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site <?php echo base_url(uri_string()); ?>" title=""><i class="fa fa-envelope"></i></a>
                            <a class="smooth" media="print" href="#" title=""><i class="fa fa-print"></i></a>
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
            <div class="col-lg-4">
                <div class="sb-news">
                    <h2 class="title-sb"><?php echo lang('heading_view_new_Related_to');?></h2>
                    <div class="list">
                        <?php foreach ($new_limit as $key) { ?>
                        <div class="item-sb-news">
                            <a href="<?php echo $key->url; ?>" title="<?php echo $key->title; ?>" class="img"><img src="<?php echo getImageThumb($key->thumbnail, 155, 110); ?>" alt="<?php echo $key->title; ?>"></a>
                            <div class="ct">
                                <h3 class="title"><a href="<?php echo $key->url; ?>" title="<?php echo $key->title; ?>"><?php echo $key->title; ?></a></h3>
                                <span class="time"><?php echo date("d.m.Y",strtotime($key->created_time)); ?></span>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <!-- <h2 class="title-sb">TAGS</h2>
                    <ul class="tags-news">
                        <li><a href="" title="">Hồ tiêu</a></li>
                        <li><a href="" title="">USDA</a></li>
                        <li><a href="" title="">Sàn giao dịch</a></li>
                        <li><a href="" title="">Ngũ cốc</a></li>
                        <li><a href="" title="">Nông nghiệp</a></li>
                        <li><a href="" title="">Năng suất </a></li>
                        <li><a href="" title="">Trung Quốc</a></li>
                        <li><a href="" title="">Mỹ</a></li>
                        <li><a href="" title="">Hàn Quốc</a></li>
                    </ul> -->
                </div>
            </div>
        </div>
    </div>
</section>