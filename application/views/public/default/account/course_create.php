<div class="modal fade md-question" id="add-question">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<form id="form">
					<div class="heading">
						<span class="add_q"><?php echo lang('add_questions') ?></span>
						<div class="btn-ques">
							<button class="save save_questions"><i class="fa fa-save"></i><?php echo lang('save') ?><label class="icon_load"><i class="fa fa-spinner fa-spin" style="font-size: 18px"></i></label></button>
							<button class="cancel" data-dismiss="modal"><i class="fa fa-times-circle"></i><?php echo lang('cancels') ?></button>
						</div>

					</div>

					<div class="form-question">
						<div class="tab-pane active" id="tab_language">

							<ul class="nav nav-pills">
								<?php if(!empty($this->config->item('cms_language'))) foreach ($this->config->item('cms_language') as $lang_code => $lang_name){ ?>
									<li><a href="#tab_<?php echo $lang_code;?>" <?php echo ($lang_code == 'vi') ? ' class="active"' : '';?> data-toggle="tab"><?php echo $lang_name;?></a></li>
								<?php } ?>
							</ul>
							<div class="tab-content">
                				<input type="hidden" name="id" value="0">
								<input type="hidden" name="course_id" value="<?php echo $data_course->id ?>">

								<?php if(!empty($this->config->item('cms_language')))  foreach ($this->config->item('cms_language') as $lang_code => $lang_name){ 
										$merch = $lang_code == 'vi' ? 'result' : 'result_en';
									?>
									<div class="tab-pane <?php echo ($lang_code == 'vi') ? 'active' : '';?>" id="tab_<?php echo $lang_code;?>">
										<div class="row">
											<div class="col-12">
												<div class="form-item">
													<textarea class="form-control" rows="4" placeholder="<?php echo lang('questions') ?>" name="title[<?php echo $lang_code;?>]"></textarea>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-item">
													<input type="text" class="form-control" placeholder="<?php echo lang('answer') ?> A" name="answer1[<?php echo $lang_code;?>]">
													<div class="radio rad">
														<input type="radio" name="<?php echo $merch ?>" dat="a" value="1">
														<label for="r1">&nbsp;</label>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-item">
													<input type="text" class="form-control" placeholder="<?php echo lang('answer') ?> B" name="answer2[<?php echo $lang_code;?>]">
													<div class="radio rad">
														<input type="radio" name="<?php echo $merch ?>" value="2">
														<label for="r2">&nbsp;</label>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-item">
													<input type="text" class="form-control" placeholder="<?php echo lang('answer') ?> C" name="answer3[<?php echo $lang_code;?>]">
													<div class="radio rad">
														<input type="radio" name="<?php echo $merch ?>" value="3">
														<label for="r3">&nbsp;</label>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-item">
													<input type="text" class="form-control" placeholder="<?php echo lang('answer') ?> D" name="answer4[<?php echo $lang_code;?>]">
													<div class="radio rad">
														<input type="radio" name="<?php echo $merch ?>" value="4">
														<label for="r4">&nbsp;</label>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php } ?>

							</div>

						</div>

					</div>
				</div>
			</form>

		</div>
	</div>
</div>

<div class="modal fade md-question" id="number_question">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="heading">
					<span><?php echo lang('add_number_questions') ?></span>
					<div class="btn-ques">
						<button class="save" onclick="save_num_point_q('number_question')"><i class="fa fa-save"></i><?php echo lang('save') ?></button>
						<button class="cancel" data-dismiss="modal"><i class="fa fa-times-circle"></i><?php echo lang('cancels') ?></button>
					</div>

				</div>
				<div class="form-question">
					<div class="row">
						<div class="col-12">
							<div class="form-item">
								<input type="text" class="form-control" placeholder="<?php echo lang('enter_questions') ?>" name="number_question" value="" data="<?php echo $data_course->number_question ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade md-question" id="points_reached">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="heading">
					<span><?php echo lang('more_points_reached') ?></span>
					<div class="btn-ques">
						<button class="save" onclick="save_num_point_q('points_reached')"><i class="fa fa-save"></i><?php echo lang('save') ?></button>
						<button class="cancel" data-dismiss="modal"><i class="fa fa-times-circle"></i><?php echo lang('cancels') ?></button>
					</div>

				</div>
				<div class="form-question">
					<div class="row">
						<div class="col-12">
							<div class="form-item">
								<input type="text" class="form-control" placeholder="<?php echo lang('enter_reached') ?>" name="points_reached" value="" data="<?php echo $data_course->points_reached ?>" min="1" max="100" onkeyup="handleChange(this);">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- endmodal -->
