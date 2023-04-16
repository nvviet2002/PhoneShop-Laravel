@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách thương hiệu
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
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
            <th>Tên mã giảm giá</th>
            <th>Mã giảm giá</th>
            <th>Số lượng giảm giá</th>
            <th>Điều kiện giảm giá</th>
            <th>Số giảm</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ( $coupons as $key => $value)
                <tr>
                    <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                    <td><span class="text-ellipsis">{{$value->coupon_name}}</span></td>
                    <td><span class="text-ellipsis">{{$value->coupon_code}}</span></td>
                    <td><span class="text-ellipsis">{{$value->coupon_time}}</span></td>
                        <?php
                            if($value->coupon_condition == 0){
                        ?>
                            <td><span class="text-ellipsis">Giảm theo %</span></td>
                            <td><span class="text-ellipsis">Giảm {{$value->coupon_number}}%</span></td>
                        <?php
                        }else{
                        ?>
                            <td><span class="text-ellipsis">Giảm theo số tiền</span></td>
                            <td><span class="text-ellipsis">Giảm {{number_format($value->coupon_number).' VND'}}</span></td>
                        <?php
                        }
                        ?>
                        <td>
                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa mã giảm giá này không ?');" href="{{URL::to('/delete-coupon/'.$value->coupon_id)}}" class="active styling-delete" ui-toggle-class="">
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
