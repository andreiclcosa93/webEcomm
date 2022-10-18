@extends('admin.template')

@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Staff members - Edit <span class="text-info">{{ $user->name }}</span> |
            <span class="text-danger">{{ $user->id }}</span>
        </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('control-panel') }}">Control Panel</a></li>
            <li class="breadcrumb-item"><a href="{{ route('show.staff') }}">Staff Members</a></li>
            <li class="breadcrumb-item">Add new Staff</li>
        </ol>

        <div class="row">
            <div class="col-md-9">
                <form id="dates" action="{{ route('update.staff', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card p-4">
                        <div class="row">
                            <div class="col-md-5">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control @error('name') is-invalid @enderror" id="name" required>
                                @error('name')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-5">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control @error('email') is-invalid @enderror" id="email" required>
                                @error('email')
                                <div id="" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3 d-flex align-items-end">
                            <div class="col-md-5">
                              <div id="img-preview">
                                {{-- <img src="/admin/images/update.png" id="photo-preview" alt="" style="max-width: 200px; max-height: 200px; display: inline-block;"> --}}
                                <img src="{{ $user->photoUrl() }}" id="photo-preview" alt="" style="max-width: 200px; max-height: 200px; display: inline-block;">
                              </div>
                              <div class="custom-file">
                                    <label for="formFile" class="form-label">Select Photo</label>
                                    <input type="file" value="{{ old('photo') }}" name="photo" accept="image/*"  class="form-control" id="photoFile">
                              </div>
                                    @error('photo')
                                        <div id="" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                              </div>


                            <div class="col-md-5 align-bottom">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" value="{{ old('phone', $user->phone) }}" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" required>
                                    @error('phone')
                                        <div id="" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <label class="form-label">Select function*</label>
                                <select class="form-select" aria-label="Default select example" value="{{ old('type', $user->type) }}" name="type">

                                    <option value="editor" {{ $user->type == 'editor' ? 'selected' : '' }}>Editor</option>
                                    <option value="asistent"{{ $user->type == 'asistent' ? 'selected' : '' }}>Asistent</option>
                                    <option value="manager"{{ $user->type == 'manager' ? 'selected' : '' }}>Manager</option>
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <button class="btn btn-primary float-end" type="submit"> <i class="fas fa-user-plus"></i> Update
                                    Edit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-3">
                <div class="row">
                    <form id="password" action="{{ route('password.staff', $user->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="alert alert-info">The password must contain at least one letter, at least one number and at least one symbol</div>

                        <div class="card p-4 bg-light">
                            <div class="col-md-12">
                                <label for="password" class="form-label">Password*</label>
                                <input name="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" id=" password">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="password_confirmation" class="form-label">Confirm password*</label>
                                <input name="password_confirmation" type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    id="password_confirmation">
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                     @enderror
                            </div>
                            <div class="col-md-12 mt-3">
                                <button class="btn btn-primary float-end" type="submit"> <i class="fas fa-user-plus"></i> Update
                                    Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-12 mt-4 float-end">
                <a href="{{ route('show.staff') }}" class="btn btn-dark btn-lg">
                    <i class="fas fa-undo"></i> Return</a>
            </div>

        </div>

    </div>
</main>

@endsection
@section('customJs')

    <script>
        const chooseFile = document.getElementById("photoFile");
        const imgPreview = document.getElementById("img-preview");
        chooseFile.addEventListener("change", function() {
            getImgData();
        });

        function getImgData() {
            const files = chooseFile.files[0];
            if (files) {
                const fileReader = new FileReader();
                fileReader.readAsDataURL(files);
                fileReader.addEventListener("load", function() {
                    imgPreview.style.display = "block";
                    imgPreview.innerHTML = '<img src="' + this.result +
                        '" style="max-height:200px; max-width:200px;" class="photo-preview"/>';
                });
            }
        }
    </script>
@endsection
