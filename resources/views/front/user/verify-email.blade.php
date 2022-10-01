@extends('front.template')

@section('meta_title', 'Verify Email')
@section('meta_description', 'Verify Email')
@section('meta_keywords', 'Verify')


@section('content')

<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Account Validation</h1>

        <div class="col-md-6">
            <form action="{{ route('verification.send') }}" method="POST">
                @csrf
                <div class="form-group mb-0">
                    <input type="submit" value="Send Email" class="btn btn-primary btn-block px-3">
                </div>
            </form><br>
            <div style="text-align: center;">
                @if(session('status') == 'verification-link-sent')

                    <div class="mb-4 front-medium text-sm text-green-600">
                        A new email has been sent to the address {{ auth()->user()->email }}  for account validation.
                    </div>

                @endif
            </div>
        </div>
    </div>
</div><br><br><br>

@endsection
