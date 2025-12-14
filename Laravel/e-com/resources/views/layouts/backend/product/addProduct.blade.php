@extends('layouts.backend.backendApp')
@section('backendContent')
    <h2 class="text-primary mb-2">Add New Product</h2>
    <form action="" method="POST">

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
                <option value="">In-Stock</option>
                <option value="">Out of Stock</option>
            </select>
        </div>
        {{-- Brand and Product Info --}}
        <div class="col-md-6 mb-2">
            <input type="text" class="form-control" placeholder="Brand" name="brand">
        </div>
        <div class="col-md-6 mb-2">
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
            <select name="stock_status" class="form-control">
                <option disabled selected>Select Status</option>
                <option value="">In-Stock</option>
                <option value="">Out of Stock</option>
            </select>
        </div>

        <div class="col-md-6 mb-2">
            <label for="">Select Sub-Category</label>
            <select name="stock_status" class="form-control">
                <option disabled selected>Select Status</option>
                <option value="">In-Stock</option>
                <option value="">Out of Stock</option>
            </select>
        </div>

        {{-- Description --}}
        <div class="col-md-12 mb-2">
            <label for="">Short Description</label>
            <textarea name="" class="form-control"></textarea>
        </div>
         <div class="col-md-12 mb-2">
            <label for="">Long Description</label>
            <textarea name="" class="form-control" rows="5"></textarea>
        </div>

        {{-- Product Images --}}

         <div class="col-md-6 mb-2">
            <label for="">Product Image</label>
            <input type="file" class="form-control" name="product_image">
        </div>
        <div class="col-md-6 mb-2">
            <label for="">Product Gallery Images</label>
            <input type="file" class="form-control" multiple name="product_gallery_images">
        </div>

        {{-- Product Video --}}
         <div class="col-md-12 mb-2">
            <label for="">Product Video URL</label>
            <input type="text" class="form-control" name="product_video">
        </div>
        </div>
        <button class="btn btn-outline-primary w-100">Upload Product</button>
    </form>
@endsection
