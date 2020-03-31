<?php 
    $company = $this->settings['contact'][$this->session->public_lang_code]['company'];
    $address = $this->settings['contact'][$this->session->public_lang_code]['address']; 
    $phone   = $this->settings['contact'][$this->session->public_lang_code]['phone'];
    $office     = $this->settings['contact'][$this->session->public_lang_code]['office'];
    $website     = $this->settings['contact'][$this->session->public_lang_code]['website'];
?>
<section class="bn-page">
    <img src="<?php echo base_url() ?>public/images/bn-contact.jpg" alt="">
    <h2 class="title-page"><?php echo lang('heading_contact');?></h2>
    <div class="pr-mouse">
        <div class="mouse">
            <div class="scroll"></div>
        </div>
    </div>
    <div class="scale"></div>
    <div class="scale"></div>
    <div class="scale"></div>
</section>
<section class="page-contact page-primary">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="info-contact">
                    <h2 class="head-contact"><?php echo lang('heading_head_contact');?></h2>
                    <h3 class="name"><?php echo !empty($company)? $company : ''; ?></h3>
                    <ul>
                        <li><b><?php echo lang('heading_headquarters');?>:</b> <?php echo !empty($address)? $address : ''; ?></li>
                        <li><b><?php echo lang('heading_office');?>:</b> <?php echo !empty($office)? $office : ''; ?></li>
                        <li><b><?php echo lang('heading_website');?>:</b> <a href="<?php echo !empty($website)? $website : ''; ?>" title="<?php echo !empty($website)? $website : ''; ?>" target="__blank"><?php echo !empty($website)? $website : ''; ?></a></li>
                        <li><b><?php echo lang('heading_phone');?>:</b> <a href="<?php echo !empty($phone)? $phone : ''; ?>" title="<?php echo !empty($phone)? $phone : ''; ?>"><?php echo !empty($phone)? $phone : ''; ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-contact">
                    <?php echo form_open('',['id'=>'form','class'=>'']) ?>
                    <h2 class="head-contact">liên hệ với chúng tôi</h2>
                    <div class="row col-mar-10">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="fullname" class="form-control" placeholder="Họ và tên">
                                <i class="icon_profile"></i>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                                <i class="icon_mail"></i>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="address" class="form-control" placeholder="Địa chỉ">
                                <i class="icon_pin"></i>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="tel" name="phone" class="form-control" placeholder="Điện thoại">
                                <i class="icon_phone"></i>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="tel" name="fax" class="form-control" placeholder="Fax">
                                <i class="icon_printer-alt"></i>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="company" class="form-control" placeholder="Công ty">
                                <i class="icon_toolbox"></i>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea rows="3" name="content" class="form-control" placeholder="Nội dung liên hệ"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="captcha-submit">
                        <div class="captcha">
                            <script src='https://www.google.com/recaptcha/api.js'></script>
                            <div class="g-recaptcha" data-sitekey="6LcnESYTAAAAABNZAdIbC71wPnutdlrhTrMmzENZ"></div>
                        </div>
                        <div class="view-primary v3">
                            <a onclick="save()" title="">Gửi</a>
                        </div>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="map">
    <div id="map"></div>     
</div>
<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAeERZGTMeCEHUw7dIEac2DPzJZUtv_PrU&callback=initMap">
</script>