<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$controller = $this->router->fetch_class();
// dd($controller);
$method = $this->router->fetch_method();
?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <?php $this->load->view($this->template_path."_block/where_datatables") ?>
                    <?php $this->load->view($this->template_path."_block/button",array('display_button'=>array(''))) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <form action="" id="form-table  formhoang" method="post">
                        <input type="hidden" value="0" name="msg" />
                        <table id="data-table" class="table table-bordered table-striped" style="width: 100%">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" name="select_all" value="1" id="data-table-select-all"></th>
                                    <th>Mã đơn hàng</th>
                                    <th>Tên người nhận</th>
                                    <th>Số điện thoại</th>
                                    <th><?php echo lang('text_created');?></th>
                                    <th><?php echo lang('text_status');?></th>
                                    <th>PayMent</th>
                                    <th>Trạng thái thanh toán</th>
                                    <th><?php echo lang('text_action');?></th>
                                </tr>
                            </thead>
                        </table>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->

<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="title-form"><?php echo lang('heading_title_detail');?>(Mã đơn hàng : #<a class="id_order"></a>)</h3>
            </div>
            <div class="modal-body form">
                
                <div class="nav-tabs-custom">
                    
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12">
                            	<div class="row detail_pay">
	                            	<label><?php echo lang('from_detail');?></label>
	                                <div class="form-group">
	                                    <div class="col-sm-6 col-xs-12">
	                                    	<table>
	                                    		<tr>
	                                    			<td>Họ , tên :</td>
	                                    			<td class="full_name">
	                                    				
	                                    			</td>
	                                    		</tr>
	                                    		<tr>
	                                    			<td>Số điện thoại :</td>
	                                    			<td class="phone">
	                                    				
	                                    			</td>
	                                    		</tr>
	                                    		<tr>
	                                    			<td>Email :</td>
	                                    			<td class="email">
	                                    				
	                                    			</td>
	                                    		</tr>
	                                    		<tr>
	                                    			<td>Địa chỉ :</td>
	                                    			<td class="address">
	                                    				
	                                    			</td>
	                                    		</tr>
	                                    	</table>
	                                    </div>
	                                    <div class="col-sm-6 col-xs-12">
	                                    	<label><?php echo lang('form_trangthai');?></label>
	                                    	<div class="form-group">
	                                    		<div class="form-group">
												  	<div class="input-group">
														<span class="input-group-addon"><i class="fa fa-filter"></i></span>
														<select class="form-control select2 filter_status status" title="filter_category_id" name="category_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
													  	
														</select>
												  	</div>
												</div>
					                            
					                        </div>
	                                    </div>
	                                </div>
	                            </div>

								<div class="row detail_product">
									<label><?php echo lang('from_detail_product');?></label>
	                                <div class="form-group">
	                                	<div class="box">
							                <div class="box-body">
							                    <form action="" id="form-table  formhoang" method="post">
							                        <input type="hidden" value="0" name="msg" />
			                                    	<table id="table_product" class="table table-bordered table-striped" style="width: 100%">
			                                    		<thead>
			                                				<tr>
			                                					<!-- <th><input type="checkbox" name="select_all" value="1" id="data-table-select-all"></th> -->
					                                			<th><?php echo lang('text_product_code');?></th>
					                                			<th><?php echo lang('text_product_name');?></th>
					                                			<th><?php echo lang('text_product_thumbnail');?></th>
					                                			<th><?php echo lang('text_product_price');?></th>
					                                			<th><?php echo lang('text_product_amount');?></th>
					                                			<th>Khích thước</th>
					                                			<th><?php echo lang('text_product_total_price');?></th>
			                                    			</tr>
			                                    		</thead>
			                                    	</table>
			                                    </form>
							                </div>
							                <!-- /.box-body -->
							            </div>
	                                </div>
								</div>
								<div class="row pay" style="margin-right: 100px">
									<div>
										<table>
											<tr>
												<td>Tổng giá trị sản phẩm : </td>
												<td class="tongtien_"></td>
											</tr>
											<tr>
												<td>Phí vận chuyển : </td>
												<td class="transport_fee_"></td>
											</tr>
											<tr>
												<td>Giảm giá : </td>
												<td class="gift_code_"></td>
											</tr>
											<tr>
												<td>Tổng giá trị đơn hàng : </td>
												<td class="amount_total_" style="color: red"></td>
											</tr>
										</table>
									</div>
								</div>

                                
                            </div>
                        </div>
                    </div>   
                            

                    <!-- /.tab-content -->
                </div>
                <!-- nav-tabs-custom -->
                
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->