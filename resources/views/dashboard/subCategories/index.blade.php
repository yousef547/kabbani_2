@extends('layout.layout')
@section('title')
Sub categories
@endsection

@section('contant')

<div class="row">
@include('inc.massage')

    <div class="col-6">
        <h3>Sub categories</h3>
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
            <li class="breadcrumb-item active">Sub categories</li>
        </ol>
    </div>
</div>
<!-- Container-fluid starts-->
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-md-10">
                        <h5>Addons Product</h5>
                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-pill btn-light-gradien txt-dark" href="{{route('subCategory.create')}}" title=""
                            data-bs-original-title="btn btn-pill btn-light-gradien"
                            data-original-title="btn btn-pill btn-light-gradien txt-dark">Create</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="dt-ext table-responsive">
                    <div id="export-button_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <table class="display dataTable" id="export-button" role="grid"
                            aria-describedby="export-button_info">
                            <thead>
                                <tr>
                                    <th scope="col">Name Ar</th>
                                    <th scope="col">Name En</th>
                                    <th scope="col">image</th>
                                    <th scope="col">icon</th>
                                    <th scope="col">Main Category En</th>
                                    <th scope="col">Main Category Ar</th>
                                    <th scope="col">Category En</th>
                                    <th scope="col">Category Ar</th>
                                    <th scope="col">Enable</th>
                                    <th scope="col">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subCategoies as $subCategory)
                                <tr>
                                    <th scope="row">{{$subCategory->sub_category_name_ar}}</th>
                                    <th scope="row">{{$subCategory->sub_category_name}}</th>
                                    <td>
                                        <img width="50px" src="/uploads/{{$subCategory->photo}}">
                                    </td>
                                    <td>
                                        <img width="50px" src="/uploads/{{$subCategory->icon}}">
                                    </td>
                                    <th scope="row">{{$subCategory->mainCategory->name_ar}}</th>
                                    <th scope="row">{{$subCategory->mainCategory->name}}</th>

                                    <th scope="row">{{$subCategory->category->category_name_ar }}</th>
                                    <th scope="row">{{$subCategory->category->category_name}}</th>
                                   
                                    <td>
                                        @if($subCategory->active == 1)
                                        <a href="{{route('subCategory.changeStatus',[$subCategory->id])}}" class="badge btn-success"><i class="fa fa-check pe-2"></i>Enable</a>
                                        @else 
                                        <a href="{{route('subCategory.changeStatus',[$subCategory->id])}}" class="badge bg-secondary text-white" ><b class="pe-2">X</b>Not Enable</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('subCategory.edit',[$subCategory->id])}}">

                                            <i class="fa fa-edit  text-success fa-2x"></i>
                                        </a>
                                        <a href="{{route('subCategory.delete',[$subCategory->id])}}"><i
                                                class="fa fa-trash text-danger fa-2x"></i></a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                    {{$subCategoies->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection