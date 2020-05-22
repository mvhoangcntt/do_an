var generated = [],
  possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

$(function () {
  //load lang
  //load table ajax
  if (typeof page_type !== 'undefined') dataFilter = {page_type: page_type};
  init_data_table();

  //bind checkbox table
  init_checkbox_table();

  $(".generator").on("click", function (e) {
    generateCodes(1, 7);
    return false;
  });

  $('.time-start').datetimepicker({
      autoclose: true
  });
  $('.time-end').datetimepicker({
      autoclose: true
  });
  
  $("select.gift_box").on('change',function () {
    var gift_box = $(this).val();
    var is_status = {is_status:gift_box};
    filterDatatables(is_status);
  });
  $("input[name='percent_sale'],input[name='total_use']").keyup(function() {
    var price = $(this).val().replace(/[^0-9]/g, '');
    $(this).val(price);
  });

});
function num_price() {
  $("input[name='price_sale']").keyup(function() {
    var price = $(this).val().replace(/[^0-9]/g, '');
    $(this).val(numberFormat(price));
  });
}
function numberFormat(nStr){
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
    }
    return x1 + x2;
}

//form them moi
function add_form() {
  slug_disable = false;
  save_method = 'add';
  $('.price_sale').removeAttr('readonly');
  $('.percent_sale').removeAttr('readonly');
  $('#title-form').text('Thêm voucher');
  $('.form-group').removeClass('has-error');
  $('#modal_form').modal('show');
  $('#modal_form').trigger("reset");
  num_price();
}

//form sua
function edit_form(id) {
  slug_disable = true;
  num_price();
  save_method = 'update';
  $('.form-group').removeClass('has-error');
  $('.alert').empty();
  //Ajax Load data from ajax
  $.ajax({
    url: url_ajax_edit + "/" + id,
    type: "GET",
    dataType: "JSON",
    success: function (data) {
      $.each(data.post, function (k, v) {
        $('[name="' + k + '"]').val(v);
      });
      $('img#thumbnail').attr('src', media_url + data.post.thumbnail);
      $('#modal_form').modal('show');
      $('.modal-title').text('Sửa voucher');
    },
    error: function (jqXHR, textStatus, errorThrown) {
      $(".modal-body").prepend(box_alert('alert-danger', language['error_try_again']));
    }
  });
}

//ajax luu form
function save() {
  $('#btnSave').text(language['btn_saving']); //change button text
  $('#btnSave').attr('disabled', true); //set button disable
  var url;
  if (save_method == 'add') {
    url = url_ajax_add;
  } else {
    url = url_ajax_update;
  }
  // ajax adding data to database
  $.ajax({
    url: url,
    type: "POST",
    data: $('form').serialize(),
    dataType: "JSON",
    success: function (data) {
      toastr[data.type](data.message);
      if (data.type === "warning") {
        $('span.text-danger').remove();
        $.each(data.validation,function (i, val) {
          if (i=='end_time') {
            $('.end').after(val);
          } else if(i=='start_time'){
            $('.start').after(val);
          }else{
            $('[name="'+i+'"]').after(val);
          }
        });
      }else{
        $('#modal_form').modal('hide');
        reload_table();
      }
      
      $('#btnSave').text(language['btn_save']); //change button text
      $('#btnSave').attr('disabled', false); //set button enable
    },
    error: function (jqXHR, textStatus, errorThrown) {
      $(".modal-body").prepend(box_alert('alert-danger', language['error_try_again']));
      $('#btnSave').text(language['btn_save']); //change button text
      $('#btnSave').attr('disabled', false); //set button enable

    }
  });
}

function generateCodes(number, length) {
  $(".generator_code").val(generateCode(length));
}

function generateCode(length) {
  var text = "";

  for (var i = 0; i < length; i++) {
    text += possible.charAt(Math.floor(Math.random() * possible.length));
  }
  var check = check_code(text);
  if (check == 1) {
    generateCode(length);
  } else {
    return text;
  }

}

function check_code(code) {
  var result;
  $.ajax({
    url: ajax_check_code,
    type: 'POST',
    async: true,
    data: {code: code},
    success: function (data) {
      result= data;
    }
  });
  return result;
}

function handleChange(input) {
  if (input.value < 0) input.value = 0;
  if (input.value > 99) input.value = 99;
}