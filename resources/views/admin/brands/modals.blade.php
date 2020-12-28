@if (!empty($brand))
    <!--Status Modal -->
    <div class="modal fade bd-example-modal-md" id="status_modal-{{ $brand->id }}">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit {{ $brand->business_name }}`s Status</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="{{ route('admin.brands.update', $brand->id) }}" method="post">{{ csrf_field() }}
                            @method("put")
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea name="message" class="form-control" id="" cols="30" rows="10"
                                        placeholder="Enter message if you would like to send a mail to the brand, else leave empty"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" type="text" name="status" required>
                                        <option disabled selected>Select One</option>
                                        <option value="{{ $activeStatus }}"
                                            {{ $brand->status == $activeStatus ? 'selected' : '' }}>Approve</option>
                                        <option value="{{ $inactiveStatus }}"
                                            {{ $brand->status == $inactiveStatus ? 'selected' : '' }}>Decline</option>
                                    </select>
                                </div>
                                <div class="form-group">

                                    <div>
                                        <span class="fr"><button type="submit"
                                                class="btn btn-primary">Save</button></span>
                                    </div>
                                </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>


    <!--Info Modal -->
    <div class="modal fade bd-example-modal-lg" id="info_modal-{{ $brand->id }}">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View {{ $brand->business_name }}`s Detais</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{ $brand->getImage() }}" target="_blank" title="View full image">
                                <img src="{{ $brand->getImage() }}" class="img-fluid" alt="Brand image">
                            </a>
                        </div>
                        <div class="col-md-8">
                            <p>
                                <b>Business Name :</b>
                                {{ $brand->business_name }}
                            </p>
                            <p>
                                <b>Applicant Name :</b>
                                {{ $brand->name }}
                            </p>
                            <p>
                                <b>Applicant Email :</b>
                                {{ $brand->email }}
                            </p>
                        </div>
                        <div class="col-md-12">
                            <p>
                                <b>Business Address :</b>
                                {{ $brand->business_address }}
                            </p>
                            <p>
                                <b>About Brand :</b>
                                {{ $brand->about }}
                            </p>
                            <p>
                                <b>Reason :</b>
                                {{ $brand->summary }}
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @if (!empty($brand->brandReward))
        @php
        $reward = optional($brand->brandReward);
        @endphp
        <!--Info Modal -->
        <div class="modal fade bd-example-modal-md" id="design_modal-{{ $brand->id }}">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">View {{ $brand->business_name }}`s Design Request</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-12">
                                <p>
                                    <b>Selected Product :</b>
                                    {{ rewardProducts($reward->selected_product) }}
                                </p>
                                <p>
                                    <b>Request Full Name :</b>
                                    {{ $reward->full_name }}
                                </p>
                                <p>
                                    <b>Request Details :</b>
                                    {!! $reward->details !!}
                                </p>
                                <p>
                                    @if (!empty($reward->design))
                                        <form action="{{ route('admin.brands.download.design') }}" method="post">@csrf
                                            <input type="hidden" name="id" value="{{ $reward->id }}">
                                            <b>Design :</b>

                                            <button class="btn btn-info btn-sm">
                                                Download
                                            </button>
                                        </form>

                                    @endif

                                </p>
                                @if ($reward->status != $activeStatus)
                                <div class="mt-5">
                                    <form action="{{ route('admin.brands.design.complete') }}" method="post">@csrf
                                        <input type="hidden" name="id" value="{{ $reward->id }}">
                                        <button class="btn btn-warning btn-block">
                                            Mark as done
                                        </button>
                                    </form>
                                </div>
                                @else
                                <button class="btn btn-success btn-block mt-5">
                                    Marked as Completed
                                </button>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif


    <!--Info Modal -->
    <div class="modal fade bd-example-modal-md" id="reward_modal-{{ $brand->id }}">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reward {{ $brand->business_name }}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="{{ route('admin.brands.update', $brand->id) }}" method="post">{{ csrf_field() }}
                            @method("put")
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Reward Position</label>
                                    <select class="form-control" type="text" name="reward" required>
                                        <option disabled selected>Select One</option>
                                        <option value="0" {{ $brand->reward == 0 ? 'selected' : '' }}>None</option>
                                        <option value="1" {{ $brand->reward == 1 ? 'selected' : '' }}>1st Place</option>
                                        <option value="2" {{ $brand->reward == 2 ? 'selected' : '' }}>2nd Place</option>
                                        {{-- <option value="3"
                                            {{ $brand->reward == 3 ? 'selected' : '' }}>3rd Place</option>
                                        --}}
                                    </select>
                                </div>
                                <div class="form-group">

                                    <div>
                                        <span class="fr"><button type="submit"
                                                class="btn btn-primary">Save</button></span>
                                    </div>
                                </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>


    <!--Info Modal -->
    <div class="modal fade bd-example-modal-md" id="delete_modal-{{ $brand->id }}">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete {{ $brand->business_name }}`s Data</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="post">{{ csrf_field() }}
                        @method("delete")
                        <div class="col-md-12">
                            <p>Are you sure you want to delete this brand and all it`s related information?</p>
                            <div class="form-group">
                                <div>
                                    <span class="fr"><button type="submit" class="btn btn-danger">Delete</button></span>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- Vertically centered modal end -->
@endif
