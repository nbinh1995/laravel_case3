@extends('layouts.app')

@section('search')
<div class="row pt-1s" id="image-company">
    @include('partials.image_company')
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
                        @include('partials.info_company')
                    </div>
                    <div class="tab-pane fade" id="menu2">
                        @include('partials.job_company')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/company.js')}}"></script>
@endsection