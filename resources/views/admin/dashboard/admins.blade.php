

@extends('admin.layouts._main')

@section('title', 'admins')

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
                        
                        <!--[ Recent Users ] start-->
                        <div class="col-xl-8 col-md-6">
                            <div class="card Recent-Users">
                                <div class="card-header">
                                    <h5>Admin Users</h5>
                                </div>
                                <div class="card-block px-0 py-3">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <tbody>
                                        
                                                @foreach ($admins as $email => $name)
                                                <tr class="unread">
                                                    <td><img class="rounded-circle" style="width:40px;" src="/theme/images/user/avatar-1.jpg" alt="activity-user"></td>
                                                    <td>
                                                        <h6 class="mb-1">{{ $name }}</h6>
                                                        <p class="m-0">{{ $email }}</p>
                                                    </td>
                                                    <td><a href="#!" class="label theme-bg2 text-white f-12">About</a><a href="#!" class="label theme-bg text-white f-12">Remove</a></td>
                                                </tr>
                                                @endforeach
                                        
                                        
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--[ Recent Users ] end-->
        

                    </div>
                    <!-- [ Main Content ] end -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection