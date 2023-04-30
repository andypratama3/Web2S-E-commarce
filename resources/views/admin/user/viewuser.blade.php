@extends('layouts.nav')
@section('title','Product')
@section('content')

<div class="container">
    <br>
        <div class="row">
            <div class="col-md-">
                <div class="card">
                    <div class="card-body">
                        <h6 class="text-center">Profile Detail
                            <a href="{{url('users')}}" class="btn btn-warning float-start">Back</a>
                        </h6>
                        <br>
                        <hr>
                        <div class="row striped-columns">
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <div class="p-2 border"><strong>{{$user->name}} </strong></div>
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <div class="p-2 border"><strong>{{$user->lname}}</strong></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">E-Mail</label>
                                <div class="p-2 border"><strong>{{$user->email}}</strong></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Phone Number</label>
                                <div class="p-2 border"><strong>{{$user->phone}}</strong></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Shipping Address</label>
                            <div class="p-2 border">
                                <strong>{{$user->address1}}</strong>
                                <strong>{{$user->address2}}</strong>
                                <strong>{{$user->city}},</strong>
                                <strong>{{$user->state}}</strong>
                                <strong>{{$user->country}},</strong>
                                <strong>{{$user->pincode}}</strong>
                            </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <Label>Role</Label>
                                <div class="p-2 border"><strong>{{$user->role_as == '0' ? 'Users' : 'Admin'}}</strong></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
