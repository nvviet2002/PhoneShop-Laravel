@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách đơn hàng
    </div>
    <?php
        $msg = Session::get('message');
        if($msg){
            echo '<span class="text-alert-success">'.$msg.'</span>';
            Session::put('message',null);
        }
    ?>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Mã đơn hàng</th>
            <th>Tên người đặt</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
            {{-- <th>Thương hiệu</th>
            <th>Nội dung</th>
            <th>Mô tả</th>
            <th>Hiển thị</th> --}}
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ( $all_order as $key => $order)
                <tr>
                    <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                    <td>{{ $order->order_id }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->order_total }}</td>
                    <td>{{ $order->order_status }}</td>
                    {{-- <td><span class="text-ellipsis">
                        <?php
                            if($order->order_status == 0){
                        ?>
                            <a href="{{URL::to('/active-order/'.$order->order_id)}}">
                            <i class="fa-thumbs-down-styling fa fa-thumbs-down"></i></a>;
                        <?php
                            }else {
                        ?>
                            <a href="{{URL::to('/unactive-order/'.$order->order_id)}}">
                            <i class="fa-thumbs-up-styling fa fa-thumbs-up"></i></a>;
                        <?php
                            }
                        ?>
                    </span></td> --}}
                    <td>
                    <a href="{{URL::to('/edit-order/'.$order->order_id)}}" class="active styling-edit" ui-toggle-class="">
                        <i class="fa fa-pencil-square-o text-success text-active"></i>
                    </a>
                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không ?');" href="{{URL::to('/delete-order/'.$order->order_id)}}" class="active styling-delete" ui-toggle-class="">
                        <i class="fa fa-times text-danger text"></i>
                    </a>
                    </td>
                </tr>
            @endforeach


        </tbody>
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
