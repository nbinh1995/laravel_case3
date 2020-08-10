@section('search')
<div class="row pt-1s">
    <div class="col-md-12">
        <div class="card banner">
            <img src="{{$company->cover_photo}}" class="img-middle" alt="...">
        </div>
    </div>
    <div class="col-md-12 search-bot">
        <div class="box-logo">
            <div class="logo">
                <img src="{{$company->logo}}" alt="">
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs row">
                        <li class="nav-item col-md-6">
                            <a class="nav-link active" data-toggle="tab" href="#menu1">Thông Tin Công Ty</a>
                        </li>
                        <li class="nav-item col-md-6">
                            <a class="nav-link" data-toggle="tab" href="#menu2">Viêc Làm</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="menu1">
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
                        @isset($auth)
                        <div class="card-footer">
                            <div class="row justify-content-end">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-info" data-toggle="modal"
                                    data-target="#updateModal">
                                    Cập Nhật Thông Tin
                                </button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Thông Tin</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="" method="post">
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <h5>Logo</h5>
                                                        <label for="logo" style="cursor: pointer"><img
                                                                src="{{$company->logo}}" alt="" id="imgLogo"
                                                                style="width:150px;height=150px"></label>
                                                        <input type="file" name="logo" id="logo" hidden>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h5>Cover Photo</h5>
                                                        <label for="cover_photo" class="labelCover"><img
                                                                src="{{$company->cover_photo}}" alt=""
                                                                id="imgCover"></label>
                                                        <input type="file" name="cover_photo" id="cover_photo" hidden>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="c_name">Tên Công Ty</label>
                                                    <input type="text" class="form-control" value="{{$company->c_name}}"
                                                        name="c_name" id="c_name" placeholder="Tên Công Ty...">
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">Địa Chỉ</label>
                                                    <input type="text" class="form-control"
                                                        value="{{$company->address}}" name="address" id="address"
                                                        placeholder="địa chỉ...">
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <label for="phone">Điện Thoại</label>
                                                        <input type="tel" class="form-control"
                                                            value="{{$company->phone}}" name="phone" id="phone"
                                                            placeholder="số điện thoại ...">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="website">Website</label>
                                                        <input type="tel" class="form-control"
                                                            value="{{$company->website}}" name="website" id="website"
                                                            placeholder="website...">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="slogan">Slogan</label>
                                                    <input type="text" class="form-control" value="{{$company->slogan}}"
                                                        name="slogan" id="slogan" placeholder="slogan...">
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea class="form-control" name="description" id="description"
                                                        placeholder="giới thiệu công ty...">
                                                    {{$company->description}}
                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endisset
                    </div>
                    <div class="tab-pane fade" id="menu2">
                        <div class="card-body">

                        </div>
                        <div class="card-footer">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection