$(function () {
    //load lang
    load_lang('myproduct');
    //load slug
    init_slug('title','slug');
    //load table ajax
    init_data_table();
    //bind checkbox table
    init_checkbox_table();
    // hiển thị hỗ trợ textarea
    tinymce.init(optionTinyMCE);

    check_discount()

    loadFilterCatalog();
    loadFilterMaker();
    loadFilter();

});

//form them moi
function add_form() {
    save_method = 'add';
    $('#modal_form').modal('show');
    $('.modal-title').text('Thêm danh mục');
    $('#modal_form').trigger("reset");
}

//ajax luu form
function save()
{
    $('#btnSave').text(language['btn_saving']); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var id = $(".save").attr("id");
    var url;
    if(save_method == 'add') {
        url = url_ajax_add;
    } else {
        url = url_ajax_update+"/"+id;
    }

    for (var j = 0; j < tinyMCE.editors.length; j++){
        var content = tinymce.get(tinyMCE.editors[j].id).getContent();
        $('#'+tinyMCE.editors[j].id).val(content);
    }
    // ajax adding data to database
     // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data){
            toastr[data.type](data.message);
            if(data.type === "warning"){
                $('span.text-danger').remove();
                $.each(data.validation, function (i, val) {
                    $('[name="' + i + '"]').closest('.form-group').append(val);
                    if (i === 'album[]') {
                        $('.album-contain').closest('.form-group').append(val);
                    }
                })
            } else {
                $('#modal_form').modal('hide');
                reload_table();
            }
            $('#btnSave').text(language['btn_save']);
            $('#btnSave').attr('disabled',false);
        }, error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
            $('#btnSave').text(language['btn_save']);
            $('#btnSave').attr('disabled',false);
        }
    });
}

//form sua
function edit_form(id)
{
    save_method = 'update';
    $('#modal_form').modal('show');
    $('.modal-title').text(language['heading_title_edit']);
    $('#modal_form').trigger("reset");
    $(".save").attr("id",id);
    //Ajax Load data from ajax
    $.ajax({
        url : url_ajax_edit+"/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $.each(data, function( key, value ) {
                $("input[name='"+key+"']").val(value);
                if (key === 'content') {
                    tinymce.get(key).setContent(value);
                }
            });
            loadImageThumb(data.thumbnail);
            loadMultipleMedia(data.album);
            $('#modal_form').modal('show');
            $('.modal-title').text(language['heading_title_edit']);

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert(textStatus);
            console.log(jqXHR);
        }
    });
}
function delete_item(id){
    $.ajax({
        type : "GET",
        url : url_ajax_delete +"/"+ id,
        dataType: "JSON",
        success: function(response){
            if (response.type) {
                toastr[response.type](response.message);
            }
            reload_table();
        }
    })
}




function loadFilter() {
    var data  = Array(); 
    data['catalog']  = $("select[name='filter_catalog']").val();
    data['maker_id'] = $("select[name='filter_maker_id']").val();
    $("select.maker").on('change', function () {
        data['maker_id'] = $(this).val();
        filterDatatables(data);
    })
    $("select.catalog").on('change', function () {
        data['catalog'] = $(this).val();
        filterDatatables(data);
    });
}
function filterDatatables(data) {
    dataFilter = data;
    // console.log(dataFilter);
    reload_table();
}


function loadFilterCatalog() {
    $("select.filter_catalog").select2({
        allowClear: true,
        placeholder: 'Select an item',
        ajax: {
            url: url_ajax_update_field+"/"+1,
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
}
function loadFilterMaker() {
    $("select.filter_maker_id").select2({
        allowClear: true,
        placeholder: 'Select an item',
        ajax: {
            url: url_ajax_update_field+"/"+2,
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
}