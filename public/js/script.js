(function() {
    var $;
    $ = this.jQuery || window.jQuery;
    win = $(window), body = $('body'), doc = $(document);

    $.fn.hc_accordion = function() {
        var acd = $(this);
        acd.find('ul>li').each(function(index, el) {
            if ($(el).find('ul li').length > 0) $(el).prepend('<button type="button" class="acd-drop"></button>');
        });
        acd.on('click', '.acd-drop', function(e) {
            e.preventDefault();
            var ul = $(this).nextAll("ul");
            if (ul.is(":hidden") === true) {
                ul.parent('li').parent('ul').children('li').children('ul').slideUp(180);
                ul.parent('li').parent('ul').children('li').children('.acd-drop').removeClass("active");
                $(this).addClass("active");
                ul.slideDown(180);
            } else {
                $(this).removeClass("active");
                ul.slideUp(180);
            }
        });
    }

    $.fn.hc_menu = function(options) {
        var settings = $.extend({
                open: '.open-mnav',
            }, options),
            this_ = $(this);
        var m_nav = $('<div class="m-nav"><button class="m-nav-close">&times;</button><div class="nav-ct"></div></div>');
        body.append(m_nav);

        m_nav.find('.m-nav-close').click(function(e) {
            e.preventDefault();
            mnav_close();
        });

        m_nav.find('.nav-ct').append(this_.children().clone());

        var mnav_open = function() {
            m_nav.addClass('active');
            body.append('<div class="m-nav-over"></div>').css('overflow', 'hidden');
        }
        var mnav_close = function() {
            m_nav.removeClass('active');
            body.children('.m-nav-over').remove();
            body.css('overflow', '');
        }

        doc.on('click', settings.open, function(e) {
            e.preventDefault();
            if (win.width() <= 1199) mnav_open();
        }).on('click', '.m-nav-over', function(e) {
            e.preventDefault();
            mnav_close();
        });

        m_nav.hc_accordion();
    }

    $.fn.hc_countdown = function(options) {
        var settings = $.extend({
                date: new Date().getTime() + 1000 * 60 * 60 * 24,
            }, options),
            this_ = $(this);

        var countDownDate = new Date(settings.date).getTime();

        var count = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate - now;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            this_.html('<div class="item"><span>' + days + '</span> ngày</div>' +
                '<div class="item"><span>' + hours + '</span> giờ</div>' +
                '<div class="item"><span>' + minutes + '</span> phút </div>' +
                '<div class="item"><span>' + seconds + '</span> giây </div>'
            );
            if (distance < 0) {
                clearInterval(count);
            }
        }, 1000);
    }

    $.fn.hc_upload = function(options) {
        var settings = $.extend({
                multiple: false,
                result: '.hc-upload-pane',
            }, options),
            this_ = $(this);

        var input_name = this_.attr('name');
        this_.removeAttr('name');

        this_.change(function(e) {
            if ($(settings.result).length > 0) {
                var files = event.target.files;
                if (settings.multiple) {
                    for (var i = 0, files_len = files.length; i < files_len; i++) {
                        var path = URL.createObjectURL(files[i]);
                        var name = files[i].name;
                        var size = Math.round(files[i].size / 1024 / 1024 * 100) / 100;
                        var type = files[i].type.slice(files[i].type.indexOf('/') + 1);

                        var img = $('<img src="' + path + '">');
                        var input = $('<input type="hidden" name="' + input_name + '[]"' +
                            '" value="' + path +
                            '" data-name="' + name +
                            '" data-size="' + size +
                            '" data-type="' + type +
                            '" data-path="' + path +
                            '">');
                        var elm = $('<div class="hc-upload"><button type="button" class="hc-del smooth">&times;</button></div>').append(img).append(input);
                        $(settings.result).append(elm);
                    }
                } else {
                    var path = URL.createObjectURL(files[0]);
                    var img = $('<img src="' + path + '">');
                    var elm = $('<div class="hc-upload"><button type="button" class="hc-del smooth">&times;</button></div>').append(img);
                    $(settings.result).html(elm);
                }
            }
        });

        body.on('click', '.hc-upload .hc-del', function(e) {
            e.preventDefault();
            this_.val('');
            $(this).closest('.hc-upload').remove();
        });
    }

}).call(this);


