$(function () {
    //load lang
    load_lang('exchange_currency');
    //load table ajax
    init_data_table();
    //bind checkbox table
    init_checkbox_table();
    $('[name=sell]').number(true, 2);
});
//form them moi
function add_form()
{
    save_method = 'add';
    $('#type').prop('disabled', false);
    load_currency_code();
    $('.help-block').empty();
    $('#modal_form').modal('show');
    $('.modal-title').text('Thêm nhóm');
    $('#form')[0].reset();
}
//form sua
function edit_form(id)
{
    save_method = 'update';
    $('.help-block').empty();
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
            load_currency_code(data.code);
            $('#type').prop('disabled', true);
            $('#modal_form').modal('show');
            $('.modal-title').text(language['heading_title_edit']);

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
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

    $('#type').prop('disabled', false);
    let data = $('#form').serialize();
    $('#type').prop('disabled', true);
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: data,
        dataType: "JSON",
        success: function(data)
        {
            toastr[data.type](data.message);
            if(data.type === "warning"){
                $('span.text-danger').remove();
                $.each(data.validation,function (i, val) {
                    $('[name="'+i+'"]').after(val);
                })
            } else {
                $('#modal_form').modal('hide');
                reload_table();
            }
            $('#btnSave').text(language['btn_save']); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
            $('#token').val(data.token);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            $(".modal-body").prepend(box_alert('alert-danger',language['error_try_again']));
            $('#btnSave').text(language['btn_save']); //change button text
            $('#btnSave').attr('disabled',false); //set button enable

        }
    });
}

function sync_dongabank(){
    $.ajax({
        url : url_ajax_sync_dongabank,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            toastr[data.type](data.message);
            reload_table();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            $(".modal-body").prepend(box_alert('alert-danger',language['error_try_again']));
            $('#btnSave').text(language['btn_save']); //change button text
            $('#btnSave').attr('disabled',false); //set button enable

        }
    });
}

function sync_vietcombank() {
    $.ajax({
        url : url_ajax_sync_vietcombank,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            toastr[data.type](data.message);
            reload_table();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            $(".modal-body").prepend(box_alert('alert-danger',language['error_try_again']));
            $('#btnSave').text(language['btn_save']); //change button text
            $('#btnSave').attr('disabled',false); //set button enable

        }
    });
}

function load_currency_code(dataSelected) {
    let selector = $('select[name="type"]');
    selector.select2({
        allowClear: true,
        placeholder: language['form_type'],
        data: dataSelected,
        ajax: {
            url: url_ajax_load_currency_code,
            dataType: 'json',
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
    if(typeof dataSelected !== 'undefined') selector.find('> option').prop("selected","selected").trigger("change");
}