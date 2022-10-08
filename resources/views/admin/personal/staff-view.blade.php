@extends('admin.template')


@section('content')


<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tables</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('control-panel') }}">Control Panel</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                List of Staff
                <a href="{{ route('new.staff') }}" class="btn btn-success float-end">
                    <i class="fas fa-user-plus"></i>
                    Add new User Staff
                </a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th style="text-align: center;">Name</th>
                            <th style="text-align: center;">Email</th>
                            <th style="text-align: center;">Phone</th>
                            <th style="text-align: center;">Photo</th>
                            <th style="text-align: center;">Type</th>
                            <th style="text-align: center;">Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Photo</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr style="text-align: center;" class="bg-light">
                            <td>Manager Name</td>
                            <td>manager@gmail.com</td>
                            <td>886875855786</td>
                            <td><img src="" alt=""></td>
                            <td>manager</td>
                            <td style="text-align: center;">
                                <button class="btn btn-danger">Delete</button>
                                <button class="btn btn-success">Add</button>
                                <button class="btn btn-warning">Edit</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

@endsection
