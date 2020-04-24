@extends('frontend.layouts.master')
@section('title')
    Home | Ecommerce
@endsection
@section('main')
    <div class="container margin-top-20">
        <div class="row">
            <div class="col-md-4">
                @include('frontend.partials.sidebar')
            </div>
            <div class="col-md-8">
                <div class="widget">
                    <h3>Featured Products</h3>
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
