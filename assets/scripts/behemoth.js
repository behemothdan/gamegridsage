$(document).ready(function() {		
	$(window).on("scroll", function() {		
		var fromTop = $(window).scrollTop();
		$("#header-logo").toggleClass("smallheaderlogo", (fromTop > 190));
		$("#header-logo").toggleClass("bigheaderlogo", (fromTop < 190));
	});
	$(".eventcontainer > .row > div > h1").fitText();
	$(".eventcontainer > .row > div > span").fitText(1.4,{minFontSize: '12px', maxFontSize: '24px'});
});