@extends('layouts.frontend.forntendApp')
@section('homePage')
    @foreach ($categories as $category)
        <h1>{{ str($category->category_name)->headline() }}</h1>
        <section>
            <div class="row">
               @foreach ($category->product as $product )
                    <div class="col-lg-4">
                 <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="{{ $product->product_image_url }}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{ $product->title }}

        <span class="float-end fs-6">&#2547;{{ $product->price }}</span>
    </h5>
    <p class="card-text">{{ $product->short_description }}</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
               </div>
               @endforeach
            </div>
        </section>
    @endforeach
@endsection
