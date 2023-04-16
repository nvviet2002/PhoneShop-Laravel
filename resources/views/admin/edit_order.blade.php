@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thông tin người mua
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên người đặt</th>
            <th>Số điện thoại</th>
          </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$order[0]->customer_name}}</td>
                <td>{{$order[0]->customer_phone}}</td>
            </tr>
        </tbody>
      </table>
    </div>
    <div class="panel-heading">
        Thông tin vận chuyển
      </div>
       <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th>Tên người vận chuyển</th>
              <th>Địa chỉ</th>
              <th>Số điện thoại</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                  <td>{{$order[0]->shipping_name}}</td>
                  <td>{{$order[0]->shipping_address}}</td>
                  <td>{{$order[0]->shipping_phone}}</td>
              </tr>
          </tbody>
        </table>
      </div>
      <div class="panel-heading">
        Chi tiết đơn hàng
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>Mã sản phẩm</th>
              <th>Tên sản phẩm</th>
              <th>Giá</th>
              <th>Số lượng</th>
              <th>Tổng</th>
            </tr>
          </thead>
          <tbody>
            @foreach ( $order as $key => $order_d)
                <tr>
                    <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                    <td>{{ $order_d->product_id }}</td>
                    <td>{{ $order_d->product_name }}</td>
                    <td>{{ $order_d->product_price }}</td>
                    <td>{{ $order_d->product_sales_quantity}}</td>
                    <td>{{ $order_d->product_sales_quantity * $order_d->product_price}}</td>
                </tr>
            @endforeach
          </tbody>
          <tfoot>
                <tr class="info">
                    <td colspan="5" class="text-right">Tổng tiền:</td>
                    <td>{{$order[0]->order_total}}</td>
                </tr>
          </tfoot>

        </table>
      </div>
    <footer class="panel-footer">
      <div class="row">

        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection
