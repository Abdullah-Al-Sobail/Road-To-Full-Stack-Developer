@extends('layouts.app')
@section('content')
    <div class="card col-md-6 mx-auto">
        <div class="card-header">
          {{$post->title}}
        </div>
        <div class="card-body">
            {{$post->description}}
        </div>
        <div class="card-footer">
            Author Name : <span class="text-success">{{$post->created_by}}</span>
        </div>
    </div>
@endsection
