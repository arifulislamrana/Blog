@extends('admin.layouts._main')

@section('title', 'categories')

@section('content')

<div class="pcoded-wrapper">
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <!-- [ breadcrumb ] start -->

            <!-- [ breadcrumb ] end -->
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- [ Main Content ] start -->
                    <div class="row">
                        <!--[ daily sales section ] start-->
                        <div class="col-md-6 col-xl-4">
                            <div class="card daily-sales">
                                <div class="card-block">
                                    <h6 class="mb-4">Total Categories</h6>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-9">
                                            <h3 class="f-w-300 d-flex align-items-center m-b-0"><i class="feather icon-arrow-up text-c-green f-30 m-r-10"></i>{{ count($activeCategories)+ count($deactiveCategories) }} </h3>
                                        </div>
                                    </div>
                                    <div class="progress m-t-30" style="height: 7px;">
                                        <div class="progress-bar progress-c-theme" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--[ daily sales section ] end-->
                        <!--[ Monthly  sales section ] starts-->
                        <div class="col-md-6 col-xl-4">
                            <div class="card Monthly-sales">
                                <div class="card-block">
                                    <h6 class="mb-4">Active Categories</h6>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-9">
                                            <h3 class="f-w-300 d-flex align-items-center  m-b-0"><i class="feather icon-arrow-up text-c-red f-30 m-r-10"></i>{{ count($activeCategories) }}</h3>
                                        </div>
                                    </div>
                                    <div class="progress m-t-30" style="height: 7px;">
                                        <div class="progress-bar progress-c-theme2" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--[ Monthly  sales section ] end-->
                        <!--[ Monthly  sales section ] starts-->
                        <div class="col-md-6 col-xl-4">
                            <div class="card Monthly-sales">
                                <div class="card-block">
                                    <h6 class="mb-4">Deactive Categories</h6>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-9">
                                            <h3 class="f-w-300 d-flex align-items-center  m-b-0"><i class="feather icon-arrow-down text-c-red f-30 m-r-10"></i>{{ count($deactiveCategories) }}</h3>
                                        </div>
                                    </div>
                                    <div class="progress m-t-30" style="height: 7px;">
                                        <div class="progress-bar progress-c-theme2" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--[ Monthly  sales section ] end-->

                        <div class="col-xl-5">
                            <div class="card">
                                <form action="{{Route('createCategory')}}" method="post" class="form-inline" style="margin-top: 2%">
                                    @csrf
                                    <div class="form-group mx-sm-3 mb-2">
                                        <input type="text" class="form-control" name="name"  placeholder="Category name">
                                    </div> 
                                    <button type="submit" class="btn btn-primary mb-2">Create Category</button>
                                </form>
                            </div>
                        </div>

                        <!--[ active category ] start-->
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Active Categories</h5>
                                </div>
                                <div class="card-block table-border-style">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Category Name</th>
                                                    <th>Total Post</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @for($i = 0; $i < count($activeCategories); $i++)
                                                <tr>
                                                    <th scope="row">{{ $i+1 }}</th>
                                                    <td>{{ $activeCategories[$i]->name }}</td>
                                                    <td>{{ $noOfPostsOfActiveCategories[$i] }}</td>
                                                    <td>
                                                        <a href="{{ route('category.delete', ['name' => $activeCategories[$i]->name]) }}"><button type="button" class="btn btn-danger">Delete</button></a>
                                                        
                                                        <a href="{{ route('deactivateCategory', ['id' => $activeCategories[$i]->id]) }}"><button type="button" class="btn btn-alert">Deactive</button></a>
                                                    </td>
                                                </tr>
                                                @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <!--[ category ] end-->

                         <!--[ Deactive category ] start-->
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Deactive Categories</h5>
                                </div>
                                <div class="card-block table-border-style">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Category Name</th>
                                                    <th>Total Post</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @for($i = 0; $i < count($deactiveCategories); $i++)
                                                <tr>
                                                    <th scope="row">{{ $i+1 }}</th>
                                                    <td>{{ $deactiveCategories[$i]->name }}</td>
                                                    <td>{{ $noOfPostsOfDeactiveCategories[$i] }}</td>
                                                    <td>
                                                        
                                                        <a href="{{ route('category.delete', ['name' => $deactiveCategories[$i]->name]) }}"><button type="button" class="btn btn-danger">Delete</button></a>
                                                        
                                                        <a href="{{ route('activateCategory', ['id' => $deactiveCategories[$i]->id]) }}"><button type="button" class="btn btn-alert">Active</button></a>
                                                    </td>
                                                </tr>
                                                @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <!--[ Deactive category ] end-->

                    </div>
                    <!-- [ Main Content ] end -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection