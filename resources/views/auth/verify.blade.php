@extends('mainlayouts.main')

@section('content')
<div class="containerForm">
    <div class="formLogin">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <div class="resPass">
                            <button type="submit" class="but">{{ __('click here to request another') }}</button>.
                        </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
