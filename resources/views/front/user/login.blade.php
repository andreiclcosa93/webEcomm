@extends('front.template')

@section('meta_title', 'Login')
@section('meta_description', 'Login User')
@section('meta_keywords', 'Login User')


@section('content')

<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Login User</h1>

        <div class="col-md-6">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Your Email *</label>
                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Your Password *</label>
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group mb-30" style="text-align: center;">
                    <input type="submit" value="Login" class="btn btn-primary px-3">
                </div>
            </form><br>
            <div style="text-align: center;">
                <a href="{{ route('password.request') }}">V-ati uitat parola contului. Click pentru resetare!</a>
            </div>
        </div>
    </div>
</div><br><br><br>
<!-- Page Header End -->

@endsection

@section('customCss')
<style>

</style>
@endsection
