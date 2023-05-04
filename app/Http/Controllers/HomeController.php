<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Mail;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function index(Request $request){
        $cates = DB::table('tbl_category_product')
        ->join('tbl_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->select('tbl_category_product.category_id','tbl_category_product.category_name', DB::raw('count(*) as product_count'))
        ->groupBy('tbl_category_product.category_id','tbl_category_product.category_name')
        ->orderby('category_name','asc')->get();
        $brands = DB::table('tbl_brand')
        ->join('tbl_product','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->select('tbl_brand.brand_id','tbl_brand.brand_name', DB::raw('count(*) as product_count'))
        ->groupBy('tbl_brand.brand_id','tbl_brand.brand_name')
        ->orderby('brand_name','asc')->get();

        $products = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')
        ->limit(4)->get();
        $slides = DB::table('tbl_slide')->where('slide_status','1')->orderby('slide_id','desc')
        ->limit(3)->get();
        $url_canonical = $request->url();
        return view('pages.home')->with('cates',$cates)->with('brands',$brands)
        ->with('products',$products)->with('slides',$slides)->with('url_canonical',$url_canonical);
    }

    public function search_product(Request $request){
        $cates = DB::table('tbl_category_product')
        ->join('tbl_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->select('tbl_category_product.category_id','tbl_category_product.category_name', DB::raw('count(*) as product_count'))
        ->groupBy('tbl_category_product.category_id','tbl_category_product.category_name')
        ->orderby('category_name','asc')->get();
        $brands = DB::table('tbl_brand')
        ->join('tbl_product','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->select('tbl_brand.brand_id','tbl_brand.brand_name', DB::raw('count(*) as product_count'))
        ->groupBy('tbl_brand.brand_id','tbl_brand.brand_name')
        ->orderby('brand_name','asc')->get();

        $products = DB::table('tbl_product')->where('product_name','like','%'.$request->search_input.'%')
        ->orderby('product_id','desc')->limit(6)->get();
        $slides = DB::table('tbl_slide')->where('slide_status','1')->orderby('slide_id','desc')
        ->limit(3)->get();
        return view('pages.product.search')->with('cates',$cates)->with('brands',$brands)
        ->with('products',$products)->with('slides',$slides);
    }

    public function send_mail(){
        $to_name = 'Viet Nguyen';
        $to_mail = 'nvvietunity3d@gmail.com';

        $data = array('name'=>'Mail từ tài khoản khách hàng','body'=>'đây là nội dung nè');
        Mail::send('pages.send_mail', $data, function ($message) use ($to_mail,$to_name) {
            $message->to($to_mail);
            $message->from($to_mail, $to_name);
            $message->subject('Test gửi mail');
        });

        // return Redirect::to('/')->with('message','');
    }
}
