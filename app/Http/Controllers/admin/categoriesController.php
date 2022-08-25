<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\categoryRequest;
use App\Models\category;
use App\Models\subCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class categoriesController extends Controller
{
    public function index()
    {
        $categories = category::orderBy('id', 'desc')->paginate(10);
        // dd($categories);
        return view('dashboard.categories.index', compact('categories'));
    }

    
    public function create()
    {
        $categories = category::get();

        return view('dashboard.categories.create', compact('categories'));
    }
    public function submit(categoryRequest $request)
    {
        if($request->file('image') != null){
            $path_img = Storage::putFile('/kabbani/assets/images/categories', $request->file('image'));

        }else{
            $path_img = '/kabbani/assets/images/categories/null.png';
        }
        $arr = [
            "category_name_ar" => $request->name_ar,
            "category_name" => $request->name_en,
            "photo" => $path_img,
            "active" => $request->enable,
            "main_category_id"=>1,
        ];
        category::create($arr);
        return redirect()->route('category')->with("msg", "Successed");
    }
    public function edit($id)
    {

            $categories = category::find($id);
            if (!$categories) {
                return back()->with('error', 'this id not found');
            }

        return view('dashboard.categories.edit', compact('categories'));
    }

    public function update($id, categoryRequest $request)
    {
        $categories = category::find($id);
        if (!$categories) {
            return back()->with('error', 'this id not found');
        }
        // dd($request->all());
        if($request->file('image') != null){
            Storage::delete($categories->photo);
            $path_img = Storage::putFile('/kabbani/assets/images/categories/', $request->file('image'));

        }else{
            $path_img = $categories->photo;
        }
        
        $arr = [
            "category_name_ar" => $request->name_ar,
            "category_name" => $request->name_en,
            "photo" => $path_img,
            "active" => $request->enable,
            "main_category_id"=>1,
        ];
        $categories->update($arr);

        return redirect()->route('category')->with("msg", "Successed");

    }
    public function delete($id)
    {
        $cate = category::find($id);
        if (!$cate) {
            return back()->with('error', 'this id not found');
        }
        if($cate->photo != "/kabbani/assets/images/categories/null.png") {
            Storage::delete($cate->photo);
        }
        $cate->delete();
        return redirect()->route('category')->with("msg", "Successed");

    }

    public function changeStatus($id)
    {
        $subCategory = category::findOrFail($id);
        if(!$subCategory)
        return redirect()->route('category')->with(['error'=>'Sorry, This Sub Category not found']); 
    
        // Change Status
        $status = $subCategory->active == 0 ? 1 : 0 ;
        $subCategory -> update(['active' => $status]);
        return redirect()->route('category')->with(['msg'=>'The Status has been Changed successfully']);

    }
}
