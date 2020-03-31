<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-body">
					<div class="col-sm-7 col-xs-12">
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-filter"></i></span>
								<select class="form-control select2 account_id" name="account_id"
								style="width: 100%;" tabindex="-1" aria-hidden="true">
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-filter"></i></span>
								<select class="form-control select2 course_id" name="course_id"
								style="width: 100%;" tabindex="-1" aria-hidden="true">
								</select>
							</div>
						</div>
					</div>
					<?php $this->load->view($this->template_path."_block/button") ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-body">
					<form action="" id="form-table" method="post">
						<input type="hidden" value="0" name="msg" />
						<table id="data-table" class="table table-bordered table-hover dataTable" role="grid">
							<thead>
							<tr>
								<th><input type="checkbox" name="select_all" value="1" id="data-table-select-all"></th>
								<th>ID</th>
								<th>Học viên</th>
								<th>Khóa học</th>
								<th>Vote</th>
                                <th><?php echo lang('text_status');?></th>
								<th><?php echo lang('text_created_time');?></th>
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
<style>
	.btn-success,.dataTables_filter{
		display: none;
	}
</style>
<script>
    var url_load_account    = '<?php echo site_url('admin/vote/load_account') ?>';
    var url_load_course     = '<?php echo site_url('admin/vote/load_course') ?>';
</script>