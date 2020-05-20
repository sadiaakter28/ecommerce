<form class="form-inline" action="{{route('carts.store')}}" method="post">
    @csrf
    <input type="hidden" name="product_id" value="{{$product->id}}">
    <button type="submit" class="btn btn-outline-warning"><i class="fa fa-plus"></i>Add to Cart</button>

</form>
