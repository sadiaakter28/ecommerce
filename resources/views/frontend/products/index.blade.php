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
                    <h3>Products</h3>
                    @include('frontend.products.partials.all_products')
                </div>

                <div class="widget">

                </div>
            </div>
        </div>

    </div>


@endsection

@push('js')

@endpush