jQuery(function($) {
    var win = $(window),
        body = $('body'),
        doc = $(document);

    var FU = {
        get_Ytid: function(url) {
            var rx = /^.*(?:(?:youtu\.be\/|v\/|vi\/|u\/\w\/|embed\/)|(?:(?:watch)?\?v(?:i)?=|\&v(?:i)?=))([^#\&\?]*).*/;
            if (url) var arr = url.match(rx);
            if (arr) return arr[1];
        },
        get_currency: function(str) {
            if (str) return str.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        },
        animate: function(elems) {
            var animEndEv = 'webkitAnimationEnd animationend';
            elems.each(function() {
                var $this = $(this),
                    $animationType = $this.data('animation');
                $this.addClass($animationType).one(animEndEv, function() {
                    $this.removeClass($animationType);
                });
            });
        },
    };

    var UI = {
        mMenu: function() {

        },
        header: function() {
            var elm = $('header'),
                h = elm.innerHeight(),
                offset = 200,
                mOffset = 0;
            var fixed = function() {
                elm.addClass('fixed');
                body.css('margin-top', h);
            }
            var unfixed = function() {
                elm.removeClass('fixed');
                body.css('margin-top', '');
            }
            var Mfixed = function() {
                elm.addClass('m-fixed');
                body.css('margin-top', h);
            }
            var unMfixed = function() {
                elm.removeClass('m-fixed');
                body.css('margin-top', '');
            }
            if (win.width() > 991) {
                win.scrollTop() > offset ? fixed() : unfixed();
            } else {
                win.scrollTop() > mOffset ? Mfixed() : unMfixed();
            }
            win.scroll(function(e) {
                if (win.width() > 991) {
                    win.scrollTop() > offset ? fixed() : unfixed();
                } else {
                    win.scrollTop() > mOffset ? Mfixed() : unMfixed();
                }
            });
        },
        backTop: function() {
            var back_top = $('.back-to-top'),
                offset = 800;

            back_top.click(function() {
                $("html, body").animate({ scrollTop: 0 }, 800);
                return false;
            });

            if (win.scrollTop() > offset) {
                back_top.fadeIn(200);
            }

            win.scroll(function() {
                if (win.scrollTop() > offset) back_top.fadeIn(200);
                else back_top.fadeOut(200);
            });
        },
        slider: function() {
            /*$('.slider-cas').slick({
            	nextArrow: '<img src="images/next.png" class="next" alt="Next">',
            	prevArrow: '<img src="images/prev.png" class="prev" alt="Prev">',
            })
            FU.animate($(".slider-cas .slick-current [data-animation ^= 'animated']"));
            $('.slider-cas').on('beforeChange', function(event, slick, currentSlide, nextSlide){
            	if(currentSlide!=nextSlide){
            		var aniElm = $(this).find('.slick-slide').find("[data-animation ^= 'animated']");
            		FU.animate(aniElm);
            	}
            });*/

            /*$('.pro-cas').slick({
	            slidesToShow: 4,
	            slidesToScroll: 1,
	            nextArrow: '<i class="cas-arrow smooth next"></i>',
	            prevArrow: '<i class="cas-arrow smooth prev"></i>',
	            dots: true,
	            autoplay: true,
	            swipeToSlide: true,
	            autoplaySpeed: 4000,
	            responsive: [
	            {
	                breakpoint: 1199,
	                settings: {
	                    slidesToShow: 3,
	                }
	            },
	            {
	                breakpoint: 991,
	                settings: {
	                    slidesToShow: 3,
	                }
	            },
	            {
	                breakpoint: 700,
	                settings: {
	                    slidesToShow: 2,
	                }
	            },
	            {
	                breakpoint: 480,
	                settings: {
	                    slidesToShow: 1,
	                }
	            }
	            ],
	        })*/

            $('.sl-home').owlCarousel({
                items: 1,
		        loop: true,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                responsiveClass: true,
                nav: false,
                dots: true,
                autoplay: true,
                autoPlaySpeed: 8000,
                autoplayTimeout: 8000,
                smartSpeed: 800,
                /*navClass: ["sl-arrow prev", "sl-arrow next"],
                navText: ["<i class='arrow_left_alt'></i>", "<i class='arrow_right_alt'></i>"],*/
                onChanged: slider_change,
		    })
            function slider_change(e) {
                var aniElm = $('.sl-home .owl-item').eq(e.item['index']).find("[data-animation ^= 'animated']");
                FU.animate(aniElm);
            }

            var member = $('.member-cas').owlCarousel({
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                loop: true,
                responsiveClass:true,
                nav: true,
                smartSpeed: 100,
                items: 1,
                margin: 0,
                navText: ["<span class='smooth arrow-cas prev'></span>", "<span class='smooth arrow-cas next'></span>"],
                onChanged: callback,
                // onInitialized: business_load,
            })
            function callback(event) {
                if(event.page['index'] != '-1'){
                    $('.member-list .item.active').removeClass('active');
                    $('.member-list .item').eq(event.page['index']).addClass('active');
                }
            }
            $('.member-list .item').click(function(e) {
                e.preventDefault();
                var this_ = $(this);
                $('.member-list .item.active').removeClass('active');
                this_.addClass('active');
                member.trigger('to.owl.carousel', this_.index());
            });
            // end member carousel


            $('.cas-gallery').owlCarousel({
                loop: false,
                margin: 30,
                dots: false,
                nav: true,
                navText: ["<span class='smooth arrow-cas prev'></span>", "<span class='smooth arrow-cas next'></span>"],
                autoplay: false,
                autoplayTimeout: 5000,
                smartSpeed: 800,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        stagePadding: 30,
                        margin: 10,
                    },
                    450: {
                        items: 2,
                    },
                    768: {
                        items: 3,
                    },
                    1199: {
                        items: 3,
                    },
                    1366: {
                        items: 3,
                    }
                }
            });
            $('.cas-member').owlCarousel({
                loop: false,
                responsiveClass: true,
                nav: true,
                dots: false,
                dotsClass: 'dots',
                smartSpeed: 500,
                margin: 30,
                autoplay: false,
                autoplayTimeout: 5000,
                navClass: ["slide-icon prev", "slide-icon next"],
                navText: ["<i class='arrow_left_alt'></i>", "<i class='arrow_right_alt'></i>"],
                responsive: {
                    1199: {
                        items: 5,
                    },
                    991: {
                        items: 4,
                    },
                    768: {
                        items: 3,
                    },
                    0: {
                        items: 3,
                    }
                }
            });
        },
        input_number: function() {
            doc.on('keydown', '.numberic', function(event) {
                if (!(!event.shiftKey &&
                        !(event.keyCode < 48 || event.keyCode > 57) ||
                        !(event.keyCode < 96 || event.keyCode > 105) ||
                        event.keyCode == 46 ||
                        event.keyCode == 8 ||
                        event.keyCode == 190 ||
                        event.keyCode == 9 ||
                        event.keyCode == 116 ||
                        (event.keyCode >= 35 && event.keyCode <= 39)
                    )) {
                    event.preventDefault();
                }
            });
            doc.on('click', '.i-number .up', function(e) {
                e.preventDefault();
                var input = $(this).parents('.i-number').children('input');
                var max = Number(input.attr('max')),
                    val = Number(input.val());
                if (!isNaN(val)) {
                    if (!isNaN(max) && input.attr('max').trim() != '') {
                        if (val >= max) {
                            return false;
                        }
                    }
                    input.val(val + 1);
                    input.trigger('number.up');
                }
            });
            doc.on('click', '.i-number .down', function(e) {
                e.preventDefault();
                var input = $(this).parents('.i-number').children('input');
                var min = Number(input.attr('min')),
                    val = Number(input.val());
                if (!isNaN(val)) {
                    if (!isNaN(min) && input.attr('max').trim() != '') {
                        if (val <= min) {
                            return false;
                        }
                    }
                    input.val(val - 1);
                    input.trigger('number.down');
                }
            });
        },
        yt_play: function() {
            doc.on('click', '.yt-box .play', function(e) {
                var id = FU.get_Ytid($(this).closest('.yt-box').attr('data-url'));
                $(this).closest('.yt-box iframe').remove();
                $(this).closest('.yt-box').append('<iframe src="https://www.youtube.com/embed/' + id + '?rel=0&amp;autoplay=1&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>');
            });
        },
        psy: function() {
            var btn = '.psy-btn',
                sec = $('.psy-section'),
                pane = '.psy-pane';
            doc.on('click', btn, function(e) {
                e.preventDefault();
                $(this).closest(pane).find(btn).removeClass('active');
                $(this).addClass('active');
                $("html, body").animate({ scrollTop: $($(this).attr('href')).offset().top - 40 }, 600);
            });

            var section_act = function() {
                sec.each(function(index, el) {
                    if (win.scrollTop() + (win.height() / 2) >= $(el).offset().top) {
                        var id = $(el).attr('id');
                        $(pane).find(btn).removeClass('active');
                        $(pane).find(btn + '[href="#' + id + '"]').addClass('active');
                    }
                });
            }
            section_act();
            win.scroll(function() {
                section_act();
            });
        },
        toggle: function() {
            var ani = 100;
            $('[data-show]').each(function(index, el) {
                var ct = $($(el).attr('data-show'));
                $(el).click(function(e) {
                    e.preventDefault();
                    ct.fadeToggle(ani);
                });
            });
            win.click(function(e) {
                $('[data-show]').each(function(index, el) {
                    var ct = $($(el).attr('data-show'));
                    if (ct.has(e.target).length == 0 && !ct.is(e.target) && $(el).has(e.target).length == 0 && !$(el).is(e.target)) {
                        ct.fadeOut(ani);
                    }
                });
            });
        },
        uiCounterup: function() {
            var item = $('.hc-couter'),
                flag = true;
            if (item.length > 0) {
                run(item);
                win.scroll(function() {
                    if (flag == true) {
                        run(item);
                    }
                });

                function run(item) {
                    if (win.scrollTop() + 70 < item.offset().top && item.offset().top + item.innerHeight() < win.scrollTop() + win.height()) {
                        count(item);
                        flag = false;
                    }
                }

                function count(item) {
                    item.each(function() {
                        var this_ = $(this);
                        var num = Number(this_.text().replace(".", ""));
                        var incre = num / 80;

                        function start(counter) {
                            if (counter <= num) {
                                setTimeout(function() {
                                    this_.text(FU.get_currency(Math.ceil(counter)));
                                    counter = counter + incre;
                                    start(counter);
                                }, 20);
                            } else {
                                this_.text(FU.get_currency(num));
                            }
                        }
                        start(0);
                    });
                }
            }
        },
        ready: function() {
            //UI.mMenu();
            //UI.header();
            UI.slider();
            UI.backTop();
            // UI.toggle();
            //UI.input_number();
            //UI.uiCounterup();
            // UI.yt_play();
            // UI.psy();
        },
    }


    UI.ready();


    /*custom here*/
    $('.d-nav').hc_menu({
        open: '.open-mnav',
    })
    $('.ic-search').click(function(event) {
        $(this).children('i').toggleClass('fa-search fa-close');
        $('.header-search .form-search').toggleClass('show');
    });
    //menu header scroll
    $(window).scroll(function() {
        if ($(window).scrollTop() > 0){
            $('header').addClass('scroll');
            $(".show_menu").addClass('show_');
            $(".show-viewed").addClass('show-viewed_');
        }
        else {
            $('header').removeClass('scroll toggle-menu');
            $('.show_menu').removeClass('show_');
            $('.show-viewed').removeClass('show-viewed_');
        }
    });
    if ($(window).width() > 991) {
        if ($('.sb-news').length > 0) {
            $('.sb-news').stick_in_parent({
                offset_top: 110,
            });
        }
    }
    /*if($("[data-fancybox]").length){
        $("[data-fancybox]").fancybox({
            thumbs : {
                autoStart : true,
                axis      : 'x'
            }
        })
    }*/
})
function initMap() {
    // to the map type control.
    var map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 21.5526146, lng: 105.842387 },
        zoom: 18,
        scrollwheel: false,
        mapTypeControlOptions: {
            mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain',
                'styled_map'
            ]
        }
    });

    
    var myMarker = new google.maps.Marker({
        position: { lat: 21.5526146, lng: 105.842387 },
        map: map,
        title: "MV Hoang",
        //icon: "images/icon-map.png",
        label: {
            color: 'red',
            fontWeight: '400',
            fontSize: '16px',
            text: 'Hoàn Tuyết',

        },
        icon: {
            labelOrigin: new google.maps.Point(11, 70),
            url: base_url+'public/images/icon-map.png',
            size: new google.maps.Size(38, 54),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(11, 40),
        },
    });
    var contentString = '<div id="content" style="max-width: 250px;">' +
        '<h1 style="font-size:14px;color:#01b1e0;font-weight:500;text-align: center;">Địa chỉ: Số nhà 540 đường 3/2 (QL3 cũ đi HN), TP.Thái Nguyên</h1>' +
        '<span style="float:left;font-size:13px;color:#2e2e2e;width: 100%; text-align: center;font-weight:500;margin-top: 10px;">Phone: 0969.001.511</span>' +
        '</div>';

    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });
    myMarker.addListener('click', function() {
        infowindow.open(map, myMarker);
    });
}

