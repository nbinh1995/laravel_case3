@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="tile_count col-md-12 col-sm-12">
        <div class="col-md-3 col-sm-6  tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Tổng Số Tài Khoản</span>
            <div class="count">2500</div>
            <span class="count_bottom"><i class="green">4% </i> From last Week</span>
        </div>
        <div class="col-md-3 col-sm-6  tile_stats_count">
            <span class="count_top"><i class="fa fa-folder-open"></i> Tổng Số Công Việc</span>
            <div class="count green">2,500</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
        </div>
        <div class="col-md-3 col-sm-6  tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Tổng Số Tài Khoản Công Ty</span>
            <div class="count">123.50</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
        </div>
        <div class="col-md-3 col-sm-6  tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Tổng Số Tài Khoản Ứng Viên</span>
            <div class="count">4,567</div>
            <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
        </div>
    </div>
</div>
@endsection