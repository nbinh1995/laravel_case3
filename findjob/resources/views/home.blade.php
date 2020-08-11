@extends('layouts.app')

@section('search')
@include('partials.search')
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
                        <a href="{{route('companies.show',['company'=> $item])}}">
                            <div class="card box-company">
                                <img src="{{ $item->cover_photo }}" class="card-img-top" alt="...">
                                <div class="logo-company shadow-sm bg-white" style="left: 0;">
                                    <img src="{{$item->logo}}" alt="" style="width:60px">
                                </div>
                            </div>
                        </a>
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
                        <a href="{{ route('jobs.show',['work'=> $item]) }}">
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
                        </a>
                    </div>
                </div>
                @empty

                @endforelse



            </div>
        </div>
    </div>
</div>
@endsection