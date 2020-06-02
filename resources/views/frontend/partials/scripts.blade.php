<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/3b279c875e.js"></script>
<script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
{{--JS Cart View--}}
{{--<script>--}}
{{--    $.ajaxSetup({--}}
{{--        headers: {--}}
{{--            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--        }--}}
{{--    });--}}

{{--    function addToCart(product_id) {--}}
{{--        $.post( "http://localhost/ecommerce/public/api/carts/store",--}}
{{--            {--}}
{{--                product_id: product_id--}}
{{--            })--}}
{{--            .done(function( data ) {--}}
{{--                data = JSON.parse(data);--}}
{{--                if(data.status == 'success'){--}}
{{--                    alertify.set('notifier','position', 'top-center');--}}
{{--                    alertify.success('Item added to cart successfully!! Total Items: '+data.totalItems+'<br> To Checkout <a href="{{route('carts')}}">go to checkout page</a>');--}}
{{--                    $("#totalItems").html(data.totalItems);--}}
{{--                }--}}
{{--            });--}}
{{--    }--}}

{{--</script>--}}
