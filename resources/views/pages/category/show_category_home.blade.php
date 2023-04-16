@extends('layout')
@section('content')
<div class="fb-share-button" data-href="http://localhost/shopdienthoai" data-layout="" data-size=""><a target="_blank"
    href="https://www.facebook.com/sharer/sharer.php?u={{$url_canonical}}&amp;src=sdkpreparse"
    class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
<div class="fb-like" data-href="{{$url_canonical}}" data-width=""
    data-layout="" data-action="" data-size="" data-share="false"></div>
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">{{$category_name}}</h2>
    @foreach ($products as $key => $pro)
    <a href="{{URL::to('/chi-tiet-san-pham/'.$pro->product_id)}}">
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{URL::to('public/upload/product/'.$pro->product_image)}}" alt="" />
                        <h2>{{number_format($pro->product_price).' '.'VND'}}</h2>
                        <p>{{$pro->product_name}}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
    </a>
    @endforeach

</div><!--features_items-->
<div class="fb-comments" data-href="{{$url_canonical}}" data-width="" data-numposts="7"></div>
<div class="fb-page" data-href="{{$url_canonical}}" data-tabs="timeline" data-width="" data-height="" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div>
@endsection
