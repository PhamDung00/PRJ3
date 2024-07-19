@extends('admin.layout.app')
@section('title', 'Edit Category ' . $category->name)
@section('content')
<div class="card">
    @if(session()->has("error"))
        <p>{{session()->get("error")}}</p>
    @endif
    <h1>Edit Category</h1>
    
    <div>
        <form action="{{ route('categories.update', $category->id) }}" method="post">
            @csrf
            @method('put')
            <div class="modal-body px-4">
                <div class="row mb-2">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') ?? $category->name }}">
                        </div>
                        @error('name')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <label name="group" class="ms-4">Main Categories</label>
                        <select name="parent_id" class="form-control">
                            <option value="">Select Main Category</option>
                            @foreach($parentCategories as $prt)
                            <option value="{{ $prt->id }}" 
                                {{ (old('parent_id') ?? $category->parent_id) == $prt->id ? 'selected' : ''}}>
                                {{ $prt->name }}</option>
                            @endforeach                   
                        </select>
                    </div>                 
                </div>
            </div>
            

            <div class="modal-footer px-4">
                <a href="{{ route('users.index')}}"><button type="button" class="btn btn-secondary btn-pill">Cancel</button></a>
                <button type="Submit" class="btn btn-submit btn-primary">Submit</button>
            </div>
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
