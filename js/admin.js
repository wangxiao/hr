$(function(){

	function loadAndShowJob ( id ) {
		$('#job-content').load('../php/getJobList.php?category='+id);
	}

	$('.job-category-item').on('click',function(){
		var id = $(this).attr('data-category-id');
		console.log(id);
		loadAndShowJob(id);
	});

	var defaultLoadId = $('.job-category-item').eq(0).attr('data-category-id');
	loadAndShowJob(defaultLoadId);

	function loadEditJob ( id ) {
		$('#job-content').load('../php/getJob.php?jobId='+id);
	}

	setTimeout(function(){
		loadEditJob (1);
	},500);
});

