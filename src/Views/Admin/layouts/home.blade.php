@extends('layouts.master')
@section('title')
    Trang quản trị
@endsection
@section('content')
<div class="page-wrapper">          
    <div class="container-fluid text-center ">
        <div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg col-xlg-3">
                <div class="card card-hover">
                    <div class="box bg-white text-center">                
                        <h6 class="text-black">CHÀO MỪNG ĐẾN VỚI HỆ THỐNG QUẢN TRỊ EZCODE </h6>                      
                    </div>                
                </div>
                <button class="btn  btn-info "><a style="color: white" href="admin/category">DANH MỤC</a></button>
                <button class="btn  btn-info "><a style="color: white" href="admin/course">KHÓA HỌC</a></button>
            </div>
        </div>
    </div>
</div>
@endsection
