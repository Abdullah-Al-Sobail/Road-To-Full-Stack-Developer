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
               @forelse ($blogPosts as $key=>$post)
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
                            <a href="{{route('blog.edit',$post->id)}}" class="btn btn-warning">Edit</a>
                            <a href="{{route('blog.status',$post->id)}}" class="btn btn-info">Status</a>
                            <button type="submit" id="{{$post->id}}"  class="btn btn-danger form">Delete</button>
                            <form action="{{route('posts.delete',$post->id)}}" method="POST" >
                                @csrf
                                @method('DELETE')
                            </form>

                        </div>
                    </td>

                </tr>
                @empty
                   <tr>
                    <td colspan="7" class="text-center fw-bold"> No Record Found</td>
                   </tr>

               @endforelse
            </tbody>
        </table>
    </div>
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script>
        let button = $('.form');

        // button.click(function(){
            //     console.log('button is clicked');
            // })

            // console.log(button);
    button.click(function(){
        Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, delete it!"
}).then((result) => {
  if (result.isConfirmed) {

    $(this).next().submit();
    Swal.fire({
      title: "Deleted!",
      text: "Your file has been deleted.",
      icon: "success"
    });


  }
});
        })


    </script>
@endpush
@endsection
