<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\productRequest;
use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class productController extends Controller
{
    public function index(){
        $products = product::paginate(10);
        return view('dashboard.products.index',compact('products'));
    }
    public function create(){
        $categories = category::get();
        return view('dashboard.products.create',compact('categories'));
    }
    public function submit(productRequest $request){
        if($request->price_product > $request->old_product) {
            return back()->with('error', 'price > old price');
        }
        if($request->image_product == null) {
            return back()->with('error', 'image required');
        }
        $path_img = Storage::putFile('product', $request->file('image_product'));
        $arr = [
            "name"=>$request->name_product,
            "slug"=>$request->slug_product,
            "description"=>$request->description_product,
            "short_description"=>$request->short_description,
            "active"=>$request->enable,
            "image"=>$path_img,
            "old_price"=>$request->old_product,
            "price"=>$request->price_product,
            "bestseller"=>$request->bestseller_product,
            "category_id"=>$request->parent,
            "featured"=>$request->featured_product,
        ];
        product::create($arr);
        return redirect()->route('porducts')->with("msg", "Successed");
    }
    public function edit($id) {
        $categories = category::get();

        return view('dashboard.products.edit',compact('categories'));
    }
}
