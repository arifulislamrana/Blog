@extends('admin.layouts._main')

@section('title', 'Dashboard')

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
                                    <h6 class="mb-4">Total post Today</h6>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-9">
                                            <h3 class="f-w-300 d-flex align-items-center m-b-0"><i class="feather icon-arrow-up text-c-green f-30 m-r-10"></i>{{ $countedPost['today'] }}</h3>
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
                                    <h6 class="mb-4">Total post this Month</h6>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-9">
                                            <h3 class="f-w-300 d-flex align-items-center  m-b-0"><i class="feather icon-arrow-down text-c-red f-30 m-r-10"></i>{{ $countedPost['thisMonth'] }}</h3>
                                        </div>
                                    </div>
                                    <div class="progress m-t-30" style="height: 7px;">
                                        <div class="progress-bar progress-c-theme2" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--[ Monthly  sales section ] end-->
                        <!--[ year  sales section ] starts-->
                        <div class="col-md-12 col-xl-4">
                            <div class="card yearly-sales">
                                <div class="card-block">
                                    <h6 class="mb-4">Total post this Year</h6>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-9">
                                            <h3 class="f-w-300 d-flex align-items-center  m-b-0"><i class="feather icon-arrow-up text-c-green f-30 m-r-10"></i>{{ $countedPost['thisYear'] }}</h3>
                                        </div>
                                    </div>
                                    <div class="progress m-t-30" style="height: 7px;">
                                        <div class="progress-bar progress-c-theme" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--[ year  sales section ] end-->
                        <!--[ Recent Users ] start-->
                        <div class="col-xl-8 col-md-6">
                            <div class="card Recent-Users">
                                <div class="card-header">
                                    <h5>Admin Request</h5>
                                </div>
                                <div class="card-block px-0 py-3">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <tbody>

                                                @foreach ($guests as $guest)
                                                <tr class="unread">
                                                    <td><img class="rounded-circle" style="width:40px;" src="/theme/images/user/avatar-1.jpg" alt="activity-user"></td>
                                                    <td>
                                                        <h6 class="mb-1">{{ $guest->name }}</h6>
                                                        <p class="m-0">{{ $guest->email }}</p>
                                                    </td>
                                                    <td>
                                                        <h6 class="text-muted"><i class="fas fa-circle text-c-green f-10 m-r-15"></i>{{ $guest->email_verified_at }}</h6>
                                                    </td>
                                                    <td>
                                                        <a href="{{Route('rejectAdminRequest', ['id' => $guest->id])}}" class="label theme-bg2 text-white f-12">Reject</a>
                                                        <a href="{{Route('approveAdminRequest', ['id' => $guest->id])}}" class="label theme-bg text-white f-12">Approve</a>
                                                    </td>
                                                </tr> 
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--[ Recent Users ] end-->

                        <!-- [ statistics year chart ] start -->
                        <div class="col-xl-4 col-md-6">
                            <div class="card">
                                <div class="card-block border-bottom">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-auto">
                                            <i class="feather icon-zap f-30 text-c-green"></i>
                                        </div>
                                        <div class="col">
                                            <h3 class="f-w-300">{{ $totalPost }}</h3>
                                            <span class="d-block text-uppercase">TOTAL POST</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-auto">
                                            <i class="feather icon-zap f-30 text-c-green"></i>
                                        </div>
                                        <div class="col">
                                            <h3 class="f-w-300">{{ $registeredFollower }}</h3>
                                            <span class="d-block text-uppercase">TOTAL registered Follower</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- [ statistics year chart ] end -->
        

                    </div>
                    <!-- [ Main Content ] end -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection