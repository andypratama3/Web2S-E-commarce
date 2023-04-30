@extends('layouts.nav')
@section('title','Edit Category')
@section('content')
{{-- insert-category --}}
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="modalCenterTitle">Tambah Category</h5>
    </div>
    <div class="modal-body">
    <form action="{{ url('update-category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="nameWithTitle" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{$category->name}}">
        </div>
        <div class="col-md-6 mb-3">
            <label for="" class="form-label">Slug</label>
            <input type="text" class="form-control" name="slug" value="{{$category->slug}}">
        </div>
        <div class="col-md-6 mb-3">
            <label for="nameWithTitle" class="form-label">Description</label>
            <input type="text" class="form-control" name="desc" value="{{$category->desc}}">
        </div>
        <div class="col-md-6 mb-3">
            <label for="nameWithTitle" class="form-label">meta title</label>
            <input type="text" class="form-control" name="meta_title" value="{{$category->meta_title}}">
        </div>
        <div class="col-md-6 mb-3">
            <label for="nameWithTitle" class="form-label">popular</label>
            <input type="checkbox" name="popular" {{$category->popular == "1" ? 'checked' : ''}}>
        </div>
        <div class="col-md-6 mb-3">
            <label for="nameWithTitle" class="form-label">Status</label>
            <input type="checkbox" name="status" {{$category->status == "1" ? 'checked': ''}}>
        </div>

        <div class="col-md-6 mb-3">
            <label for="nameWithTitle" class="form-label">meta keywords</label>
            <input type="text" class="form-control" name="meta_keywords" value="{{$category->meta_keywords}}">
        </div>
        <div class="col-md-6 mb-3">
            <label for="nameWithTitle" class="form-label">meta desc</label>
            <input type="text" class="form-control" name="meta_desc" value="{{$category->meta_desc}}">
        </div>
        @if($category->image)
        <img src="{{asset('assets/upload/category/'.$category->image)}}" class="cate-image" alt="Category image">
        @endif
        <div class="col-md-6 mb-3">
            <label for="nameWithTitle" class="form-label">File</label>
            <input type="file" class="form-control" name="image" value="{{$category->image}}">
        </div>
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
</div>

  </div>
@endsection
