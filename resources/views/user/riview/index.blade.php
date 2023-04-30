@extends('layouts.user')
@section('title','Insert Riview Product')
@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="card shadow">
                <div class="card-body">
                    @if ($verif->count() > 0 )
                    <h5>Writing The Riview For {{$product->name}}</h5>
                    <form action="{{url('add-riview')}}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <textarea name="user_riview" class="form-control" rows="10"></textarea>
                        <br>
                        <button type="submit" class="btn btn-primary float-end">Submit</button>
                    </form>
                    @else
                    <div class="alert alert-danger">
                        <h5>Youre Not eligible to Riview The product</h5>
                        <p>
                            For The trusthworthness of the riview sm,because only customers buy can Riview The product
                        </p>
                    </div>
                    <a class="btn btn-primary float-end" href="{{url('/')}}">Return Home</a>

                    @endif
                </div>
            </div>
        </div>
    </div>


@include('layouts.script')
@endsection
