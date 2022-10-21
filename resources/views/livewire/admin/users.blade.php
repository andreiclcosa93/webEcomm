<div>
   <div class="row mt-4">
    <div class="col-md-8 offset-2">
        <div class="alert alert-info">
            <h4 class="mb-3">Search Users</h4>
            <h4 class="text-danger">{{ isset($users) ? $users->total() : 'No users' }}</h4>
            <div class="row">
                <div class="form-floating mb-3 col-md-6">
                    <input wire:model.lazy="searchName" type="text" class="form-control" id="searchName">
                    <label for="searchName">Email address or name</label>
                </div>
                {{-- users block --}}
                <div class="col-md-3">
                    <div class="form-check">
                        <input wire:click="showUsers('public')" name="flexRadioDefault" class="form-check-input"
                            type="radio" id="public_users" value="public" checked>
                        <label class="form-check-label" for="public_users">
                            Public users
                        </label>
                    </div>
                    <div class="form-check">
                        <input wire:click="showUsers('blocked')" name="flexRadioDefault" class="form-check-input"
                            type="radio" id="blocked_users" value="blocked">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Blocked users
                        </label>
                    </div>
                </div>
                {{-- end of users block --}}
            </div>
        </div>
    </div>
   </div>

   @isset($users)
        <div class="row mt-4">
            <div class="col-md-8 offset-2">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Type</th>
                            <th scope="col">Verified</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>
                                    {{ $users->currentPage() > 1 ? $loop->iteration + $users->perPage() * ($users->currentPage() - 1) : $loop->iteration }}
                                </td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    {{ $user->type }}
                                </td>
                                <td class="{{ $user->email_verified_at ? 'bg-success text-white' : 'bg-danger text-white' }}">
                                    {{ $user->email_verified_at ? $user->email_verified_at->format('d M Y') : 'Unverified' }}

                                </td>
                                <td
                                    class="{{ $user->email_verified_at ? 'bg-success text-white' : 'bg-danger text-white' }}">
                                    {{ $user->email_verified_at ? $user->email_verified_at->format('d M Y') : 'Unverified' }}
                                    @if (!$user->trashed())
                                        @if (!$user->email_verified_at)
                                            <button
                                                onclick="confirm('Confirm email validation for {{ $user->name }}') || event.stopImmediatePropagation()"
                                                wire:click="validateEmail({{ $user->id }})" title="Validate email"
                                                class="btn btn-success btn-sm btn-circle">
                                                <i class="fas fa-at fa-2x"></i>
                                            </button>
                                        @else
                                            <button
                                                onclick="confirm('Confirm email invalidation for {{ $user->name }}') || event.stopImmediatePropagation()"
                                                wire:click="invalidateEmail({{ $user->id }})" title="invalidate email"
                                                class="btn btn-danger btn-sm btn-circle">
                                                <i class="fas fa-at fa-2x"></i>
                                            </button>
                                        @endif

                                    @endif
                                </td>
                                <td>
                                    @if ($user->trashed())
                                        <button onclick="activateUserConfirm('{{ $user->id }}','{{ $user->name }}')"
                                            title="Activate" class="btn btn-primary">
                                            Activate
                                        </button>
                                        <button onclick="deleteUserConfirm('{{ $user->id }}','{{ $user->name }}')"
                                            title="Delete" class="btn btn-danger">
                                            <i class="fas fa-user-slash"></i> Delete
                                        </button>
                                    @else
                                        <button onclick="blockUserConfirm('{{ $user->id }}','{{ $user->name }}')"
                                            title="Blocheaza utilizator" class="btn btn-danger btn-md btn-circle">
                                            <i class="fas fa-user-slash fa-2x"></i>
                                        </button>
                                    @endif

                                </td>
                            </tr>

                        @empty
                            <div class="alert alert-warning">
                                No users were found according to the selected criteria
                            </div>
                        @endforelse
                    </tbody>

                </table>
                {{ $users->links() }}
            </div>
        </div>
    @endisset
</div>
