
// scroll functions
let previousScroll = 0;
$(window).scroll(function (e) {
    let currentScroll = $(window).scrollTop();
    if (currentScroll < 90) {
        $('.navbar').removeClass("menu-hide");
    } else {
        if (currentScroll > 0 && currentScroll < $(document).height() - $(window).height()) {
            if (currentScroll > previousScroll) {
                $('.navbar').addClass("menu-hide");
            } else {
                $('.navbar').removeClass("menu-hide");
            }
            previousScroll = currentScroll;
        }
    }
});