// show home menu list sản phẩm

$(document).ready(function(){
// icon
    $(document).on("click",".fa-bars",function(){
        $(".fa-bars").toggleClass("css-coler-yellow");
        $(".show_menu").toggleClass("css-block");
    });
    $(".show_menu").mouseleave(function(){
        $(".fa-bars").toggleClass("css-coler-yellow");
        $(".show_menu").toggleClass("css-block");
    });
// ul li
    $(".s_menu li").mouseenter(function(){
        $(this).css({"background-color":"#efefef","color":"red","font-weight":"bold"});
        $(this).find("ul").css({"display":"block","color":"#000", "font-weight":"normal"});
        $(this).find("ul ul").css("display","none");

        if ($(this).find('li ul')) {
            $(this).find('div').append('<i class="fa fa-caret-right clmenu" aria-hidden="true">');
            // $(this).find('div div').append('');
            $(this).find("ul div .fa-caret-right").remove();
        }
    });
    $(".s_menu li").mouseleave(function(){
        $(this).css({"background-color":"#fff", "color":"#000", "font-weight":"normal"});
        $(this).find("ul").css("display","none");

        if ($(this).find('ul div')) {
            $("ul div").find(".fa-caret-right").remove();
        }
    });
  
});


// slide product show viewed
$(document).ready(function(){
    
    $(document).on("click",".fa-caret-down",function(){
        $(".hide-viewed").toggleClass("show-viewed");
        $(".screen_hide").toggleClass("screen_show");
        $(".hide-login").removeClass("show-login");
        $(".screen_login-hide").removeClass("screen_login");
        
    });
    $(document).on("click",".screen_hide",function(){
        $(".hide-viewed").toggleClass("show-viewed");
        $(".screen_hide").toggleClass("screen_show");
    });
    // chạy slide details product
    
    var galleryThumbs = new Swiper('.gallery-thumbs', {
      spaceBetween: 10,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
    });
    var galleryTop = new Swiper('.gallery-top', {
      spaceBetween: 10,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      thumbs: {
        swiper: galleryThumbs
      }
    });


});
// ------------ login ------------
$(document).ready(function(){
    $(".dangky").hide();
    $(".quenmatkhau").hide();
    $(".doimatkhau").hide();
    $(document).on("click",".login",function(){
        $(".hide-login").toggleClass("show-login");
        $(".screen_login-hide").toggleClass("screen_login");
        $(".hide-viewed").removeClass("show-viewed");
        $(".screen_hide").removeClass("screen_show");
        $(".dangky").hide();
        $(".dangnhap").show();
        $(".quenmatkhau").hide();
        $(".doimatkhau").hide();
    });
    $(document).on("click",".screen_login-hide",function(){
        $(".hide-login").toggleClass("show-login");
        $(".screen_login-hide").toggleClass("screen_login");
    });
    $(document).on("click",".cancel",function(){
        $(".hide-login").toggleClass("show-login");
        $(".screen_login-hide").toggleClass("screen_login");
    });
});
$(document).ready(function(){
    $(document).on("click",".div-dangky",function(){
        $(".dangky").show();
        $(".dangnhap").hide();
        $(".quenmatkhau").hide();
        $(".doimatkhau").hide();
        $(".show-login h2").text("Đăng ký");

        // $(".div-dangky").hide();
        // $(".div-dangnhap").show();
        // $(".div-quenmatkhau").show();
        // $(".div-doimatkhau").show();
    });
    $(document).on("click",".div-dangnhap",function(){
        $(".dangky").hide();
        $(".dangnhap").show();
        $(".quenmatkhau").hide();
        $(".doimatkhau").hide();
        $(".show-login h2").text("Đăng nhập");

        // $(".div-dangky").show();
        // $(".div-dangnhap").hide();
        // $(".div-quenmatkhau").show();
        // $(".div-doimatkhau").show();
    });
    $(document).on("click",".div-quenmatkhau",function(){
        $(".dangky").hide();
        $(".dangnhap").hide();
        $(".quenmatkhau").show();
        $(".doimatkhau").hide();
        $(".show-login h2").text("Quên mật khẩu");

        // $(".div-dangky").show();
        // $(".div-dangnhap").show();
        // $(".div-quenmatkhau").hide();
        // $(".div-doimatkhau").show();
    });
    $(document).on("click",".div-doimatkhau",function(){
        $(".dangky").hide();
        $(".dangnhap").hide();
        $(".quenmatkhau").hide();
        $(".doimatkhau").show();
        $(".show-login h2").text("Thay đổi mật khẩu");

        // $(".div-dangky").show();
        // $(".div-dangnhap").show();
        // $(".div-quenmatkhau").show();
        // $(".div-doimatkhau").hide();
    });

});

