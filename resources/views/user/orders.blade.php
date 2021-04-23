@extends('user.layout.app')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">

                <div class="card">
                  <div class="card-header">
                    <h4>Orders
                    </h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">Info</th>
                            <th>Order No.</th>
                            <th>Payment No.</th>
                            <th>Product</th>
                            <th>Customer</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Order Date</th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach($orders as $order)
                          <tr>
                            <td><a href="" data-toggle="modal" data-target="#vieworder-{{$order->id}}" class="btn btn-primary">More Info</a></td>
                            <td>{{$order->order_ref}}</td>
                            <td>{{$order->pay_ref}}</td>
                            <td>{{$order->product}}</td>
                            <td>{{$order->name}}</td>
                            <td>{{$order->price}}</td>
                            <td>{{$order->status}}</td>
                            <td>{{ date('D, d M Y', strtotime($order->created_at))}}</td>
                          </tr>

                          <div class="modal fade bd-example-modal-md" id="vieworder-{{$order->id}}">
                            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Order Information #{{$order->order_ref}}</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                <div class="modal-body">
                                  <p><b>Product name:</b> {{$order->product}}</p>
                                  <p><b>Customer name:</b> {{$order->name}}</p>
                                  <p><b>Email:</b> {{$order->email}}</p>
                                  <p><b>Phone:</b> {{$order->phone}}</p>
                                  <p><b>Address:</b> {{$order->address}}</p>
                                  <p><b>Product Type:</b> {{$order->type}}</p>
                                  <p><b>Price:</b> {{$order->price}}</p>
                                  <p><b>Specifications:</b> {{$order->spec}}</p>
                                  <p><b>Status:</b> {{$order->status}}</p>
                                  <p><b>Custom Design:</b> {{$order->design}}</p>
                                  <p><b>Design for me?:</b> {{$order->help_me}}</p>

                                </div>
                              </div>
                            </div>
                          </div>
                        @endforeach
                        </tbody>
                      </table>
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ route("brand_4_free.index") }}" class="btn btn-link">Go to Brand 4 Free page</a>
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
