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

    </tbody>
</table>

</div>
  {{--   --}}
<div class="col-md-4">


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
