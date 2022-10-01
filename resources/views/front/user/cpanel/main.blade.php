@extends('front.template')

@section('meta_title', 'Account settings')
@section('meta_description','Settings',)
@section('meta_keywords', 'Account')

@section('content')

<hr>

    <div class="container-fluid my-3 py-4" style="background-color: #F1F1F1;">
    <div class="row px-xl-5">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header text-light" style="background-color: rgb(71, 53, 29)">
                    Account settings
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Address</li>
                        <li class="list-group-item">Order history</li>
                        <li class="list-group-item">Messages</li>
                        <li class="list-group-item">Special offers</li>
                        <li class="list-group-item"> <a href="{{ route('reset-pass') }}">Password change</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            @yield('panel_content')
        </div>
    </div>
    {{-- end row --}}
    </div>
{{-- end container --}}

@endsection
