@include('layouts.user')
    <br>
    <div class="container py-2">
        <div class="row">
        <div class="card shadow">
                <div class="col-md-12">
                    <div class="card-header bg-primary">
                        <a href="{{url('/')}}" class="float-start btn btn-warning">Back</a>
                        <h2 class="text-center text-dark">My Orders</h2>
                    </div>
                    <br>
                    <div class="card-body">
                        <table class="table table-bordered col-md-12">
                            <thead>
                                <tr class="text-center">
                                    <th>Tracking Number</th>
                                    <th>Total Price</th>
                                    <th>Payment Mode</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order as $item)
                                <tr class="text-center">
                                    <td>{{$item->tracking_no}}</td>
                                    <td>{{$item->total_price}}</td>
                                    <td>{{$item->payment_mode}}</td>
                                    <td>
                                        <span class="badge {{($item->status ==1)? 'bg-label-primary me-1': 'bg-label-danger me-1'}}">{{($item->status == 1)? 'Complated' : 'Pending'}}</span>
                                    </td>
                                    <td>
                                        <a href="{{url('view-order/'.$item->id)}}" class="btn btn-primary">View</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br>

                </div>
        </div>
                </div>
        </div>
    </div>


@include('layouts.script')
