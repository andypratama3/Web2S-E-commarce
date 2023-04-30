@extends('layouts.nav')
@section('title','Product Add')
@section('content')
{{-- insert-category --}}
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="modalCenterTitle">Tambah Category</h5>
    </div>
    <div class="modal-body">
    <form action="{{ url('product-insert')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="nameWithTitle" class="form-label">Name</label>
            <select name="cate_id" id="" class="form-select">
                <option value="">Select Category</option>
                @foreach ($category as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label for="nameWithTitle" class="form-label">Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="col-md-6 mb-3">
            <label for="" class="form-label">Slug</label>
            <input type="text" class="form-control" name="slug">
        </div>
        <div class="col-md-6 mb-3">
            <label for="nameWithTitle" class="form-label">Small Desc</label>
            <input type="text" class="form-control" name="small_desc">
        </div>
        <div class="col-md-6 mb-3">
            <label for="nameWithTitle" class="form-label">Desc</label>
            <input type="text" class="form-control" name="desc">
        </div>
        <div class="col-md-6 mb-3">
            <label for="nameWithTitle" class="form-label">Original Price</label>
            <input type="number" class="form-control" name="original_price">
        </div>
        <div class="col-md-6 mb-3">
            <label for="nameWithTitle" class="form-label">Selling Price</label>
            <input type="number" class="form-control" name="sell_price">
        </div>
        <div class="col-md-6 mb-3">
            <label for="nameWithTitle" class="form-label">Quantity</label>
            <input type="number" class="form-control" name="qty">
        </div>
        <div class="col-md-6 mb-3">
            <label for="nameWithTitle" class="form-label">Status</label>
            <input type="checkbox" name="status">
        </div>
        <div class="col-md-6 mb-3">
            <label for="nameWithTitle" class="form-label">Trending</label>
            <input type="checkbox" name="trending">
        </div>
        <div class="col-md-6 mb-3">
            <label for="nameWithTitle" class="form-label">Tax</label>
            <input type="number" class="form-control" name="tax">
        </div>
        <div class="col-md-6 mb-3">
            <label for="nameWithTitle" class="form-label">meta title</label>
            <input type="text" class="form-control" name="meta_title">
        </div>

        <div class="col-md-6 mb-3">
            <label for="nameWithTitle" class="form-label">meta keywords</label>
            <input type="text" class="form-control" name="meta_keywords">
        </div>
        <div class="col-md-6 mb-3">
            <label for="nameWithTitle" class="form-label">meta desc</label>
            <input type="text" class="form-control" name="meta_desc">
        </div>
        <div class="col-md-6 mb-3">
            <label for="nameWithTitle" class="form-label">Image</label>
            <input type="file" class="form-control" name="image">
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
</div>

  </div>
@endsection
