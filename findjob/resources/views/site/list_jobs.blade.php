@extends('layouts.app')
@php
dump($jobs);
@endphp
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
    <div class="row">
        <div class="col-md-12">
            <h3>{{$jobs->total()}} Việc Làm Cho Bạn</h3>
        </div>
        <div class="col-md-8 mt-3">
            @forelse ($jobs as $item)
            @php
            dd($item);
            @endphp
            <div class="media mb-5 shadow-sm bg-white">
                <img src="https://via.placeholder.com/300" class="align-self-start mr-3" style="width:100px">
                <div class="media-body">
                    <h4>Media Top</h4>
                    <p>Lorem ipsum...</p>
                </div>
            </div>
            @empty

            @endforelse
            {{ $jobs->appends(request()->query()) }}
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Header</div>
                <div class="card-body">Content</div>
                <div class="card-footer">Footer</div>
            </div>
        </div>
    </div>
</div>

@endsection