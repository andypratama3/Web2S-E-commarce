@extends('layouts.nav')
@section('title','Laporan Add')
@section('content')
{{-- insert-category --}}
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="modalCenterTitle">Tambah Laporan</h5>
    </div>
    <div class="modal-body">
    <form action="{{ url('insert-laporan')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="nameWithTitle" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama_laporan">
        </div>
        <div class="col-md-6 mb-3">
            <label for="" class="form-label">Laporan</label>
            <input type="file" class="form-control" name="laporan">
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
</div>

  </div>
@endsection
