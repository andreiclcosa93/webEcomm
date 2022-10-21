@extends('admin.template')

{{-- ############################### --}}

@section('customCss')

    @livewireStyles

@endsection

{{-- ############################### --}}

@section('customJs')

@livewireScripts
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    window.blockUserConfirm = function(id, name) {
        Swal.fire({
            icon: 'question',
            text: 'Confirm blocking the user ' + name + ' ?',
            showCancelButton: true,
            confirmButtonText: 'Block',
            confirmButtonColor: '#e3342f',
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('blockUser', id);
                Swal.fire(
                    'User locked out',
                    'User ' + name + ' was blocked',
                    'success'
                );
            }
        });
    }
</script>

<script>
    window.activateUserConfirm = function(id, name) {
        Swal.fire({
            icon: 'question',
            text: 'Confirmati reactivarea utilizatorului ' + name + ' ?',
            showCancelButton: true,
            confirmButtonText: 'Activate',
            confirmButtonColor: '#283ad6',
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('activateUser', id);
                Swal.fire(
                    'Utilizator activat!',
                    'Utilizatorul ' + name + ' a fost activat!',
                    'success'
                );

            }
        });
    }
</script>

{{-- confirmare stergere definitiva utilizator --}}
<script>
    window.deleteUserConfirm = function(id, name) {
        Swal.fire({
            icon: 'question',
            text: 'Confirm the final deletion of the user ' + name + ' ?',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            confirmButtonColor: '#e3342f',
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('deleteUser', id);
                Swal.fire(
                    'User permanently deleted!',
                    'User ' + name + ' it was permanently deleted!',
                    'success'
                );

            }
        });
    }
</script>


<script>
    window.activateUserConfirm = function(id, name) {
        Swal.fire({
            icon: 'question',
            text: 'Confirm user reactivation ' + name + ' ?',
            showCancelButton: true,
            confirmButtonText: 'Activate',
            confirmButtonColor: '#283ad6',
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('activateUser', id);
                Swal.fire(
                    'User activated!',
                    'User ' + name + ' has been activated!',
                    'success'
                );

            }
        });
    }
</script>


<script>
    window.deleteUserConfirm = function(id, name) {
        Swal.fire({
            icon: 'question',
            text: 'Confirm the final deletion of the user ' + name + ' ?',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            confirmButtonColor: '#e3342f',
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('deleteUser', id);
                Swal.fire(
                    'User permanently deleted!',
                    'User ' + name + ' it was permanently deleted!',
                    'success'
                );

            }
        });
    }
</script>
@endsection

{{-- ############################### --}}

@section('content')

<main>
    <div class="container-fluid px-4">
        @livewire('admin.users')
    </div>

</main>

@endsection
