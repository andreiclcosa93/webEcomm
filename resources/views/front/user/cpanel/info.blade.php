@extends('front.user.cpanel.main')

@section('panel_content')

    <h1>Info</h1>

    <h3 class="text-center">
        {{ auth()->user()->name }} | account <span class="text-primary"> {{ auth()->user()->type }}</span>
    </h3>

    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo provident distinctio esse asperiores culpa corporis! Dolorem, quasi laborum. Vel totam assumenda temporibus voluptatum, nulla in iste sint fugit amet perferendis!
    </p>

    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo provident distinctio esse asperiores culpa corporis! Dolorem, quasi laborum. Vel totam assumenda temporibus voluptatum, nulla in iste sint fugit amet perferendis!
    </p>

    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo provident distinctio esse asperiores culpa corporis! Dolorem, quasi laborum. Vel totam assumenda temporibus voluptatum, nulla in iste sint fugit amet perferendis!
    </p>

@endsection
