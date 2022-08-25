@extends('layout.layout')
@section('title')
Sub Category / Edit
@endsection

@section('contant')

<div class="row">
    <div class="col-6">
        <h3>Sub Category</h3>
    </div>
    <div class="col-6">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html" data-bs-original-title="" title=""> <svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg></a></li>
            <li class="breadcrumb-item">Sub Category</li>
            <li class="breadcrumb-item active"> create Sub Category</li>
        </ol>
    </div>
</div>

<!-- Container-fluid starts-->
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>New Sub Category</h5>
            </div>
            <form class="form theme-form" method="post" action="{{route('subCategory.update',$subCategory->id)}}"
                enctype="multipart/form-data">
                @csrf
                @include('inc.massage')

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">Sub Category Ar <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" id="exampleFormControlInput1" type="text" name="name_ar"
                                    placeholder="name" value="{{$subCategory->sub_category_name_ar }}">
                            </div>
                        </div>
              
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputPassword2">Sub Category En <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" id="exampleInputPassword2" type="text" name="name_en"
                                    placeholder="Sulg" value="{{$subCategory->sub_category_name}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 row">
                                <div class="col-sm-12">
                                    <label class="col-sm-12 col-form-label">Sub Category Image</label>
                                    <input class="form-control" type="file" name="image" data-bs-original-title=""
                                        title="">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3 row">
                                <div class="col-sm-12">
                                    <label class="col-sm-12 col-form-label">Sub Category icon</label>
                                    <input class="form-control" type="file" name="icon" data-bs-original-title=""
                                        title="">
                                </div>
                            </div>                         
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label class="form-label" for="exampleFormControlSelect7">Choose Category</label>
                            <select class="form-select btn-pill digits" name="category" id="exampleFormControlSelect7">
                                @foreach($categories as $category)
                              <option value="{{$category->id}}"    {{$subCategory->category_id == $category->id ?'selected':''}} >{{$category->category_name}}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label class="form-label" for="exampleFormControlSelect8">Choose Main Category</label>
                            <select class="form-select btn-pill digits" name="mainCategory" id="exampleFormControlSelect8">
                            @foreach($mainCategories as $mainCategory)
                              <option value="{{$mainCategory->id}}" {{$subCategory->main_category_id == $mainCategory->id ?'selected':''}}>{{$mainCategory->name}}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                    <div class="form-check form-switch mt-3">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Enable</label>
                        <input class="form-check-input" type="checkbox" name="enable" value="1"
                            id="flexSwitchCheckDefault"
                            {{$subCategory->active?'checked':''}}>
                    </div>
                </div>

                <div class="card-footer text-end">
                    <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Submit</button>
                    <a class="btn btn-light" href="{{route('category')}}" value="Cancel" data-bs-original-title=""
                        title="">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

@endsection


<!--  -->