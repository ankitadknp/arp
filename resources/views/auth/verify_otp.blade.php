
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify OTP') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user_login') }}">
                        @csrf
                        @if(Session::has('error'))
                        <div class="alert alert-danger" id="error-message">
                            {{ Session::get('error') }}
                        </div>
                        @endif
                        <div class="form-group row">
                            <label for="verify_otp" class="col-md-4 col-form-label text-md-right">{{ __('OTP') }}</label>
                            <div class="col-md-6">
                                <input type="hidden" name="email" value="{{$email}}">
                                <input type="hidden" name="password" value="{{$password}}">
                                <input id="verify_otp" type="text" class="form-control @error('verify_otp') is-invalid @enderror" name="verify_otp" required autocomplete="verify_otp" autofocus>
                                @error('verify_otp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Hide the error message after 5 seconds
        setTimeout(function() {
            $('#error-message').fadeOut('slow');
        }, 3000); // 5000 milliseconds (5 seconds)
    });
</script>