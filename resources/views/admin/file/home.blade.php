@extends('admin.layout.app')
@php($user = Auth::User())

@section('content')
        <!-- main content area start -->
        <ul class="breadcrumb">
           <li class="moreinfo"><i class="fa fa-home moreinfo"></i>Home</li> /
           <li class="moreinfo"><i class="fa fa-dashboard moreinfo"></i>Dashboard</li> 
        </ul>
            <div class="main-content-inner">
                <!-- sales report area start -->

                <div class="sales-report-area mt-5 mb-5">
                    <div class="row">

                    <div class="col-md-6">
                            <div class="single-report mb-xs-20">
                                <div class="s-report-inner pt--20">
                                    <div class="icon"><i class="fa fa-ball"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Available Balance</h4>
                                        <h5>NGN </h5>
                                    </div>
                                </div>
                                <p><b>Withdrawn :</b> <span class="moreinfo">NGN </span>
                                <a class="btn-success btn btn-sm fr" href="#" data-toggle="modal" data-target="#withdrawmodal"><i class="fa fa-arrow-up"></i> Withdraw</a>
                            </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-report mb-xs-20">
                            <div class="s-report-inner pt--20">
                                    <div class="icon"><i class="fa fa-ball"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Developer`s Share</h4>
                                        <h5>NGN </h5>
                                    </div>
                                    <p><b>Withdrawn :</b> <span class="moreinfo fr">NGN </span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="sales-report-area mt-5 mb-5">
                    <div class="row">

                    <div class="col-md-3">
                            <div class="single-report mb-xs-20">
                                <div class="s-report-inner  pt--20 mb-3">
                                    <div class="icon"><i class="fa fa-ball"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <a href="#">
                                            <h4 class="header-title mb-0">Funds Deposited</h4>
                                        </a>
                                    </div>
                                </div>
                                    <p><b>Today :</b> <span class="moreinfo fr">NGN </span></p>
                                    <p><b>This Week :</b> <span class="moreinfo fr">NGN </span></p>
                                    <p><b>This Month :</b> <span class="moreinfo fr">NGN </span></p>
                                    <p><b>All Time :</b> <span class="moreinfo fr">NGN </span></p>
                            </div>
                        </div>

                        

                    </div>
                </div>

                <div class="sales-report-area mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="single-report mb-xs-20">
                                <div class="s-report-inner pt--20 mb-3">
                                    <div class="icon"><i class="fa fa-ball"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <a href="">
                                            <h4 class="header-title mb-0">All Active Requests</h4>
                                        </a>
                                        <p>24 </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-report mb-xs-20">
                            <div class="s-report-inner pt--20 mb-3">
                                    <div class="icon"><i class="fa fa-ball"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">All Pending Requests</h4>
                                        <p>2 </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-report">
                            <div class="s-report-inner pt--20 mb-3">
                                    <div class="icon"><i class="fa fa-ball"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">All Completed Tasks</h4>
                                        <p>5 </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sales report area end -->
             </div>
        </div>
        <!-- main content area end -->

        <!-- Vertically centered modal start -->
           
        
@endsection