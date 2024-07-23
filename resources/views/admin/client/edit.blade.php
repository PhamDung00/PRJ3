@extends('admin.layout.app')
@section('title', 'Edit Users ' . $user->name)
@section('content')
    <div class="card">
        
        <h1>Edit User</h1>

        <div>
            <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                <div class="modal-body px-4">
                    <div class="form-group row mb-6">
                        <label for="img" class="col-sm-4 col-lg-2 col-form-label">User
                            Image</label>

                        <div class="col-sm-8 col-lg-10">
                            <div id="current-img-container" class="mb-3">
                                <img id="current-img" src="{{ asset($user->img) }}" alt="Current User Image" class="img-thumbnail" style="max-width: 150px;">
                            </div>
                            <div class="custom-file mb-1">
                                <input type="file" class="custom-file-input" name="img" id="img"  onchange="onSelectImage(event)">
                                <label class="custom-file-label" for="img" id="img_name_label">Choose
                                    file...</label>
                                <div class="invalid-feedback">Example invalid custom file feedback
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') ?? $user->name }}">
                            </div>
                            @error('name')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email')?? $user->email }}">
                            </div>
                            @error('email')
                                <span class="text-danger"> {{ $error }}</span>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            @error('password')
                                <span class="text-danger"> {{ $error }}</span>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label name="group" class="ms-4">Gender</label>
                            <select name="gender" class="form-control" value={{ $user->gender}}>
                                <option value="male">Male</option>
                                <option value="fe-male">FeMale</option>                    
                            </select>
        
                            @error('gender')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label>Phone</label>
                                <input type="text" class="form-control" name="phone" value="{{ old('phone') ?? $user->phone }}">
                            </div>
                            @error('phone')
                                <span class="text-danger"> {{ $error }}</span>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label>Address</label>
                                <textarea name="address" class="form-control">{{ old('address') ?? $user->address }}</textarea>
                            </div>
                            @error('address')
                                <span class="text-danger"> {{ $error }}</span>
                            @enderror                
                        </div>
                        <div class="row form-group">
                            <label for="role_id" class="col-lg-2 col-form-label">Roles</label>
                            <div class="col-lg-10">
                                <select class="form-control" name="role_id" id="role_id">
                                    @foreach ($roles as $groupName => $roleGroup)
                                        <optgroup label="{{ $groupName }}">
                                            @foreach ($roleGroup as $irole)
                                                <option value="{{ $irole->id }}" {{ $irole->id === $user->role->id ? 'selected' : '' }}>
                                                    {{ $irole->display_name }}
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                        </div>                        
                    </div>
                </div>
                <button type="submit" class="btn btn-submit btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <script>
        const onSelectImage = e=>{
            const n = e.target.value.split("\\").length;
            document.querySelector("#img_name_label").innerText = e.target.value.split("\\")[n-1];
        }
    </script>
@endsection
