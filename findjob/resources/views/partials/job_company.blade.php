<div class="card-body">
    @forelse ($company->works as $item)
    <div class="mt-5 mb-5 shadow-sm bg-white cursor">
        <a href="{{ route('jobs.show',['job'=> $item]) }}">
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
                                        <i class="fas fa-map-marker-alt"></i> {{$item->address}}
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
                                    <div class="col-md-12 mb-2">
                                        <button class="btn btn-success btn-sm">Apply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @empty

    @endforelse
</div>
@auth
@if(Auth::user()->id == $company->user_id)
<div class="card-footer">
    <div class="row justify-content-end">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#updateModal2">
            Đăng Tuyển Dụng
        </button>
    </div>
    <!-- Modal -->
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
                    onsubmit="event.preventDefault();company.update(this)" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-md-4">
                                <h5>Logo</h5>
                                <label for="logo" style="cursor: pointer"><img src="{{$company->logo}}" alt=""
                                        id="imgLogo" style="width:150px;height=150px"></label>
                                <input type="file" name="logo" id="logo" onchange="company.uploadLogo(this)" hidden>
                                <span class="text-danger" role="alert">
                                    <strong id="err-logo"></strong>
                                </span>
                            </div>
                            <div class="col-md-8">
                                <h5>Cover Photo</h5>
                                <label for="cover_photo" class="labelCover"><img src="{{$company->cover_photo}}" alt=""
                                        id="imgCover"></label>
                                <input type="file" name="cover_photo" id="cover_photo"
                                    onchange="company.uploadCover(this)" hidden>
                                <span class="text-danger" role="alert">
                                    <strong id="err-photo"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="c_name">Tên Công Ty</label>
                            <input type="text" class="form-control" value="{{$company->c_name}}" name="c_name"
                                id="c_name" placeholder="Tên Công Ty...">
                            <span class="text-danger" role="alert">
                                <strong id="err-name"></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="address">Địa Chỉ</label>
                            <input type="text" class="form-control" value="{{$company->address}}" name="address"
                                id="address" placeholder="địa chỉ...">
                            <span class="text-danger" role="alert">
                                <strong id="err-address"></strong>
                            </span>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="phone">Điện Thoại</label>
                                <input type="tel" class="form-control" value="{{$company->phone}}" name="phone"
                                    id="phone" placeholder="số điện thoại ...">
                                <span class='text-danger' role="alert">
                                    <strong id="err-phone"></strong>
                                </span>
                            </div>
                            <div class="col-md-6">
                                <label for="website">Website</label>
                                <input type="text" class="form-control" value="{{$company->website}}" name="website"
                                    id="website" placeholder="website...">
                                <span class="text-danger" role="alert">
                                    <strong id="err-website"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="slogan">Slogan</label>
                            <input type="text" class="form-control" value="{{$company->slogan}}" name="slogan"
                                id="slogan" placeholder="slogan...">
                            <span class="text-danger" role="alert">
                                <strong id="slogan"></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description"
                                placeholder="giới thiệu công ty...">{{$company->description}}</textarea>
                            <span class="text-danger" role="alert">
                                <strong id="err-desc"></strong>
                            </span>
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
@endif
@endauth