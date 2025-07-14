@extends('layouts.app')

@section('content')
    <div class="card col-md-6 mx-auto">
        <div class="card-header bg-primary text-white">Add New Post</div>
        <div class="card-body">
            <form action="">
                <input type="text" placeholder="Post Title" class="form-control my-2">
                <textarea name=""  placeholder="Details" class="form-control my-2"></textarea>
                <input type="submit" value="Submit Post" class="btn btn-secondary w-100">
            </form>
        </div>
    </div>
@endsection