<section class="banner-cate v2">
	<div class="bn-img" style="background-image: url(<?php echo $this->templates_assets ?>images/prf-banner1.jpg)">
	</div>
	<div class="bn-content v2">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-8">
					<h2 class="title"><i class="fa fa-bookmark"></i> <?php echo $data_course->title ?></h2>
				</div>
				<div class="col-lg-4 text-lg-right see_pre">
					<a class="smooth butn preview" href="<?php echo getUrlCourseTest($data_course->id) ?>" ><?php echo lang('preview') ?></a>
					<a class="smooth butn send" href="#" title=""><?php echo lang('sub_course') ?></a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="profile-page">
	<div class="container">
		<div class="row">
			<div class="col-xl-3">
				<button class="sb-open"><i class="fa fa-cogs"></i></button>
				<div class="prf-sidebar crs-sidebar">
					<button class="sb-close">&times;</button>
					<div class="sb-cate">
						<h3 class="title">Nội dung khóa học</h3>
						<ul>
							<li><a class="smooth" href="#" title="">Mục tiêu khóa học <span class="edit">Sửa</span></a></li>
							<li><a class="smooth" href="#" title="">Chương trình giảng dạy <span class="edit">Sửa</span></a></li>
							<li><a class="smooth active" href="#" title="">Câu hỏi trắc nghiệm</a></li>
						</ul>
						<h3 class="title">Thông tin khóa học</h3>
						<ul>
							<li><a class="smooth" href="#" title="">Thông tin cơ bản</a></li>
							<li><a class="smooth" href="#" title="">Thông tin chung</a></li>
							<li><a class="smooth" href="#" title="">Ảnh đại diện khóa học</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-xl-9">
				<div class="prf-content">
					<div class="prf-head">
						<h2 class="title"><?php echo lang('multiple_choice') ?></h2>
						<p><?php echo lang('enter_and_edit') ?></p>
					</div>
					<div class="prf-box">
						<div class="course-head">
							<div class="row">
								<div class="col-lg-4">
									<h3 class="title"><?php echo lang('list_of_questions') ?></h3>
								</div>
								<div class="col-lg-8 text-lg-right">
									<a class="smooth ctrl add show_points_reached" href="javascript:;"><?php echo lang('score_reached') ?></a>

									<a class="smooth ctrl add show_number_question" href="javascript:;"><?php echo lang('number_of_questions') ?></a>

									<a class="smooth ctrl add ad_q" href="javascript:;" 
										onclick="add_questions()" 
										data-numq="<?php echo $data_course->number_question ?>" 
										data-total="<?php echo $total_questions ?>">
										<i class="material-icons">add_circle</i> <?php echo lang('add_questions') ?>
									</a>

									<a class="smooth ctrl del" href="javascript:;" onclick="delete_multiple()"><i class="fa fa-trash"></i> <?php echo lang('delete') ?></a>
								</div>
							</div>
						</div>
						<div class="prf-bar">
							<div class="row">
								<div class="col-sm-6">
									<div class="ctrl">
										<input type="text" placeholder="<?php echo lang('search') ?>" name="search_questions" class="search_questions" >
										<input type="hidden" value="" name="sort">
										<input type="hidden" value="desc" name="params_sort">

										<button><span class="fa fa-search"></span></button>
									</div>
								</div>
								<div class="col-sm-6 text-center text-sm-right pg">
									<label class="navi-text">
										<strong>
											<span class="start_">1</span>-<span class="end_">10</span>
										</strong> <?php echo lang('in') ?> 
										<span class="total"></span>
									</label>
									<button class="navi-button smooth prev" data-page="1"><i class="fa fa-angle-left"></i></button>
									<button class="navi-button smooth next" data-page="1"><i class="fa fa-angle-right"></i></button>
								</div>
							</div>
						</div>

						<div class="prf-table crs-table">
							<table>
								<thead>
									<tr>
										<th><label class="i-check"><input class="check-all" type="checkbox" name=""><i></i></label></th>
										<th>ID 
											<button><i class="fa fa-sort-amount-desc sort_questions" data-id="asc" data-key="1"></i></button>
										</th>
										<th><?php echo lang('questions') ?>
											<button><i class="fa fa-sort-alpha-asc sort_questions" data-id="asc" data-key="2"></i></button>
										</th>
										
										<th><?php echo lang('answer') ?> A</th>
										<th><?php echo lang('answer') ?> B</th>
										<th><?php echo lang('answer') ?> C</th>
										<th><?php echo lang('answer') ?> D</th>

									</tr>
								</thead>
								<tbody class="load_ques">
									
								</tbody>
						</table>
					</div>
					<div class="prf-bar">
						<div class="row">
							<div class="col-sm-6">
								<div class="ctrl">
									<input type="text" placeholder="<?php echo lang('search') ?>" class="search_questions" >
									<button><span class="fa fa-search"></span></button>
								</div>
							</div>
							<div class="col-sm-6 text-center text-sm-right pg">
								<label class="navi-text">
									<strong>
										<span class="start_">1</span>-<span class="end_">10</span>
									</strong> <?php echo lang('in') ?> 
									<span class="total"></span>
								</label>
								<button class="navi-button smooth prev" data-page="1"><i class="fa fa-angle-left"></i></button>
								<button class="navi-button smooth next" data-page="1"><i class="fa fa-angle-right"></i></button>
							</div>
						</div>
					</div>
					<br>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
<script>
	var url_ajax_add    = '<?php echo site_url('account/add_questions') ?>',
		url_ajax_delete = '<?php echo site_url('account/delete_questions') ?>',
		url_ajax_edit   = '<?php echo site_url('account/edit_questions') ?>',
		url_ajax_update = '<?php echo site_url('account/update_questions') ?>',
		url_ajax_list   = '<?php echo site_url('account/list_questions') ?>';
</script>