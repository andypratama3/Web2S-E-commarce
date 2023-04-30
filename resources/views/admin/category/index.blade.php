@extends('layouts.nav')
@section('title','Category')
@section('content')
{{-- Alerts --}}
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
@if(session()->get('status-delete'))
        <div class="bs-toast toast toast-placement-ex m-2 fade bg-danger top-0 end-0 show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
              <i class="bx bx-bell me-2"></i>
              <div class="me-auto fw-semibold">Category</div>
              <small>now</small>
              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{session()->get('status-delete')}}
            </div>
          </div>
          @endif
          @if(session()->get('status-update'))
        <div class="bs-toast toast toast-placement-ex m-2 fade bg-primary top-0 end-0 show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
              <i class="bx bx-bell me-2"></i>
              <div class="me-auto fw-semibold">Category</div>
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
              <div class="me-auto fw-semibold">Category</div>
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
        <h5 class="card-header" style="text-align: center;"><strong> Category</strong>
            <a href="/dashboard"><button type="button"
                    class="btn btn-info"
                    style="float: left">
                Kembali
            </button>
            </a>

            <a href="add-category" class="btn btn-primary" style="float:right;">Tambah</a>
        </h5>

        <div class="table-responsive text-nowrap">

          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
              </tr>
            </thead>
            @php
                $no = 1;
            @endphp
            @foreach ($category as $item)
            <tbody>
              <tr>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$no++}}</strong></td>
                <td><strong>{{$item->name}}</strong></td>
                <td><strong>{{$item->desc}}</strong></td>
                <td>

                    <img src="{{ asset('assets/upload/category/'.$item->image)}}" class="cate-image" alt="" >
                    {{-- <span class="badge {{($item->status_id ==1)? 'bg-label-primary me-1': 'bg-label-danger me-1'}}">{{($item->status_id == 1)? 'Complated' : 'Pending'}}</span> --}}
                </td>
                <td>
                      <a class="btn btn-primary"  href="/category/show{{$item->id}}">Edit</a>
                      <a class="btn btn-danger" style="font-size: 12px;" href="/category/delete{{$item->id}}"><i class="bx bx-trash me-1"></i> Delete</a>
                    </div>
                  </div>
                </td>
              </tr>

            </tbody>
            @endforeach
          </table>
        </div>
    </div>
    <br>
    {{-- <nav aria-label="Page navigation">
        <ul class="pagination">
          <li class="page-item first">
            <a class="page-link" href=""><i class="tf-icon bx bx-chevrons-left"></i></a>
          </li>
          <li class="page-item prev">
            <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-left"></i></a>
          </li>
          <li class="page-item">
            <a class="page-link" href="javascript:void(0);">1</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="javascript:void(0);">2</a>
          </li>
          <li class="page-item active">
            <a class="page-link" href="javascript:void(0);">3</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="javascript:void(0);">4</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="javascript:void(0);">5</a>
          </li>
          <li class="page-item next">
            <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-right"></i></a>
          </li>
          <li class="page-item last">
            <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-right"></i></a>
          </li>
        </ul>
      </nav> --}}
    </div>
</div>
</div>
    <!-- / Layout wrapper -->

@endsection

