$(function() {
    $('.jcarousel')
        .jcarousel({
            // Core configuration goes here
			'animation': {
		        'duration': 800,
		        'easing':   'linear',
		        'complete': function() {
		        }
		    }
        })
        .jcarouselAutoscroll({
            // Plugin configuration goes here
        });
    setInterval(function(){
    	$('.jcarousel').jcarousel('scroll', 0);
    },20000);

    var getJobInfoBtns = $('.get-job-info-btn');
    getJobInfoBtns.live('click',function(){
        getJobInfoBtns.removeClass('is-show-now');
        var id = $(this).addClass('is-show-now').attr('data-job-id');
        $('.job-detail').load('getJobInfo.php?id='+id);
    });
    $('.job-detail').load('getJobInfo.php?id='+getJobInfoBtns.eq(0).addClass('is-show-now').attr('data-job-id'));

    $('.play-video').on('click',function(){
        $('.video').show();
        var ele = document.getElementById('video-element');
        ele.play();
    });

});