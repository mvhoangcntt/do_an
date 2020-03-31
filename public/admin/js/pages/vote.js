$(function () {
	//load lang
	load_lang('banner');
	//load table ajax
	init_data_table();
	//bind checkbox table
	init_checkbox_table();
	load_account();
	load_course();
	$("select.account_id").on('change',function () {
		let id = $(this).val();
		let account_id = {account_id:id};
		filterDatatables(account_id);
	});
	$("select.course_id").on('change',function () {
		let id = $(this).val();
		let course_id = {course_id:id};
		filterDatatables(course_id);
	});
});
function load_account(dataSelected) {
    $('select[name="account_id"]').select2({
        allowClear: true,
        data: dataSelected,
        placeholder: 'Học viên',
        multiple: false,
        ajax: {
            url: url_load_account,
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
}
function load_course(dataSelected) {
    $('select[name="course_id"]').select2({
        allowClear: true,
        data: dataSelected,
        placeholder: 'Khóa học',
        multiple: false,
        ajax: {
            url: url_load_course,
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
}
