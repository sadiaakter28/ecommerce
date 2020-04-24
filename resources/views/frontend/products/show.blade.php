@extends('frontend.layouts.master')
@section('title')
    {{$product->title}} | Ecommerce
@endsection
@section('main')
    <div class="container margin-top-20">
        <div class="row">

            <div class="col-md-4 card">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @php $i = 1; @endphp
                        @foreach($product->images as $image)
                            <div class="carousel-item {{$i == 1 ? 'active' : ''}}">
                                <img class="d-block w-100" src="{{asset('images/products/'.$image->image)}}"
                                     alt="{{$product->title}}">
                            </div>
                            @php $i++; @endphp
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <div class="col-md-8 card">
                <div class="widget">
                    <h3>{{$product->title}}</h3>
                    <h3>{{$product->price}} Taka <br>
                        <span class="badge badge-info">
                            {{$product->quantity < 1 ? 'No Item is Available' : $product->quantity.' Item in Stock' }}
                        </span>
                    </h3>
                    <hr>
                    <div class="product-description">
                        {{$product->description}}
                    </div>
                </div>
                <div class="mt-3">
                    <p>Category <span class="badge badge-info"> {{$product->category->name}} </span></p>
                    <p>Brand <span class="badge badge-info"> {{$product->brand->name}} </span></p>
                </div>
            </div>
        </div>
    </div>
@endsection

