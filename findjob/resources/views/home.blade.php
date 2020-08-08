@extends('layouts.app')

@section('search')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="bg-title">Kết Nối Nguồn Nhân Lực</h2>
            <h6 class="sm-title">Tìm công việc IT bạn mong muốn</h6>
        </div>
        <div class="col-md-12">
            <form action="" method="get">
                <div class="form-row">
                    <div class="col-md-7 mb-3">
                        <input type="text" class="form-control" placeholder="Tìm kiếm việc làm,nhà tuyển dụng">
                        {{-- <div class="invalid-tooltip">
                            Please provide a valid city.
                        </div> --}}
                    </div>
                    <div class="col-md-3 mb-3">
                        <select class="custom-select">
                            <option selected disabled value="">Loại việc làm...</option>
                            <option value="1">Web Developer</option>
                            <option value="2">Mobile Developer</option>
                        </select>
                        {{-- <div class="invalid-tooltip">
                            Please select a valid state.
                        </div> --}}
                    </div>
                    <div class="col-md-2 mb-3">
                        <button class="btn btn-warning" type="submit">Tìm kiếm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container content">
    <div class="row mt-3">
        <div class="col-md-12">
            <h3>Nhà Tuyển Dụng Nổi Bật</h3>
            <hr>
            <div class="row justify-content-center">
                @forelse ($companies as $item)
                <div class="col-md-2">
                    <div class="cursor">
                        <div class="card box-company">
                            <img src="{{ $item->cover_photo }}" class="card-img-top" alt="...">
                            <div class="logo-company shadow-sm bg-white" style="left: 0;">
                                <img src="{{$item->logo}}" alt="" style="width:60px">
                            </div>
                        </div>
                    </div>
                </div>
                @empty

                @endforelse
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <h3>Việc Làm Nổi Bật Nổi Bật</h3>
            <hr>
            <div class="row justify-content-center">
                @forelse ($works as $item)
                <div class="col-md-3">
                    <div class="card cursor">
                        <div class="box-company">
                            <img src="{{$item->company->cover_photo}}" class="card-img-top" alt="...">
                            <div class="logo-company shadow-sm bg-white">
                                <img src="{{$item->company->logo}}" alt="" style="width:60px">
                            </div>
                        </div>
                        <div class="card-body body-company">
                            <h5 class="card-title text-uppercase text-center">{{$item->position}}</h5>
                            <div class="card-text"><i class="far fa-building"></i> {{$item->company->c_name}}</div>
                            <div class="card-text"><i class="fas fa-map-marker-alt"></i> {{$item->address}}</div>
                            <div><i class="far fa-calendar-alt"></i>
                                {{date('d/m/Y', strtotime($item->last_date))}}</div>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted font-italic">Ngày Đăng:
                                {{date('d/m/Y', strtotime($item->create_at))}}</small>
                        </div>
                    </div>
                </div>
                @empty

                @endforelse



            </div>
        </div>
    </div>
</div>
@endsection