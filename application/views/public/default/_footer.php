<section class="new-letter">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <ul class="socials-home">
                    <li><a href="" title=""><i class="social_facebook"></i></a></li>
                    <li><a href="" title=""><i class="social_youtube"></i></a></li>
                    <li><a href="" title=""><i class="social_instagram"></i></a></li>
                </ul>
            </div>
            <div class="col-lg-8">
                <div class="form-letter">
                    <span><?php echo lang('from_registration');?></span>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="<?php echo lang('from_email');?>">
                        <button><img src="<?php echo base_url() ?>public/images/ic-mail.png" alt=""></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
	$company = $this->settings['contact'][$this->session->public_lang_code]['company'];
	$address = $this->settings['contact'][$this->session->public_lang_code]['address']; 
	$phone   = $this->settings['contact'][$this->session->public_lang_code]['phone'];
	$mst     = $this->settings['contact'][$this->session->public_lang_code]['mst'];
	$time    = $this->settings['contact'][$this->session->public_lang_code]['time'];
	$phonee  = $this->settings['contact'][$this->session->public_lang_code]['phonee'];
?>
<footer>
	<div class="footer-top">
	    <div class="container">
	        <div class="row">
	            <div class="col-lg-5">
	                <div class="ft-info">
	                    <h3 class="title"><?php echo !empty($company)? $company : ''; ?></h3>
	                    <ul>
	                        <li><i class="icon_pin"></i><?php echo !empty($address)? $address : ''; ?></li>

	                        <li><i class="icon_phone"></i><a href="<?php echo !empty($phone)? $phone : ''; ?>" title=""><?php echo !empty($phone)? $phone : ''; ?></a></li>

	                        <li><i class="icon_documents"></i><?php echo !empty($mst)? $mst : ''; ?></li>

	                        <li><i class="icon_mobile"></i><a href="<?php echo !empty($time)? $time : ''; ?>" title="<?php echo !empty($time)? $time : ''; ?>"><?php echo !empty($time)? $time : ''; ?> - <a href="<?php echo !empty($phonee)? $phonee : ''; ?>" title=""><?php echo !empty($phonee)? $phonee : ''; ?></a></li>
	                    </ul>
	                </div>
	            </div>
	            <div class="col-lg-7">
	                <div class="ft-fanpage">
	                    <div class="row col-mar-9">
	                        <div class="col-lg-6">
	                            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ftomitafarm.vietnam%2F&tabs&width=315&height=70&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=false&appId=1863080223943997" width="315" height="70" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
	                        </div>
	                        <div class="col-lg-6">
	                            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ftomitaoroshi.vietnam%2F&tabs&width=315&height=70&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=false&appId=1863080223943997" width="315" height="70" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
	                        </div>
	                        <div class="col-lg-6">
	                            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ftomitamart%2F&tabs=timeline&width=315&height=70&small_header=true&adapt_container_width=false&hide_cover=false&show_facepile=false&appId=1863080223943997" width="315" height="70" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
	                        </div>
	                        <div class="col-lg-6">
	                            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ftomitaprofarm%2F&tabs&width=315&height=70&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=false&appId=1863080223943997" width="315" height="70" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
	                        </div>
	                        <div class="col-lg-6">
	                            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FTomita-Bento-2266870830194021%2F&tabs&width=315&height=70&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=false&appId=1863080223943997" width="315" height="70" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div> 
	</div>
	<div class="copy-right">
	    © 2018 CÔNG TY CỔ PHẦN TRANG TRẠI TOMITA VIỆT NAM. Designed by <a href="http://apecsoft.asia/" title="Apecsoft" target="__blank">Apecsoft</a>
	</div>  
</footer>