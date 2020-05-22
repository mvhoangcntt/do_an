
<section class="page-news">
    <div class="container">
        <div class="row details">
            <div class="col-lg-2 col-md-6 margin-bottom">
                <form class="form_seemore_gia" id="form-seemore-boloc">
                <input type="hidden" name="get_url" value="<?php echo uri_string(); ?>">
                <input type="hidden" name="get_search" value="<?php echo isset($_POST['search']) ? $_POST['search'] :'' ?>">
                <div class="container">
                	<div class="row">
                		<div class="seemore-loctheo">
                			<div>Bộ lọc sản phẩm</div>
                			<div><i class="fa fa-caret-down fa-seemore-boloc" aria-hidden="true"></i></div>
                		</div>
                	</div>
                    <div class="row seemore-boloc">
                        <div>
                            <label class="checkboxbl">
                                <input type="checkbox" name="giamgia" class="checkbox-seemore">
                                <span class="box_3_lh">
                                <svg viewBox="0 0 48 48" width="1em" height="1em" class="icon_HFMC">
                                    <g data-name="Layer 2">
                                        <g data-name="Layer 1">
                                            <path d="M0 0h48v48H0z" fill="none"></path>
                                            <path d="M40 15.46l-3.63-3.47-17.81 16.96-6.78-6.47L8 26.09l9.77 9.32.02-.01.63.61L40 15.46z"></path>
                                        </g>
                                    </g>
                                </svg>
                                </span>
                                <span>Mua nhiều giảm giá</span>
                            </label>
                            
                        </div>
                    </div>
                </div>


                <div class="container">
                    <div class="row">
                        <div class="seemore-loctheo">
                            <div>Lọc theo giá (VNĐ)</div>
                            <div><i class="fa fa-caret-down fa-seemore-theogia" aria-hidden="true"></i></div>
                        </div>
                    </div>
                    <div class="row seemore-theogia">
                        <!-- <form class="form_seemore_gia"> -->
                            <input class="inputPrice_gia form-control min_price" name="min_price" placeholder="Thấp nhất" type="text" value="0">
                            <input class="inputPrice_gia form-control max_price" name="max_price" placeholder="Cao nhất" type="text" value="0">
                            <!-- <button class="btn_seemore_gia" type="submit">Tìm</button> -->
                        <!-- </form> -->
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="seemore-loctheo">
                            <div>Lọc theo màu sắc</div>
                            <div><i class="fa fa-caret-down fa-seemore-mausac" aria-hidden="true"></i></div>
                        </div>
                    </div>
                    <div class="row seemore-mausac">
                        <style type="text/css">
                            .select2-container--default .select2-selection--single{
                                height: 38px;
                                border: 1px solid #ced4da;
                            }  
                            .select2-container--default .select2-selection--single .select2-selection__rendered{
                                border-radius: 0;
                                padding: 4px 12px;
                            }
                            .select2-container--default .select2-selection--single .select2-selection__arrow{
                                height: 38px;
                            }
                            .select2-container--default .select2-selection--single .select2-selection__clear{
                                margin-right: 7px;
                            }
                        </style>
                        
                        <select class="form-control select2 filter_coler" title="filter" name="text_coler" style="width: 100%;" tabindex="-1" aria-hidden="true"></select>
                    </div>

                </div>
                <div class="container">
                    <div class="row">
                        <div class="seemore-loctheo">
                            <div>Lọc theo size</div>
                            <div><i class="fa fa-caret-down fa-seemore-size" aria-hidden="true"></i></div>
                        </div>
                    </div>
                    <div class="row seemore-size">
                        <select class="form-control select2 filter_size" title="filter" name="text_size" style="width: 100%;" tabindex="-1" aria-hidden="true"></select>
                    </div>

                </div>
                </form>
            </div>
            <div class="col-lg-10 col-md-6 text-details-product">
                <div class="name-details">
                    <div class="text-link">
                        <nav>
                            <ol>
                                <a href="<?php echo base_url() ?>"><?php echo str_replace(array('http://','https://'), '', substr(base_url(),0,strlen(base_url())-1)); ?></a>
                                <li><a href="">Thời trang nam</a></li>
                                <li><a class="name_catalog" href=""><?php echo $name_catalog;  ?></a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="seemore-title">
                        <div class="name_catalog"><?php echo $name_catalog;  ?></div><div class="count-product"> (<?php echo count($product)  ?> sản phẩm)</div>
                    </div>
                </div>
                <div class="row list-product-form-seemore">
                    <div class="container">
                        <div class="list-news">
                            <div class="row get_seemore_ajax">
                                <?php foreach ($product as $news_item): ?>
                                    <div class="col-lg-3 col-md-4 col-6">
                                        <div class="item-news" id="<?php echo $news_item->id; ?>">
                                            <a href="<?php echo $news_item->url; ?>" title="<?php echo $news_item->title; ?>" class="img"><img src="<?php echo base_url('public/media/'.$news_item->thumbnail); ?>" alt="<?php echo $news_item->title; ?>"></a>
                                            <div class="ct">
                                                <a href="<?php echo $news_item->url; ?>">
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
        </div>
    </div>
</section>