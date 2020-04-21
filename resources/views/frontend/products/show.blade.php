@extends('frontend.layouts.master')
@section('main')
    <div class="container margin-top-20">
        <div class="row">
            <div class="col-md-4">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="..." alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="..." alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="..." alt="Third slide">
                        </div>
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
            <div class="col-md-8">
                <div class="widget">
                    <h3>{{$products->title}}</h3>
{{--                    <h3>Products</h3>--}}
{{--                    @include('frontend.products.partials.all_products')--}}
                </div>
                <div class="widget">
                </div>
            </div>
        </div>
        <div class="mt-4 pagination">
            {{$products->links()}}
        </div>
    </div>
@endsection

