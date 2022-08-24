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
        $subCategoies = subCategories::paginate(10);
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

    public function edit(){
        return view('dashboard.subCategories.edit');
    }

    public function changeStatus($id)
    {
        $subCategory = subCategories::findOrFail($id);
        if(!$subCategory)
        return redirect()->route('subCategory')->with(['error'=>'Sorry, This Sub Category not found']); 
    
        // Change Status
        $status = $subCategory->active == 0 ? 1 : 0 ;
        $subCategory -> update(['active' => $status]);
        return redirect()->route('subCategory')->with(['msg'=>'The Status has been Changed successfully']);

    }
}
