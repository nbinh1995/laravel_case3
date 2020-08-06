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
<div class="container">
    <div class="row justify-content-center">
        @forelse ($companies as $item)
        <div class="col-md-3 mb-5">
            <div class="card company-card">
                <div class="box-company">
                    <img src="{{$item->cover_photo}}" class="card-img-top" alt="...">
                    <div class="logo-company shadow-sm bg-white">
                        <img src="{{$item->logo}}" alt="" style="width:60px">
                    </div>
                </div>
                <div class="card-body body-company">
                    <h5 class="card-title text-center">{{$item->c_name}}</h5>
                    <p class="font-italic"><i class="fas fa-map-marker-alt"></i> {{$item->address}}</p>
                    <p class="card-text line-clamp">{{$item->description}}</p>
                </div>
                <div class="card-footer text-center">
                    <small class="text-primary">{{$item->jobs->count()}} việc làm đang tuyển</small>
                </div>
            </div>
        </div>
        @empty

        @endforelse
        {{ $companies->appends(request()->query()) }}
    </div>
</div>
@endsection