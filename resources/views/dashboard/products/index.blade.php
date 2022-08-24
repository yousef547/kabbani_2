@extends('layout.layout')
@section('title')
Products
@endsection
@section('style')
<style>
    #export-button_filter {
        display: none;
    }

    #export-button_wrapper .dt-buttons {
        margin-bottom: 15px;
    }
</style>
@endsection
@section('contant')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Products</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html" data-bs-original-title="" title=""> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg></a></li>
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Categories</li>
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
                    <div class="card-header ">
                        <div class="row">
                            <div class="col-md-10">
                                <h5>Addons Product</h5>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-pill btn-light-gradien txt-dark" href="{{route('porducts.create')}}" title="" data-bs-original-title="create new product" data-original-title="btn btn-pill btn-light-gradien txt-dark">Create</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="dt-ext table-responsive">
                            <div id="export-button_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <table class="display dataTable" id="export-button" role="grid" aria-describedby="export-button_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="export-button" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 150.425px;">image</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="export-button" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 171.288px;">Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="export-button" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 128.2px;">price</th>
                                            <th class="sorting" tabindex="0" aria-controls="export-button" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 57.225px;">Main Category</th>
                                            <th class="sorting" tabindex="0" aria-controls="export-button" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 116.275px;">Enable</th>
                                            <th class="sorting" tabindex="0" aria-controls="export-button" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 98.7875px;">Active</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $product)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">Airi Satou</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>2008/11/28</td>
                                            <td>$162,700</td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>

                            </div>
                            {{$products->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>

@endsection

