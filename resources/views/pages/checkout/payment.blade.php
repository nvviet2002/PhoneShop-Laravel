@extends('layout1')
@section('content')
<section id="do_action"> <!--Notify for order-->
    <div class="col-sm-6 clearfix">
        <div class="bill-to">
            <h3>Bạn đã đặt hàng thành công</h3>
            <p>Chúng tôi sẽ liên hệ với bạn sau qua số điện thoại để xác nhận lại đơn hàng</p>
            <a class="btn btn-default cart btn-order-place" href="{{URL::to('/show-cart')}}">
                Tới giỏ hàng của bạn
            </a>
            <a class="btn btn-default cart btn-order-place" href="{{URL::to('/')}}">
                Tiếp tục mua hàng
            </a>
        </div>
    </div>
</section><!--Notify for order-->
@endsection
