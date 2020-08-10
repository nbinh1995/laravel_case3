var company = company || {};

company.showCompanies = function () {

};

company.update = function () {

}

company.uploadLogo = function (element) {
    var img = element.files[0];
    var reader = new FileReader();
    reader.onloadend = function () {
        $("#imgLogo").attr("src", reader.result);
    }
    reader.readAsDataURL(img);
}

company.uploadCover = function (element) {
    var img = element.files[0];
    var reader = new FileReader();
    reader.onloadend = function () {
        $("#imgCover").attr("src", reader.result);
    }
    reader.readAsDataURL(img);
}

$.ajax({
    data: someData,
    dataType: 'json',
    url: '/path/to/script'
}).done(function (data) {
    console.log(data);
});