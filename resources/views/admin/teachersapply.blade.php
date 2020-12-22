@extends('admin.layout.app')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">
    
                <div class="card">
                  <div class="card-header">
                    <h4>Teacher Applications</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">ID</th>
                            <th></th>
                            <th>User</th>
                            <th>Gender</th>
                            <th>Age</th>
                            <th>Status</th>
                            <th>Date</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($teachers as $teacher)
                            

                          <tr>
                            <td class="align-middle">#{{$teacher->uuid}}</td>
                            <td class="align-middle">
                                @if(!empty($teacher->avatar))
                                    <img class="avatar teacher-thumb" src="{{ asset('avatar_images/'.$teacher->avatar) }}" alt="avatar">
                                @else
                                    <img class="avatar teacher-thumb" src="{{ asset('user.png') }}" alt="avatar">
                                @endif
                            </td>
                            <td class="align-middle"><a href="{{ route('userinfo',$teacher->user->id) }}" >{{$teacher->user->name}}</a></td>
                            <td class="align-middle">{{$teacher->user->gender}}</td>
                            <td class="align-middle">{{$teacher->user->age}}</td>
                            <td class="align-middle">{{$teacher->status}}</td>
                            <td class="align-middle">{{ date('d-m-Y h:i:A',strtotime($teacher->created_at)) }}</td>
                          </tr>

                               
                    
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