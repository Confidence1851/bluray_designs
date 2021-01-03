<div id="brand4free_donate" class="modal styled hide fade" tabindex="-1" role="dialog"
    aria-labelledby="brand4free_donateLabel" aria-hidden="true" backdrop="static">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 id="brand4free_donateLabel">Support the initative</h4>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" method="POST" id="brand4freeDonateForm" action="{{ route('login') }}">
            @csrf

            <div class="login-errors" style="display: none">
                @if (count($errors) > 0)
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-center" style="color: #F03C02">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Email</label>
                <div class="controls">
                    <input type="email" id="donate-email" class=" @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus id="inputEmail"
                        placeholder="Email">
                </div>
            </div>
            <input type="hidden" id="donate-pay_ref" name="reference">
            <div class="control-group">
                <label class="control-label" for="">How much would you like to donate? (Naira)</label>
                <div class="controls">
                    <input type="number" class=" @error('amount') is-invalid @enderror" name="amount" min="100"
                        id="donate-amount" value="{{ old('amount') }}" required autocomplete="false" autofocus
                        placeholder="Enter Amount">
                </div>
            </div>

            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn">Proceed</button>
                </div>
            </div>
        </form>
    </div>
</div>
