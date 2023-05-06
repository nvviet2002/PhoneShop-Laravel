@extends('layouts.layout')
@section('content')
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Sản phẩm mới nhất</h2>
    @foreach ($products as $key => $pro)

    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <form>
                        @csrf
                        <input type="hidden" value="{{$pro->product_id}}"
                        class="cart_product_id_{{$pro->product_id}}" >
                        <input type="hidden" value="{{$pro->product_name}}"
                        class="cart_product_name_{{$pro->product_id}}" >
                        <input type="hidden" value="{{$pro->product_image}}"
                        class="cart_product_image_{{$pro->product_id}}" >
                        <input type="hidden" value="{{$pro->product_price}}"
                        class="cart_product_price_{{$pro->product_id}}" >
                        <input type="hidden" value="1"
                        class="cart_product_qty_{{$pro->product_id}}" >
                        <a href="{{URL::to('/chi-tiet-san-pham/'.$pro->product_id)}}">
                            <img src="{{URL::to('public/upload/product/'.$pro->product_image)}}" alt="" />
                        </a>
                        <h2>{{number_format($pro->product_price).' '.'VND'}}</h2>
                        <p>{{$pro->product_name}}</p>
                        <button type="button" data-id_product="{{$pro->product_id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
                    </form>
                </div>
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                    <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                </ul>
            </div>
        </div>
    </div>

    @endforeach

</div><!--features_items-->

<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">Các sản phẩm bán chạy</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @for ( $i=0;$i<6;$i+3)
                @if ($i == 0)
                    <div class="item active">
                @else
                    <div class="item">
                @endif

                @for ( $j=$i;$j<$i+3;$j++)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <form>
                                        @csrf
                                        <input type="hidden" value="{{$best_products[$j]['product_id']}}"
                                        class="cart_product_id_{{$best_products[$j]['product_id']}}" >
                                        <input type="hidden" value="{{$best_products[$j]['product_name']}}"
                                        class="cart_product_name_{{$best_products[$j]['product_id']}}" >
                                        <input type="hidden" value="{{$best_products[$j]['product_image']}}"
                                        class="cart_product_image_{{$best_products[$j]['product_id']}}" >
                                        <input type="hidden" value="{{$best_products[$j]['product_price']}}"
                                        class="cart_product_price_{{$best_products[$j]['product_id']}}" >
                                        <input type="hidden" value="1"
                                        class="cart_product_qty_{{$best_products[$j]['product_id']}}" >
                                        <a href="{{URL::to('/chi-tiet-san-pham/'.$best_products[$j]['product_id'])}}">
                                            <img src="{{URL::to('public/upload/product/'.$best_products[$j]['product_image'])}}" alt="" />
                                        </a>
                                        <h2>{{number_format($best_products[$j]['product_price']).' '.'VND'}}</h2>
                                        <p>{{$best_products[$j]['product_name']}}</p>
                                        <button type="button" data-id_product="{{$best_products[$j]['product_id']}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
                </div>
            @endfor
            <div class="item active">
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{('public/frontend/images/recommend1.jpg')}}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{('public/frontend/images/recommend1.jpg')}}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{('public/frontend/images/recommend1.jpg')}}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
            </a>
    </div>
</div><!--/recommended_items-->
@endsection
