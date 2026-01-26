@extends('layouts.backend.backendApp')
@section('backendContent')
    <h2 class="text-primary mb-2">Add New Product</h2>
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
             <div class="col-md-6 mb-2">
            <input type="text" class="form-control" name="title" placeholder="Product Title">
        </div>
         <div class="col-md-6 mb-2">
            <input type="text" class="form-control" name="slug" placeholder="Product Slug">
        </div>
            {{-- Price --}}
            <div class="col-md-4 mb-2">
            <input type="text" class="form-control" placeholder="Regular Price" name="price">
        </div>
        <div class="col-md-4 mb-2">
            <input type="text" class="form-control" placeholder="Discounted Price" name="discount_price">
        </div>
         {{-- Price Ends--}}

          {{-- Stock --}}
        <div class="col-md-4 mb-2">
            <select name="stock_status" class="form-control">
                <option disabled selected>Select Status</option>
                <option value="{{ true }}">In-Stock</option>
                <option value="{{ false }}">Out of Stock</option>
            </select>
        </div>
        {{-- Brand and Product Info --}}
        <div class="col-md-6 mb-2">
            <label for="">Select A Brand</label>
            <select name="brand_id" class="form-control">
                <option disabled selected>Select A Brand</option>
                @forelse ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                @empty
                    No Brand Found
                @endforelse

            </select>
        </div>
        <div class="col-md-6 mb-2">
            <label for="">Product Code</label>
            <input type="text" class="form-control" placeholder="Product Code" name="product_code">
        </div>

        {{-- Campain Date --}}
        <div class="col-md-6 mb-2">
            <label for="">Campain Start</label>
            <input type="date" class="form-control"  name="campain_starts">
        </div>
        <div class="col-md-6 mb-2">
            <label for="">Campain Ends</label>
            <input type="date" class="form-control" name="campain_ends">
        </div>

        {{-- Category --}}

        <div class="col-md-6 mb-2">
            <label for="">Select Category</label>
            <select name="category" class="form-control">
                <option disabled selected>Select Status</option>
                  @forelse ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @empty

                @endforelse
            </select>
        </div>

        <div class="col-md-6 mb-2">
            <label for="">Select Sub-Category</label>
            <select name="subCategory" class="form-control">
                <option disabled selected>Select Status</option>

            </select>
        </div>

        {{-- Description --}}
        <div class="col-md-12 mb-2">
            <label for="">Short Description</label>
            <textarea name="short_des" class="form-control"></textarea>
        </div>
         <div class="col-md-12 mb-2">
            <label for="">Long Description</label>
            <textarea name="long_des" class="form-control" rows="5"></textarea>
        </div>

        {{-- Product Images --}}

         <div class="col-md-6 mb-2">
            <label for="">Product Image</label>
            <input type="file" class="form-control" name="product_image">
        </div>
        <div class="col-md-6 mb-2">
            <label for="">Product Gallery Images</label>
            <input type="file" class="form-control" multiple name="product_gallery_images[]">
        </div>

        {{-- Product Video --}}
         <div class="col-md-12 mb-2">
            <label for="">Product Video URL</label>
            <input type="text" class="form-control" name="product_video">
        </div>
        </div>
        <button class="btn btn-outline-primary w-100">Upload Product</button>
    </form>

    @push('CustomJs')
        <script>
            let selectCategory = $("select[name='category']");
            let subCategory = $("select[name='subCategory']");
            selectCategory.on('change',function(){
                let id = $(this).val();
                // console.log(id);
                // console.log(`{{ route('fetch.subCategory','id') }}`);
                let rawUrl = `{{ route('fetch.subCategory',':id') }}`;
                let newUrl = rawUrl.replace(':id',id);
                //console.log(newUrl);
                $.ajax({
                    url:newUrl,
                    dataType:'json',
                    type:'GET',
                    success:function(response){
                    let option = [];
                     let options = response.map(element=>`<option value='${element['id']}'>${element['sub_category_name']}</option>`);
                     option.push(options);
                     subCategory.html('');
                     subCategory.html(option);
                    },
                    error:function(data){
                        // console.log(data);
                    let option = `<option disable>${data.responseText}</option>`;
                    subCategory.html('');
                     subCategory.html(option);
                    }
                });
            })
        </script>
    @endpush
@endsection
