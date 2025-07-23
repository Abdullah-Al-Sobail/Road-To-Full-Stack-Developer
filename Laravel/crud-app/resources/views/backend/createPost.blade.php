@extends('layouts.app')

@section('content')
    <div class="card col-md-6 mx-auto">
        @if (session()->has('success'))
        <span class="alert alert-success">{{session('success')}}</span>
        @endif


        <div class="card-header bg-primary text-white">Add New Post</div>
        <div class="card-body">
            <form action="{{route('blog.validate')}}" method="POST">
                @csrf
                <input type="text" name="title" placeholder="Post Title" class="form-control my-2" value="{{old('title')}}">
                @error('title')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <textarea name="detail"  placeholder="Details" class="form-control my-2"></textarea>
                @error('detail')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <input type="submit" value="Submit Post" class="btn btn-secondary w-100">
            </form>
        </div>
    </div>
@endsection
