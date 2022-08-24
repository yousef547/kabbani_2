@extends('layout.layout')
@section('title')
Create / Product
@endsection

@section('contant')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Product</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html" data-bs-original-title="" title=""> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg></a></li>
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item ">Product</li>
                        <li class="breadcrumb-item active">Create</li>

                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>New Product</h5>
                    </div>
                    <form class="form theme-form" method="post" action="{{route('porducts.submit')}}" enctype="multipart/form-data">
                        @csrf
                        @include('inc.massage')
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Name <span class="text-danger">*</span></label>
                                        <input class="form-control" id="exampleFormControlInput1" type="text" name="name_product" placeholder="name" data-bs-original-title="" title="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputPassword2">Slug <span class="text-danger">*</span></label>
                                        <input class="form-control" id="exampleInputPassword2" type="text" name="slug_product" placeholder="Sulg" data-bs-original-title="" title="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputPassword2">Short Description <span class="text-danger">*</span></label>
                                        <input class="form-control" id="exampleInputPassword2" type="text" name="short_description" placeholder="Short Description" data-bs-original-title="" title="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div>
                                        <label class="form-label" for="exampleFormControlTextarea4">Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea4" name="description_product" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body px-0 " id="parent">

                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlSelect9">select category <span class="text-danger">*</span></label>
                                            <select class="form-select digits" id="exampleFormControlSelect9" name="parent">
                                                <option value="0">Select Parent</option>
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label" for="exampleFormControlTextarea4">Price <span class="text-danger">*</span></label>
                                            <input class="form-control" id="exampleInputPassword2" type="number" name="price_product" placeholder="Price" data-bs-original-title="" title="">

                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label" for="exampleFormControlTextarea4">Old Price </label>
                                            <input class="form-control" id="exampleInputPassword2" type="number" name="old_product" placeholder="Old Price" data-bs-original-title="" title="">

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3 row">
                                            <div class="col-sm-12">
                                                <label class=" col-form-label">Upload Image <span class="text-danger">*</span></label>
                                                <input class="form-control" type="file" name="image_product" data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ms-2">
                                <div class="form-check form-switch mt-3 col-md-4 ">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Enable</label>
                                    <input class="form-check-input" type="checkbox" name="enable" value="1" id="flexSwitchCheckDefault">
                                </div>
                                <div class="form-check form-switch mt-3 col-md-4">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">bestseller</label>
                                    <input class="form-check-input" type="checkbox" name="bestseller_product" value="1" id="flexSwitchCheckDefault">
                                </div>
                                <div class="form-check form-switch mt-3 col-md-4">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">featured</label>
                                    <input class="form-check-input" type="checkbox" name="featured_product" value="1" id="flexSwitchCheckDefault">
                                </div>
                            </div>

                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Submit</button>
                            <a class="btn btn-light" href="{{route('porducts')}}" value="Cancel" data-bs-original-title="" title="">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
@section('script')
<script>
    $('#select_parent').on('change', function() {
        if ($('#select_parent').is(":checked")) {
            $('#parent').removeClass('d-none');
        } else {
            $('#parent').addClass('d-none');

        }
    })
</script>
@endsection
@endsection


<!--  -->