<header>
    <div class="container">
        <div class="wrap-header">
            <a href="<?php echo base_url() ?>" title="" class="logo"><!-- <img src="<?php echo base_url() ?>public/images/logo.png" alt=""> -->Hoàn Tuyết</a>
            <div><a href="<?php echo base_url() ?>home" title="" class="iconmenu"><i class="fa fa-bars" aria-hidden="true"></i></a></div>
            <div class="show_menu">
                <div class="s_menu">
                    <?php //echo topNavBar('','',''); ?>
                    <ul>
                        <li>
                            <div class=""></i><a href="">Áo sơ mi</a></div>
                            <ul>
                                <li>
                                    <div><a href="">Áo len</a></div>
                                    <ul>
                                        <li><div><a href="">Áo len</a></div>
                                            <ul>
                                                <li><div><a href="">Áo len</a></div></li>
                                                <li><div><a href="">Áo len</a></div></li>
                                            </ul>
                                        </li>
                                        <li><div><a href="">Áo len</a></div></li>
                                    </ul>
                                </li>
                                <li><div><a href="">Áo len</a></div></li>
                            </ul>
                        </li>
                        <li>
                            <div><a href="">Quần jin</a></div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="header-right">
                <nav class="d-nav">
                    <?php //echo topNavBar('','',''); ?>
                    <ul>
                        <li><form>    
                            <div class="header-search">
                                <div><input class="ip_search" type="text" name="search" placeholder="Tìm kiếm sản phẩm !"></div>
                                <div><button type="submit" class="_search"><i class="icon_search"></i> Tìm kiếm</button></div>
                                <div><button type="submit" class="_search2"><i class="icon_search"></i></button></div>
                            </div>
                            </form>
                        </li>
                        <li><a class="smooth" href="<?php echo base_url() ?>contact/" title="">Liên hệ</a></li>
                        <li><a class="smooth" href="<?php echo base_url() ?>about/" title="">Kiểm tra đơn hàng</a></li>
                        <li><a class="smooth" href="<?php echo base_url() ?>" title="">Đăng nhập</a></li>
                        <li>
                            <div class="viewed">
                                <div>
                                    <a id="a-viewed" href="">
                                        <img class="img-viewed" width="32px" height="32px" src="<?php echo base_url() ?>public/images/img1.jpg" alt="ĐẦM HỌA TIẾT HOA VÀNG GUMAC MS129107_VANG">
                                    </a>
                                </div>
                                <div>
                                    <a id="a-viewed" href="">
                                        <img class="img-viewed" width="32px" height="32px" src="<?php echo base_url() ?>public/images/img1.jpg" alt="Váy xinh đón tết [Được xem hàng]">
                                    </a>
                                </div>
                                <div>
                                    <a id="a-viewed" href="#">
                                        <img class="img-viewed" width="32px" height="32px" src="<?php echo base_url() ?>public/images/img1.jpg" alt="Váy xinh đón tết [Được xem hàng]">
                                    </a>
                                </div>
                                <div><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                <div class="list_viewed">
                                    
                                    


                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
                
                <div class="header-crt">
                    <a href="" title="" class="header-lang"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                    <div class="number">4</div>
                </div>
                <div class="icon-menu open-mnav">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            
        </div>
    </div>
</header>

<div class="screen_hide"></div>
<div class="hide-viewed">
    <iframe data-src="<?php echo base_url() ?>home/viewed" width = "100%" height = "100%" scrolling="no" frameborder="0" src="<?php echo base_url() ?>home/viewed"></iframe>
</div>