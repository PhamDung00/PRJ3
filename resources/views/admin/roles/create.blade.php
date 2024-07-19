@extends('admin.layout.app')
@section('title', 'Create Roles')
@section('content')
    <div class="card">
    
        <h1>Create role</h1>
        
        <div>
            <form action="{{ route('roles.store') }}" method="post">
                @csrf
                <div class="modal-body px-4">

                    <div class="row mb-2">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                            @error('name')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror

                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="lastName">Display Name</label>
                                <input type="text" class="form-control" name="display_name" value="{{ old('display_name') }}">
                            </div>
                            @error('display_name')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label name="group" class="ms-4">Group</label>
                            <select name="group" class="form-control">
                                <option value="system">System</option>
                                <option value="user">User</option>

                            </select>

                            @error('group')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row form-group">
                            <label for="Permission">Permission</label>
                            @foreach ($permissions as $groupName => $permission)
                            <div class="col-lg-4">
                                <label for="">{{ $groupName }}</label>
                                <div class="form-group">
                                    @foreach ($permission as $item)
                                    <div class="form-check"> 
                                            <input type="checkbox" class="form-check-input" name="permission_ids_{{$item->id}}" value="{{ $item->id }}">
                                            <label class="custom-control-label" for="">{{ $item->display_name }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="modal-footer px-4">
                    <a href="{{ route('roles.index')}}"><button type="button" class="btn btn-secondary btn-pill">Cancel</button></a>
                    <button type="Submit" class="btn btn-submit btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
