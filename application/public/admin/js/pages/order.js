$(function () {
    //load lang
    load_lang('order');
    //load table ajax
    init_data_table();
    //bind checkbox table
    init_checkbox_table();
    $("select.is_status").on('change',function () {
        var status_order = $(this).val();
        var is_status = {is_status:status_order};
        filterDatatables(is_status);
    });
   
});

function view_item(id) {
    $.ajax({
        url : url_ajax_view+'/'+id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $.each(data, function( key, value ) {
                $('td#'+key).html(value);
            });
            $('[name="id"]').val(id);
            $('table.list-detail tbody').html('');
            $.each(data.order_detail, function( key, value ) {
                var tr = '<tr id="'+key+'">';
                $.each(value, function (k,v) {
                    tr += '<td>'+v+'</td>';
                });
                tr += '</tr>';
                $('table.list-detail tbody').append(tr);
            });
            $('#form select[name="is_status"] > option[value="' + data.is_status + '"]').prop("selected", true);

            $('#modal_form').modal('show');
            $('.modal-title').text(language['heading_title_view']);

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            $(".modal-body").prepend(box_alert('alert-danger',language['error_try_again']));
        }
    });
}
function save(){
    $('#btnSave').text(language['btn_saving']); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    // ajax adding data to database
    $.ajax({
        url : url_ajax_update,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            toastr[data.type](data.message);
            $('#modal_form').modal('hide');
            reload_table();

            $('#btnSave').text(language['btn_save']);
            $('#btnSave').attr('disabled',false);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            $(".modal-body").prepend(box_alert('alert-danger',language['error_try_again']));
            $('#btnSave').text(language['btn_save']); //change button text
            $('#btnSave').attr('disabled',false); //set button enable

        }
    });
}





