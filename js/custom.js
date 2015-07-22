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


    $(function() {
        $("img.lazy").lazyload({
            threshold : 400
        });
    });


    $("#main").fitVids();

    var currentItem = "";

    $(".editor-thumb").click(function(event){
       event.preventDefault();
       var base = $(this).data('base');
       currentItem = base;

       console.log("Base: "+base);
       var player = $(base+' iframe')[0];
       console.log("CLICK editor-thumb:")
       console.log("CLICK player:"+player);
       console.log("CLICK Base: "+base);
       console.log("CLICK currentItem: "+currentItem);

       $(base+' .content-area-wrap').removeClass('vid-down');
       $(base+' .content-area-wrap').addClass('vid-up');

       Froogaloop(player).api('play');

   });





    $("article.portfolio-item").each(function() { 

        var base = $(this).attr('id');
        console.log("Base: ");
        console.log(base);
        var player = $("#"+base+" .content-area-wrap iframe");
        var playerOrigin = '*';
        var status = $('#'+base+' .status');

    // Listen for messages from the player
    if (window.addEventListener) {
        window.addEventListener('message', onMessageReceived, false);
    }
    else {
        window.attachEvent('onmessage', onMessageReceived, false);
    }

    // Handle messages received from the player
    function onMessageReceived(event) {
        // Handle messages from the vimeo player only
        if (!(/^https?:\/\/player.vimeo.com/).test(event.origin)) {
            return false;
        }
        //console.log("playerOrigin: ");
        //console.log(playerOrigin);
        //console.log("event: ");
        //console.log(event);     
        //console.log("event.data: ");
        //console.log(event.data);     

        if (playerOrigin === '*') {
            playerOrigin = event.origin;
        }
        
        var data = JSON.parse(event.data);
        
        switch (data.event) {
            case 'ready':
            onReady();
            break;
            
            case 'playProgress':
            onPlayProgress(data.data);
            break;
            
            case 'pause':
            onPause();
            break;
            
            case 'finish':
            onFinish();
            break;
        }
    }


    // Helper function for sending a message to the player
    function post(action, value) {
        var data = {
          method: action
      };
      
      if (value) {
        data.value = value;
    }
    
    var message = JSON.stringify(data);
    player[0].contentWindow.postMessage(data, playerOrigin);
}

function onReady() {
    status.text('ready');
    
    post('addEventListener', 'pause');
    post('addEventListener', 'finish');
    post('addEventListener', 'playProgress');
}

function onPause() {
    status.text('paused');
    console.log("$f currentItem: "+currentItem);
    $(currentItem+' .content-area-wrap').removeClass('vid-up').addClass('vid-pause');

}

function onFinish() {
    status.text('finished');

    $(currentItem+' .content-area-wrap').removeClass('vid-up vid-pause').addClass('vid-down');

}

function onPlayProgress(data) {
    status.text(data.seconds + 's played');
    $(currentItem+' .content-area-wrap').addClass('vid-up');

}

});














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
	console.log("linkTargetTwo: "+linkTargetTwo);
	$( linkTargetTwo ).click();


	$('#city-san-francisco').on('shown.bs.collapse', function() {
		scrollToElement('#san-francisco');
	});


});