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
                    	<form id="form_uudai">
                        <input type="email" class="form-control" name="email_uudai" placeholder="<?php echo lang('from_email');?>">
                        <button class="uudai"><img src="<?php echo base_url() ?>public/images/ic-mail.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
	$company = $this->settings['contact'][$this->session->public_lang_code]['company'];
	$address = $this->settings['contact'][$this->session->public_lang_code]['address']; 
	$address1 = $this->settings['contact'][$this->session->public_lang_code]['address1']; 
	$address2 = $this->settings['contact'][$this->session->public_lang_code]['address2']; 
	$phone   = $this->settings['contact'][$this->session->public_lang_code]['phone'];
	$ship     = $this->settings['contact'][$this->session->public_lang_code]['ship'];
	$shiper   = $this->settings['contact'][$this->session->public_lang_code]['shiper'];
	// $phone  = $this->settings['contact'][$this->session->public_lang_code]['phone'];
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
	                        <li><i class="icon_pin"></i><?php echo !empty($address1)? $address1 : ''; ?> </li>
	                        <li><i class="icon_pin"></i><?php echo !empty($address2)? $address2 : ''; ?></li>
	                        

	                        <!-- <li><i class="icon_documents"></i><?php echo !empty($mst)? $mst : ''; ?></li> -->

	                        <!-- <li><i class="icon_mobile"></i><a href="<?php echo !empty($time)? $time : ''; ?>" title="<?php echo !empty($time)? $time : ''; ?>"><?php echo !empty($time)? $time : ''; ?> - <a href="<?php echo !empty($phonee)? $phonee : ''; ?>" title=""><?php echo !empty($phonee)? $phonee : ''; ?></a></li> -->
	                    </ul>
	                </div>
	            </div>
	            <div class="col-lg-4">
	                <div class="ft-info">
	                    <h3 class="title">Hình thức chuyển hàng </h3>
	                    <ul>
	                        <li><i class="fa fa-motorcycle" aria-hidden="true"></i> <?php echo !empty($ship)? $ship : ''; ?></li>
	                        <li><i class="fa fa-car icon-order-cart" aria-hidden="true"></i> <?php echo !empty($shiper)? $shiper : ''; ?></li>

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