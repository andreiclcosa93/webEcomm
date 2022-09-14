@extends('front.template')


@section('meta_title', 'Contact')
@section('meta_description', 'Contact')
@section('meta_keywords', 'Contact')

@section('content')

  <!-- Page Header Start -->
  <div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Contact Us</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="{{ route('home') }}">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Contact</p>
        </div>
    </div>
</div>
<!-- Page Header End -->

   <!-- Contact Start -->
   <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Contact For Any Queries</span></h2>
        </div>

        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                @include('front.partials.contact-form')
            </div>
            <div class="col-lg-5 mb-5">
                @include('front.partials.site-info')
            </div>
        </div>
   </div>

@endsection
