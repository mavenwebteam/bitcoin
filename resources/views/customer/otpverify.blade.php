@extends('layouts.login-nav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification message.') }}
                    {{ __('If you did not receive the email') }},
                    
                    <form class="d-inline" method="POST" action="">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                        <br>
                    <form class="d-inline" method="POST" action="{{url('/customer/verify')}}">
                        @csrf
                        @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{session('error')}}
                    </div>
                    @endif
                    Please enter the OTP sent to your Email: {{session('email')}}
                    
                
                        <div class="form-group row">
                            <label for="OTP"
                                class="col-md-4 col-form-label text-md-center">{{ __('OTP HERE') }}</label>
                            <div class="col-md-6">
                                <input type="hidden" name="email" value="{{session('email')}}">
                                <input id="OTP" type="tel"
                                    class="form-control @error('OTP') is-invalid @enderror"
                                    name="OTP" value="{{ old('OTP') }}" required>
                                @error('verification_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Verify Email') }}
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
