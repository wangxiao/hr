$(function(){

	function loadAndShowJob ( id ) {
		$('#job-content').load('../php/getJobList.php?category='+id);
	}

	//查看一个职位分类下的职位列表
	$('.job-category-item').on('click',function(){
		var id = $(this).attr('data-category-id');
		loadAndShowJob(id);
	});

	var defaultLoadId = $('.job-category-item').eq(0).attr('data-category-id');
	loadAndShowJob(defaultLoadId);

	function loadAndEditJob ( id ) {
		$('#job-content').load('../php/getJob.php?jobId='+id);
	}

	//编辑一项职位信息
	$('.edit-job-btn').live('click',function(){
		var id = $(this).attr('data-job-id');
		loadAndEditJob(id);
	});

	//删除一项职位信息
	$('.del-job-btn').live('click',function(){
		alert('双击按钮删除');
	});
	$('.del-job-btn').live('dblclick',function(){
		var id = $(this).attr('data-job-id');
		$(this).parent().parent().remove();
        $.ajax({
            type: 'get',
            url: '../php/delJob.php?id='+id,
            async: false,
            contentType: 'application/json',
            success: function(data) {
            	alert('删除成功');
            },
            error: function(e) {
            }
        });
	});

	//提交编辑的职位信息
	$('#editJob').live('submit',function(){
		alert('保存了，但是不一定成功保存。');
	});

	$('#add-job-info-btn').on('click',function(){
		$('#job-content').empty();
		$('.add-new-job-form').clone().appendTo('#job-content').show();
	});

});