// đánh giá start do mau
$(document).ready(function(){
    var ViTri_Details = '';
    $(document).on("click",".fa-star",function(){
        ViTri_Details = $(this).attr("title");
        $(".fa-star").attr("class","fa fa-star");
        $(".fa-star").each(function(){
            if($(this).attr("title") <= ViTri_Details){
                $(this).attr("class","fa fa-star checked");
            }
        });
    });
    
})
// active product
$(document).ready(function(){
    $(document).on("click",".textOption",function(){
        $(".textOption").attr("class","textOption");
        $(this).attr("class","textOption size-active");
    });
    $(document).on("click",".colorOption",function(){
        $(".colorOption").attr("class","colorOption");
        $(this).attr("class","colorOption colorOption-active");
    });

    $(document).on("click",".btn_increase",function(){
        var value = 0;
        var cong = 0;
        value = Number($(".input_number").val());
        if (value < 100) {
            cong = value + 1;
            $(".input_number").val(cong);
            $(".btn_decrease").attr("class","btn_decrease");
        }else{
            $(".btn_increase").attr("class","btn_increase disabled");
        }
        console.log($(".input_number").val());
    });
    $(document).on("click",".btn_decrease",function(){
        var value = 0;
        var cong = 0;
        value = Number($(".input_number").val());
        if (value > 1) {
            cong = value - 1;
            $(".input_number").val(cong);
            $(".btn_increase").attr("class","btn_increase");
        }else{
            $(".btn_decrease").attr("class","btn_decrease disabled");
        }
        console.log($(".input_number").val());
    });
});

