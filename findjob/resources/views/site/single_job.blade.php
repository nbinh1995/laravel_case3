@extends('layouts.app')

@section('search')
<div class="container">
    <div class="row justify-content-center">
        <div class="media col-md-10">
            <img src="{{$work->company->logo}}" class="align-self-center mr-3" alt="..."
                style="width:150px; height:150px">
            <div class="media-body row">
                <div class="col-md-9">
                    <h4 class="mt-0">{{$work->title}}</h4>
                    <h5 class="mt-0"><i class="far fa-building"></i> <span
                            class="text-primary">{{$work->company->c_name}}</span></h5>
                    <div class="mt-0"><i class="fas fa-map-marker-alt"></i> {{$work->company->address}}</div>
                </div>
                <div class="row col-md-3 align-items-end">
                    @if ($work->status == 0)
                    <div><i class="fas fa-dollar-sign"></i> {{$work->salary_number($work->salary_min)}} -
                        {{$work->salary_number($work->salary_max)}}
                    </div>
                    @else
                    <div><i class="fas fa-dollar-sign"></i>
                        {{__('Thương Lượng')}}
                    </div>
                    @endif
                    <div><i class="far fa-calendar-alt"></i>
                        {{date('d/m/Y', strtotime($work->last_date))}}</div>
                    <div><button type="button" class="btn btn-warning">Ứng Tuyển Ngay</button></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')

@endsection