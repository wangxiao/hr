$(function() {

    //banner 的轮播图效果 
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

    //点击显示对应的职位信息
    var getJobInfoBtns = $('.get-job-info-btn');
    var jobDetailEles = $('.job-detail');
    getJobInfoBtns.live('click',function(){
        getJobInfoBtns.removeClass('is-show-now');
        var id = $(this).addClass('is-show-now').attr('data-job-id');
        window.location.hash = "getJobInfo="+id;
        jobDetailEles.animate({'opacity':0},100,function(){
            jobDetailEles.load('getJobInfo.php?id='+id);
        });
        setTimeout(function(){
            jobDetailEles.animate({'opacity':1},100);
        },150);
    });

    //默认展示第一个数据
    var getJobInfoId;
    if (!!window.location.hash.match(/#getJobInfo=(\d*)/)) {
        getJobInfoId = window.location.hash.match(/#getJobInfo=(\d*)/)[1];
    }else{
        getJobInfoId = getJobInfoBtns.eq(0).attr('data-job-id');
    }
    getJobInfoBtns.each(function(){
        var ele = $(this);
        if (ele.attr('data-job-id')==getJobInfoId){
            ele.addClass("is-show-now");
        }
    });
    jobDetailEles.load('getJobInfo.php?id='+ getJobInfoId);
    window.location.hash = "getJobInfo="+getJobInfoId;

    //播放视频
    $('.play-video').on('click',function(){
        $('.video').show();
        var ele = document.getElementById('video-element');
        ele.play();
    });


});