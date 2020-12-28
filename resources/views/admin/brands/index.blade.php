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
                            @if (Session::has('success'))
                                <div class="alert alert-success  btn-block">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            @if (Session::has('error'))
                                <div class="alert alert-danger  btn-block">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-2">
                            <form action="{{ route('admin.brands.index') }}" method="get">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <br>
                                        <input type="text" value="{{ $keyword ?? '' }}" name="keyword"
                                            placeholder="Search for business , name or email" class="form-control mt-2">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">From Date</label>
                                        <input type="date" value="{{ $fromDate ?? '' }}" name="fromDate"
                                            class="form-control">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">To Date</label>
                                        <input type="date" value="{{ $toDate ?? '' }}" name="toDate" class="form-control">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <br>
                                        <div class="d-flex">
                                            <button class="btn btn-success btn-block mt-2">Filter</button>
                                            <button type="button" class="btn btn-danger btn-block mt-2 ml-2"
                                                data-toggle="modal" data-target="#settings_modal">
                                                <i class="ti-settings"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
                                    @foreach ($brands as $brand)
                                        <tr>
                                            <td class="align-middle">{{ $brand->name }}</td>
                                            <td class="align-middle">{{ $brand->email }}</td>
                                            <td class="align-middle">{{ $brand->business_name }}</td>
                                            <td class="align-middle">
                                                <a href=""
                                                    class="btn btn-sm text-white 
                                        {{ $brand->status == $activeStatus ? 'bg-success' : ($brand->status == $inactiveStatus ? 'bg-danger' : ' btn-info') }}"
                                                    data-toggle="modal" data-target="#status_modal-{{ $brand->id }}">
                                                    {{ $brand->getStatus() }}
                                                </a>
                                            </td>
                                            <td class="align-middle">{{ $brand->votes }}</td>
                                            <td class="align-middle">{{ $brand->getReward() }}</td>
                                            <td class="align-middle"><a href="" class="btn btn-info btn-sm"
                                                    data-toggle="modal" data-target="#info_modal-{{ $brand->id }}">View</a>
                                            </td>
                                            @if ($brand->status == $activeStatus)
                                                <td class="align-middle"><a href="" class="btn btn-success btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#reward_modal-{{ $brand->id }}">Reward</a></td>
                                                <td class="align-middle"><a href="" class="btn btn-primary btn-sm "
                                                        data-toggle="modal" 
                                                        data-target="#design_modal-{{ $brand->id }}">Design</a></td>
                                            @endif

                                            <td class="align-middle"><a href="" class="btn btn-warning btn-sm"
                                                    data-toggle="modal"
                                                    data-target="#delete_modal-{{ $brand->id }}">Delete</a></td>
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

    <!--Info Modal -->
    <div class="modal fade bd-example-modal-md" id="settings_modal">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Brand Initiative Settings</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.brands.settings') }}" method="post">{{ csrf_field() }}
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" type="text" name="brands_intiative_status" required>
                                        <option disabled selected>Select One</option>
                                        <option value="{{ $activeStatus }}"
                                            {{ $settings->brands_intiative_status == $activeStatus ? 'selected' : '' }}>
                                            Active</option>
                                        <option value="{{ $inactiveStatus }}"
                                            {{ $settings->brands_intiative_status == $inactiveStatus ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Vote Starts</label>
                                    <input type="date" value="{{ $settings->vote_starts }}" name="vote_starts" required
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Vote Ends</label>
                                    <input type="date" value="{{ $settings->vote_ends }}" name="vote_ends" required
                                        class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <p style="color: red">If this is set as inactive, both the vote start and end dates would be
                                cleared!</p>
                            <div>
                                <span class="fr"><button type="submit" class="btn btn-primary">Save</button></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- JS Libraies -->
    <script src="dashboard/datatables/datatables.min.js"></script>
    <script src="dashboard/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="dashboard/jquery-ui/jquery-ui.min.js"></script>

@endsection
