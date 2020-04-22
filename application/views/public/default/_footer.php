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
	            <div class="col-lg-4">
	                <div class="ft-info">
	                    <h3 class="title"><?php echo !empty($company)? $company : ''; ?></h3>
	                    <ul>
	                        <li><i class="icon_pin"></i><?php echo !empty($address)? $address : ''; ?></li>
	                        <li><i class="icon_pin"></i>📍Cơ sở 2: Số nhà 561 đường Lương Ngọc Quyến, TP.Thái Nguyên.  </li>
	                        <li><i class="icon_pin"></i>📍Cơ sở 3: Số nhà 40 đường Quang Trung, TP.Thái Nguyên </li>
	                        

	                        <!-- <li><i class="icon_documents"></i><?php echo !empty($mst)? $mst : ''; ?></li> -->

	                        <!-- <li><i class="icon_mobile"></i><a href="<?php echo !empty($time)? $time : ''; ?>" title="<?php echo !empty($time)? $time : ''; ?>"><?php echo !empty($time)? $time : ''; ?> - <a href="<?php echo !empty($phonee)? $phonee : ''; ?>" title=""><?php echo !empty($phonee)? $phonee : ''; ?></a></li> -->
	                    </ul>
	                </div>
	            </div>
	            <div class="col-lg-4">
	                <div class="ft-info">
	                    <h3 class="title">Hình thức chuyển hàng </h3>
	                    <ul>
	                        <li><i class="fa fa-motorcycle" aria-hidden="true"></i> Ship nội thành (Thái Nguyên) nhanh giá rẻ</li>
	                        <li><i class="fa fa-car icon-order-cart" aria-hidden="true"></i> Ship SCOD Toàn Quốc - Viettel Post </li>

	                    </ul>
	                    <h3 class="title">Điện thoại hỗ trợ </h3>
	                    <ul>
	                        <li><i class="icon_phone"></i><a href="<?php echo !empty($phone)? $phone : ''; ?>" title=""><?php echo !empty($phone)? $phone : ''; ?></a></li>
	                        
	                    </ul>
	                </div>
	            </div>
	            <div class="col-lg-4">
	                <div class="ft-fanpage">
	                    <div class="row col-mar-9 cover-fb">
	                        <div class="fb-page"
							  data-href="https://www.facebook.com/shophoantuyet/" 
							  data-width="340"
							  data-hide-cover="false"
							  data-show-facepile="true"></div>
							  <div id="fb-root"></div>
							<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=2500758213571677&autoLogAppEvents=1"></script>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div> 
	</div>
	<div class="copy-right">
	    © 2003 Hoàn Tuyết - thương hiệu thời trang nam hàng đầu Thái Nguyên. Designed by <a href="https://www.facebook.com/mvhoangcntt/" title="MV Hoàng" target="__blank">MV Hoàng</a>
	</div>  
</footer>