<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\subCategories;
use App\Models\MainCategory;
use App\Http\Requests\subCategoryRequest;
use App\Models\category;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class subCategoriesController extends Controller
{
    public function index(){
        $subCategoies = subCategories::orderBy('id', 'desc')->paginate(10);
        return view('dashboard.subCategories.index',compact("subCategoies"));
    }

    public function create(){
        $categories = category::get();
        $mainCategories = MainCategory::get();
        return view('dashboard.subCategories.create',compact("categories","mainCategories"));
        
    }

    public function submit(subCategoryRequest $request){
        if($request->file('image') != null){
            $path_img = Storage::putFile('/kabbani/assets/images/subCategories', $request->file('image'));

        }else{
            $path_img = '/kabbani/assets/images/categories/null.png';
        }

        if($request->file('icon') != null){
            $path_icon = Storage::putFile('/kabbani/assets/images/subCategories', $request->file('icon'));

        }else{
            $path_icon = '/kabbani/assets/images/categories/null.png';
        }
        $arr = [
            "sub_category_name_ar" => $request->name_ar,
            "sub_category_name" => $request->name_en,
            "photo" => $path_img,
            "icon" => $path_icon,
            "main_category_id" => $request->mainCategory,
            "category_id" => $request->category,
            "active" => $request->enable,
        ];
        subCategories::create($arr);
        return redirect()->route('subCategory')->with("msg", "Successed");

    }

    public function edit($id){
        $categories = category::get();
        $mainCategories = MainCategory::get();
        $subCategory = subCategories::findOrFail($id);

        if(!$subCategory)
        return redirect()->route('subCategory')->with(['error'=>'Sorry, This Sub Category not found']); 

        return view('dashboard.subCategories.edit',compact("subCategory","categories","mainCategories"));
    }

    public function update($id,subCategoryRequest $request){
        $subCategory = subCategories::findOrFail($id);

        if(!$subCategory)
        return redirect()->route('subCategory')->with(['error'=>'Sorry, This Sub Category not found']);


        if($request->file('image') != null){
            if($subCategory->photo != "/kabbani/assets/images/categories/null.png") {
                Storage::delete($subCategory->photo);
            }
            $path_img = Storage::putFile('/kabbani/assets/images/subCategories', $request->file('image'));

        }else{
            $path_img = $subCategory->photo;
        }

        if($request->file('icon') != null){
            if($subCategory->photo != "/kabbani/assets/images/categories/null.png") {
                Storage::delete($subCategory->icon);
            }
            $path_icon = Storage::putFile('/kabbani/assets/images/subCategories', $request->file('icon'));
        }else{
            $path_icon = $subCategory->icon;
        }
        $arr = [
            "sub_category_name_ar" => $request->name_ar,
            "sub_category_name" => $request->name_en,
            "photo" => $path_img,
            "icon" => $path_icon,
            "main_category_id" => $request->mainCategory,
            "category_id" => $request->category,
            "active" => $request->enable,
        ];
        $subCategory->update($arr);
        return redirect()->route('subCategory')->with("msg", "Successed");

    }

    public function changeStatus($id)
    {
        $subCategory = subCategories::findOrFail($id);
        if(!$subCategory)
        return redirect()->route('subCategory')->with(['error'=>'Sorry, This Sub Category not found']); 
    
        // Change Status
        $status = $subCategory->active == 0 ? 1 : 0 ;
        $subCategory -> update(['active' => $status]);
        return back()->with(['msg'=>'The Status has been Changed successfully']);
    }

    public function delete($id)
    {
        $subCate = subCategories::findOrFail($id);
        if (!$subCate) {
            return back()->with('error', 'this id not found');
        }
        if($subCate->photo != "/kabbani/assets/images/categories/null.png") {
            Storage::delete($subCate->photo);
        }
        if($subCate->icon != "/kabbani/assets/images/categories/null.png") {
            Storage::delete($subCate->icon);
        }
        $subCate->delete();
        return back()->with("msg", "Successed");

    }
}
