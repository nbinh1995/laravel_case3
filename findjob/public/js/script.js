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

$(document).ready(function () {
    $imgSrc = $('#imgProfile').attr('src');
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imgProfile').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#btnChangePicture').on('click', function () {
        // document.getElementById('profilePicture').click();
        if (!$('#btnChangePicture').hasClass('changing')) {
            $('#profilePicture').click();
        }
        else {
            // change
        }
    });
    $('#profilePicture').on('change', function () {
        readURL(this);
        $('#btnChangePicture').addClass('changing');
        $('#btnChangePicture').attr('value', 'Confirm');
        $('#btnDiscard').removeClass('d-none');
        // $('#imgProfile').attr('src', '');
    });
    $('#btnDiscard').on('click', function () {
        // if ($('#btnDiscard').hasClass('d-none')) {
        $('#btnChangePicture').removeClass('changing');
        $('#btnChangePicture').attr('value', 'Change');
        $('#btnDiscard').addClass('d-none');
        $('#imgProfile').attr('src', $imgSrc);
        $('#profilePicture').val('');
        // }
    });
});