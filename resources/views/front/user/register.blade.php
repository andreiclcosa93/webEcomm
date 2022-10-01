@extends('front.template')

@section('meta_title', 'Create Account')
@section('meta_description', 'Create Account User')
@section('meta_keywords', 'Create Account User')


@section('content')

<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Create Account</h1>

        <div class="col-md-6">
            <form action="{{ route('register') }}" method="POST">

                @csrf
                <div class="form-group">
                    <label for="name">Your Name *</label>
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
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
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password *</label>
                    <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation">
                    @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-30" style="text-align: center;">
                    <input type="submit" value="Create Account" class="btn btn-primary px-3">
                </div>
            </form>
        </div>
    </div>
</div><br><br><br>
<!-- Page Header End -->


@endsection

{{-- @section('customCss')
<style>

</style>
@endsection --}}
