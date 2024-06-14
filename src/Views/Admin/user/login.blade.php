@extends('layouts.master')
@section('title')
    Đăng nhập
@endsection
@section('content')
<div class="rs-login pt-100 pb-100 md-pt-70 md-pb-70">
    <div class="container">
        <h1 style="margin-top:20px">Đăng nhập</h1>
        @if(!empty($_SESSION['errors']))
        <div class="alert alert-danger">
            <ul>
                @foreach($_SESSION['errors'] as $key => $error)
                <li>Key: {{$key}}--Error:{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="" method="post" enctype="multipart/form-data">
<div class="mb-3 mt-3">
<label for="email">Email:</label>
<input type="email" class="form-control" id="email" placeholder="Enter email" required name="email">
</div>
<div class="mb-3">
<label for="password">Password:</label>
<input type="password" class="form-control" id="password" placeholder="Enter password" required name="password">
</div>
<button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection

