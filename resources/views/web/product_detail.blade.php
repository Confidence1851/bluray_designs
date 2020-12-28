@extends('web.layout')

@section('content')

    <section>
        <div class="container">
            <div class="row">

                <div class="span5 pull-right">
                    <div class="row">
                        <div class="span5">
                            <!-- start slider -->
                            <!-- Slider -->
                            <div id="nivo-slider">
                                <div class="nivo-slider">
                                    @foreach ($images as $img)
                                        <img src="{{ asset('public/product_images/' . $img->image) }}" alt="Product image"
                                            title="Product image" />
                                    @endforeach
                                </div>
                            </div>
                            <!-- end slider -->
                            <br><br>
                            <h6 style="font-size:16px; font-weight:bold; color:#06C;">We accept the following file formats:
                            </h6>
                            <img src="{{ asset('public/web/img/fileformarts.jpg') }}"
                                alt="accepted file formats: PDF, cdr, ps Ai">
                            <hr>

                            <p style="font-size:14px;"><b>Please keep the following in mind when uploading your
                                    file:</b><br></p>
                            <ul>
                                <li>Carefully cross-check your job before uploading/sending to us as we won't be held
                                    responsible for any typographical error on the job.</li>

                                <li>Please make sure all designs/jobs are converted to curves or paths to avoid change in
                                    fonts.</li>

                                <li>Give space for bleeding/trimming so your job can have a perfect finishing</li>
                                <li>For high quality print output, we recommend very sharp images upto 300dpi are used</li>
                                <li>Make sure all unwanted texts, shapes or images with the document's print area are
                                    deleted before sending for print</li>
                                <li>Please use font size not less than 8pts for your designs so they can be visible on
                                    prints</li>
                            </ul>

                        </div>
                    </div>
                </div>



                <div class="span6" style="border:#CCC; border-style:solid; border-width:1px 1px 1px 1px; padding:3%;">



                    <H6
                        style="margin-top:15px; font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:18px; color:#06C;">
                        Complete Your Order For {{ $product->name }}
                    </H6>

                    <hr>

                    <form class="form-horizontal" id="checkoutForm" enctype="multipart/form-data">@csrf

                        <div class="control-group">
                            <input type="hidden" name="product_id" value="{{ $product->id }}" required>
                            <input type="hidden" name="product" value="{{ $product->name }}" required>
                            <label> {{ $product->name }} Type<br>
                                <select name="type" required id="selected-type">
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}|{{ $type->price }}">{{ $type->name }}</option>
                                    @endforeach
                                </select></label>



                            <label> Select Quantity<br> </label>
                            <select name="quantity" required id="selected-quan">
                                @foreach ($quantities as $quan)
                                    <option value="{{ $quan->id }}|{{ $quan->quantity }}|{{ $quan->discount }}">
                                        {{ $quan->quantity }}</option>
                                @endforeach
                            </select>
                            <br>
                            <b>Price:</b> <span id="first_price"></span>

                            <br><br>

                            @foreach ($cats as $cat)
                                @php($s = App\Spec::where('product_id', $product->id)
                                    ->where('category', $cat->category)
                                    ->orderby('price', 'asc'),)
                                    @php($specs = $s->get())
                                        @php($first = $s->first())

                                            <span class="p_cats">{{ $cat->category }}</span>
                                            <div class="row mt-2" id="spec_exits">
                                                @foreach ($specs as $spec)
                                                    @if ($spec->id == $first->id)
                                                        @php($check = 'checked')
                                                        @else
                                                            @php($check = '')
                                                            @endif


                                                            <div class="span3">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="{{ $cat->category }}" value="{{ $spec->price }}"
                                                                        id="{{ $spec->id }}" class="choice {{ $cat->category }}" {{ $check }}>
                                                                    <img src="{{ asset('public/spec_images/' . $spec->image) }}" width="150px"
                                                                        alt=""> <br> {{ $spec->name }} <small>+N{{ $spec->price }}</small>
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                @endforeach


                                                <div class="control-group">
                                                    <label> Upload your file here: <br></label>
                                                    <input type="file" name="design" id="design_file" required>

                                                </div>

                                                <div class="control-group">
                                                    <label>
                                                        <input type="checkbox" name="help_design" id="make_design"
                                                            amount="{{ $product->design_price }}">
                                                        I don't have a design yet, create one for me. Price: NGN
                                                        {{ $product->design_price }}</label>
                                                </div>
                                                <p><b>Total Price:</b> <span id="total_price"></span></p>


                                                <div class="modal fade bd-example-modal-md" id="delivery_details" style="display:none">
                                                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Confirm Delivery Details
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal"><span>&times;</span></button>
                                                                </h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group mb-2">
                                                                    <label for="">Your Name</label>
                                                                    <input type="text" name="name" class="form-control" required
                                                                        value="{{ Auth::user()->name ?? '' }}">
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <label for="">Your Email</label>
                                                                    <input type="email" name="email" id="customer_email" class="form-control"
                                                                        required value="{{ Auth::user()->email ?? '' }}">
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <label for="">Phone Number</label>
                                                                    <input type="text" name="phone" class="form-control" required
                                                                        value="{{ Auth::user()->phone ?? '' }}">
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <label for="">Address</label>
                                                                    <textarea type="text" rows="3" name="address" class="form-control"
                                                                        required>{{ Auth::user()->address ?? '' }}</textarea>
                                                                </div>
                                                                <div class="form-group mb-2 ">
                                                                    <label for="">Additional Order information</label>
                                                                    <textarea type="text" rows="4" name="comment" class="form-control"
                                                                        placeholder="If you have additional information about your order, please state it here"></textarea>
                                                                </div>
                                                                <div class="control-group">
                                                                    <button type="submit" class="btn btn-blue">Proceed</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <button id="delivery_modalBtn" class="btn btn-blue">Proceed</button>
                                                </div>
                                        </form>

                                    </div>
                                    <div class="text-center" id="tran_msg"></div>

                                </div>

                            </div>

                            </p>
                            </div>

                            <!--biz card photo and instructions -->

                            <!--end of biz comment -->

                            </div>
                            </div>
                        </section>


                    @stop
