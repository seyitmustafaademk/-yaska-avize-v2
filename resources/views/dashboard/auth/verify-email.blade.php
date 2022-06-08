@extends('dashboard._layout.auth-layout')

@section('body-class', 'hold-transition login-page')

@section('content')
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ route('front.homepage') }}" class="h1"><b>Yaska</b>Gorup</a>
            </div>
            <div class="card-body">
                @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <p class="login-box-msg">You must verify your email address, please check your email for a verification link.</p>
                <form action="{{ route('verification.send') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-4">
                            <input name="reset" id="reset" value="Resend Email" type="submit" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
