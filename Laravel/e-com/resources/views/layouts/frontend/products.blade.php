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
        <section>
            <h1>Random</h1>
            <div class="row">
                 @foreach ($products as $product)

                    <div class="col-lg-4">

                 <div class="card h-100" style="width: 18rem;">


  <img class="card-img-top" src="{{ $product->product_image_url }}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">
        {{ $product->title }}
          @if (Carbon\Carbon::today() >= $product->campain_start && Carbon\Carbon::today()<= $product->campain_end)
                                 <div class="overlay" style="position:absolute;height:40px;width:40px;background:dodgerblue;top:-10px;left:-20px;border-radius:50%; text-align: center;color:aliceblue; font-size: 18px;font-weight:normal">{{ intval(($product->discount/$product->price)*100) }}%</div>

        @if ($product->discount)

        <span class="float-end fs-6 ms-1 text-decoration-line-through">&#2547;{{ $product->price }}</span>
        <span class="float-end fs-6">&#2547;{{ $product->discount }}</span>
          @endif
    @else
        <span class="float-end fs-6 ms-1">&#2547;{{ $product->price }}</span>
 @endif

    </h5>
    <p class="card-text">{{ $product->short_description }}</p>
    <a href="{{ route('product.view',$product->slug) }}" class="btn btn-primary">View product</a>
    <a href="#" class="btn btn-primary">Buy product</a>
  </div>
</div>
               </div>
                 @endforeach
            </div>
            {{ $products->links() }}
        </section>


@endsection
