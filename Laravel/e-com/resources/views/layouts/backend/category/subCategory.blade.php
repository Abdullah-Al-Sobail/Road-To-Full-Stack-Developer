@extends('layouts.backend.backendApp')
@section('backendContent')
    <h2 class="text-primary">Sub Category Management</h2>

     <div class="d-flex">

        <div class="col-md-7 me-2">
        <table class="table">
    <thead>
        <th>SL</th>
        <th>Category Name</th>
        <th>Sub Category Name</th>
        <th>Slug</th>
        <th>Sub Category Image</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($subCategories as $key=>$subCategory)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ 11 }}</td>
                <td>{{ $subCategory->sub_category_name }}</td>
                <td>{{ $subCategory->slug }}</td>
                <td><img src="{{ $subCategory->image_url }}" alt="{{ $subCategory->slug }}" height="80px" width="80px" style="object-fit: cover"></td>
                <td>Action</td>
            </tr>
        @endforeach
    </tbody>
</table>

</div>
  {{--   --}}
<div class="col-md-4">



             <div class="card" id="addForm">
         <div class="card-header">
            <h3>Add New Sub Category</h3>
            </div>
         <div class="card-body rounded-2">
             <form action="{{ route('subCategory.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
        <input type="text" placeholder="Sub Category Name" class="form-control mb-2" name="subCategoryName" id="mainCategory">
        @error('subCategoryName')
              <span class="text-danger"> {{ $message}}</span>
        @enderror
        <input type="text" placeholder="Slug" class="form-control mb-2" name="slug" id="slug">
        <select name="parent_category" class="form-select my-2">
            <option value="" disabled selected>Select a category</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
            @endforeach
        </select>
        <label for="">Sub Category Image</label>
        <input type="file" placeholder="Category Name" class="form-control mb-2" name="subCategoryImage">
        @error('subCategoryImage')
              <span class="text-danger"> {{ $message}}</span>
        @enderror
        <button type="submit" class="btn btn-primary w-100">Upload Sub Category</button>
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
