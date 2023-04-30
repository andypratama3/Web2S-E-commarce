

@extends('layouts.user')
@section('title','Product')
@section('content')
{{-- Rate Product --}}
<div class="modal fade" id="modalrate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{url('add-rating')}}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{$product->id}}">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Rate This Product {{$product->name}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="rating-css">
            <div class="star-icon">
                @if ($user_rating)

                @for ($i =1; $i<= $user_rating->stars_rated; $i++)
                <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
                <label for="rating{{$i}}" class="bi bi-star"></label>
                @endfor
                @for ($j= $user_rating->stars_rated+1; $j <= 5; $j++)
                <input type="radio" value="{{$j}}" name="product_rating" id="rating{{$j}}">
                <label for="rating{{$j}}" class="bi bi-star"></label>
                @endfor
                @else
                <input type="radio" value="1" name="product_rating" checked id="rating1">
                <label for="rating1" class="bi bi-star"></label>
                <input type="radio" value="2" name="product_rating" id="rating2">
                <label for="rating2" class="bi bi-star"></label>
                <input type="radio" value="3" name="product_rating" id="rating3">
                <label for="rating3" class="bi bi-star"></label>
                <input type="radio" value="4" name="product_rating" id="rating4">
                <label for="rating4" class="bi bi-star"></label>
                <input type="radio" value="5" name="product_rating" id="rating5">
                <label for="rating5" class="bi bi-star"></label>
                @endif

            </div>
        </div>
    </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Rate</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<br>
        <div class="container">
            <div class="card shadow product_data">
                <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <div class="py-3 mb-4 shadow-sm bg-warning border-top">
                            <div class="container">
                                <h6><a href="{{url('view-category/'.$product->category->slug)}}" class="mb-0">Product / {{$product->category->name}}</a>
                                    <a href="{{url('view-product/'.$product->name)}}">{{$product->name}}</a>
                                </h6>
                            </div>
                        </div>
                        <img src="{!!asset('assets/upload/product/'.$product->image)!!}" class="w-100" alt="">
                    </div>

                    <div class="col-md-8">
                        <br>
                        <h2 class="mb-0">
                            {{$product->name}}
                            @if($product->trending == '1')
                            <label style="font-size: 16px" class="float-end badge bg-primary trending_tag">Trending</label>
                            @endif
                        </h2>
                        <hr>
                        <label class="me-3">Original Price: <s> Rp.{{$product->original_price}}</s></label>
                        <i class="bi bi-arrow-right"></i>
                        <label class="fw-bold">Selling Price: Rp.{{$product->sell_price}}</label>
                        @php $ratenum = number_format($rating_value) @endphp
                        <div class="rating">
                            @for ($i =1; $i<= $ratenum; $i++)
                            <i class="bi bi-star checked"></i>
                            @endfor
                            @for ($j= $ratenum+1; $j <= 5; $j++)
                            <i class="bi bi-star"></i>
                            @endfor
                            <span>
                                @if ($rating->count() > 0)
                                {{$rating->count()}} Ratings
                                @else
                                No Rating
                                @endif
                            </span>
                            {{-- <span>{{$rating->count()}} Rating</span> --}}
                        </div>
                        <p class="mt-3">
                            {!! $product->small_desc !!}
                        </p>
                        <hr>
                        @if($product->qty > 0)
                        <label class="badge bg-success">In Stock : {{$product->qty}} Item</label>
                        @else
                        <label class="badge bg-danger">Out of stock</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <input type="hidden" value="{{$product->id}}" class="prod_id">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3" style="width: 130px;">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity " value="1" class="form-control qty-input text-center">
                                    <button class="input-group-text incerement-btn" style="size: 5px;">+</button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <br>
                                @if ($product->qty > 0)
                                <button type="button" class="btn btn-primary addcart me-3 float-start">Add To Cart <i class="bi bi-cart"></i></button>
                                @endif
                                <button type="button" class="btn btn-success btnwishlist me-3 float-start" >Add To WishList <i class="bi bi-heart"></i></button>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalrate"><span class="bi bi-star"> Rate Product</span></button>
                                  <a href="{{url('add-riview/'.$product->slug.'/userriview')}}" class="btn btn-danger"><span class="bi bi-book"> Riview Product</span></a>
                            </div>

                        </div>
                </div>
                <div class="col-md-12">
                    <hr>
                    <h3>Description</h3>
                    <p class="mt-3">
                        {!! $product->desc !!}
                    </p>
                    <br>
                    <div class="row">
                        <h2 style="text-align: center;">Riview User</h2>
                        <div class="col-md-8">
                        @foreach ($review as $item)
                        <div class="user-riview">
                        <label for="">{{$item->user->name .' '.$item->user->lname}}</label>
                        @if ($item->user_id == Auth::id())
                        <a href="{{url('edit-riview/'.$product->slug.'/userriview')}}">Edit</a>
                        @endif
                        <br>
                        @php
                        $rating = App\Models\Rating::where('prod_id',$product->id)->where('user_id', $item->user->id)->first();
                        @endphp
                        @if($rating)
                            @php $user_rated = $rating->stars_rated @endphp
                            @for ($i =1; $i<= $user_rated; $i++)
                                <i class="bi bi-star checked"></i>
                            @endfor
                            @for ($j= $user_rated+1; $j <= 5; $j++)
                                <i class="bi bi-star"></i>
                            @endfor
                        @endif
                        <small>Riviewed on {{$item->created_at->format('d M Y')}}</small>
                        <p>{{$item->user_riview}}</p>
                    </div>
                        @endforeach
                </div>
            </div>
            <br>
            <br>
        </div>
    <br>
</div>
</div>
</div>
</div>

        <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

            <div id="preloader"></div>

@include('layouts.script')
@endsection


