@extends('layouts.master')
@section('title')
    SỬA DANH MỤC
@endsection
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid>
            <div class="row">
           
                <div class="col-md-6 col-lg col-xlg-3">
                    <div class="card card-hover">
                        <div style="margin-top: 10px;" class="box bg-white text-center">
                            <h6 class="text-black"> SỬA DANH MỤC: {{$category['c_name']}} </h6>
                        </div>
                    </div>
                    <div class="row">
                        <form action="" method="POST">
                            <div class="mb-3 mt-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" required 
                                  value="{{$category['c_name']}}"  name="name">
                            </div>
                            <button type="submit" class="btn btn-primary">Sửa</button>
                            <button" type="submit" class="btn btn-primary"><a  style="color: white" href="/admin/category">Danh sách</a></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
 