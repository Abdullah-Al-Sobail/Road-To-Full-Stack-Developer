@extends('layouts.app')
@section('content')

    <div class="row d-flex justify-content-around">
       @forelse ($posts as $post)
         <div class="card col-2 p-0  me-2">
            <div class="card-header d-flex justify-content-between">
                <a href="{{route('frontend.viewPost',$post->id)}}">{{$post->title}}</a> <span class="badge text-bg-primary">{{$post->view}}</span>
            </div>
            <div class="card-body">
               {{$post->description}}
            </div>
            <div class="card-footer">
                Author Name : <span class="text-success">{{$post->created_by}}</span>
            </div>
        </div>
       @empty
        No record found
       @endforelse
    </div>

@endsection
