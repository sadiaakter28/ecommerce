@extends('frontend.layouts.master')
@section('title')
    All Products | Ecommerce
@endsection
@push('css')
@endpush
@section('main')
    <div class="container margin-top-20">
        <div class="row">
            <div class="col-md-4">
                @include('frontend.partials.sidebar')
            </div>
            <div class="col-md-8">
                <div class="widget">
                    <h3>All Products in <span class="badge badge-info">{{$category->name}}</span></h3>
                    @php
                        $products = $category->products()->paginate(9);
                    @endphp
                    @if($products->count() > 0)
                        @include('frontend.products.partials.all_products')
                    @else
                        <div class="alert alert-warning">
                            No Products has added yet in this category!!
                        </div>
                    @endif
                </div>

                <div class="widget">

                </div>
            </div>
        </div>

    </div>


@endsection

@push('js')

@endpush
