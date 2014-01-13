jQuery(document).ready(function($) {
	$('.main-page-cycle').cycle({
		timeout: 10000,
		speed: 'slow'
	});
	$('.project-slider').cycle({
		fx: 'scrollHorz',
		timeout: 9000,
		speed: 'slow',
		pager: '#project-pager'
	});
});