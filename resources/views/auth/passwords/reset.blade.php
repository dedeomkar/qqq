@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 200px;margin-bottom: 200px;">
    <div class="row justify-content-center" style="margin:auto;">
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8" style="font-weight: 700; padding-left: 3%">
            {{ __('Reset Password') }}
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <div class="card"> 
                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" style="margin-top: 1.5%" 
                            class="col-xs-8 col-sm-4 col-md-4 col-lg-4
                            col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div  class="col-xs-10 col-sm-6 col-md-6 col-lg-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" style="margin-top: 1.5%" 
                            class="col-xs-8 col-sm-4 col-md-4 col-lg-4
                            col-form-label text-md-right">{{ __('Password') }}</label>

                            <div  class="col-xs-10 col-sm-6 col-md-6 col-lg-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" 
                            style="margin-top: 1.5%" 
                            class="col-xs-8 col-sm-4 col-md-4 col-lg-4
                            col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div  class="col-xs-10 col-sm-6 col-md-6 col-lg-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
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
