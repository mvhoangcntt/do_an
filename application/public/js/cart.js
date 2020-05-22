$(function () {
    
});
$(document).ready(function(){
	var url_check = base_url+"details/check/size";
    $(document).on("click",".textOption",function(){
        // $('#_address_update').attr('disabled',true);
	    $.ajax({
	        url : url_check,
	        type: "POST",
	        data: $('#addcart_').serialize(),
	        dataType: "JSON",
	        success: function(data){
	            $('#soluong').val('');
	            $('#error').html('');
	            $('#soluong').val(data.soluong);
	            if(data.type === "warning"){
	                toastr[data.type](data.message);
	                $('input[name=quantity]').val('1');
	                $('#error').html('<span class="text-danger">'+data.message+'</span>');
	            }
	            $('#_address_update').attr('disabled',false);
	        }, error: function (jqXHR, textStatus, errorThrown) {
	            $('#_address_update').attr('disabled',false);
	        }
	    });
    });
    var url_check2 = base_url+"details/check";
    $(document).on("click",".colorOption",function(){
        $.ajax({
	        url : url_check2,
	        type: "POST",
	        data: $('#addcart_').serialize(),
	        dataType: "JSON",
	        success: function(data){
	            $('#soluong').val('');
	            $('#error').html('');
	            $('#soluong').val(data.soluong);
	            if(data.type === "warning"){
	                toastr[data.type](data.message);
	                $('input[name=quantity]').val('1');
	                $('#error').html('<span class="text-danger">'+data.message+'</span>');
	            }
	            $('#_address_update').attr('disabled',false);
	        }, error: function (jqXHR, textStatus, errorThrown) {
	            $('#_address_update').attr('disabled',false);
	        }
	    });
    });
});
function save_cart(){
	var url_add_cart = base_url+"details/add_cart";
	$('#btn_add_cart').attr('disabled',true);
    $.ajax({
        url : url_add_cart,
        type: "POST",
        data: $('#addcart_').serialize(),
        dataType: "JSON",
        success: function(data){
        	toastr[data.type](data.message);
        	$('#error_pty').html('');
            if(data.error === 'pty'){
                $('#error_pty').html('<span class="text-danger">'+data.error_pty+'</span>');
            }
            reload_view_cart();
            $('#btn_add_cart').attr('disabled',false);
        }, error: function (jqXHR, textStatus, errorThrown) {
            $('#btn_add_cart').attr('disabled',false);
        }
    });
}
$(document).ready(function(){
	var url_add_view_cart = base_url+"details/update_view_cart";
    $.ajax({
        url : url_add_view_cart,
        dataType: "JSON",
        success: function(data){
        	$('.add-count').html(data.count);
        }
    });
});
function reload_view_cart(){// xem ngoài giao diện số lượng sản phẩm trong giỏ
	var url_add_view_cart = base_url+"details/update_view_cart";
    $.ajax({
        url : url_add_view_cart,
        dataType: "JSON",
        success: function(data){
        	$('.add-count').html(data.count);
        }
    });
}
$(document).ready(function(){
	var url_edit_cart = base_url+"cart/delete_cart/";
    $(document).on("click",".delete-cart",function(){
    	$('.delete-cart button').attr('disabled',true);
        $.ajax({
	        url : url_edit_cart+$(this).find('.id_cart').val(),
	        dataType: "JSON",
	        success: function(data){
	            toastr[data.type](data.message);
                if(data.type === "success"){
                	location.reload();
                    // $('.remove_'+$(this).find('.id_cart').val()).remove();
                }
                $('.delete-cart button').attr('disabled',false);
            }, error: function (jqXHR, textStatus, errorThrown) {
                // $('#form_uudai').trigger("reset");
                $('.delete-cart button').attr('disabled',false);
            }
	    });
    });
    $(document).on("click","#checkbox_all",function(){
    	if ($('.check_cart').prop('checked') === true) {
    		$('.check_cart').prop('checked', false);
    	}else{
    		$('.check_cart').prop('checked', true);
    	}
    	var url_price_check = base_url+"cart/get_all_price_check";
        $('.number-amuont').html("0đ");
	    $.ajax({
	        url : url_price_check,
	        type: "POST",
	        data: $('#form_view_cart_').serialize(),
	        dataType: "JSON",
	        success: function(data){
	        	$('.number-amuont').html(formatNumber(data.price)+"đ");
	        }
	    });
    });

    $(document).on("click","#delete_all",function(){
        var url_delete_all = base_url+"cart/delete_all";
	    $.ajax({
	        url : url_delete_all,
	        type: "POST",
	        data: $('#form_view_cart_').serialize(),
	        dataType: "JSON",
	        success: function(data){
	        	toastr[data.type](data.message);
	        	if(data.type === "success"){
                	location.reload();
                }
	        }
	    });
    });
    $(document).on("change",".check_cart",function(){
        var url_price_check = base_url+"cart/get_all_price_check";
        $('.number-amuont').html("0đ");
	    $.ajax({
	        url : url_price_check,
	        type: "POST",
	        data: $('#form_view_cart_').serialize(),
	        dataType: "JSON",
	        success: function(data){
	        	$('.number-amuont').html(formatNumber(data.price)+"đ");
	        }
	    });
    });

    $(document).on("click",".edit-cart",function(){
        var url_edit_cart_ = base_url+"cart/edit_cart_/";
		$('.edit-cart button').attr('disabled',true);
	    $.ajax({
	        url : url_edit_cart_+$(this).find('.id_cart_').val(),
	        type: "POST",
	        data: $('#form_view_cart_').serialize(),
	        dataType: "JSON",
	        success: function(data){
	        	console.log(data.cart.id)
	        	$('.form_cart_hide .item-cart-img').find('.img-with').attr("src",base_url+"public/media/"+data.cart.thumbnail);
	        	$('.form_cart_hide .item-cart-img').find('a').attr("href",data.cart.url);
	        	$('.form_cart_hide .item-cart-img').find('a').attr("title",data.cart.title);
	        	$('.form_cart_hide .number-text-cart').find('.title-text').html(data.cart.title+"");
	        	$('.form_cart_hide .number-text-cart').find('.cart-price').html(formatNumber(data.cart.price)+"đ");
	        	$('.form_cart_hide .cart-bottom').find('.coler-item-produc').html('');
	        	$('.form_cart_hide .cart-bottom').find('.add-text_size').html('');
	        	$('.form_cart_hide .cart-bottom').find('.id_product').attr('value',data.cart.id);
	        	$('.form_cart_hide .cart-bottom').find('#soluong').attr('value',data.cart.quantity_size);
	        	$('.form_cart_hide .cart-bottom').find('#id_cart_edit').attr('value',data.cart.id_cart);
	        	$.each(data.size.text_coler, function (i, val) {
	        		if (data.cart.text_coler === val) {
	        			$('.form_cart_hide .cart-bottom').find('.coler-item-produc').append('<input type="button" class="colorOption colorOption-active" value="'+val+'">');
	        			$('.form_cart_hide .cart-bottom').find('.coler-item-produc').append('<input type="hidden" id="text_coler" name="text_coler" value="'+val+'">');
	        		}else{
	        			$('.form_cart_hide .cart-bottom').find('.coler-item-produc').append('<input type="button" class="colorOption" value="'+val+'">');
                    }
                });
                $.each(data.size.text_size, function (i, val) {
	        		if (data.cart.text_size === val) {
	        			$('.form_cart_hide .cart-bottom').find('.add-text_size').append('<input type="button" class="textOption size-active" value="'+val+'">');
	        			$('.form_cart_hide .cart-bottom').find('.add-text_size').append('<input type="hidden" id="text_size" name="text_size" value="'+val+'">');
	        		}else{
	        			$('.form_cart_hide .cart-bottom').find('.add-text_size').append('<input type="button" class="textOption" value="'+val+'">');
                    }
                });
                $('.form_cart_hide .cart-bottom').find('.input_number').attr("value", data.cart.quantity_cart);

	            $('.edit-cart button').attr('disabled',false);
	        }, error: function (jqXHR, textStatus, errorThrown) {
	            $('.edit-cart button').attr('disabled',false);
	        }
	    });
    });

    $(document).on("click","#save_edit_cart",function(){
	    var url_add_edit = base_url+"cart/save_edit";
		$('#save_edit_cart').attr('disabled',true);
	    $.ajax({
	        url : url_add_edit,
	        type: "POST",
	        data: $('#addcart_').serialize(),
	        dataType: "JSON",
	        success: function(data){
	        	toastr[data.type](data.message);
	        	$('#error_pty').html('');
	            if(data.error === 'pty'){
	                $('#error_pty').html('<span class="text-danger">'+data.error_pty+'</span>');
	            }
	            if(data.type === "success"){
                	location.reload();
                }
	            $('#save_edit_cart').attr('disabled',false);
	        }, error: function (jqXHR, textStatus, errorThrown) {
	            $('#save_edit_cart').attr('disabled',false);
	        }
	    });
	});

	// mã khuyến mãi
	$(document).on("click",".bt-gift-code",function(){
        var url_add_gift = base_url+"order/gift";
		$('.bt-gift-code').attr('disabled',true);
	    $.ajax({
	        url : url_add_gift,
	        type: "POST",
	        data: $('#form_dathang_').serialize(),
	        dataType: "JSON",
	        success: function(data){
	        	toastr[data.type](data.message);
	        	$(".voucher_add").html('');
	            if(data.type === "success"){
	            	$(".voucher_add").append('\
	            		<div class="money-order-item">'+data.name_event+'</div>\
                        <div class="money-order-item-coler">-'+data.percent_sale+'%</div>\
	            		');
	            	// console.log($(".tiensanpham").val());
	            	$(".tongtientt").text( formatNumber($(".tiensanpham").val() - ($(".tiensanpham").val()/100) * data.percent_sale) + " vnđ"  );
                	// location.reload();
                }
	            $('.bt-gift-code').attr('disabled',false);
	        }, error: function (jqXHR, textStatus, errorThrown) {
	            $('.bt-gift-code').attr('disabled',false);
	        }
	    });
    });

});
function formatNumber(num) {
  return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}
