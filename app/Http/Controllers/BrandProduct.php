<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class BrandProduct extends Controller
{
    public function add_brand_product(){
        AdminController::AuthAdmin();
        return view('admin.add_brand_product');
    }

    public function edit_brand_product($brand_product_id){
        AdminController::AuthAdmin();
        // $edit_brand_product =  DB::table('tbl_brand')->where('brand_id',$brand_product_id)
        // ->get();
        $edit_brand_product = Brand::find($brand_product_id);
        $manager_brand_product = view('admin.edit_brand_product')
        ->with('edit_brand_product',$edit_brand_product);
        //return view('admin_layout')->with('admin.all_brand_product',$manager_brand_product);
        return $manager_brand_product;
    }

    public function all_brand_product(){
        AdminController::AuthAdmin();
        // $all_brand_product =  DB::table('tbl_brand')->get();
        // $all_brand_product = Brand::all();
        $all_brand_product = Brand::orderBy('brand_id','DESC')->take(10)->get();
        // $all_brand_product = Brand::orderBy('brand_id','DESC')->paginate(10);
        $manager_brand_product = view('admin.all_brand_product')
        ->with('all_brand_product',$all_brand_product);
        //return view('admin_layout')->with('admin.all_brand_product',$manager_brand_product);
        return $manager_brand_product;
    }

    public function active_brand_product($brand_product_id){
        AdminController::AuthAdmin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)
        ->update(['brand_status'=>1]);
        Session::put('message','Bạn đã hiển thị thành công thương hiệu');
        return Redirect::to('/all-brand-product');
    }

    public function unactive_brand_product($brand_product_id){
        AdminController::AuthAdmin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)
        ->update(['brand_status'=>0]);
        Session::put('message','Bạn đã ẩn thành công thương hiệu');
        return Redirect::to('/all-brand-product');
    }

    public function save_brand_product(Request $request){
        AdminController::AuthAdmin();
        // $data = array();
        // $data['brand_name'] = $request->brand_product_name;
        // $data['brand_desc'] = $request->brand_product_desc;
        // $data['brand_status'] = $request->brand_product_status;
        // DB::table('tbl_brand')->insert($data);

        $data = $request->all();

        $save_data = new Brand();
        $save_data->brand_name = $data['brand_product_name'];
        $save_data->brand_desc = $data['brand_product_desc'];
        $save_data->brand_status = $data['brand_product_status'];
        $save_data->save();
        Session::put('message','Bạn đã thêm thương hiệu thành công');
        return Redirect::to('/add-brand-product');
    }

    public function update_brand_product(Request $request, $brand_product_id){
        AdminController::AuthAdmin();
        // $data = array();
        // $data['brand_name'] = $request->brand_product_name;
        // $data['brand_desc'] = $request->brand_product_desc;
        // DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update($data);

        $data = $request->all();

        $save_data = Brand::find($brand_product_id);
        $save_data->brand_name = $data['brand_product_name'];
        $save_data->brand_desc = $data['brand_product_desc'];
        $save_data->save();
        Session::put('message','Bạn đã cập nhật thương hiệu thành công');
        return Redirect::to('/all-brand-product');
    }

    public function delete_brand_product($brand_product_id){
        AdminController::AuthAdmin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->delete();
        Session::put('message','Bạn đã xóa thương hiệu thành công');
        return Redirect::to('/all-brand-product');
    }

    // front end
    public function show_brand_home($brand_product_id){
        $cates = DB::table('tbl_category_product')->orderby('category_name','desc')->get();
        $brands = DB::table('tbl_brand')->orderby('brand_name','desc')->get();
        $products = DB::table('tbl_product')
        ->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')
        ->where('tbl_product.brand_id',$brand_product_id)->orderby('product_id','desc')->get();
        $brand_name ='';
        foreach($brands as $key => $brand){
            if($brand->brand_id == $brand_product_id){
                $brand_name = $brand->brand_name;
                break;
            }
        }
        return view('pages.brand.show_brand_home')->with('cates',$cates)->with('brands',$brands)
        ->with('products',$products)->with('brand_name',$brand_name);
    }
}
