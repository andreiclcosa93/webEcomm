@extends('admin.template')

{{-- ############################### --}}

@section('customCss')

@livewireStyles

@endsection

{{-- ############################### --}}

@section('customJs')

@livewireScripts

@endsection

{{-- ############################### --}}

@section('content')

@livewire('admin.users')

@endsection
