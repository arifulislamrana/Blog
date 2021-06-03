@extends('admin.layouts._main')

@section('title', 'posts')

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


                        <!--[ active category ] start-->
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>My Posts</h5>
                                </div>
                                <div class="card-block table-border-style">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Post title</th>
                                                    <th>Post Category</th>
                                                    <th>Post Tags</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @for ($i = 0; $i < count($posts); $i++)
                                                <tr>
                                                    <th scope="row">{{ $i+1 }}</th>
                                                    <td>{{ $posts[$i]->title }}</td>
                                                    <td>{{ $category['name'][$i]}}</td>
                                                    <td>
                                                        @foreach ($posts[$i]->tags as $tag)
                                                        <a href="{{ Route('findPostsByTag', ['id' => $tag->id]) }}">#{{ $tag->name }}</a>
                                                        @endforeach</td>
                                                    <td>
                                                        <a href="{{ Route('editPost', ['id' => $posts[$i]->id]) }}"><button type="button" class="btn btn-alert">Edit</button></a>
                                                        
                                                        <a href="{{ Route('deletePost', ['id' => $posts[$i]->id]) }}"><button type="button" class="btn btn-danger">Delete</button></a>
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

                    </div>
                    <!-- [ Main Content ] end -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection