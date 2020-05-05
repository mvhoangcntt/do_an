var url_get_user = base_url+"account/get_user";
var url_get_diachi = base_url+"account/form_get_diachi";
$.ajax({
    url : url_get_user,
    type: "POST",
    data: $('#form_get_user').serialize(),
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
        }
        $('#btndangky').attr('disabled',false);
    }, error: function (jqXHR, textStatus, errorThrown) {
        $('#btndangky').attr('disabled',false);
    }
});
function form_get_user(){
    $.ajax({
        url : url_get_user,
        type: "POST",
        data: $('#formdangky').serialize(),
        dataType: "JSON",
        success: function(data){
            $.each(data, function( key, value ) {
                if (key !== 'gender')$("input[name='"+key+"']").val(value);
                if (key === 'gender') {$("input[value='"+value+"']").attr('checked', 'checked');}
                $("textarea[name='"+key+"']").val(value);
                $("select[name='"+key+"']").val(value,'selected');
            });
        }
    });
}
function form_get_diachi(){
    $("option.filter_quanhuyen").remove();
    $("option.filter_tinhthanh").remove();
    $("option.filter_xaphuong").remove();
    $.ajax({
        url : url_get_diachi,
        type: "POST",
        data: $('#formdangky').serialize(),
        dataType: "JSON",
        success: function(data){
            $.each(data, function( key, value ) {
                console.log(data.diachi['id_qh'])
                $("input[name='"+key+"']").val(value);
                $("textarea[name='"+key+"']").val(value);
                $("select[name='"+key+"']").val(value,'selected');
                if (key === 'diachi') {
                    $("select.filter_quanhuyen").append("<option class='filter_quanhuyen' value="+data.diachi['id_qh']+">"+data.diachi['quan_huyen']+"</option>");    
                    $("select.filter_tinhthanh").append("<option class='filter_tinhthanh' value="+data.diachi['id_tp']+">"+data.diachi['tinh_tp']+"</option>");    
                    $("select.filter_xaphuong").append("<option class='filter_xaphuong' value="+data.diachi['id']+">"+data.diachi['name']+"</option>");    
                }
            });
        }
    });
}
$(".fa-pencil-square-o").click(function(){
    $('.fa-pencil-square-o_hide').toggleClass("fa-pencil-square-o_show");
});