$(function () {
    var url_login = base_url+"auth/login";
    
    loadFilter();
    loadFilter_coler_size_product();
});
function dangnhap()
{
    var url_login = base_url+"auth/login";
    // alert('abc');
    $('#btndangnhap').attr('disabled',true); //set button disable
    $.ajax({
        url : url_login,
        type: "POST",
        data: $('#formDangnhap').serialize(),
        dataType: "JSON",
        success: function(data){
            toastr[data.type](data.message);
            if(data.type === "warning"){
                $('span.text-danger').remove();
                $.each(data.validation, function (i, val) {
                    $('[name="' + i + '"]').closest('.form-group').append(val);
                })
            } else {
                $(".hide-login").removeClass("show-login");
                $(".screen_login-hide").removeClass("screen_login");
                $('#formDangnhap').trigger("reset");
                $('a.smooth.login').remove();
                $('#login').append('\
                    <a class="smooth logout" onclick="click_account()" href="#logout" title="'+data.full_name+'">'+data.full_name+'</a>\
                    <div class="user_header">\
                        <div>\
                            <a href="'+base_url+'account/"><i class="fa fa-user-circle-o" aria-hidden="true"></i>Thông tin tài khoản</a>\
                        </div>\
                        <div>\
                            <a class="smooth logout" onclick="click_logout()" href="#out" title="Đăng xuất"><i class="fa fa-sign-out" aria-hidden="true"></i>Đăng xuất</a>\
                        </div>\
                    </div>');
                // location.reload();
            }
            $('#btndangnhap').attr('disabled',false);
        }, error: function (jqXHR, textStatus, errorThrown) {
            $('#btndangnhap').attr('disabled',false);
        }
    });
}
// ------------------------------ create account -----------------------
function loadFilter() {
    var url_filter = base_url+"auth/ajax_filter_tinhthanh";
    $("select.filter_tinhthanh").select2({
        allowClear: true,
        placeholder: 'Chọn một tỉnh/thành phố',
        ajax: {
            url: url_filter,
            dataType: 'json',
            delay: 250,
             processResults: function (data) {
            // console.log(data);
            return {
                results: data
            };
          },
          cache: true,
        }
    });
    
    url_quanhuyen = base_url+"auth/ajax_filter_quanhuyen/";
    $("select.filter_quanhuyen").select2({
        allowClear: true,
        placeholder: 'Chọn một quận/huyện',
        ajax: {
            url: function () {
                return url_quanhuyen+$("select.filter_tinhthanh").val();
            },
            dataType: 'json',
            delay: 250,
             processResults: function (data) {
            return {
                results: data
            };
          },
          cache: true,
        }
    });

    var url_xaphuong = base_url+"auth/ajax_filter_xaphuong/";
    $("select.filter_xaphuong").select2({
        allowClear: true,
        placeholder: 'Chọn một xã/phường',
        ajax: {
            url: function () {
                return url_xaphuong+$("select.filter_quanhuyen").val();
            },
            dataType: 'json',
            delay: 250,
             processResults: function (data) {
            // console.log(data);
            return {
                results: data
            };
          },
          cache: true,
        }
    });

    $(document).on('change', ".filter_tinhthanh", function () {
        $('select[name="quanhuyen"]').val('');
    });
    $(document).on('change', "select.filter_quanhuyen", function () {
        $('select[name="xaphuong"]').val('');
    });
//------------------------------ update account --------------------------------------

    $("select.filter_tinhthanh1").select2({
        allowClear: true,
        placeholder: 'Chọn một tỉnh/thành phố',
        ajax: {
            url: url_filter,
            dataType: 'json',
            delay: 250,
             processResults: function (data) {
            // console.log(data);
            return {
                results: data
            };
          },
          cache: true,
        }
    });
    

    $("select.filter_quanhuyen1").select2({
        allowClear: true,
        placeholder: 'Chọn một quận/huyện',
        ajax: {
            url: function () {
                return url_quanhuyen+$("select.filter_tinhthanh1").val();
            },
            dataType: 'json',
            delay: 250,
             processResults: function (data) {
            return {
                results: data
            };
          },
          cache: true,
        }
    });


    $("select.filter_xaphuong1").select2({
        allowClear: true,
        placeholder: 'Chọn một xã/phường',
        ajax: {
            url: function () {
                return url_xaphuong+$("select.filter_quanhuyen1").val();
            },
            dataType: 'json',
            delay: 250,
             processResults: function (data) {
            // console.log(data);
            return {
                results: data
            };
          },
          cache: true,
        }
    });

    $(document).on('change', ".filter_tinhthanh1", function () {
        $('select[name="quanhuyen"]').val('');
    })
    $(document).on('change', "select.filter_quanhuyen1", function () {
        $('select[name="xaphuong"]').val('');
    })


}

