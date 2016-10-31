    var counter = 1;
    var int = setInterval(function () {
        $("#slider").attr("class", "class" + counter);
        if (counter === 3) {
            counter = 1; // If counter = 3, set it back to 1 for next loop
        }
        else {
            counter++; // Else, add 1 to the counter
        }
    }, 5000);

    $(function () {
        $(".show-menu").click(function () {
            $(".all-left .drop-nav").toggle("fade");
        });
        $("*").addClass('animated');
        
             $(".no-select form select option:selected").hide(100);

        
    });

    /** Important to make the animation work **/
    wow = new WOW({
        animateClass: 'animated'
        , offset: 100
        , mobile: false
    });
    wow.init();

/**
    <script src="js/swiper.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            pagination: '.swiper-pagination'
            , paginationClickable: true
            , nextButton: '.swiper-button-next'
            , prevButton: '.swiper-button-prev'
            , speed: 2000
            , autoplay: 4000
            , loop: true
            , autoplayDisableOnInteraction: false
            , preventClicks: false
        });
    </script>
**/