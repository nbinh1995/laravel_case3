var company = company || {};

company.showImage = function (image) {

};

company.showJob = function (job) {

}

company.showCompany = function (info) { }
company.update = function (ele) {
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    //         '_method': 'PUT'
    //     }
    // });

    let data = new FormData(ele);
    let url = $(ele).attr('action');
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {

        }
    });
}

company.uploadLogo = function (element) {
    let img = element.files[0];
    let reader = new FileReader();
    reader.onloadend = function () {
        $("#imgLogo").attr("src", reader.result);
    }
    reader.readAsDataURL(img);
}

company.uploadCover = function (element) {
    let img = element.files[0];
    let reader = new FileReader();
    reader.onloadend = function () {
        $("#imgCover").attr("src", reader.result);
    }
    reader.readAsDataURL(img);
}

