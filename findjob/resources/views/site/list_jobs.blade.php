@extends('layouts.app')

@section('search')
<div class="container pt-5">
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
    <div class="row">
        <div class="col-md-12">
            <h3>{{$works->total()}} Việc Làm Cho Bạn</h3>
            <hr>
        </div>
        <div class="col-md-8 mt-3">
            @forelse ($works as $item)
            <div class="mb-5 shadow-sm bg-white cursor">
                <a href="{{ route('jobs.show',['job'=> $item]) }}">
                    <div class="media">
                        <div class="box-company">
                            <img src="{{$item->company->logo}}" class="align-self-start mr-3" style="width:100px">
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
                                                <i class="far fa-building"></i> {{$item->company->c_name}}
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
        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header"><i class="fas fa-search"></i> Tìm Kiếm Nâng Cao</div>
                <div class="card-body">Content</div>
                <div class="card-footer"><button class="btn btn-primary w-100">Tìm Kiếm</button></div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row justify-content-center">
                {{ $works->appends(request()->query()) }}
            </div>
        </div>
    </div>
</div>

@endsection