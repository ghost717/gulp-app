jQuery.noConflict();
(function( $ ) {
  $(function() {

    $(window).load(function() {
        resizeGallery();

        $('.jwba_gallery p').owlCarousel({
            loop:true,
        //    center: true,
        //    autoHeight: true,
        //    margin: 20,
            margin: 1000,
            autoWidth:true,
            nav: true,
            lazyLoad : true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1200:{
                    items:3
                }
            }
        });


        /*
        $('.jwba_gallery').on("click",".owl-controls", function(){
            var list = $('.jwba_gallery .owl-item.active');
            //console.log(list[1]);
            
            $(list[1]).css('visibility', 'hidden');
            $(list[0]).css('visibility', 'visible');
            //$('.jwba_gallery .owl-item.active:eq(1)').css('visibility', 'hidden');
        });
*/
    });

    

});

function resizeGallery(){

    var boxWidth = $('.jwba_gallery').width();
    var boxHeight = $('.jwba_gallery').height();

    var list = $('.jwba_gallery img');

    $(list).each(function( i, el ) {

        //console.log($(this).width());
        //console.log($(this).height());
    //    $(this).width();
    });
}

})(jQuery);