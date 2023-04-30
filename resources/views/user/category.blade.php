
@extends('layouts.user')
@section('title','Category Product')
@section('content')
    <section id="produk" class="portfolio sections-bg">
        <div class="section-header">
            <div class="container position-relative">

                <h2 class="">
                    <a href="/" class="btn btn-warning float-left">Back Home</a>
                    {{$category->name}}
                </h2>
                <div class="row gy-4 portfolio-container">
                    @foreach ($product as $pro)
                    <div class="col-xl-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <a href="{!!asset('assets/upload/product/'.$pro->image)!!}"
                                data-gallery="portfolio-gallery-app" class="glightbox">
                                <img src="{!!asset('assets/upload/product/'.$pro->image)!!}" class="img-fluid" alt="">
                            </a>
                            <div class="portfolio-info">
                                <a class="text-black" href="{{url('view-product/'.$category->slug.'/'.$pro->slug)}}"><h5>{{$pro->name}}</h5>

                                <span class="float-start"><s>Rp.{{$pro->original_price}}</s></span>
                                <i class="text-center bi bi-arrow-right"></i>
                                <span class="float-end">Rp.{{$pro->sell_price}}</span>
                                <br>
                                <h6><strong>{{$pro->desc}}</strong></h6>
                            </div>
                            <a href="{{url('view-product/'.$pro->name)}}" class="btn btn-primary">Buy Now!</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</body>
<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

@include('layouts.script')
@endsection
