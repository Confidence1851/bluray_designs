@extends('admin.layout.app')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">
    
                <div class="card">
                  <div class="card-header">
                    <h4>Products
                    <span style="float:right"><a href="{{ route('newproduct') }}" class="btn btn-primary">New Product</a></span>
                    </h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">Edit</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Images</th>
                            <th>Features</th>
                            <th>Specs</th>
                            <th>Sold</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach($products as $product)
                          @php($images = App\Picture::where('product_id',$product->id)->count())
                          @php($feats = App\Feature::where('product_id',$product->id)->count())
                          @php($specs = App\Spec::where('product_id',$product->id)->count())
                          <tr>
                            <td><a href="{{ route('editproduct',$product->id) }}" class="btn btn-primary btn-sm" > <i class="ti-edit">Edit</i></a></td>
                            <td>{{ $product->name}}</td>
                            <td>{{ $product->type}}</td>
                            <td>{{$images}}</td>
                            <td>{{$feats}}</td>
                            <td>{{$specs}}</td>
                            <td>100</td>
                            <td>
                              @if($product->status == 'Active')
                                <a href="{{ route('changestat',$product->id) }}" class="btn btn-success" title="Click to disable">{{$product->status}}</a>
                              @endif
                              @if($product->status == 'Disabled')
                                <a href="{{ route('changestat',$product->id) }}" class="btn btn-warning" title="Click to activate">{{$product->status}}</a>
                              @endif
                            </td>
                            <td>{{ date('D, d M y',strtotime($product->created_at))}}</td>
                            <td> <a href="{{ route('delproduct',$product->id) }}" class="btn btn-warning btn-sm" > <i class="ti-trash"></i></a> </td>
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