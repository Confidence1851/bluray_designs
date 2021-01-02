@extends('admin.layout.app')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">
    
                <div class="card">
                  <div class="card-header">
                    <h4>Registered Users</h4>
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
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                          <tr>
                            <td class="align-middle">{{$user->name}}</td>
                            <td class="align-middle">{{$user->email}}</td>
                            <td class="align-middle">{{$user->phone}}</td>
                            <td class="align-middle">{{$user->role}}</td>
                            <td class="align-middle">
                              <form action="{{ route("users.destroy" , $user->id) }}" method="post">@csrf @method("delete")
                                <a href="" class="btn btn-success" data-toggle="modal" data-target="#editmodal-{{$user->id}}" >Edit</a>
                                <button class="btn btn-danger" onclick="return confirm('Are you sure want to delete this user? All orders and information associated with this user will also be permanently deleted!')">
                                  Delete
                                </button>
                              </form>
                            </td>
                          </tr>

                                 <!--Info Modal -->
                                 <div class="modal fade bd-example-modal-md" id="editmodal-{{$user->id}}">
                                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit {{$user->name}}`s Profile</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <form action="{{ route("users.update",$user->id) }}" method="post">{{csrf_field()}} @method("put")
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Role</label>
                                                            <select class="form-control" type="text" name="role" required>
                                                                <option disabled selected>Select One</option>
                                                                <option value="Admin" {{$user->role == 'Admin' ? 'selected' : '' }} >Admin</option>
                                                                <option value="User" {{$user->role == 'User' ? 'selected' : '' }} >User</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            
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
                                </div>

                         
                    <!-- Vertically centered modal end -->
                    
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                {!! $users->links() !!}
              </div>
           
        </section>
    </div>

 <!-- JS Libraies -->
  <script src="dashboard/datatables/datatables.min.js"></script>
  <script src="dashboard/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="dashboard/jquery-ui/jquery-ui.min.js"></script>

@endsection