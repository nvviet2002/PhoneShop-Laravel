<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class CategoryProduct extends Controller
{
    public function add_category_product(){
        AdminController::AuthAdmin();
        return view('admin.add_category_product');
    }

    public function edit_category_product($category_product_id){
        AdminController::AuthAdmin();
        $edit_category_product =  DB::table('tbl_category_product')->where('category_id',$category_product_id)
        ->get();
        $manager_category_product = view('admin.edit_category_product')
        ->with('edit_category_product',$edit_category_product);
        //return view('admin_layout')->with('admin.all_category_product',$manager_category_product);
        return $manager_category_product;
    }

    public function all_category_product(){
        AdminController::AuthAdmin();
        $all_category_product =  DB::table('tbl_category_product')->get();
        $manager_category_product = view('admin.all_category_product')
        ->with('all_category_product',$all_category_product);
        //return view('admin_layout')->with('admin.all_category_product',$manager_category_product);
        return $manager_category_product;
    }

    public function active_category_product($category_product_id){
        AdminController::AuthAdmin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)
        ->update(['category_status'=>1]);
        Session::put('message','Bạn đã hiển thị thành công sản phẩm');
        return Redirect::to('/all-category-product');
    }

    public function unactive_category_product($category_product_id){
        AdminController::AuthAdmin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)
        ->update(['category_status'=>0]);
        Session::put('message','Bạn đã ẩn thành công sản phẩm');
        return Redirect::to('/all-category-product');
    }

    public function save_category_product(Request $request){
        AdminController::AuthAdmin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;
        DB::table('tbl_category_product')->insert($data);
        Session::put('message','Bạn đã thêm danh mục thành công');
        return Redirect::to('/add-category-product');
    }

    public function update_category_product(Request $request, $category_product_id){
        AdminController::AuthAdmin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
        Session::put('message','Bạn đã cập nhật danh mục thành công');
        return Redirect::to('/all-category-product');
    }

    public function delete_category_product($category_product_id){
        AdminController::AuthAdmin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
        Session::put('message','Bạn đã xóa danh mục thành công');
        return Redirect::to('/all-category-product');
    }

    // front end

    public function show_category_home($category_product_id,Request $request){
        $cates = DB::table('tbl_category_product')->orderby('category_name','desc')->get();
        $brands = DB::table('tbl_brand')->orderby('brand_name','desc')->get();
        $products = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->where('tbl_product.category_id',$category_product_id)->orderby('product_id','desc')->get();
        $category_name ='';
        foreach($cates as $key => $cate){
            if($cate->category_id == $category_product_id){
                $category_name = $cate->category_name;
                break;
            }
        }
        $url_canonical = $request->url();
        return view('pages.category.show_category_home')->with('cates',$cates)->with('brands',$brands)
        ->with('products',$products)->with('category_name',$category_name)->with('url_canonical',$url_canonical);
    }
}
