@extends('layouts.master')
@section('title')
    Danh sách khóa học
@endsection
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid>
            <div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg col-xlg-3">
                <div class="card card-hover">
                    <div style="margin-top: 10px;" class="box bg-white text-center">
                        <h6 class="text-black"> QUẢN LÍ KHÓA HỌC </h6>
                    </div>
                </div>
                <form action="" method="GET" class="col-sm-6" style="margin-bottom: 10px">
                    <input class="col-sm-6" type="text" name="kw" placeholder="Tìm kiếm">
                    <button type="submit">OK</button>
                </form>
                <a class="btn btn-primary" href="/admin/course/create">THÊM KHÓA HỌC</a>
                <table class="table">
                    @if (empty($courses))
                        <tr>
                            <td>
                                <h4 style="margin-top:10px">Không có kết quả</h4>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>IMAGE</th>
                            <th>PRICE</th>
                            <th>STUDENT</th>
                            <th>LESSON</th>
                            <th>DESCRIBE</th>
                            <th>ID_Category</th>
                            <th>ACTION</th>
                        </tr>
                        @foreach ($courses as $course)
                            <tr>
                                <td>{{ $course['c_id'] }}</td>
                                <td>{{ $course['c_name'] }}</td>
                                <td><img src="{{ $course['c_image'] }}" alt="" width="150px"></td>
                                <td>{{ $course['c_price'] }}</td>
                                <td>{{ $course['c_student'] }}</td>
                                <td>{{ $course['c_lesson'] }}</td>
                                <td>{{ $course['c_mota'] }}</td>
                                <td>{{ $course['c_id_category'] }}</td>
                                <td>
                                    <a class="btn btn-info" href="/admin/course/{{ $course['c_id'] }}/update">SỬA</a>
                                    <a class="btn btn-danger" onclick="return confirm('Bạn muốn xóa khóa học này chứ ?')"
                                        href="/admin/course/{{ $course['c_id'] }}/delete">XÓA</a>
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
