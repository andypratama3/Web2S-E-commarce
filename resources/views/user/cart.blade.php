
@extends('layouts.user')
@section('title','Cart')
@section('content')
<br>
    <div class="container">
        <div class="card shadow">
            <div class="card-body">
            @if ($cartItem->count() > 0)
            <div class="card-body">
                @php $total = 0; @endphp
                @foreach ($cartItem as $item)
                <div class="row product_data">
                <div class="col-md-4 border-right">
                    <img src="{!!asset('assets/upload/product/'.$item->product->image)!!}" style="width: 100%" alt="">
                </div>

                <div class="col-md-8">

                    <h2 class="mb-0">
                        {{$item->product->name}}
                    </h2>
                    <hr>
                    <button class="btn btn-danger float-end delete-cart-item"><i class="bi bi-trash">Remove</i></button>
                    <input type="hidden" class="prod_id" value="{{$item->prod_id}}" >
                    <label class="me-3">Original Price: <s> Rp.{{$item->product->original_price}}</s></label>
                    <i class="bi bi-arrow-right"></i>
                    <label class="fw-bold">Selling Price: Rp.{{$item->product->sell_price}}</label>
                    <div class="row mt-2">
                        <div class="col-md-3">
                            <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
                            @if($item->product->qty > $item->prod_qty)
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3" style="width: 130px;">
                                <button class="input-group-text changeQuantity decrement-btn">-</button>
                                <input type="text" name="quantity " value="{{$item->prod_qty}}" class="form-control text-center qty-input">
                                <button class="input-group-text changeQuantity incerement-btn" style="size: 5px;">+</button>
                            </div>
                            @php $total += $item->product->sell_price * $item->prod_qty; @endphp
                            @else
                            <h6>Out Of Stock</h6>
                        @endif
                    </div>

                </div>
            </div>
        </div>
            <hr>
            @endforeach
            <div>
                <a href="{{url('checkout')}}" class="btn btn-primary float-end">Proceed Check Out</a>
                <h2>Total Rp.{{$total}}</h2>
            </div>
            @else
            <div class="card-body text-center">
                <h2>Your <i class="bi bi-cart"></i> Cart is empty</h2>
                <a href="{{url('view-product')}}" class="btn btn-success float-end">Continue Shopping</a>
            </div>
            @endif
            </div>
        </div>
    </div>

<div id="preloader"></div>


@include('layouts.script')


@endsection