function dangky()
{
    var url_login = base_url+"auth/register";
    // alert('abc');
    $('#btndangky').attr('disabled',true); //set button disable
    $.ajax({
        url : url_login,
        type: "POST",
        data: $('#formdangky').serialize(),
        dataType: "JSON",
        success: function(data){
            toastr[data.type](data.message);
            if(data.type === "warning"){
                $('span.text-danger').remove();
                $.each(data.validation, function (i, val) {
                    $('[name="' + i + '"]').closest('.form-group').append(val);
                })
            } else {
                $(".hide-login").removeClass("show-login");
                $(".screen_login-hide").removeClass("screen_login");
                $('#formdangky').trigger("reset");
            }
            $('#btndangky').attr('disabled',false);
        }, error: function (jqXHR, textStatus, errorThrown) {
            $('#btndangky').attr('disabled',false);
        }
    });
}
function forgot()
{
    var url_forgot = base_url+"auth/forgotPassword";
    // alert('abc');
    $('#quenmatkhau').attr('disabled',true); //set button disable
    $.ajax({
        url : url_forgot,
        type: "POST",
        data: $('#forgotPassword').serialize(),
        dataType: "JSON",
        success: function(data){
            toastr[data.type](data.message);
            if(data.type === "warning"){
                $('span.text-danger').remove();
                $.each(data.validation, function (i, val) {
                    $('[name="' + i + '"]').closest('.form-group').append(val);
                })
            } else {
                $(".hide-login").removeClass("show-login");
                $(".screen_login-hide").removeClass("screen_login");
                $('#forgotPassword').trigger("reset");
            }
            $('#quenmatkhau').attr('disabled',false);
        }, error: function (jqXHR, textStatus, errorThrown) {
            $('#quenmatkhau').attr('disabled',false);
        }
    });
}
function doimatkhau()
{
    var url_forgot = base_url+"account/update_password";
    $('#doimk').attr('disabled',true); //set button disable
    $.ajax({
        url : url_forgot,
        type: "POST",
        data: $('#doimatkhau').serialize(),
        dataType: "JSON",
        success: function(data){
            toastr[data.type](data.message);
            if(data.type === "warning"){
                $('span.text-danger').remove();
                $.each(data.validation, function (i, val) {
                    $('[name="' + i + '"]').closest('.form-group').append(val);
                })
            } else {
                $(".hide-login").removeClass("show-login");
                $(".screen_login-hide").removeClass("screen_login");
                // $('#doimatkhau').trigger("reset");
            }
            $('#doimk').attr('disabled',false);
        }, error: function (jqXHR, textStatus, errorThrown) {
            $('#doimk').attr('disabled',false);
        }
    });
}
function click_account(){

    $(".user_header").toggleClass("_user_header");
}
function click_logout()
{
    var url_logout = base_url+"account/logout";
    $.ajax({
        url : url_logout,
        dataType: "JSON",
        success: function(data){
            toastr[data.type](data.message);
            $('a.smooth.logout').remove();
            $('.user_header').remove();
            $('#login').append('\
            <a class="smooth login" href="#login" title="Đăng nhập">Đăng nhập</a>');
            // location.reload();
        }
    });
}
// ---------------------- seemore ---------------------------

