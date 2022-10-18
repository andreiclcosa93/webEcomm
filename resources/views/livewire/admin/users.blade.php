<div>
   <div class="row mt-4">
    <div class="col-md-8 offset-2">
        <div class="alert alert-info">
            <h4 class="mb-3">Search Users</h4>
            <h4 class="text-danger">{{ isset($users) ? $users->count() : 'No users' }}</h4>
            <div class="row">
                <div class="form-floating mb-3 col-md-6">
                    <input wire:model.lazy="searchName" type="text" class="form-control" id="searchName">
                    <label for="searchName">Email address or name</label>
                </div>
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
                                    {{ $loop->iteration }}
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
                                <td>
                                    {{ $user->email_verified_at }}

                                </td>

                            </tr>

                        @empty
                            <div class="alert alert-warning">
                                Nu au fost gasiti utilizatori dupa criteriile selectate
                            </div>
                        @endforelse
                    </tbody>

                </table>

            </div>
        </div>
    @endisset
</div>
