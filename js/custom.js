/**
 * Custom theme javascript
 * mrt themejs ver 1.1.4a
 */


 function scrollToElement(selector, time, verticalOffset) {
 	time = typeof(time) != 'undefined' ? time : 1000;
 	verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
 	element = $(selector);
 	offset = element.offset();
 	offsetTop = offset.top + verticalOffset;
 	$('html, body').animate({
 		scrollTop: offsetTop
 	}, time);           
 }


 $( document ).ready(function() {


    $("#main").fitVids();



    $(".editor-thumb").click(function(event){
     event.preventDefault();
     var base = $(this).data('base');
     console.log("Base: "+base);
     var player = $(base+' iframe')[0];
     console.log("CLICK editor-thumb:")
     console.log("player:"+player);
     console.log("base: "+base);
     $(base+' .content-area-wrap').css('z-index',100);

     Froogaloop(player).api('play');

 });



    $("article.portfolio-item").each(function() {

console.log("marker-01");
        var base = $(this).attr('id');
        console.log("Base: "+base);
        var iframe = $("#"+base+" .content-area-wrap iframe");
        var player = $f(iframe);
        var status = $('#'+base+' .status');

        console.log('Each player js binding setup:');
        console.log("base: #"+base);
        console.log("iframe: ");
        console.log(iframe);
        console.log("player: ");
        console.log(player);
        console.log("status: ");
        console.log(status);
console.log("marker-02");
    // When the player is ready, add listeners for pause, finish, and playProgress
    player.addEvent('ready', function() {
        status.text('ready');
        
        player.addEvent('pause', onPause);
        player.addEvent('finish', onFinish);
        player.addEvent('playProgress', onPlayProgress);
    });

console.log("marker-03");
    function onPause(id) {
        status.text('paused');
    }
console.log("marker-04");
    function onFinish(id) {
        status.text('finished');
        $("#"+base+" .content-area-wrap").css('z-index','1');
    }
console.log("marker-05");
    function onPlayProgress(data, id) {
        status.text(data.seconds + 's played');
    }
console.log("marker-06");
})








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
   $('#site-navigation').toggleClass("displace");
   $('#site-navigation > div').fadeToggle("slow");
   $(".header-wrap").toggleClass("faded");
});

});

$(window).load(function() {

	$('.flexslider').flexslider({
		animation: "slide",
		controlNav:false,
		prevText: "",
		nextText: "",
		slideshowSpeed: 3000,

	});


	console.log($(location.hash));
	var target = $(location.hash);
	console.log("target:"+target);
	var linkTarget = $(target).data("link-target");
	console.log("linkTarget:"+linkTarget)
	linkTarget = "."+linkTarget;
	var linkTargetTwo = linkTarget + " a.editor-thumb";
	$( linkTarget ).click();
	console.log("linkTargetTwo: ")+linkTargetTwo;
	$( linkTargetTwo ).click();


	$('#city-san-francisco').on('shown.bs.collapse', function() {
		scrollToElement('#san-francisco');
	});


});