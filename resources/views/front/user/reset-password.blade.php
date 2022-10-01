@extends('front.template')

@section('meta_title', 'Password Reset')
@section('meta_description', 'Reset')
@section('meta_keywords', 'Login User')


@section('content')

<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Password Reset</h1>

        <div class="col-md-6">
            <form action="{{ route('password.email') }}" method="POST">
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


                <div class="form-group mb-30" style="text-align: center;">
                    <input type="submit" value="Reset" class="btn btn-primary px-3">
                </div>
            </form>

            @php
                if (session('status')) {
                    alert()
                        ->success('The link has been sent', session('status'))
                        ->persistent(true, false);
                }

            @endphp
            {{ session('status') }}

            @error('email')
                @php
                    alert()
                        ->error('Error', $message )
                        ->persistent(true, false);
                @endphp
            @enderror

        </div>
    </div>
</div><br><br><br>
<!-- Page Header End -->

@endsection

@section('customCss')
<style>

</style>
@endsection
