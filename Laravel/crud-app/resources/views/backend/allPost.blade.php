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
                <th>Actions</th>
            </thead>
            <tbody>
                <tr>
                    <td>01</td>
                    <td>Post Title</td>
                    <td>Post Details</td>
                    <td>05</td>
                    <td>Admin</td>
                    <td>
                        <div class="btn-group">
                            <a href="" class="btn btn-warning">Edit</a>
                            <a href="" class="btn btn-danger">Delete</a>

                        </div>
                    </td>

                </tr>
            </tbody>
        </table>
    </div>

@endsection
