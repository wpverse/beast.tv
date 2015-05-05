/**
 * Custom theme javascript
 */

 $( document ).ready(function() {


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
 	$('#site-navigation').meanmenu();


 	$('article.city .entry-content a').click(function(event){
 		event.stopPropagation();
 	});


 });


