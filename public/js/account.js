var url_get_user = base_url+"account/get_user";
var url_get_diachi = base_url+"account/form_get_diachi";
var url_post_user = base_url+"account/updateProfile";
var url_post_address = base_url+"account/updateProfile";
var url_post_avatar = base_url+"account/do_upload";
var url_post_setting = base_url+"account/settings";
$('i.verified_i').remove();
$('.img-avatar').html('');
$('.div-account-img').html('');
$.ajax({
    url : url_get_user,
    type: "POST",
    data: $('#formdangky').serialize(),
    dataType: "JSON",
    success: function(data){
        $.each(data, function( key, value ) {
            if (key === 'avatar') {
                $('.img-avatar').append('\
                    <img src="'+base_url+'public/avatar/'+value+'" title="Hình đại diện">\
                    <button>Thay đổi</button>\
                ');
                $('.div-account-img').append('\
                    <div class="div-custum-img">\
                        <div class="div-account-img-w">\
                            <img class="icon-account-img" src="'+base_url+'public/avatar/'+value+'" title="Hình đại diện">\
                        </div>\
                    </div>\
                    <div class="div-name-account">\
                        <div class="my-name-account">' +data.full_name+'</div>\
                    </div>\
                ');
            }
            if (key !== 'gender')$("input[name='"+key+"']").val(value);
            if (key === 'gender') {$("#form_user_update").find("input[value='"+value+"']").attr('checked', 'checked');}
            $("textarea[name='"+key+"']").val(value);
            $("select[name='"+key+"']").val(value,'selected');
            if (key === 'verified' && value === '0') {$('#verified_email').append('<i class="verified_i">Email : <i class="verified_coler">(Chưa xác thực)</i><i>');}
            if (key === 'verified' && value === '1') {$('#verified_email').append('<i class="verified_i">Email : <i class="verified_coler">(Đã xác thực)</i><i>');}
        });
    }
});
function form_get_user(){
    $('i.verified_i').remove();
    $('.img-avatar').html('');
    $('.div-account-img').html('');
    $.ajax({
        url : url_get_user,
        type: "POST",
        data: $('#form_user_update').serialize(),
        dataType: "JSON",
        success: function(data){
            $.each(data, function( key, value ) {
                if (key === 'avatar') {
                    $('.img-avatar').append('\
                        <img src="'+base_url+'public/avatar/'+value+'" title="Hình đại diện">\
                        <button>Thay đổi</button>\
                    ');
                    $('.div-account-img').append('\
                        <div class="div-custum-img">\
                            <div class="div-account-img-w">\
                                <img class="icon-account-img" src="'+base_url+'public/avatar/'+value+'" title="Hình đại diện">\
                            </div>\
                        </div>\
                        <div class="div-name-account">\
                            <div class="my-name-account">' +data.full_name+'</div>\
                        </div>\
                    ');
                }
                if (key !== 'gender')$("input[name='"+key+"']").val(value);
                if (key === 'gender') {$("#form_user_update").find("input[value='"+value+"']").attr('checked', 'checked');}
                $("textarea[name='"+key+"']").val(value);
                $("select[name='"+key+"']").val(value,'selected');
                if (key === 'verified' && value === '0') {$('#verified_email').append('<i class="verified_i">Email : <i class="verified_coler">(Chưa xác thực)</i><i>');}
                if (key === 'verified' && value === '1') {$('#verified_email').append('<i class="verified_i">Email : <i class="verified_coler">(Đã xác thực)</i><i>');}
            });
        }
    });
}
function user_update(){
    $('#_user_update').attr('disabled',true);
    $.ajax({
        url : url_post_user,
        type: "POST",
        data: $('#form_user_update').serialize(),
        dataType: "JSON",
        success: function(data){
            toastr[data.type](data.message);
            if(data.type === "warning"){
                $('span.text-danger').remove();
                $.each(data.validation, function (i, val) {
                    $('[name="' + i + '"]').closest('.form-group').append(val);
                })
            }
            $('#_user_update').attr('disabled',false);
        }, error: function (jqXHR, textStatus, errorThrown) {
            $('#_user_update').attr('disabled',false);
        }
    });
}

