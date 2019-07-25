@extends('layouts.main')

@section('content')
<div class="container" style="margin-top: 200px;margin-bottom: 200px;">
    <div class="row justify-content-center" style="margin:auto;">
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8" style="font-weight: 700; padding-left: 3%">
            {{ __('Verify Your Email Address') }}
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <div class="card"> 
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
