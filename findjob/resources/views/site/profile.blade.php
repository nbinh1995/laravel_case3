@extends('layouts.app')

@section('title','Profile Page')

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
    integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
    crossorigin="anonymous" />
@endpush

@section('search')

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title mb-4">
                        <div class="d-flex justify-content-start">
                            <div class="image-container">
                                <img src="{{$profile->avatar ?? 'http://placehold.it/150x150'}}" id="imgProfile"
                                    style="width: 150px; height: 150px" class="img-thumbnail" />
                            </div>
                            <div class="ml-3">
                                <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold">
                                    {{$profile->name ?? '...Chưa Cập Nhật...'}}</h2>
                                <h6 class="d-block"><i class="fas fa-venus-mars"></i><span class="text-muted">
                                        {{$profile->gender ?? '...Chưa Cập Nhật...'}}</span>
                                </h6>
                                <h6 class="d-block"><i class="fas fa-birthday-cake"><span class="text-muted">
                                            {{$profile->birth ?? '...Chưa Cập Nhật...'}}</span></i>
                                </h6>
                                <h6 class="d-block"><i class="fas fa-map-marked-alt"></i>
                                    <span class="text-muted"> {{$profile->address ?? '...Chưa Cập Nhật...'}}</span>
                                </h6>
                            </div>
                            <div class="ml-auto">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#profileModal">
                                    Cập Nhật Thông Tin
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo"
                                        role="tab" aria-controls="basicInfo" aria-selected="true">Thông Tin Hồ Sơ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="connectedServices-tab" data-toggle="tab"
                                        href="#connectedServices" role="tab" aria-controls="connectedServices"
                                        aria-selected="false">Công Việc Đã Ứng Tuyển</a>
                                </li>
                            </ul>
                            <div class="tab-content ml-1" id="myTabContent">
                                <div class="tab-pane fade show active" id="basicInfo" role="tabpanel"
                                    aria-labelledby="basicInfo-tab">
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Giới thiệu bản thân</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            {{$profile->bio ?? '...Chưa Cập Nhật...'}}
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Kinh Nghiệm</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            {{$profile->exp ?? '...Chưa Cập Nhật...'}}
                                        </div>
                                    </div>
                                    <hr />


                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Hồ sơ đính kèm</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            {{$profile->resume ?? '...Chưa Cập Nhập...'}}
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Thư xin việc</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            {{$profile->cover_letter ?? '...Chưa Cập Nhập...'}}
                                        </div>
                                    </div>
                                    <hr />
                                </div>
                                <div class="tab-pane fade" id="connectedServices" role="tabpanel"
                                    aria-labelledby="ConnectedServices-tab">
                                    Facebook, Google, Twitter Account that are connected to this account
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Thông Tin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" onsubmit="event.preventDefault();profile.update(this)"
                enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group row align-items-end">
                        <div class="col-md-3">
                            <h5>Avatar</h5>
                            <div class="image-container" style="width: 150px; height:150px">
                                <img src="{{$profile->avatar ?? 'http://placehold.it/150x150'}}" alt="" id="imgLogo"
                                    class="img img-thumbnail">
                                <div class="middle">
                                    <label for="avatar" style="cursor: pointer"><span class="btn btn-secondary"><i
                                                class="fas fa-camera"></i></span></label>
                                    <input type="file" name="avatar" id="avatar" onchange="profile.uploadAvatar(this)"
                                        hidden>
                                </div>
                            </div>
                            <span class="text-danger" role="alert">
                                <strong id="err-avatar"></strong>
                            </span>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group row mb-1 align-items-center">
                                <h6 class="col-md-3">Họ và Tên: </h6>
                                <input type="text" class="form-control col-md-8" value="{{$profile->name ?? ''}}"
                                    name="name" id="full_name" placeholder="Họ và tên...">
                                <span class="text-danger" role="alert">
                                    <strong id="err-full-name"></strong>
                                </span>
                            </div>
                            <div class="form-group align-bottom mb-1">
                                <span class=" font-weight-bold pr-3 mr-5">Giới Tính: </span>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="1">
                                    <label class="form-check-label" for="inlineRadio1">Nam</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="femail" value="2">
                                    <label class="form-check-label" for="inlineRadio2">Nữ</label>
                                </div>
                                <span class="text-danger" role="alert">
                                    <strong id="err-gender"></strong>
                                </span>
                            </div>
                            <div class="form-group row align-items-center mb-1">
                                <label for="birth" class="col-md-3 font-weight-bold">Ngày Sinh: </label>
                                <input type="date" class="form-control col-md-8" name="birth" id="birth">
                                <span class="text-danger" role="alert">
                                    <strong id="err-birth"></strong>
                                </span>
                            </div>
                            <div class="form-group row align-items-center mb-1">
                                <label for="address" class="col-md-3 font-weight-bold">Địa Chỉ</label>
                                <input type="text" class="form-control col-md-8" value="" name="address" id="address"
                                    placeholder="địa chỉ...">
                                <span class="text-danger" role="alert">
                                    <strong id="err-address"></strong>
                                </span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="bio">Giới thiệu bản thân</label>
                        <textarea class="form-control" name="bio" id="bio"
                            placeholder="Giới thiệu bản thân..."></textarea>
                        <span class="text-danger" role="alert">
                            <strong id="err-bio"></strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="exp">Kinh nghiệm</label>
                        <textarea class="form-control" name="exp" id="exp"
                            placeholder="Kinh nghiệm bản thân..."></textarea>
                        <span class="text-danger" role="alert">
                            <strong id="err-exp"></strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="resume">Hồ sơ đính kèm</label>
                        <input type="file" name="resume" class="form-control" id="resume">
                        <span class="text-danger" role="alert">
                            <strong id="err-resume"></strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="cover_letter">Thư xin việc</label>
                        <input type="file" name="cover_letter" class="form-control" id="cover_letter">
                        <span class="text-danger" role="alert">
                            <strong id="err-cover-letter"></strong>
                        </span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"
    integrity="sha512-8vfyGnaOX2EeMypNMptU+MwwK206Jk1I/tMQV4NkhOz+W8glENoMhGyU6n/6VgQUhQcJH8NqQgHhMtZjJJBv3A=="
    crossorigin="anonymous"></script>
@endpush