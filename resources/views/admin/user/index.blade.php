@extends('layouts.nav')
@section('title','User')
@section('content')
{{-- Session flash --}}
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        @if(session()->get('status-delete'))
        <div class="bs-toast toast toast-placement-ex m-2 fade bg-danger top-0 end-0 show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
              <i class="bx bx-bell me-2"></i>
              <div class="me-auto fw-semibold">Product</div>
              <small>now</small>
              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{session()->get('status-delete')}}
            </div>
          </div>
          @endif
          @if(session()->get('status-update'))
        <div class="bs-toast toast toast-placement-ex m-2 fade bg-success top-0 end-0 show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
              <i class="bx bx-bell me-2"></i>
              <div class="me-auto fw-semibold">Orders</div>
              <small>now</small>
              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{session()->get('status-update')}}
            </div>
          </div>
          @endif

        @if(session()->get('status-insert'))
        <div class="bs-toast toast toast-placement-ex m-2 fade bg-success top-0 end-0 show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
              <i class="bx bx-bell me-2"></i>
              <div class="me-auto fw-semibold">Product</div>
              <small>now</small>
              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{session()->get('status-insert')}}
            </div>
          </div>
          @endif
{{-- Content --}}


<div class="card">
    <h5 class="card-header" style="text-align: center;"><strong>User</strong>
        <a href="/dashboard"><button type="button"
                class="btn btn-info"
                style="float: left">
            Kembali
        </button>
        </a>

        <a href="add-user" class="btn btn-primary" style="float:right;">Tambah</a>
    </h5>
    <div class="table-responsive text-nowrap">

        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Email</th>
              <th>Email Verefied</th>
              <th>Role</th>
              <th>Actions</th>
            </tr>
          </thead>
          @php
              $no = 1;
          @endphp
          @foreach ($user as $item)
          <tbody>
            <tr>
              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$no++}}</strong></td>
              <td><strong>{{$item->name.' '.$item->lname}}</strong></td>
              <td><strong>{{$item->email}}</strong></td>
              <td><strong>{{$item->email_verified_at}}</strong></td>
              <td><strong>{{$item->role_as == '1' ? 'Admin' : 'user'}}</strong></td>
              <td>
                    <a class="btn btn-primary" style="font-size: 12px;" href="{{url('view-user/'.$item->id)}}"><i class="bx bx-user me-1"></i>View</a>
                  </div>
                </div>
              </td>
            </tr>

          </tbody>
          @endforeach
        </table>
      </div>


</div>
@endsection
