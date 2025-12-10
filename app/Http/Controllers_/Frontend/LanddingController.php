<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Master\Banner;
use App\Models\Master\Company;
use App\Models\Master\Customer;
use App\Models\Master\Facility;
use App\Models\Master\Gallery;
use App\Models\Master\Iso;
use App\Models\Master\Line;
use App\Models\Master\PageDetail;
use App\Models\Master\Product;
use Illuminate\Support\Str;

class LanddingController extends Controller
{
    public function index()
    {
        $data['banner'] = Banner::where('status', 1)->orderby('sort', 'asc')->get();
        $data['product'] = Product::where('status', 1)->orderby('sort', 'asc')->get();
        $data['lineMarket'] = Line::where('status', 1)->orderby('sort', 'asc')->get();
        $data['facility'] = Facility::where('status', 1)->orderby('sort', 'asc')->get();
        $data['company'] = Company::where('status', 1)->orderby('sort', 'asc')->first();
        $data['customer'] = Customer::where('status', 1)->orderby('sort', 'asc')->get();
        //  \dd($data);
        return view('frontend.index', $data);
    }

    public function about()
    {
        $data['data'] =  Company::get()->first();
        $data['banner'] = Banner::where('status', 1)->orderby('sort', 'asc')->get();
        $data['iso'] = Iso::where('status', 1)->orderby('sort', 'asc')->get();
        $data['product'] = Product::where('status', 1)->orderby('sort', 'asc')->get();


        return view('frontend.about', $data);
    }

    public function product()
    {
        $data['lineMarket'] = Line::where('status', 1)->orderby('sort', 'asc')->get();
        $data['product'] = Product::where('status', 1)->orderby('sort', 'asc')->get();

          
        $data['facility'] = Facility::where('status', 1)->orderby('sort', 'asc')->get();


        return view('frontend.product', $data);
    }
    public function subproduct()
    {
        $data['PageDetail'] = PageDetail::where('status', 1)->orderby('sort', 'asc')->get();
        $data['subTitle']='subTitle';
        return view('frontend.subproduct', $data);
    }

  public function contact()
    {

        return view('frontend.contact');
    }
   
}
