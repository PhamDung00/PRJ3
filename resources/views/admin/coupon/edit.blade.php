@extends('admin.layout.app')
@section('title', 'Edit Category ' . $coupon->name)
@section('content')
<div class="card">
    @if(session()->has("error"))
        <p>{{session()->get("error")}}</p>
    @endif
    <h1>Edit Category</h1>
    
    <div>
        <form action="{{ route('coupons.update', $coupon->id) }}" method="post">
            @csrf
            @method('put')
            <div class="modal-body px-4">
                <div class="row mb-2">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') ?? $coupon->name }}">
                        </div>
                        @error('name')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Value</label>
                            <input type="number" class="form-control" name="value" value="{{ old('value') ?? $coupon->value}}">
                        </div>
                        @error('value')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div> 
                    <div class="col-lg-6">
                        <label name="group" class="ms-4">Type</label>
                        <select name="type" class="form-control">
                            <option value="">Select Type</option>
                            <option value="money" {{ (old('type') ?? $coupon->type) == 'money' ? 'selected' : '' }}>Money</option>
                        </select>
    
                        @error('parent_id')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>         
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Expery Date</label>
                            <input type="date" class="form-control" name="expery_date" value="{{ old('expery_date') ?? $coupon->expery_date}}">
                        </div>
                        @error('expery_date')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>             
                </div>
            </div>
            

            <div class="modal-footer px-4">
                <a href="{{ route('coupons.index')}}"><button type="button" class="btn btn-secondary btn-pill">Cancel</button></a>
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
