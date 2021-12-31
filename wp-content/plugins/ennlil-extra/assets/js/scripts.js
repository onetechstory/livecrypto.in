(function($) {
    "use strict";



    var EnnlilWidgetsScripts = function( $scope, $ ) {

        initFlickity();
        setTimeout(() => {
            $('#flickity-thumbs').flickity('reloadCells');
        }, 500);


        function initFlickity() {

            // 1st carousel, main
            $('#flickity-hero').flickity({
              cellAlign: 'left',
              contain: true,
              pageDots: false,
              prevNextButtons: false,
              draggable: false
            });

            // 2nd carousel, navigation
            $('#flickity-thumbs').flickity({
                cellAlign: 'left',
                asNavFor: '#flickity-hero',
                imagesLoaded: true,
                contain: true,
                pageDots: false,
                prevNextButtons: false,
            });

            // Posts carousel
            $('.carousel-posts').flickity({
                cellAlign: 'left',
                pageDots: false,
                imagesLoaded: true,
                wrapAround: true,
            });
        }


    }

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/global', EnnlilWidgetsScripts);
    });

})(jQuery);