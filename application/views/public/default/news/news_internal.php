<!-- Nội bộ -->
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
        <ul class="link-page">
            <li><a href="<?php echo base_url('news'); ?>" title="<?php echo lang('text_news_all');?>"><?php echo lang('text_news_all');?></a></li>
            <li><a href="<?php echo base_url('news/featured'); ?>" title="<?php echo lang('text_news_featured_id');?>"><?php echo lang('text_news_featured_id');?></a></li>
            <li class="active"><a href="<?php echo base_url('news/internal'); ?>" title="<?php echo lang('text_news_internal');?>"><?php echo lang('text_news_internal');?></a></li>
            <li><a href="#" title="<?php echo lang('text_news_recruitment');?>"><?php echo lang('text_news_recruitment');?></a></li>
        </ul>
        <div class="list-news">
            <div class="row">
                <?php foreach ($news as $item) {?>
                <div class="col-lg-4 col-md-6">
                    <div class="item-news">
                        <a href="<?php echo $item['url']; ?>" title="<?php echo $item['title']; ?>" class="img"><img src="<?php echo base_url() ?>public/media/<?php echo $item['thumbnail']; ?>" alt="<?php echo $item['title']; ?>"></a>
                        <div class="ct">
                            <span class="time"><?php echo date("d.m.Y",strtotime($item['created_time'])); ?></span>
                            <h3 class="title"><a href="<?php echo $item['url']; ?>" title="<?php echo $item['title']; ?>"><?php echo $item['title']; ?></a></h3>
                        </div>
                    </div>
                </div>

                <?php } ?>
                
            </div>
            <nav aria-label="Page navigation">
                <div class="page"><?php echo $page; ?></div>
            </nav>
        </div>
    </div>
</section>