// end active
// form edit cart
$(document).ready(function(){
    $(document).on("click",".edit-cart",function(){
        $( ".form_cart_hide" ).addClass( "form_cart_show" );
        $( ".screen_cart_hide" ).addClass( "screen_cart_show" );
    });
    $(document).on("click",".screen_cart_hide",function(){
        $( ".form_cart_hide" ).removeClass( "form_cart_show" );
        $( ".screen_cart_hide" ).removeClass( "screen_cart_show" );
    });
    $(document).on("click",".icon-x",function(){
        $( ".form_cart_hide" ).removeClass( "form_cart_show" );
        $( ".screen_cart_hide" ).removeClass( "screen_cart_show" );
    });
});
// end edit

// account tab active
$(document).ready(function(){
    $(document).on("click",".no-active",function(){
        $(".no-active").removeClass("account-list-active");
        $(".div-edit-account").find("a").removeClass("active show");
        $(this).addClass("account-list-active");

        // $("#iframe-details").remove();
    });
});
$(document).ready(function(){
    $(document).on("click",".details-show",function(){
        $(".no-active").removeClass("account-list-active");
        $(".no-active").find("a").removeClass("active show");
        $(".tab-content-remove").find(".tab-pane").removeClass("in active show");
        $(".donhang .nav-tabs").find("a").removeClass("active show");
        $(".donhang").find(".tab-pane").removeClass("in active show");
        $("#details-order").addClass('in active show');
        // var id = '';
        // id = $(this).attr('id');
        // $(".iframe-details-show").append('<iframe id="iframe-details" src="http://localhost/do-an/details/details/'+id+'"></iframe>');
    });
});