function _get_user(){
    $.ajax({
        url : url_get_user,
        type: "POST",
        data: $('#form_setting_').serialize(),
        dataType: "JSON",
        success: function(data){
            $.each(data, function( key, value ) {
                if (key === 'settings') {$("#form_setting_").find("input[value='"+value+"']").attr('checked', 'checked');}
            });
        }
    });
}
function user_setting(){
    $('#_user_setting').attr('disabled',true);
    $.ajax({
        url : url_post_setting,
        type: "POST",
        data: $('#form_setting_').serialize(),
        dataType: "JSON",
        success: function(data){
            toastr[data.type](data.message);
            if(data.type === "warning"){
                $('span.text-danger').remove();
                $.each(data.validation, function (i, val) {
                    $('[name="' + i + '"]').closest('.form-group').append(val);
                })
            }else{
                location.reload();
            }
            $('#_user_setting').attr('disabled',false);
        }, error: function (jqXHR, textStatus, errorThrown) {
            $('#_user_setting').attr('disabled',false);
        }
    });
}


function form_get_diachi(){
    $("option.filter_quanhuyen1").remove();
    $("option.filter_tinhthanh1").remove();
    $("option.filter_xaphuong1").remove();
    $.ajax({
        url : url_get_diachi,
        type: "POST",
        data: $('#formdangky').serialize(),
        dataType: "JSON",
        success: function(data){
            $.each(data, function( key, value ) {
                // console.log(data.diachi['id_qh'])
                $("input[name='"+key+"']").val(value);
                $("textarea[name='"+key+"']").val(value);
                $("select[name='"+key+"']").val(value,'selected');
                if (key === 'diachi') {
                    $("select.filter_quanhuyen1").append("<option class='filter_quanhuyen1' value="+data.diachi['id_qh']+">"+data.diachi['quan_huyen']+"</option>");    
                    $("select.filter_tinhthanh1").append("<option class='filter_tinhthanh1' value="+data.diachi['id_tp']+">"+data.diachi['tinh_tp']+"</option>");    
                    $("select.filter_xaphuong1").append("<option class='filter_xaphuong1' value="+data.diachi['id']+">"+data.diachi['name']+"</option>");    
                }
                if (key === 'phone') {
                    $('.content_phone').text('Số điện thoại : '+value);
                }
                if (key === 'address') {
                    $('.content_address').text(value+' - '+data.diachi['name']+' - '+data.diachi['quan_huyen']+' - '+data.diachi['tinh_tp']);
                }
            });
        }
    });
}
function address_update(){
    $('#_address_update').attr('disabled',true);
    $.ajax({
        url : url_post_address,
        type: "POST",
        data: $('#form_address_update').serialize(),
        dataType: "JSON",
        success: function(data){
            toastr[data.type](data.message);
            if(data.type === "warning"){
                $('span.text-danger').remove();
                $.each(data.validation, function (i, val) {
                    $('[name="' + i + '"]').closest('.form-group').append(val);
                })
            }
            $('#_address_update').attr('disabled',false);
            // location.reload();
            form_get_diachi();
        }, error: function (jqXHR, textStatus, errorThrown) {
            $('#_address_update').attr('disabled',false);
        }
    });
}
// form textera icon
$(".fa-pencil-square-o").click(function(){
    $('.fa-pencil-square-o_hide').toggleClass("fa-pencil-square-o_show");
});
// thay đổi ảnh đại diện
$(document).ready(function(){
    $(document).on("click",".img-avatar",function(){
        $(".screen_avatar_hide").toggleClass("screen_avatar_show");
        $(".hide_avatar").toggleClass("show_avatar");
        $('.icon-avatar_').show();
        $('.icon-avatar_show').hide();
    });
    $(document).on("click",".cancel-avatar",function(){
        $(".screen_avatar_hide").toggleClass("screen_avatar_show");
        $(".hide_avatar").toggleClass("show_avatar");
    });
    
    $(document).on("change","#input-file",function() {
        $('.icon-avatar_').hide();
        $('.icon-avatar_show').show();
        readURL(this);
    });
});
function readURL(input) {
    if (input.files && input.files[0]) {
        // console.log(input.files[0].name)
        $("input[name='file']").val(input.files[0].name);
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
function change_avatar(){
    $('#avatar_btn').attr('disabled',true);
    var form = $('#avatar_post')[0];
    var data = new FormData(form);
    $.ajax({
        type:       "POST",
        enctype:    "multipart/form-data",
        url:        url_post_avatar,
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 800000,
        dataType: "JSON",
        success: function(data){
            toastr[data.type](data.message);
            if(data.type === "warning"){
                $('span.text-danger').remove();
                $.each(data.validation, function (i, val) {
                    $('[name="' + i + '"]').closest('.form-group').append(val);
                })
            }else{
                $(".screen_avatar_hide").removeClass("screen_avatar_show");
                $(".hide_avatar").removeClass("show_avatar");
                form_get_user();
            }
            $('#avatar_btn').attr('disabled',false);
            // location.reload();
        }, error: function (jqXHR, textStatus, errorThrown) {
            $('#avatar_btn').attr('disabled',false);
        }
    })
}
$(document).ready(function(){
    $(document).on("click",".details-show",function(){
        // console.log($(this).attr('id'))
        var url_details = base_url+"account/ajax_detail/"+$(this).attr('id');
        $.ajax({
            url : url_details,
            type: "POST",
            dataType: "JSON",
            success: function(data){
                $(".madonhang").text('Mã đơn hàng : #'+data.id);
                $(".created_time_").text('Ngày đặt hàng : '+data.created_time);
                $(".diachi-chitiet").text(data.address);
                $(".full_name_add").text(data.full_name);
                $(".phone-user").text(data.phone);
                var dem = 0;
                $('.checked-icon').html('');
                $('.checked-icon').each(function(){
                    dem++;
                    if (dem <= data.is_status) {
                        $(this).html('<i class="fa fa-check-circle-o" aria-hidden="true"></i>');
                    }
                });
                var dem1 = 0;
                $($('.date-trangthai').get().reverse()).each(function(){
                    dem1++; 
                    if (dem1 === 1) { $(this).text(data.created_time); }
                    if (dem1 === 2) { $(this).text(data.time2); }
                    if (dem1 === 3) { $(this).text(data.time3); }
                    if (dem1 === 4) { $(this).text(data.time4); }
                });
                var dem2 = 0;
                $('.number-trangthai').removeClass('number-trangthai-check');
                $($('.number-trangthai').get().reverse()).each(function(){
                    dem2++;
                    if (dem2 <= data.is_status) {
                        $(this).addClass("number-trangthai-check");
                    }
                });
                if (data.is_status === '5') {
                    $(".information-account").text("Chi tiết đơn hàng (Đơn hàng đã bị hủy)");
                }else{
                    $(".information-account").text("Chi tiết đơn hàng");
                }
                if (data.payment_id === '1') {$(".hinhthucthanhtoan").text('Thanh toán tại nhà');}
                if (data.payment_id === '2') {$(".hinhthucthanhtoan").text('Thanh toán qua ví điện tử momo');}
                var dem3 = 0;
                $('.add_item_cart_list').remove();
                $.each(data.data, function (i, val) { dem3++;
                    $(".add_item_cart_").append('\
                        <div class="row margin-top add_item_cart_list">\
                            <div class="col-lg-5 col-md-6 border-cart">\
                                <div class="item-cart">\
                                    <div class="item-cart-image">\
                                        <div class="item-cart-img">\
                                            <a href="'+val.url+'" title="'+val.title+'">\
                                                <img class="img-with" src="'+base_url+'public/media/'+val.thumbnail+'" alt="'+val.title+'">\
                                            </a>\
                                        </div>\
                                        <div class="item-name-cart">\
                                            <a href="'+val.url+'" title="'+val.title+'">'+val.title+'</a>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                            <div class="col-lg-3 col-md-6 border-cart">\
                                <div class="coler-cart-item">\
                                    <div class="coler-cart border-cart">\
                                        <button class="text-size-cart">'+val.text_size+'</button>\
                                    </div>\
                                    <div class="size-cart">\
                                        <button class="text-coler-cart">'+val.text_coler+'</button>\
                                    </div>\
                                </div>\
                            </div>\
                            <div class="col-lg-4 col-md-6">\
                                <div class="cart-flex">\
                                    <div class="number-buy">\
                                        <div class="cart-price">'+formatNumber(val.amount)+' vnđ</div>\
                                        <div class="cart-discount">'+formatNumber(Math.floor(val.amount) + Math.floor(val.discount))+' vnđ</div>\
                                    </div>\
                                    <div class="number-cart-buy">\
                                        <input class="input_number" type="number" value="'+val.quantity+'" readonly="">\
                                    </div>\
                                    <div class="total">\
                                        <div>Tổng tiền</div>\
                                        <div>'+formatNumber(val.tongtien)+'</div>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                        <div class="bottom-dotted"></div>\
                    ');
                    $('.money-order-item-coler_tt').text(formatNumber(data.tongtien) +'vnđ');
                    $('.money-order-item-coler_fee').text(formatNumber(data.transport_fee) +'vnđ');
                    $('.money-order-item-coler_code').text(formatNumber(data.gift_code) +'%');
                    $('.money-order-item-coler_all').text(formatNumber(data.amount_total) +'vnđ');
                });
                
            }, error: function (jqXHR, textStatus, errorThrown) {
                $('#btn_add_cart').attr('disabled',false);
            }
        });
    });
});