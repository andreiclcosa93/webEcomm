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
                    <input name="email" type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="password">Your Password *</label>
                    <input name="password" type="password" class="form-control" id="password">
                </div>

                <div class="form-group mb-30" style="text-align: center;">
                    <input type="submit" value="Login" class="btn btn-primary px-3">
                </div>
            </form>
        </div>
    </div>
</div><br><br><br>
<!-- Page Header End -->

@endsection

@section('customCss')
<style>

</style>
@endsection
