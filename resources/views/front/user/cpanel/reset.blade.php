@extends('front.user.cpanel.main')

@section('panel_content')

    <h1>password reset</h1>

    <h3 class="text-center">
        {{ auth()->user()->name }} | account <span class="text-primary"> {{ auth()->user()->type }}</span>
    </h3>
    <div class="card mx-auto w-75 p-3">
        <form action="{{ route('change-pass') }}" method="POST">

            @csrf
            <div class="form-group">
                <label for="current_pass">Current Password *</label>
                <input name="current_pass" type="password" class="form-control @error('current_pass') is-invalid @enderror" id="current_pass">
                @error('current_pass')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="newpassword">New Password *</label>
                <input name="newpassword" type="password" class="form-control @error('newpassword') is-invalid @enderror" id="newpassword">
                @error('newpassword')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="newpassword_confirmation">Confirm Password *</label>
                <input name="newpassword_confirmation" type="password" class="form-control @error('newpassword_confirmation') is-invalid @enderror" id="newpassword_confirmation">
                @error('newpassword_confirmation')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-30" style="text-align: center;">
                <input type="submit" value="Reset Password" class="btn btn-primary px-3">
            </div>
        </form>
    </div>


@endsection
