@extends('admin.layout.app')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">
    
                <div class="card">
                  <div class="card-header">
                    <h4>Brand Applications</h4>
                  </div>
                  <div class="card-body">
                      <div class="row"> 
						@if(Session::has('success'))
							<div class="alert alert-success  btn-block">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								{{ Session::get('success') }}
							</div>
						@endif
						@if(Session::has('error'))
							<div class="alert alert-danger  btn-block">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								{{ Session::get('error') }}
							</div>
						@endif
                    </div>
                    <div class="mb-2">
                       <form action="{{ route("admin.brands.index") }}" method="get">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <br>
                                <input type="text" value="{{ $keyword ?? '' }}"  name="keyword" placeholder="Search for business , name or email" class="form-control mt-2">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">From Date</label>
                                <input type="date" value="{{ $fromDate ?? '' }}" name="fromDate" class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">To Date</label>
                                <input type="date" value="{{ $toDate ?? '' }}"  name="toDate" class="form-control">
                            </div>
                            <div class="form-group col-md-2 ">
                                <br>
                                <button class="btn btn-success btn-block mt-2">Filter</button>
                            </div>
                        </div></form>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Business Name</th>
                            <th>Status</th>
                            <th>Votes</th>
                            <th>Reward</th>
                            <th colspan="3">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($brands as $brand)
                          <tr>
                            <td class="align-middle">{{$brand->name}}</td>
                            <td class="align-middle">{{$brand->email}}</td>
                            <td class="align-middle">{{$brand->business_name}}</td>
                            <td class="align-middle">
                                <a href="" class="btn btn-sm text-white 
                                {{ $brand->status == $activeStatus ? "bg-success" : ($brand->status == $inactiveStatus ? "bg-danger" : " btn-info") }}" 
                                data-toggle="modal" data-target="#status_modal-{{$brand->id}}" >
                                    {{$brand->getStatus()}}
                                </a>
                            </td>
                            <td class="align-middle">{{$brand->votes}}</td>
                            <td class="align-middle">{{$brand->getReward()}}</td>
                            <td class="align-middle"><a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#info_modal-{{$brand->id}}" >View</a></td>
                            <td class="align-middle"><a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#reward_modal-{{$brand->id}}" >Reward</a></td>
                            <td class="align-middle"><a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#delete_modal-{{$brand->id}}" >Delete</a></td>
                          </tr>

                          @include("admin.brands.modals" , ["brand" => $brand])
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
           
        </section>
    </div>

 <!-- JS Libraies -->
  <script src="dashboard/datatables/datatables.min.js"></script>
  <script src="dashboard/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="dashboard/jquery-ui/jquery-ui.min.js"></script>

@endsection