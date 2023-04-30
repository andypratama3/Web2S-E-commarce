<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>My Orders</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicons -->
    <link href="{!!asset('Asset2/assets/img/favicon.png')!!}" rel="icon">
    <link href="{!!asset('Asset2/assets/img/apple-touch-icon.png')!!}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{!!asset('assetsslide/bootstrap.min.css')!!}">
    <!-- Vendor CSS Files -->
    <link href="{!!asset('Asset2/assets/vendor/bootstrap/css/bootstrap.min.css')!!}" rel="stylesheet">
    <link href="{!!asset('Asset2/assets/vendor/bootstrap-icons/bootstrap-icons.css')!!}" rel="stylesheet">
    <link href="{!!asset('Asset2/assets/vendor/aos/aos.css" rel="stylesheet')!!}">
    <link href="{!!asset('Asset2/assets/vendor/glightbox/css/glightbox.min.css')!!}" rel="stylesheet">
    <link href="{!!asset('Asset2/assets/vendor/swiper/swiper-bundle.min.css')!!}" rel="stylesheet">
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{!!asset('assetsMaster/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')!!}"/>
    <link rel="stylesheet" href="{!!asset('assetsMaster/vendor/libs/apex-charts/apex-charts.css')!!}"/>
    <!-- Template Main CSS File -->
    <link href="{!!asset('Asset2/assets/css/main.css')!!}" rel="stylesheet">
    <link href="{!!asset('trap/owl.carousel.min.css')!!}" rel="stylesheet">
    <link href="{!!asset('trap/owl.theme.default.min.css')!!}" rel="stylesheet">
</head>
<body>

    <div class="container">
        <br>
        <a href="{{url('orders')}}" class="btn btn-warning">Back To Orders</a>
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
                    <div class="card-body" style="height: 100%">
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
                            @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <h6>Grand Total:</h6>
                        <h2 class="form-control">Rp.{{$total}}</h2>
                        <label for="">Status Order</label>
                        <form action="{{url('update-order/'.$order->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                        <select class="form-select" name="order_status">
                            <option {{$order->status == '0' ? 'selected' : ''}} value="0">Pending</option>
                            <option {{$order->status == '1' ? 'selected' : ''}} value="1">Complated</option>
                        </select>
                        <br>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                    </div>
                </div>

            </div>
        </div>

</body>
</html>
