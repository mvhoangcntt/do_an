$(function () {
    //load lang
    //load_lang('newsletter');
    //load table ajax
    init_data_table();
    //bind checkbox table
    init_checkbox_table();
});

//form them moi
function add_form() {
    slug_disable = false;
    save_method = 'add';
    $('#modal_form').modal('show');
	$('#modal_form').trigger("reset");
}

//form sua
function edit_form(id) {
    slug_disable = true;
    save_method = 'update';
    //Ajax Load data from ajax
    $.ajax({
        url : url_ajax_edit+"/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $.each(data.data, function( key, value ) {
                $('[name="'+key+'"]').val(value);
            });
            $('#modal_form').modal('show');
            $('.modal-title').text(language['heading_title_edit']);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            $(".modal-body").prepend(box_alert('alert-danger',language['error_try_again']));
        }
    });
}
//ajax luu form
function save()
{
    $('#btnSave').text(language['btn_saving']); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;

    if(save_method == 'add') {
        url = url_ajax_add;
    } else {
        url = url_ajax_update;
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.type === "validate_error"){
                $(".modal-body").prepend(box_alert('alert-danger',data.message));
            } else {
                toastr[data.type](data.message);
                $('#modal_form').modal('hide');
                reload_table();
            }
            $('#btnSave').text(language['btn_save']); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            $(".modal-body").prepend(box_alert('alert-danger',language['error_try_again']));
            $('#btnSave').text(language['btn_save']); //change button text
            $('#btnSave').attr('disabled',false); //set button enable

        }
    });
}