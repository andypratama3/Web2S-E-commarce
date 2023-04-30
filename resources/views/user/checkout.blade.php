
@extends('layouts.user')
@section('title','CheckOut')
@section('content')
<br>
    <div class="container">
        <form action="{{url('place-order')}}" method="POST">
            @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h6 class="text-center">Basic Details</h6>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <input type="text" class="form-control fname" value="{{auth::user()->name}}" placeholder="First Name" name="fname">
                                <span id="fname_error" class="text-danger text-center"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control lname" value="{{auth::user()->lname}}" placeholder="Last Name" name="lname">
                                <span id="lname_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">E-Mail</label>
                                <input type="text" class="form-control email" value="{{auth::user()->email}}" placeholder="E-mail" name="email">
                                <span id="email_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Phone Number</label>
                                <input type="text" class="form-control phone" value="{{auth::user()->phone}}" placeholder="Number Phone" name="phone">
                                <span id="phone_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address</label>
                                <input type="text" class="form-control address1" value="{{auth::user()->address1}}" placeholder="Address 1" name="address1">
                                <span id="address1_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 2</label>
                                <input type="text" class="form-control address2" value="{{auth::user()->address2}}" placeholder="Address 2" name="address2">
                                <span id="address2_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">City</label>
                                <input type="text" class="form-control city" value="{{auth::user()->city}}" placeholder="City" name="city">
                                <span id="city_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">State</label>
                                <input type="text" class="form-control state" value="{{auth::user()->state}}" placeholder="State" name="state">
                                <span id="state_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Country</label>
                                <input type="text" class="form-control country" value="{{auth::user()->country}}" placeholder="Country" name="country">
                                <span id="country_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Pin Code</label>
                                <input type="text" class="form-control pincode" value="{{auth::user()->pincode}}" placeholder="Pin Code" name="pincode">
                                <span id="pincode_error" class="text-danger"></span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body" style="height: 100%">
                        <h6 class="text-center">OrderDetails</h6>
                        <hr>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Selling Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0; @endphp
                             @foreach ($cartitem as $item)
                                <tr>
                                    <td>{{$item->product->name}}</td>
                                    <td>{{$item->prod_qty}}</td>
                                    <td>{{$item->product->sell_price}}</td>
                                    <td></td>

                                </tr>
                                @php $total += $item->product->sell_price * $item->prod_qty; @endphp
                            @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <h2 class="form-control text-end">Rp.{{$total}}</h2>
                        <input type="hidden" name="payment_mode" value="COD">
                        <input type="hidden" name="payment_id" value="123452345" id="">
                        <button class="btn btn-primary form-control float-end pay">Place Orde | COD</button>
                        <br>
                        <br>
                        <div id="smart-button-container">
                            <div style="text-align: center;">
                                <div id="paypal-button-container"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
    @include('layouts.script')
<script>
    paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '{{$total}}'
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      return actions.order.capture().then(function(details) {
        var fname = $('.fname').val();
        var lname = $('.lname').val();
        var email = $('.email').val();
        var phone = $('.phone').val();
        var address1 = $('.address1').val();
        var address2 = $('.address2').val();
        var city = $('.city').val();
        var state = $('.state').val();
        var country = $('.country').val();
        var pincode = $('.pincode').val();

        $.ajax({
            type: "POST",
            url: "/proceed-top-pay",
            data: {
                'fname':fname,
                'lname':lname,
                'email':email,
                'phone':phone,
                'address1':address1,
                'address2':address2,
                'city':city,
                'state':state,
                'country':country,
                'pincode':pincode,
                'payment_mode':"Paid By Paypal",
                'payment_id':details.id,
            },
            success: function (response) {
                Swal.fire(
                'Success',
                response.status,
                'success',
                )
                window.location.href = "/my-order";
            }
        });
      });
    }
  }).render('#paypal-button-container');

</script>


@endsection
