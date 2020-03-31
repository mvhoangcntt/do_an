//------------- contact --------------
function save(){
    $.ajax({
        url : url_save,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data){
            toastr[data.type](data.message);
            if(data.type === "warning"){
                $('span.text-danger').remove();
                $.each(data.validation, function (i, val) {
                    if (i !== "content") {
                        $('[name="' + i + '"]').closest('.col-lg-6').append(val);
                        $('[name="' + i + '"]').closest('.form-group').attr('id','margincss');
                        if (val === '') {
                            $('[name="' + i + '"]').closest('.form-group').attr('id','');
                        }
                    }else{
                        $('[name="' + i + '"]').closest('.form-group').append(val);
                    }
                })
            }else{
                $('#form').trigger("reset");
            }
            console.log(data)
        }, error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });
}

// ----------- news ----------------

// kiểm tra điều kiện để hiển thị tổng quan hay chi tiết tin tức
$(function(){
    // var kt = 0;
    // $(".item-news a").click(function(){
    //     $(".bn-page").attr("id", "1");
    //     kt = 1;
    // })
    // $(".news_details").click(function(){
    //     $(".news").remove();
    // });
})
