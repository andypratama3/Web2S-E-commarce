
@extends('layouts.user')
@section('title','Wishlist')
@section('content')
    <br>
    <div class="container">
        <div class="card shadow">
            <div class="card-body">
                @if ($wishlist->count() > 0)
                    @foreach ($wishlist as $item)
                    <div class="row product_data">
                    <div class="col-md-4 border-right">
                        <img src="{!!asset('assets/upload/product/'.$item->product->image)!!}" style="width: 100%" alt="">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">

                            {{$item->product->name}}
                        </h2>
                        <hr>
                        <button class="btn btn-danger float-end delete-wishlist-item"><i class="bi bi-trash">Remove</i></button>

                        <button type="button" class="btn btn-primary addcart float-start">Add To Cart <i class="bi bi-cart"></i></button>
                        <input type="hidden" class="prod_id" value="{{$item->prod_id}}" >
                        <br>
                        <label class="me-3 text-center">Original Price: <s> Rp.{{$item->product->original_price}}</s></label>
                        <i class="bi bi-arrow-right"></i>
                        <label class="fw-bold">Selling Price: Rp.{{$item->product->sell_price}}</label>
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
                                @if($item->product->qty >= $item->prod_qty)
                                <label class="badge bg-success">In Stock : {{$item->product->qty}} Item</label>
                                @else
                                <label class="badge bg-danger">Out of stock</label>
                            @endif
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3" style="width: 130px;">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" name="quantity " value="1" class="form-control text-center qty-input">
                                <button class="input-group-text incerement-btn" style="size: 5px;">+</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <br>
                @endforeach
            </div>
        </div>
    </div>
</div>
        @else
            <h4 class="text-center">The are product in your Wishlist</h4>
            @endif
        </div>
    </div>
</div>

<div id="preloader"></div>
@endsection
<!-- Vendor JS Files -->
@include('layouts.script')

