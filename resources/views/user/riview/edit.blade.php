@extends('layouts.user')
@section('title','Edit Riview Product')
@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="card shadow">
                <div class="card-body">

                    <h5>Writing The Riview For {{$riview->product->name}}</h5>
                    <form action="{{url('update-riview')}}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="riview_id" value="{{$riview->id}}">
                        <textarea name="user_riview" class="form-control" rows="10" value="{{$riview->user_riview}}">{{$riview->user_riview}}</textarea>
                        <br>
                        <button type="submit" class="btn btn-primary float-end">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@include('layouts.script')
@endsection
