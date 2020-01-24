jQuery(document).ready(function ($) {
 
  $('.single_add_to_cart_button').each(function() {
    $(this).removeClass('disabled');

  
  });
  
  $('.summary.entry-summary').addClass('center');
  
  
  $(window).on('resize load', function () {
    var $el = $('.center');
    $el.each(function () {
        $(this).css('position', 'fixed').css({
            
        top: ($(window).height() - $el.height()) / 2
        });
    });
});
   $(window).on('resize load', function () {
    var $el = $('.left-product');
    $el.each(function () {
        $(this).css('position', 'fixed').css({
            
        top: ($(window).height() - $el.height()) / 2
        });
    });
});
  
  
  
  
  
  
$( "#tab-pwb_tab-content" ).clone().appendTo( ".brand-description-product" );



$(".tax-pwb-brand").addClass("hero");


$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 30) {
        $(".brand-description-product").addClass("hide");
      
    } else {
        $(".brand-description-product").removeClass("hide");
        
    }
});
  
  
  
  
  
  
  
  
  
 $.fn.cycle = function(timeout){
    var $all_elem = $(this)
    var $time = ($all_elem.length)*300;
    show_cycle_elem = function(index){
        if(index == $all_elem.length) return; 
      
        $all_elem.hide().eq(index).show();
        setTimeout(function(){show_cycle_elem(++index)}, timeout);
        
    }
    show_cycle_elem(0);
     var explode = function(){
      $all_elem.show();
      
    };
    setTimeout(explode, $time);
}

$(".product-images img").cycle(300);
  
   
  
  
//  (function () {
//
//
//    $('.product-images img').hide().first().show();
//    setInterval(function () {
//        $('.product-images img').hide().next().fadeIn().end().appendTo(".product-images");
//    }, 300);
//
//})();
  
  

  
 
  













 (function() {
    // Creates a new canvas element and appends it as a child
    // to the parent element, and returns the reference to
    // the newly created canvas element


    function createCanvas(parent, width, height) {
        var canvas = {};
        canvas.node = document.createElement('canvas');
        canvas.context = canvas.node.getContext('2d');
        canvas.node.width = width || 100;
        canvas.node.height = height || 100;
        parent.appendChild(canvas.node);
        return canvas;
    }

    function init(container, width, height, fillColor) {
        var canvas = createCanvas(container, width, height);
        var ctx = canvas.context;
        // define a custom fillCircle method
        ctx.fillCircle = function(x, y, radius, fillColor) {
            this.fillStyle = fillColor;
            this.beginPath();
            this.moveTo(x, y);
            this.arc(x, y, radius, 0, Math.PI * 2, false);
            this.fill();
        };
        ctx.clearTo = function(fillColor) {
            ctx.fillStyle = fillColor;
            ctx.fillRect(0, 0, width, height);
        };
        ctx.clearTo(fillColor || "transparent");

        // bind mouse events
        canvas.node.onmousemove = function(e) {
            if (!canvas.isDrawing) {
               return;
            }
            var x = e.pageX - this.offsetLeft ;
            var y = e.pageY - this.offsetTop ;
            var radius = 10; // or whatever
            var fillColor = '#00FF0C';
            ctx.fillCircle(x, y, radius, fillColor);
        };
        canvas.node.onmousedown = function(e) {
            canvas.isDrawing = true;
        };
        canvas.node.onmouseup = function(e) {
            canvas.isDrawing = false;
        };
    }

    var container = document.getElementById('canvas');
    init(container, $(window).width(), $(document).height(), 'transparent');

})();
  
  
  
  
  
  

  $(window).scroll(function () {
    var top =  $(".to-top");
        if ( $('body').height() <= (    $(window).height() + $(window).scrollTop() + 0 )) {
  top.animate({"margin-left": "0px"},1500);
        } else {
            top.animate({"margin-left": "-100%"},1500);
        }
    });

    $(".to-top").on('click', function () {
        $("html, body").animate({scrollTop: 0}, 400);
    });

  
  
  
  });
  