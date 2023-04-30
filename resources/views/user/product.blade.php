
@extends('layouts.user')
@section('title','Product')
@section('content')
<section id="produk" class="portfolio sections-bg">
            <div class="section-header">
                <div class="container position-relative">
            <h2>Product</h2>
        </div>
            <div class="row gy-4 portfolio-container">
                @foreach ($product as $pro)
                <div class="col-xl-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <a href="{!!asset('assets/upload/product/'.$pro->image)!!}"
                            data-gallery="portfolio-gallery-app" class="glightbox">
                            <img
                                src="{!!asset('assets/upload/product/'.$pro->image)!!}" class="img-fluid"
                                alt="">
                            </a>
                        <div class="portfolio-info">
                            <h2 style="font-size: 15px;" title="More Details">{{$pro->category->name}}</a></h2>

                            <h1 style="font-size: 20px"><a class="form-control" href="{{url('view-product/'.$pro->name)}}"><strong>{{$pro->name}}</strong></a></h1>
                            <h6>{{$pro->desc}}</h6>
                            <span class="float-end">Rp.{{$pro->original_price}}</span>
                                    <center>
                                    <span><i class="bi bi-arrow-right"></i></span>
                                    <span class="float-start"><s>Rp.{{$pro->sell_price}}</s></span>
                                </center>
                        </div>
                        <a class="form-control btn btn-primary" href="{{url('view-product/'.$pro->name)}}">Buy Now!</a>
                    </div>
                </div><!-- End Portfolio Item -->
                @endforeach
            </div><!-- End Portfolio Container -->

        </div>

    </div>
</section><!-- End Portfolio Section -->
<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
    class="bi bi-arrow-up-short"></i></a>
<div id="preloader"></div>

<!-- Vendor JS Files -->
@include('layouts.script')
@endsection

