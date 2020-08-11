<div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <h1 class='text-uppercase text-primary'>{{__($company->c_name) ?? 'Tên công ty'}}
            </h1>
            <h3 class="text-monospace text-danger text-capitalize">
                {{$company->slogan ?? 'Slogan'}}
            </h3>
            <div class='text-muted'><i class="fas fa-map-marker-alt"></i>
                {{__("Địa chỉ: ".$company->address)}}
            </div>
            <div class='text-muted'><i class="fas fa-phone"></i>
                {{__("Điện thoại: ".$company->phone)}}
            </div>
            <div class='text-muted'><i class="fab fa-chrome"></i>
                {{__("Website: ".$company->website)}}
            </div>
        </div>
        <div class="col-md-12">
            <hr>
            <h4>GIỚI THIỆU CÔNG TY</h4>
            <hr>
        </div>
        <div class="col-md-12">
            <p>{{$company->description}}</p>
        </div>
    </div>
</div>
@auth
@if(Auth::user()->id == $company->user_id)
<div class="card-footer">
    <div class="row justify-content-end">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#updateModal">
            <i class="fas fa-info-circle"></i> Cập Nhật Thông Tin
        </button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Cập Nhật Thông Tin</h5>
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
                            <label for="description">Giới Thiệu Công Ty</label>
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