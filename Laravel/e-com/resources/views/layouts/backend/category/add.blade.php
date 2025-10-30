@extends('layouts.backend.backendApp')
@section('backendContent')
    <h2 class="text-primary">Category Management</h2>
     <div class="d-flex">

        <div class="col-md-7 me-2">
        <table class="table">
    <thead>
        <th>SL</th>
        <th>Category Name</th>
        <th>Slug</th>
        <th>Category Image</th>
        <th>Action</th>
    </thead>
    <tbody>
        @forelse ($categories as $key=>$category)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $category->category_name }}</td>
                <td>{{ $category->slug }}</td>
                <td>
                    @if ($category->category_image)
                    <img src="{{ $category->category_image_url }}" alt="{{ $category->category_name }}"
                        style="height:100px;width:100px;object-fit:cover;"
                    >
                    @else
                        <img src="{{ asset('/storage/images/placeholder_image.jpg') }}" alt="{{"placeholder_image"}}"
                        style="height:100px;width:100px;object-fit:cover;"
                    >
                    @endif

                </td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('category.edit',$category->slug) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">No data found</td>
            </tr>
        @endforelse
    </tbody>
</table>

</div>
  {{--   --}}
<div class="col-md-4">


        @if (!isset($editCategory))
             <div class="card" id="addForm">
         <div class="card-header">
            <h3>Add New Category</h3>
            </div>
         <div class="card-body rounded-2">
             <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
        <input type="text" placeholder="Category Name" class="form-control mb-2" name="categoryName" id="mainCategory">
        @error('categoryName')
              <span class="text-danger"> {{ $message}}</span>
        @enderror
        <input type="text" placeholder="Slug" class="form-control mb-2" name="slug" id="slug">
        <label for="">Category Image</label>
        <input type="file" placeholder="Category Name" class="form-control mb-2" name="categoryImage">
        @error('categoryImage')
              <span class="text-danger"> {{ $message}}</span>
        @enderror
        <button type="submit" class="btn btn-primary w-100">Upload Category</button>
        </form>
         </div>
        </div>
        @else

                   <div class="card" id="addForm">
         <div class="card-header">
            <h3>Edit Category</h3>
            </div>
         <div class="card-body rounded-2">
             <form action="{{ route('category.update',$category->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
        <input type="text" placeholder="Category Name" class="form-control mb-2" name="categoryName" id="mainCategory" value="{{$editCategory->category_name}}">
        @error('categoryName')
              <span class="text-danger"> {{ $message}}</span>
        @enderror
        <input type="text" placeholder="Slug" class="form-control mb-2" name="slug" id="slug" value="{{ $editCategory->slug }}">
        <label for="">Category Image</label>
        <input type="file" placeholder="Category Name" class="form-control mb-2" name="categoryImage">
        @error('categoryImage')
              <span class="text-danger"> {{ $message}}</span>
        @enderror
        <button type="submit" class="btn btn-primary w-100">Update Category</button>
        </form>
         </div>
        </div>

        @endif



</div>

    </div>
    <script>
       const CategoryInput = document.getElementById("mainCategory");
       const slugInput = document.getElementById("slug");

       CategoryInput.addEventListener("input",function(){

        let Category  = this.value;
        let slug = Category;
        slugInput.value = slug.toLowerCase().trim().replaceAll(' ','-');
        // console.log(slug);
       });
        //  document.getElementById('showEdit').addEventListener('click',function(e){
        //     e.preventDefault();
        //     document.getElementById('addForm').style.display = 'none';
        //     document.getElementById('editForm').style.display = 'block';
        // })

    </script>
@endsection
