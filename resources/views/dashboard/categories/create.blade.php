@extends('layout.layout')
@section('title')
Home
@endsection

@section('contant')

<div class="row">
    <div class="col-6">
        <h3>Categories</h3>
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
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Categories</li>
        </ol>
    </div>
</div>

<!-- Container-fluid starts-->
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>New category</h5>
            </div>
            <form class="form theme-form" method="post" action="{{route('category.submit')}}"
                enctype="multipart/form-data">
                @csrf
                @include('inc.massage')

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">Name Ar <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" id="exampleFormControlInput1" type="text" name="name_ar"
                                    placeholder="name" data-bs-original-title="" title="">
                            </div>
                        </div>
                   
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputPassword2">Name En <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" id="exampleInputPassword2" type="text" name="name_en"
                                    placeholder="Sulg" data-bs-original-title="" title="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3 row">
                                <div class="col-sm-9">
                                    <label class="col-sm-3 col-form-label">Upload File</label>
                                    <input class="form-control" type="file" name="image" data-bs-original-title=""
                                        title="">
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="form-check form-switch mt-3">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Enable</label>
                        <input class="form-check-input" type="checkbox" name="enable" value="1"
                            id="flexSwitchCheckDefault">
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
@section('script')
<script>

</script>
@endsection
@endsection


<!--  -->