@extends('admin.layouts._main')

@section('title', 'tags')

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
                                    <h6 class="mb-4">Total Tags</h6>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-9">
                                            <h3 class="f-w-300 d-flex align-items-center m-b-0"><i class="feather icon-arrow-up text-c-green f-30 m-r-10"></i>{{ count($tags) }}</h3>
                                        </div>
                                    </div>
                                    <div class="progress m-t-30" style="height: 7px;">
                                        <div class="progress-bar progress-c-theme" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <!--[ tag ] start-->
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Tag List</h5>
                                </div>
                                <div class="card-block table-border-style">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tag Name</th>
                                                    <th>Total Post</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @for($i = 0; $i < count($tags); $i++)
                                                <tr>
                                                    <th scope="row">{{ $i+1 }}</th>
                                                    <td>{{ $tags[$i]->name }}</td>
                                                    <td>{{ $tagContaingingPosts[$i] }}</td>
                                                    <td>
                                                        <a href="{{ route('tag.delete', ['name' => $tags[$i]->name]) }}"><button type="button" class="btn btn-danger">Delete</button></a>
                                                    </td>
                                                </tr>
                                                @endfor

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <!--[ tag ] end-->

                    </div>
                    <!-- [ Main Content ] end -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection