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
});