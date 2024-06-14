@extends('layouts.master')
@section('title')
{{$name['name']}}
@endsection
@section('content')
<div id="rs-popular-courses" class="rs-popular-courses main-home event-bg pt-100 pb-100 md-pt-70 md-pb-70">
    <div class="container">
        <div class="sec-title3 text-center mb-45">
            <div class="sub-title">Chọn khóa học</div>
            <h2 class="title black-color">Khám phá các khóa học phổ biến</h2>
        </div>
        <div class="row">
            @foreach ($courses as $course)
            <div class="col-lg-4 col-md-6" style="margin-bottom: 20px">
                <div class="courses-item">
                    <div class="courses-grid">
                        <div class="img-part">
                            <a href="/course/{{$course['id']}}/show"><img src="{{$course['image']}}"
                                    alt=""></a>
                        </div>
                        <div class="content-part">
                            <div class="course-price">
                                <span class="price">{{$course['price']}}đ</span>
                            </div>
                            <h3 class="title"><a href="#">{{$course['name']}}</a>
                            </h3>
                            <ul class="meta-part">
                                <li class="user">
                                    <i class="fa fa-user"></i>
                                    {{$course['student']}}
                                </li>
                                <li class="user">
                                    <i class="fa fa-file"></i>
                                    {{$course['lesson']}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
