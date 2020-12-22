@extends('admin.layout.app')

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-body">
    
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Product <span id="editThisproduct" style="display: none" >{{$product->id}}</span></h4>
                  </div>
                  <div class="card-body">
                    <form action="#">
                    <div class="row mb-5">
                            <div class="col-md-6"><label for="">Product Name</label><input type="text" id="prodname" value="{{$product->name}}" required autofocus class="form-control"></div>
                            <div class="col-md-3"><label for="">Product Type</label>
                                <select type="text" id="prodtype" required autofocus class="form-control">
                                    <option value="" disabled selected>Select Material</option>
                                    @foreach($prod_types as $type)
                                        <option value="{{$type}}" {{$product->type == $type ? 'selected' : ''}}>{{$type}}</option>
                                    @endforeach
                                </select>
                                </div>
                            <div class="col-md-3"><label for="">Product Category</label>
                                <select type="text" id="prodcat" required autofocus class="form-control">
                                    <option value="" disabled selected>Select Category</option>
                                    @foreach($prod_cats as $cat)
                                        <option value="{{$cat}}" {{$product->category == $cat ? 'selected' : ''}}>{{$cat}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 mt-4"><label for="">Design Price</label><input type="number" id="design_price" required autofocus value="{{$product->design_price}}" class="form-control"></div>
                            <div class="col-md-4 mt-4"><label for="">Caption</label><input type="text" id="caption" required autofocus value="{{$product->caption}}" class="form-control"></div>

                            <div class="col-md-4 mt-4"><button type="submit" class="btn btn-block btn-primary mt-2" id="editprod">Edit</button></div>
                        </div>
                    </form>
                  </div>
                </div>

                <div class="card-body"  style="display: block">
                    
                    <h6 class="text-center"><label for="">Product Images</label></h6>
                    <div class="row product_images mb-4">
                        @foreach($pics as $pic)
                            <div class="col-md-2"><img src="{{ asset('public/product_images/'.$pic->image) }}" alt="" style="max-height: fit-content;"/><a href="#" class="btn btn-sm btn-danger fr delbtn-float del_img" id="{{$pic->id}}"><i class="ti-trash"></i></a></div>
                        @endforeach
                        <div class="col-md-2">
                            <input type="file" id="prodimage" style="display: none">
                            <div class="text-center">
                                <a href="#" id="new_img">Click here to add! <i class="ti-image" style="font-size: 120px"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-5" >
                            <label for="">Quantities and Discounts </label>
                            <div class="quantity_list">
                                @foreach($quans as $quan)
                                    <div class="mb-3"> Quantity - <b> {{$quan->quantity}} </b> <span class="moreinfo">Discount - <b> N{{$quan->discount}} </b></span> <a href="#" class="btn btn-sm btn-danger fr del_quantity" id="{{$quan->id}}"><i class="ti-trash"></i></a></div>
                                @endforeach
                            </div>
                            <div class="text-center mt-3"><button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#newQuan">Add new</button></div>

                        <div class="modal fade bd-example-modal-sm" id="newQuan">
                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Quantities and Discounts</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                    <div class="card-body">
                                        <form action="#">
                                            <div class="row mt-2">
                                                <div class="col-md-12">
                                            <label for="">Quantity</label><input type="number" id="prodquantity" class="form-control" required />
                                                <label for="">Discount</label><input type="number" id="proddiscount" class="form-control" required />
                                                <div class="text-center"><button type="submit" class="btn btn-block btn-primary mt-1 btn-sm" id="addprodquantity">Add</button></div>
                                            </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        
                        <div class="col-md-3 mb-5">
                            <label for="">Price by Type </label>
                            <div class="pricetype_list">
                                @foreach($types as $type)
                                    <div class="mb-3"> {{$type->name}} - <b> N{{$type->price}} per 1 </b> </span> <a href="#" class="btn btn-sm btn-danger fr del_prodtype" id="{{$type->id}}"><i class="ti-trash"></i></a></div>
                                @endforeach
                            </div>
                            <div class="text-center mt-3"><button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#newType">Add new</button></div>

                            <div class="modal fade bd-example-modal-sm" id="newType">
                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Price by Type</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                    <div class="card-body">
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-md-12">
                                            <label for="">Material name</label><input type="text" id="prodtypename" class="form-control" required />
                                            <label for="">Price/1 (N)</label><input type="number" id="prodtypeprice" class="form-control" required />
                                            <div class="text-center"><button type="submit" class="btn btn-block btn-primary mt-1 btn-sm" id="addprodtype">Add</button></div>
                                        </div>
                                    </div>
                                    </form>      
                                    </div>
                                </div>
                              </div>
                            </div>

                            
                        </div>

                        <div class="col-md-4 mb-5">
                            <label for="">Product Features</label>
                            <ul class="features_list">
                                @foreach($feats as $feat)
                                    <li class="mb-2"> {{$feat->text}} <a href="#" class="btn btn-sm btn-danger fr del_feature" id="{{$feat->id}}"><i class="ti-trash"></i></a></li>
                                @endforeach
                            </ul>
                            <div class="text-center mt-3"><button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#newFeature">Add new</button></div>

                            <div class="modal fade bd-example-modal-sm" id="newFeature">
                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Product Features</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                    <div class="card-body">
                                    <form action="#">
                                        <div class="row ">
                                            <div class="col-12"><label for="">Feature</label><textarea type="text" id="prodfeature" rows="3" class="form-control"placeholder="Enter product feature here" required></textarea></div>
                                            <div class="col-12"><button type="submit" class="btn btn-block btn-primary mt-2" id="addprodfeature">Add</button></div>
                                        </div>
                                    </form>    
                                    </div>
                                </div>
                              </div>
                            </div>

                            
                        </div>   
                        
                    <div class="col-md-12 mb-5">
                        <div class="text-center mb-2">Product Specifications</div>
                            <div class="row">
                            @foreach($cats as $cat)
                                @php($specs = App\Spec::where('product_id',$product->id)->where('category',$cat->category)->get())
                
                                <div class="col-md-4">
                                    <label for="">{{$cat->category}}</label>
                                    @foreach($specs as $spec)
                                    <div class="specs_list">
                                        <div class="row mb-2" id="{{$spec->id}}">
                                            <div class="col-3"><img src="{{ asset('public/spec_images/'.$spec->image) }}" alt=""></div>
                                            <div class="col-9"><p><b>{{$spec->name}}</b> <a href="#" class="btn btn-sm btn-danger fr del_spec" id="{{$spec->id}}"><i class="ti-trash"></i></a></p>
                                            <span><b>Add.. Price: </b>N{{$spec->price}}</span>
                                        </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @endforeach

                            </div>
                            <div class="text-center mt-3"><button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#newSpec">Add new</button></div>

                            <div class="modal fade bd-example-modal-sm" id="newSpec">
                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Product Specifications</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                    <div class="card-body">
                                    <form action="{{ route('addspec') }}" method="post" enctype="multipart/form-data"> @csrf 
                                        <div class="row ">
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                            <div class="col-12"><label for="">Category</label><input type="text" name="category"  id="prodspeccategory" class="form-control" required /></div>
                                            <div class="col-12"><label for="">Spec name</label><input type="text" name="name"  id="prodspecname" class="form-control" required /></div>
                                            <div class="col-12"><label for="">Additional Price</label><input type="number" name="price"  id="prodspecprice" class="form-control" required /></div>
                                            <div class="col-7"><label for="">Image</label><input type="file" name="image" id="prodspecimage" class="form-control" required /></div>
                                            <div class="col-5 mt-4"><button type="submit" class="btn btn-block btn-primary mt-2" id="">Add</button></div>
                                        </div>
                                    </form>    
                                    </div>
                                </div>
                              </div>
                            </div>
                </div>   
            </div>

                    <div class="row">
                        <div class="col-7"><button class="btn btn-success btn-block" id="saveproduct"> Save Product</button></div>
                        <div class="col-5"> <a href="{{ route('delproduct',$product->id) }}" class="btn btn-warning btn-block" > <i class="ti-trash"></i> Delete</a></div>
                    </div>
                </div>
        </div>
    </section>
</div>

@stop