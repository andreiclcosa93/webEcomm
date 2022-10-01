@extends('front.template')

@section('meta_title', 'Reset Password')
@section('meta_description', 'Reset')
@section('meta_keywords', 'Reset')


@section('content')

<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Reset Password</h1>

        <div class="col-md-6">
            <form action="{{ route('password.update') }}" method="POST">
                @csrf

                {{-- password reset token --}}
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="form-group">
                    <label for="email">Your Email *</label>
                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email', $request->email) }}" required>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Your Password *</label>
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" required>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Password confirmation *</label>
                    <input name="password_confirmation" type="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password" required>
                    @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group mb-30" style="text-align: center;">
                    <input type="submit" value="Reset Password" class="btn btn-primary px-3">
                </div>
            </form><br>

        </div>
    </div>
</div><br><br><br>
<!-- Page Header End -->

@endsection

@section('customCss')
<style>

</style>
@endsection
