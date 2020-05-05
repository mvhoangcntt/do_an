$(function () {
    var url_login = base_url+"auth/login";
    
    loadFilter();
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
    })
    $(document).on('change', "select.filter_quanhuyen", function () {
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
