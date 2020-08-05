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
                @for ($i = 0; $i < 5; $i++) 
                    <div class="col-md-2">
                        <div class="card">
                            <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <h3>Việc Làm Nổi Bật Nổi Bật</h3>
            <hr>
            <div class="row justify-content-center">
                @for ($i = 0; $i < 4; $i++)
                <div class="col-md-3"> 
                    <div class="card">
                        <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional
                                content.
                                This card has even longer content than the first to show that equal height action.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>
</div>
@endsection