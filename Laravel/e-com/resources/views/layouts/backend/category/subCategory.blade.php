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
                <td> @if ($subCategory->image_url)
                    <img src="{{ $subCategory->image_url }}" alt="{{ $subCategory->sub_category_name }}"
                        style="height:100px;width:100px;object-fit:cover;"
                    >
                    @else
                        <img src="{{ asset('/storage/images/placeholder_image.jpg') }}" alt="{{"placeholder_image"}}"
                        style="height:100px;width:100px;object-fit:cover;"
                    >
                    @endif
                </td>
                <td>
                   <div class="btn-group ">
                     <a href="{{ route('subCategory.edit',$subCategory->slug) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="" class="btn btn-danger btn-sm">Delete</a>
                   </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</div>

<div class="col-md-4">

         @if (!isset($editSubCategory))
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
        @else

             <div class="card" id="addForm">
         <div class="card-header">
            <h3>Edit Sub Category</h3>
            </div>
         <div class="card-body rounded-2">
             <form action="" method="POST" enctype="multipart/form-data">
                @csrf
        <input type="text" placeholder="Sub Category Name" class="form-control mb-2" name="subCategoryName" id="mainCategory" value="{{ $editSubCategory->sub_category_name }}">
        @error('subCategoryName')
              <span class="text-danger"> {{ $message}}</span>
        @enderror
        <input type="text" placeholder="Slug" class="form-control mb-2" name="slug" id="slug" value="{{ $editSubCategory->slug }}">
        <select name="parent_category" class="form-select my-2">

            @foreach ($categories as $category)
            <option value="{{ $category->id }}" @selected(old('parent_category',$editSubCategory->category_id==$category->id))>{{ $category->category_name }}</option>
            @endforeach
        </select>
        <label for="">Sub Category Image</label>
        <input type="file" placeholder="Category Name" class="form-control mb-2" name="subCategoryImage">
        @error('subCategoryImage')
              <span class="text-danger"> {{ $message}}</span>
        @enderror
        <button type="submit" class="btn btn-primary w-100">Update Sub Category</button>
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
