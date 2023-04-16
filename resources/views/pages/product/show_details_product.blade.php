@extends('layout')
@section('content')
@foreach ($detail_product as $key => $detail_pro)
<div class="product-details"><!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
            <img src="{{URL::to('public/upload/product/'.$detail_pro->product_image)}}" alt="" />
            <h3>ZOOM</h3>
        </div>
        <div id="similar-product" class="carousel slide" data-ride="carousel">

              <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                      <a href=""><img src="{{URL::to('public/frontend/images/similar1.jpg')}}" alt=""></a>
                      <a href=""><img src="{{URL::to('public/frontend/images/similar2.jpg')}}" alt=""></a>
                      <a href=""><img src="{{URL::to('public/frontend/images/similar3.jpg')}}" alt=""></a>
                    </div>
                    <div class="item">
                      <a href=""><img src="{{URL::to('public/frontend/images/similar1.jpg')}}" alt=""></a>
                      <a href=""><img src="{{URL::to('public/frontend/images/similar2.jpg')}}" alt=""></a>
                      <a href=""><img src="{{URL::to('public/frontend/images/similar3.jpg')}}" alt=""></a>
                    </div>
                    <div class="item">
                      <a href=""><img src="{{URL::to('public/frontend/images/similar1.jpg')}}" alt=""></a>
                      <a href=""><img src="{{URL::to('public/frontend/images/similar2.jpg')}}" alt=""></a>
                      <a href=""><img src="{{URL::to('public/frontend/images/similar3.jpg')}}" alt=""></a>
                    </div>

                </div>

              <!-- Controls -->
              <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
              </a>
              <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
              </a>
        </div>

    </div>
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
            <h2>{{$detail_pro->product_name}}</h2>
            <p>Mã: {{$detail_pro->product_id}}</p>
            <img src="{{URL::to('public/frontend/images/rating.png')}}" alt="" />
            <form role="form" action="{{URL::to('/save-cart')}}" method="post">
                {{ csrf_field() }}
                <span>
                    <span>{{number_format($detail_pro->product_price).' VND'}}</span>
                    <label>Quantity:</label>
                    <input type="number" name="quantity" min="1" value="1" />
                    <input type="hidden" name="product_id_hidden" value="{{$detail_pro->product_id}}" />
                    <button type="submit" class="btn btn-fefault cart">
                        <i class="fa fa-shopping-cart"></i>
                        Thêm vào giỏ hàng
                    </button>
                </span>
            </form>
            <p><b>Tình trạng:</b> Còn hàng</p>
            <p><b>Điều kiện:</b> Mới 100%</p>
            <p><b>Thương hiệu:</b> {{$detail_pro->brand_name}}</p>
            <p><b>Danh mục:</b> {{$detail_pro->category_name}}</p>
            <a href=""><img src="{{URL::to('public/frontend/images/share.png')}}" class="share img-responsive"  alt="" /></a>
        </div><!--/product-information-->
    </div>
</div><!--/product-details-->


<div class="category-tab shop-details-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#details" data-toggle="tab">Mô tả</a></li>
            <li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>
            <li><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="details" >
            <div class="col-sm-3">
                <p>{{$detail_pro->product_content}}</p>
            </div>
        </div>
        <div class="tab-pane fade" id="companyprofile" >
            <div class="col-sm-3">
                <p>{{$detail_pro->product_desc}}</p>
            </div>
        </div>

        <div class="tab-pane fade" id="reviews" >
            <div class="col-sm-12">
                <ul>
                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                <p><b>Write Your Review</b></p>

                <form action="#">
                    <span>
                        <input type="text" placeholder="Your Name"/>
                        <input type="email" placeholder="Email Address"/>
                    </span>
                    <textarea name="" ></textarea>
                    <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                    <button type="button" class="btn btn-default pull-right">
                        Submit
                    </button>
                </form>
            </div>
        </div>

    </div>
</div><!--/category-tab-->
@endforeach
<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">Sản phẩm gợi ý</h2>
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
                @foreach ($related_pros as $key => $value)
                    <a href="{{URL::to('/chi-tiet-san-pham/'.$value->product_id)}}">
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{URL::to('public/upload/product/'.$value->product_image)}}" alt="" />
                                        <h2>{{number_format($value->product_price).' VND'}}</h2>
                                        <p>{{$value->product_name}}</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
            <div class="item">

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
