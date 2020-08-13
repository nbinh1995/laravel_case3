function checkStatus() {
    if ($('#status').is(":checked")) {
        $('#salary_min').prop("disabled", true);
        $('#salary_max').prop("disabled", true);
    } else {
        $('#salary_min').prop("disabled", false);
        $('#salary_max').prop("disabled", false);
    }
}

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
