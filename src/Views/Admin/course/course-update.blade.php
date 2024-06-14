@extends('layouts.master')
@section('title')
    Update khóa học
@endsection
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid>
            <div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg col-xlg-3">
                <div class="card card-hover">
                    <div style="margin-top: 10px;" class="box bg-white text-center">
                        <h6 class="text-black"> QUẢN LÍ COURSE </h6>
                    </div>
                </div>
                <table>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3 mt-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-control" id="category_id" required name="id_category">
                                @foreach ($categories as $category)
                                    <option @if ($category['c_id'] == $course['id_category']) selected @endif value="{{ $category['c_id'] }}">
                                        {{ $category['c_name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="title" class="form-label">Name</label>
                            <input type="text" class="form-control" id="title" required placeholder="Enter name"
                                name="name"value="{{ $course['name'] }}">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="image" class="form-label">Image:</label><br>
                            <img src="{{ $course['image'] }}" alt="" width="150px" style="margin-bottom: 8px">
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="title" class="form-label">Price</label>
                            <input type="number" min="0" class="form-control" id="title" required
                                placeholder="Enter price" name="price"value="{{ $course['price'] }}">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="excerpt" class="form-label">Student</label>
                            <input type="number" min="0" class="form-control" id="excerpt" placeholder="Enter status"
                                name="student" value="{{ $course['student'] }}">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="excerpt" class="form-label">Lesson</label>
                            <input type="number" class="form-control" id="excerpt" placeholder="Enter lesson"
                                name="lesson"value="{{ $course['lesson'] }}">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="content" class="form-label">Describe</label>
                            <textarea name="describe" id="content" class="form-control">{{ $course['mota'] }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="/admin/course" class="btn btn-success">Danh khóa học</a>
                    </form>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