function loadFilter_coler_size_product(){
    var url_filter_coler = base_url+"seemore/ajax_filter_coler?link="+$('input[name=get_url]').val();
    if ($('input[name=get_url]').val() === 'seemore/search' || $('input[name=get_url]').val() === 'seemore/search/new'
        || $('input[name=get_url]').val() === 'seemore/search/bst' || $('input[name=get_url]').val() === 'seemore/search/timkiem'
        || $('input[name=get_url]').val() === 'seemore/search/giamgia' || $('input[name=get_url]').val() === 'seemore/search/phukien') {
        var url_filter_coler = base_url+"seemore/search_filter_coler?link="+$('input[name=get_search]').val()+"&get_url="+$('input[name=get_url]').val();
    }
    $("select.filter_coler").select2({
        allowClear: true,
        placeholder: 'Chọn màu sắc',
        ajax: {
            url: url_filter_coler,
            dataType: 'json',
            delay: 250,
             processResults: function (data) {
            // console.log(data);
            return {
                results: data
            };
          },
          cache: true,
        }
    });
    var url_filter_size = base_url+"seemore/ajax_filter_size?link="+$('input[name=get_url]').val();
    if ($('input[name=get_url]').val() === 'seemore/search' || $('input[name=get_url]').val() === 'seemore/search/new'
        || $('input[name=get_url]').val() === 'seemore/search/bst' || $('input[name=get_url]').val() === 'seemore/search/timkiem'
        || $('input[name=get_url]').val() === 'seemore/search/giamgia' || $('input[name=get_url]').val() === 'seemore/search/phukien') {
        var url_filter_size = base_url+"seemore/search_filter_size?link="+$('input[name=get_search]').val()+"&get_url="+$('input[name=get_url]').val();
    }
    $("select.filter_size").select2({
        allowClear: true,
        placeholder: 'Chọn kích cỡ',
        ajax: {
            url: url_filter_size,
            dataType: 'json',
            delay: 250,
             processResults: function (data) {
            // console.log(data);
            return {
                results: data
            };
          },
          cache: true,
        }
    });
}
$(document).ready(function(){
    $('.fa-seemore-boloc').click(function(){
        $('.seemore-boloc').toggleClass('seemore-hide');
    });
    $('.fa-seemore-theogia').click(function(){
        $('.seemore-theogia').toggleClass('seemore-hide');
    });
    $('.fa-seemore-mausac').click(function(){
        $('.seemore-mausac').toggleClass('seemore-hide');
    });
    $('.fa-seemore-size').click(function(){
        $('.seemore-size').toggleClass('seemore-hide');
    });

// bắt sự kiện lọc tìm kiếm
    // $('.checkbox-seemore').prop('checked');
    $(document).on('change', ".checkbox-seemore", function () {
        reload_seemore();
    })
    $(document).on('keyup', "input.min_price", function (event) {
        $('span.text-danger').remove();
        var min = Math.floor($("input.min_price").val());
        console.log(min);
        if (Number.isNaN(min)) {
            $('input.min_price').closest('.seemore-theogia').append('<span class="text-danger"> Yêu cầu nhập số !.</span>');
        }else{
            if (min < 0) {
                $('input.min_price').closest('.seemore-theogia').append('<span class="text-danger"> Nhập vào số >= 0.</span>');
            }else{
                var max = Math.floor($("input.max_price").val());
                if (min >= max) {
                    $('input.max_price').closest('.seemore-theogia').append('<span class="text-danger"> Số trên < số dưới !</span>');
                }else{
                    reload_seemore();
                }
            }
        }
    })
    $(document).on('keyup', "input.max_price", function (event) {
        $('span.text-danger').remove();
        var max = Math.floor($("input.max_price").val());
        console.log(max);
        if (Number.isNaN(max)) {
            $('input.max_price').closest('.seemore-theogia').append('<span class="text-danger"> Yêu cầu nhập số !.</span>');
        }else{
            if (max < 0) {
                $('input.max_price').closest('.seemore-theogia').append('<span class="text-danger"> Nhập vào số >= 0.</span>');
            }else{
                var min = Math.floor($("input.min_price").val());
                if (min >= max) {
                    $('input.max_price').closest('.seemore-theogia').append('<span class="text-danger"> Số trên < số dưới !</span>');
                }else{
                    reload_seemore();
                }
            }
        }
    })
    $("select[name='text_coler']").change(function(){
        reload_seemore();
    })
    $("select[name='text_size']").change(function(){
        reload_seemore();
    })
});
function reload_seemore(){
    var url_reload_seemore = base_url+"seemore/reload_seemore/";
    if ($('input[name=get_url]').val() === 'seemore/search' || $('input[name=get_url]').val() === 'seemore/search/new'
        || $('input[name=get_url]').val() === 'seemore/search/bst' || $('input[name=get_url]').val() === 'seemore/search/timkiem'
        || $('input[name=get_url]').val() === 'seemore/search/giamgia' || $('input[name=get_url]').val() === 'seemore/search/phukien') {
        var url_reload_seemore = base_url+"seemore/reload_search";
    }
    $.ajax({
        url : url_reload_seemore,
        type: "POST",
        data: $('#form-seemore-boloc').serialize(),
        dataType: "JSON",
        success: function(data){
            // console.log(data[0].id);
            $('.get_seemore_ajax .col-md-4').remove();
            $.each(data, function (i, val) {
                console.log(val);
                console.log(i);
                if (i === 'count') {$('.count-product').text('('+val+' sản phẩm)');}
                $('.get_seemore_ajax').append('\
                    <div class="col-lg-3 col-md-4 col-6">\
                        <div class="item-news">\
                            <a href="'+data[i].url+'" title="'+data[i].title+'" class="img">\
                            <img src="'+base_url+'public/media/'+data[i].thumbnail+'" alt="'+data[i].title+'">\
                            </a>\
                            <div class="ct">\
                                <a href="'+data[i].url+'">\
                                    <span class="time">\
                                    '+data[i].title+'</span>\
                                    <div class="discount-pt">\
                                        <div class="discount-pt-text-decoration">'+formatNumber(Math.floor(data[i].price) + Math.floor(data[i].discount))+' đ </div>\
                                        <div> - '+ Math.round10((Math.floor(data[i].discount)/(Math.floor(data[i].price) + Math.floor(data[i].discount))*100),-1) +'%</div>\
                                    </div>\
                                </a>\
                                <h3 class="title"><a href="'+data[i].url+'" title="'+data[i].title+'">'+formatNumber(data[i].price)+' đ</a></h3>\
                            </div>\
                        </div>\
                    </div>\
                ');
            });

        }
    });
}
// hàm sử lý số
function formatNumber(num) {
  return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}
function decimalAdjust(type, value, exp) {
    // Nếu exp có giá trị undefined hoặc bằng không thì...
    if (typeof exp === 'undefined' || +exp === 0) {
      return Math[type](value);
    }
    value = +value;
    exp = +exp;
    // Nếu value không phải là ố hoặc exp không phải là số nguyên thì...
    if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0)) {
      return NaN;
    }
    // Shift
    value = value.toString().split('e');
    value = Math[type](+(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp)));
    // Shift back
    value = value.toString().split('e');
    return +(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp));
}

  // Làm tròn số thập phân (theo mốc số 5)
if (!Math.round10) {
    Math.round10 = function(value, exp) {
      return decimalAdjust('round', value, exp);
    };
}

$(document).ready(function(){
    $(document).on('click', ".item-news", function () {
        // console.log($(this).attr('id'));
        var url_update_view = base_url+"home/update_view/"+$(this).attr('id');
        $.ajax({
            url : url_update_view,
            dataType: "JSON",
            success: function(data){
            }
        });
    });
});