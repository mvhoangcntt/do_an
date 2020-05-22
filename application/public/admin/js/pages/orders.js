$(function () {
    //load lang
    load_lang('orders');
    //load slug
    init_slug('title','slug');
    //load table ajax
    init_data_table();
    //bind checkbox table
    init_checkbox_table();
    // hiển thị hỗ trợ textarea
    tinymce.init(optionTinyMCE);

    loadFilterstatus();
});

function detail_form(id) {
    $('#modal_form').modal('show');
    $('#modal_form').trigger("reset"); 
    table_detail(id);
    countDown(id);
}

// đếm giờ độ trễ để add datatable trước
function countDown(id){
    var i = 1;
    var interval = setInterval(function(){
        // console.log(i);
        i--;
        if (i == 0) {
            ajax_append(id);
            // console.log("hết giờ");
            clearInterval(interval);
        } 
    },10);// 1000 là theo tung giay
}

function table_detail(id){
    var table_product = $('#table_product')
    var table_pro = table_product.DataTable({
        'ajax': {
            type: "POST",
            url: url_ajax_detail_product+"/"+id,
            data: function (d) {
              return $.extend( {}, d, dataFilter );
            }
        },
        fixedHeader: true,
        'bProcessing': true,
        'serverSide': true,
        destroy: true,
        'dom': '<><t><>',
        'buttons': [],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Vietnamese.json"
        },
        'columnDefs': [
            {
                'targets': 'no-sort',
                "orderable": false,
                'className': 'text-center'
            },
            {
                'targets': 0,
                'visible': table_product.hasClass("no_check_all") ? false : true,
                'searchable': false,
                'orderable': false,
                'className': 'dt-body-center',
                
            },
            {
                'targets': -1,
                'searchable': false,
                'orderable': false
            }
        ],
        'order': [[1, 'desc']],
        "fnDrawCallback": function () {
            $("a.fancybox").fancybox();
        }
    });
}

function ajax_append(id){
    $("option.status").remove();
    $(".remove_tt").remove();
    var tong = 0;
    var total_gift = 0;
    var total_sp = 0;
    $.ajax({
        url : url_ajax_detail+"/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $.each(data, function( key, value ) {
                $("td."+key).append("<div class='remove_tt'>"+value+"</div>");
                if (key === 'status') {
                    $("select.status").append("<option class='status' value="+data.status['id']+">"+data.status['name_status']+"</option>");
                }
                if (key === 'transport_fee') {
                    $(".transport_fee_").text(formatNumber(value)+" vnđ");
                }
                if (key === 'gift_code') {
                    $(".gift_code_").text(formatNumber(value)+"%");
                }
                if (key === 'amount_total') {
                    $(".amount_total_").text(formatNumber(value)+" vnđ");
                }
                if (key === 'tongtien') {
                    $(".tongtien_").text(formatNumber(value)+" vnđ");
                }
                if (key === 'id') {
                    $(".id_order").text(value);
                }
            });
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert(textStatus);
            console.log(jqXHR);
        }
    });
}

function loadFilterstatus() {
  $("select.filter_status").select2({
    allowClear: true,
    placeholder: 'Select an item',
    ajax: {
      url: url_ajax_load,
      dataType: 'json',
      delay: 250,
      processResults: function (data) {
        console.log(data);
        return {
          results: data
        };
      },
      cache: true,
    }
  });
  $("select.filter_status").on('change', function () {
    var status = $(this).val();
    var id = Number($("a.id_order").text());
    filter(id,status);
  });
}
function filter(id,status) {
    console.log(url_ajax_update+"/"+id)
    $.ajax({
        url : url_ajax_update+"/"+id+"/"+status,
        type: "POST",
        dataType: "JSON",
        success: function(data){
            toastr[data.type](data.message);
        }, error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
            $('#btnSave').text(language['btn_save']);
            $('#btnSave').attr('disabled',false);
        }
    });
    table.ajax.reload();
    reload_table();
}

