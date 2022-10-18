@extends('admin.template')


@section('content')


<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Staff
            {!! $blocked_members ? '<span class="text-danger"> - blocked staff </span>' : '' !!} - {{ $users->count() }}
        </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('control-panel') }}">Control Panel</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>

        <div class="card mb-4">
            <div class="card-body bg-dark" style="color: #fff;">
                <b>&nbsp;&nbsp;<i class="fas fa-user"></i>&nbsp;&nbsp;Name: </b>Mng - Manager&nbsp;&nbsp; | &nbsp;&nbsp;<b><i class="fas fa-envelope"></i>&nbsp;&nbsp;Email:</b> manager@gmail.com &nbsp;&nbsp;| &nbsp;&nbsp;<b><i class="fas fa-phone"></i>&nbsp;&nbsp; Phone: </b>0403430920
                <img src="" alt="">
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                List of Staff -
                @if($blocked_members)
                <a href="{{ route('show.staff') }}" class="link-success">Staff members</a>
                @else
                <a class="link-danger" href="{{ route('show.staff', ['blocked'=>true]) }}">Blocked members </a>
                <a href="{{ route('new.staff') }}" class="btn btn-success float-end">
                    <i class="fas fa-user-plus"></i>
                    Add new User Staff
                </a>
                @endif
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
                        @forelse ($users as $user)
                            <tr>
                                <td style="text-align: center;">{{ $user->name }}</td>
                                <td style="text-align: center;">{{ $user->email }}</td>
                                <td style="text-align: center;">{{ $user->phone }}</td>
                                <td style="text-align: center;">
                                    <img src="/admin/images/staff/{{ $user->photo }}"  width="60" alt="">
                                    {{-- //troubles --}}
                                    {{-- <img src="{{ $user->photoUrl() }}}}"  width="60" alt=""> --}}
                                </td>
                                <td style="text-align: center;">{{ $user->type }}</td>
                                <td style="text-align: center; display: flex; justify-content: center; gap: 5%;">
                                    @if(!$user->trashed())
                                    <a href="{{ route('edit.staff', $user->id) }}" class="btn btn-warning"><i class="fas fa-user-edit"></i> Edit</a>

                                    <form action="{{ route('block.staff', $user->id) }}" id="form-delete-{{ $user->id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                    </form>

                                    <button  class="btn btn-danger delete-confirm"
                                    onclick="deleteConfirm('form-delete-{{ $user->id }}','{{ $user->name }}')">
                                    <i class="fas fa-exclamation"></i> Blocheaza</button>
                                    @else

                                    {{-- restore staff --}}

                                    <form action="{{ route('restore.staff', $user->id) }}" id="form-restore-{{ $user->id }}" method="POST">
                                        @csrf
                                        @method('put')
                                    </form>

                                    <button  class="btn btn-success "
                                    onclick="restoreConfirm('form-restore-{{ $user->id }}','{{ $user->name }}')">
                                    Restore User</button>

                                    {{-- end of restore staff --}}

                                    {{-- remove staff --}}

                                    <form action="{{ route('remove.staff', $user->id) }}" id="form-remove-{{ $user->id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                    </form>

                                    <button  class="btn btn-danger"
                                    onclick="removeConfirm('form-remove-{{ $user->id }}','{{ $user->name }}')">
                                    <i class="fas fa-exclamation"></i> Remove Permanent</button>

                                    {{-- end of remove staff --}}

                                    @endif
                                    {{-- <button  class="btn btn-danger"
                                        onclick="if(confirm('confirm the deletion of the account {{ $user->name }}'))
                                        {document.getElementById('form-delete-{{ $user->id }}').submit(); }">
                                        <i class="fas fa-exclamation"></i> Blocheaza</button> --}}
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-info">there are no members</div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

@endsection

@section('customJs')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        window.deleteConfirm = function(formId, name) {
            Swal.fire({
                icon: 'question',
                text: 'Confirm blocking the user ' + name + ' ?',
                showCancelButton: true,
                confirmButtonText: 'Block',
                confirmButtonColor: '#e3342f',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>

<script>
    window.restoreConfirm = function(formId, name) {
        Swal.fire({
            icon: 'question',
            text: 'unlocking the member ' + name + ' ?',
            showCancelButton: true,
            confirmButtonText: 'Restore',
            confirmButtonColor: '#0d4aa5',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formId).submit();
            }
        });
    }
</script>
<script>
    window.removeConfirm = function(formId, name) {
        Swal.fire({
            icon: 'question',
            text: 'Confirm the definitive deletion of the member ' + name + ' ?',
            showCancelButton: true,
            confirmButtonText: 'Remove',
            confirmButtonColor: '#e3342f',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formId).submit();
            }
        });
    }
</script>

@endsection
