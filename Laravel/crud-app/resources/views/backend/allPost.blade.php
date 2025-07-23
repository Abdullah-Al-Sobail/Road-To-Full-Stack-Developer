@extends('layouts.app')

@section('content')
    <div>
        <table class="table">
            <thead>
                <th>SL</th>
                <th>Title</th>
                <th>Des</th>
                <th>View</th>
                <th>Created by</th>
                <th>Status</th>
                <th>Actions</th>
            </thead>


            <tbody>
               @foreach ($blogPosts as $key=>$post)
                {{-- {{dd($post)}} --}}
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
                    <td>{{$post->view}}</td>
                    <td>{{$post->created_by}}</td>
                    <td ><span class="badge {{$post->status== true ? 'bg-success':'bg-danger'}}">{{$post->status== true ? 'Active':'Deactive'}}</span></td>
                    <td>
                        <div class="btn-group">
                            <a href="" class="btn btn-warning">Edit</a>
                            <a href="" class="btn btn-danger">Delete</a>

                        </div>
                    </td>

                </tr>
               @endforeach
            </tbody>
        </table>
    </div>

@endsection
