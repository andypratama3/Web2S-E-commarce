@include('layouts.user')

    <div class="container">
        <br>
        <a href="{{url('my-order')}}" class="btn btn-warning">Back To Orders</a>
        <br>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h6 class="text-center">Basic Details</h6>
                        <hr>
                        <div class="row striped-columns">
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <div><strong>{{$order->fname}} </strong></div>
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <div><strong>{{$order->lname}}</strong></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">E-Mail</label>
                                <div><strong>{{$order->email}}</strong></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Phone Number</label>
                                <div><strong>{{$order->phone}}</strong></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Shipping Address</label>
                                <div>
                                <strong>{{$order->address1}}</strong>
                                <strong>{{$order->address2}}</strong>
                                <strong>{{$order->city}}</strong>
                                <strong>{{$order->state}}</strong>
                                <strong>{{$order->country}}</strong>
                                <strong>{{$order->pincode}}</strong>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h6 class="text-center">OrderDetails</h6>
                        <hr>
                        <div class="col-md-6"></div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0; @endphp
                             @foreach ($order->orderItem as $item)
                                <tr>
                                    <td>{{$item->product->name}}</td>
                                    <td>{{$item->qty}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>
                                        <img src="{{asset('assets/upload/product/'.$item->product->image)}}" alt="" width="60px">
                                    </td>
                                </tr>
                                @php $total += $item->product->sell_price * $item->qty; @endphp
                                <td>
                                    <th><Strong>Status</Strong></th>
                                </td>
                                <td>
                                    <span class="badge {{($item->status ==1)? 'bg-label-primary me-1': 'bg-label-danger me-1'}}">{{($item->status == 1)? 'Complated' : 'Pending'}}</span>
                                </td>
                            @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <h6>Grand Total:</h6>
                        <h2 class="form-control">Rp.{{$total}}</h2>

                    </div>
                </div>

            </div>
        </div>

