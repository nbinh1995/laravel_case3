<div class="card-body">
    @forelse ($company->works as $item)
    <div class="container">
        <div class="row mb-3 shadow-sm bg-white">
            <div class="col-md-12 cursor">
                <a href="{{ route('jobs.show',['work'=> $item]) }}">
                    <div class="media">
                        <div class="box-company">
                            <img src="{{$company->logo}}" class="align-self-start mr-3" style="width:100px">
                        </div>
                        <div class="media-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5 class="text-uppercase">{{$item->position}}</h5>
                                            </div>
                                            <div class="col-md-12">
                                                <i class="far fa-building"></i> {{$company->c_name}}
                                            </div>
                                            <div class="col-md-12">
                                                <i class="fas fa-map-marker-alt"></i> {{$company->address}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row justify-content-end align-items-center">
                                            <div class="col-md-12 mb-2">
                                                <span
                                                    class='create-box'>{{$item->created_at->locale('vi')->diffForHumans()}}</span>
                                            </div>
                                            <div class="col-md-12">
                                                <i class="far fa-calendar-alt"></i>
                                                {{date('d/m/Y', strtotime($item->last_date))}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @auth
            @if (Auth::user()->id == $company->user_id)
            <div class="col-md-12">
                <hr>
                <div class="row justify-content-end mb-3 mr-1">
                    <button onclick="work.edit()" data-url="{{route('jobs.edit',['work'=>$item])}}"
                        data-id="{{$item->id}}" class="btn btn-outline-primary"><i class="far fa-edit"></i>
                        Sửa</button>
                    <button onclick="work.destroy()" data-url="{{route('jobs.destroy',['work'=>$item])}}"
                        data-id="{{$item->id}}" class="btn btn-outline-danger ml-1"><i class="far fa-trash-alt"></i>
                        Xóa</button>
                </div>
            </div>
            @endif
            @endauth
        </div>
    </div>
    @empty

    @endforelse
</div>
@auth
@if(Auth::user()->id == $company->user_id)
<div class="card-footer">
    <div class="row justify-content-end">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModal2">
            <i class="fas fa-cloud-upload-alt"></i> Đăng Tuyển Dụng
        </button>
    </div>
    <!-- Modal add -->
    <div class="modal fade" id="addModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Đăng Tuyển Dụng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('jobs.store')}}" onsubmit="event.preventDefault();work.create(this)"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="company_id" value="{{$company->id}}">
                        <div class="form-group">
                            <select class="custom-select">
                                <option selected disabled value="">Loại việc làm...</option>
                                @foreach ($category as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Tiêu đề</label>
                            <input type="text" class="form-control" name="title" id="title"
                                placeholder="Tiêu đề công việc...">
                            <span class="text-danger" role="alert">
                                <strong id="err-title"></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="position">Vị trí tuyển dụng</label>
                            <input type="text" class="form-control" name="position" id="position"
                                placeholder="Vị trí tuyển dụng...">
                            <span class="text-danger" role="alert">
                                <strong id="err-position"></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="description-job">Mô tả công việc</label>
                            <textarea class="form-control" name="description" id="description-job"
                                placeholder="Mô tả công việc..."></textarea>
                            <span class="text-danger" role="alert">
                                <strong id="err-desc-job"></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="benefit">Quyền Lợi Được Hưởng</label>
                            <textarea class="form-control" name="benefit" id="benefit"
                                placeholder="Quyền lợi công việc..."></textarea>
                            <span class="text-danger" role="alert">
                                <strong id="err-benefit"></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="require">Yêu Cầu Công Việc</label>
                            <textarea class="form-control" name="require" id="require"
                                placeholder="Yêu cầu công việc..."></textarea>
                            <span class="text-danger" role="alert">
                                <strong id="err-require"></strong>
                            </span>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="contact_name">Tên Người Liên Hệ</label>
                                <input type="text" class="form-control" name="contact_name" id="contact_name">
                                <span class="text-danger" role="alert">
                                    <strong id="err-contact-name"></strong>
                                </span>
                            </div>
                            <div class="col-md-6">
                                <label for="contact_phone">Điện Thoại</label>
                                <input type="tel" class="form-control" name="contact_phone" id="contact_phone"
                                    placeholder="số điện thoại ...">
                                <span class='text-danger' role="alert">
                                    <strong id="err-contact-phone"></strong>
                                </span>
                            </div>
                            <div class="col-md-6">
                                <label for="contact_email">Email</label>
                                <input type="text" class="form-control" name="contact_email" id="contact_email"
                                    placeholder="Email...">
                                <span class="text-danger" role="alert">
                                    <strong id="err-contact-email"></strong>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit -->
<div class="modal fade" id="updateModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Đăng Tuyển Dụng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('companies.update',['company'=> $company])}}"
                onsubmit="event.preventDefault();work.update(this)" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="company_id" value="{{$company->id}}">
                    <div class="form-group">
                        <select class="custom-select">
                            <option selected disabled value="">Loại việc làm...</option>
                            @foreach ($category as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Tiêu đề</label>
                        <input type="text" class="form-control" name="title" id="title"
                            placeholder="Tiêu đề công việc...">
                        <span class="text-danger" role="alert">
                            <strong id="err-title"></strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="position">Vị trí tuyển dụng</label>
                        <input type="text" class="form-control" name="position" id="position"
                            placeholder="Vị trí tuyển dụng...">
                        <span class="text-danger" role="alert">
                            <strong id="err-position"></strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="description-job">Mô tả công việc</label>
                        <textarea class="form-control" name="description" id="description-job"
                            placeholder="Mô tả công việc..."></textarea>
                        <span class="text-danger" role="alert">
                            <strong id="err-desc-job"></strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="benefit">Quyền Lợi Được Hưởng</label>
                        <textarea class="form-control" name="benefit" id="benefit"
                            placeholder="Quyền lợi công việc..."></textarea>
                        <span class="text-danger" role="alert">
                            <strong id="err-benefit"></strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="require">Yêu Cầu Công Việc</label>
                        <textarea class="form-control" name="require" id="require"
                            placeholder="Yêu cầu công việc..."></textarea>
                        <span class="text-danger" role="alert">
                            <strong id="err-require"></strong>
                        </span>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="contact_name">Tên Người Liên Hệ</label>
                            <input type="text" class="form-control" name="contact_name" id="contact_name">
                            <span class="text-danger" role="alert">
                                <strong id="err-contact-name"></strong>
                            </span>
                        </div>
                        <div class="col-md-6">
                            <label for="contact_phone">Điện Thoại</label>
                            <input type="tel" class="form-control" name="contact_phone" id="contact_phone"
                                placeholder="số điện thoại ...">
                            <span class='text-danger' role="alert">
                                <strong id="err-contact-phone"></strong>
                            </span>
                        </div>
                        <div class="col-md-6">
                            <label for="contact_email">Email</label>
                            <input type="text" class="form-control" name="contact_email" id="contact_email"
                                placeholder="Email...">
                            <span class="text-danger" role="alert">
                                <strong id="err-contact-email"></strong>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endauth