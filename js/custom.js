/**
 * Custom theme javascript
 * mrt themejs ver 1.1.4a
 */

 $( document ).ready(function() {

 	var setScreenWidth = '767';

 	$('.page-template-page-contacts .type-city').matchHeight({
 		byRow: true,
 		property: 'height',
 		target: null,
 		remove: false
 	});
 	$('.page-template-page-contacts .type-sales-contact').matchHeight({
 		byRow: true,
 		property: 'height',
 		target: null,
 		remove: false
 	});

 	$('#site-navigation').meanmenu({
 		meanScreenWidth: setScreenWidth,
 		meanMenuClose: "<span></span><span></span><span></span>",
 	});

 	$('article.city .entry-content a').click(function(event){
 		event.stopPropagation();
 	});

 	$('.collapse').on('hide.bs.collapse', function() {
 		$("#breadcrumb-city").fadeOut();
 	});

 	$('.collapse').on('shown.bs.collapse', function() {
 		var section = $(this).attr('id');
 		var name = $(this).data('name');
 		console.log('section opened: '+section);
 		console.log('name opened: '+name);
 		$("#breadcrumb-city").html( name ).hide().fadeIn();
 	});


 	$('#site-navigation > div').css('display','none');



 	jQuery(window).resize(function(){

 		if ($(window).width() > 767) {
$('#site-navigation > div').css('display','none');
 		} else {
$('#site-navigation > div').css('display','block');
 		}

 	});


 			$("#menu-stack").click( function(){
 				$('#site-navigation > div').fadeToggle("slow");
 				$(".header-wrap").toggleClass("faded");
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