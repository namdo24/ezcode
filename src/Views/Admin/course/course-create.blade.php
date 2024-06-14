@extends('layouts.master')
@section('title')
   Thêm khóa học
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
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3 mt-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-control" id="category_id" required name="id_category">
                                @foreach ($categories as $category)
                                    <option value="{{ $category['c_id'] }}">{{ $category['c_name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="title" class="form-label">Name</label>
                            <input type="text" class="form-control" id="title" required
                                placeholder="Enter name" name="name">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="image" class="form-label">Image:</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="title" class="form-label">Price</label>
                            <input type="number" min="0" class="form-control" id="title" required
                                placeholder="Enter price" name="price">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="excerpt" class="form-label">Lesson</label>
                            <input type="number" class="form-control" id="excerpt"
                                placeholder="Enter lesson" name="lesson">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="excerpt" class="form-label">Student</label>
                            <input type="number" min="0" class="form-control" id="excerpt"
                                placeholder="Enter student" name="student">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="content" class="form-label">Describe</label>
                            <textarea name="describe" id="content" class="form-control"></textarea>
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

