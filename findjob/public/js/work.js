var work = work || {};

work.showErrors = function (errors) {
    if (errors['logo'] != null) {
        $('#err-logo').text(errors['logo'][0]);
    }
    if (errors['cover_photo'] != null) {
        $('#err-photo').text(errors['cover_photo'][0]);
    }
    if (errors['c_name'] != null) {
        $('#err-name').text(errors['c_name'][0]);
    }
    if (errors['address'] != null) {
        $('#err-address').text(errors['address'][0]);
    }
    if (errors['phone'] != null) {
        $('#err-phone').text(errors['phone'][0]);
    }
    if (errors['website'] != null) {
        $('#err-website').text(errors['website'][0]);
    }
    if (errors['description'] != null) {
        $('#err-desc').text(errors['description'][0]);
    }
}

work.create = function (ele) {
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
            console.log(data['job_company']);
            $('#addModal2').modal('hide');
            $('#count_work').text(data['count']);
            $('#job_company').html(data['job_company']);
            toastr.options = { "positionClass": "toast-bottom-right" };
            toastr["success"]("Thêm Việc Làm Thành Công!");
        }
    });
}

work.edit = function (ele) {
    let url = $(ele).data('url');
    $.ajax({
        type: 'GET',
        url: url,
        success: function (data) {
            
        }
    });
}

work.update = function (ele) {
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
            if (data['code'] == 200) {
                $('#updateModal').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
                $('#image-work').html(data['image_work']);
                $('#menu1').html(data['info_work']);
                toastr.options = { "positionClass": "toast-bottom-right" };
                toastr["success"]("Cập Nhật Thông Tin Thành Công!");
            }
            if (data['code'] == 422) {
                console.log(data['errors']['website']);
                work.showErrors(data['errors'])
            }
        }
    });
}

work.destroy = function (ele) {

}

