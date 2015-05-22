/**
 * Custom theme javascript
 */

 $( document ).ready(function() {

 	$('.page-template-page-contacts .type-city').matchHeight({
 		byRow: true,
 		property: 'height',
 		target: null,
 		remove: false
 	});
 });
 $(window).load(function() {
 	$('.flexslider').flexslider({
 		animation: "slide",
 		controlNav:false,
 		prevText: "",
 		nextText: ""
 	});
 });

 $(document).ready(function () {
 	$('#site-navigation').meanmenu({
 		meanScreenWidth: "767",
 		meanMenuClose: "<span></span><span></span><span></span>",
 	});


 	$('article.city .entry-content a').click(function(event){
 		event.stopPropagation();
 	});


 });


