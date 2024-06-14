@extends('layouts.master')
@section('title')
    DANH MỤC
@endsection
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid>
            <div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg col-xlg-3">
                <div class="card card-hover">
                    <div style="margin-top: 10px;" class="box bg-white text-center">
                        <h6 class="text-black"> QUẢN LÍ DANH MỤC </h6>
                    </div>
                </div>
                <form action="" method="GET" class="col-sm-6" style="margin-bottom: 10px">
                    <input class="col-sm-6" type="text" name="kw" placeholder="Tìm kiếm">
                    <button type="submit">OK</button>
                </form>
                <a class="btn btn-primary" href="/admin/category/create">THÊM DANH MỤC</a>
                <table class="table">
                    @if (empty($categories))
                        <tr>
                            <th>
                            <td>
                                <h4 style="margin-top:10px">Không có kết quả</h4>
                            </td>
                            </th>
                        </tr>
                    @else
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>ACTION</th>
                        </tr>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category['c_id'] }}</td>
                                <td>{{ $category['c_name'] }}</td>
                                <td>
                                    <a class="btn btn-info" href="/admin/category/{{ $category['c_id'] }}/update">SỬA</a>
                                    <a class="btn btn-danger" onclick="return confirm('Bạn muốn xóa khóa học này chứ ?')"
                                        href="/admin/category/{{ $category['c_id'] }}/delete">XÓA</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                </table>

            </div>
        </div>
    </div>
    </div>
@endsection
