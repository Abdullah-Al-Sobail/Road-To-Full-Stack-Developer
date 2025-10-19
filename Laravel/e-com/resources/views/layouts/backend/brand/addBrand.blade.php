@extends('layouts.backend.backendApp')

@section('backendContent')
<h2 class="text-primary">Brand Management</h2>
    <div class="d-flex">

        <div class="col-md-7 me-2">
        <table class="table">
    <thead>
        <th>SL</th>
        <th>Brand Name</th>
        <th>Slug</th>
        <th>Brand Image</th>
        <th>Action</th>
    </thead>
    <tbody>
      @forelse ($brands as $key=>$brand)
         <tr>
            <td>{{++$key}}</td>
            <td>{{$brand->brand_name}}</td>
            <td>{{$brand->slug}}</td>
            <td>
                <img src="{{$brand->image_url}}" alt="{{$brand->brand_name}}" style="height: 100px; width: 100px; object-fit: cover;">
            </td>
            <td>
                <div class="btn-group">
                    <a href="{{route('brand.edit',$brand->slug)}}" class="btn btn-warning btn-sm" id="showEdit">Edit</a>
                <a href="#" onclick="event.preventDefault();
                                                     document.getElementById('delete-form').submit();"
                                     class="btn btn-danger btn-sm" >Delete</a>
                  <form id="delete-form" action="{{ route('delete.brand',$brand->slug) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('delete')
                  </form>
                </div>
            </td>
        </tr>
      @empty

      @endforelse
    </tbody>
</table>

</div>
  {{--   --}}
<div class="col-md-4">

     @if(!isset($editBrand))
         <div class="card" id="addForm">
         <div class="card-header">
            <h3>Add New Brand</h3>
            </div>
         <div class="card-body rounded-2">
             <form action="{{route('brand.addItem')}}" method="POST" enctype="multipart/form-data">
                @csrf
        <input type="text" placeholder="Brand Name" class="form-control mb-2" name="brandName" id="mainBrand">
        @error('brandName')
              <span class="text-danger"> {{ $message}}</span>
        @enderror
        <input type="text" placeholder="Slug" class="form-control mb-2" name="slug" id="slug">
        <label for="">Brand Image</label>
        <input type="file" placeholder="Brand Name" class="form-control mb-2" name="brandImage">
        @error('brandImage')
              <span class="text-danger"> {{ $message}}</span>
        @enderror
        <button type="submit" class="btn btn-primary w-100">Upload Brand</button>
        </form>
         </div>
        </div>
    @else
       <div class="card" id="editForm" >
        <div class="card-header">
            <h3>Edit Brand</h3>
        </div>
        <div class="card-body rounded-2">
             <form action="{{route('brand.update',$editBrand->slug)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
        <input type="text" placeholder="Brand Name" class="form-control mb-2" name="brandName" value="{{$editBrand->brand_name}}">
        @error('brandName')
              <span class="text-danger"> {{ $message}}</span>
        @enderror
        <input type="text" placeholder="Slug" class="form-control mb-2" name="slug" value="{{$editBrand->slug}}">
        <label for="">Brand Image</label>
        <input type="file" placeholder="Brand Name" class="form-control mb-2" name="brandImage">
        @error('brandImage')
              <span class="text-danger"> {{ $message}}</span>
        @enderror
        <button type="submit" class="btn btn-primary w-100">Upload Brand</button>
        </form>
        </div>
         </div>
    @endif

</div>

    </div>
    <script>
       const brandInput = document.getElementById("mainBrand");
       const slugInput = document.getElementById("slug");

       brandInput.addEventListener("input",function(){

        let brand  = this.value;
        let slug = brand;
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
