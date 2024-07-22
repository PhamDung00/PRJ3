@extends('admin.layout.app')
@section('title', 'Edit Product' . $product->name)
@section('content')
    <div class="card">
        @if (session()->has('error'))
            <p>{{ session()->get('error') }}</p>
        @endif
        <div>
            <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div style="padding-left: 0">
                    <!-- CONTENT WRAPPER -->
                    <div class="ec-content-wrapper">
                        <div class="content">
                            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                                <div>
                                    <h1>Add Product</h1>
                                    <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
                                        <span><i class="mdi mdi-chevron-right"></i></span>Product
                                    </p>
                                </div>
                                <div>
                                    <a href="{{ route('products.index') }}" class="btn btn-primary"> View All
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card card-default">
                                        <div class="card-header card-header-border-bottom">
                                            <h2>Edit Product</h2>
                                        </div>
                                        <div class="card-body">
                                            <div class="row ec-vendor-uploads">
                                                <div class="col-lg-4">
                                                    <div class="ec-vendor-img-upload">
                                                        <div class="ec-vendor-main-img">
                                                            <div class="avatar-upload">
                                                                <div class="avatar-edit">
                                                                    <input type='file' id="imageUpload"
                                                                        name="img_upload_0" class="ec-image-upload"
                                                                        accept=".png, .jpg, .jpeg" />
                                                                    <label for="imageUpload"><img
                                                                            src="assets/img/icons/edit.svg"
                                                                            class="svg_img header_svg"
                                                                            alt="edit" /></label>
                                                                </div>
                                                                <div class="avatar-preview ec-preview">
                                                                    <div class="imagePreview ec-div-preview">
                                                                        <img class="ec-image-preview"
                                                                            src="{{ isset($product->images[0]->url) ? asset($product->images[0]->url) : '' }}"
                                                                            alt="edit" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="thumb-upload-set colo-md-12">
                                                                <div class="thumb-upload">
                                                                    <div class="thumb-edit">
                                                                        <input type='file' id="thumbUpload01"
                                                                            class="ec-image-upload" name="img_upload_1"
                                                                            accept=".png, .jpg, .jpeg" />
                                                                        <label for="imageUpload"><img
                                                                                src="assets/img/icons/edit.svg"
                                                                                class="svg_img header_svg"
                                                                                alt="edit" /></label>
                                                                    </div>
                                                                    <div class="thumb-preview ec-preview">
                                                                        <div class="image-thumb-preview">
                                                                            <img class="image-thumb-preview ec-image-preview"
                                                                                src="assets/img/products/vender-upload-thumb-preview.jpg"
                                                                                alt="edit" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="thumb-upload">
                                                                    <div class="thumb-edit">
                                                                        <input type='file' id="thumbUpload02"
                                                                            name="img_upload_2" class="ec-image-upload"
                                                                            accept=".png, .jpg, .jpeg" />
                                                                        <label for="imageUpload"><img
                                                                                src="assets/img/icons/edit.svg"
                                                                                class="svg_img header_svg"
                                                                                alt="edit" /></label>
                                                                    </div>
                                                                    <div class="thumb-preview ec-preview">
                                                                        <div class="image-thumb-preview">
                                                                            <img class="image-thumb-preview ec-image-preview"
                                                                                src="assets/img/products/vender-upload-thumb-preview.jpg"
                                                                                alt="edit" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="thumb-upload">
                                                                    <div class="thumb-edit">
                                                                        <input type='file' id="thumbUpload03"
                                                                            class="ec-image-upload"
                                                                            accept=".png, .jpg, .jpeg" />
                                                                        <label for="imageUpload"><img
                                                                                src="assets/img/icons/edit.svg"
                                                                                class="svg_img header_svg"
                                                                                alt="edit" /></label>
                                                                    </div>
                                                                    <div class="thumb-preview ec-preview">
                                                                        <div class="image-thumb-preview">
                                                                            <img class="image-thumb-preview ec-image-preview"
                                                                                src="assets/img/products/vender-upload-thumb-preview.jpg"
                                                                                alt="edit" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="thumb-upload">
                                                                    <div class="thumb-edit">
                                                                        <input type='file' id="thumbUpload04"
                                                                            class="ec-image-upload"
                                                                            accept=".png, .jpg, .jpeg" />
                                                                        <label for="imageUpload"><img
                                                                                src="assets/img/icons/edit.svg"
                                                                                class="svg_img header_svg"
                                                                                alt="edit" /></label>
                                                                    </div>
                                                                    <div class="thumb-preview ec-preview">
                                                                        <div class="image-thumb-preview">
                                                                            <img class="image-thumb-preview ec-image-preview"
                                                                                src="assets/img/products/vender-upload-thumb-preview.jpg"
                                                                                alt="edit" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="thumb-upload">
                                                                    <div class="thumb-edit">
                                                                        <input type='file' id="thumbUpload05"
                                                                            class="ec-image-upload"
                                                                            accept=".png, .jpg, .jpeg" />
                                                                        <label for="imageUpload"><img
                                                                                src="assets/img/icons/edit.svg"
                                                                                class="svg_img header_svg"
                                                                                alt="edit" /></label>
                                                                    </div>
                                                                    <div class="thumb-preview ec-preview">
                                                                        <div class="image-thumb-preview">
                                                                            <img class="image-thumb-preview ec-image-preview"
                                                                                src="assets/img/products/vender-upload-thumb-preview.jpg"
                                                                                alt="edit" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="thumb-upload">
                                                                    <div class="thumb-edit">
                                                                        <input type='file' id="thumbUpload06"
                                                                            class="ec-image-upload"
                                                                            accept=".png, .jpg, .jpeg" />
                                                                        <label for="imageUpload"><img
                                                                                src="assets/img/icons/edit.svg"
                                                                                class="svg_img header_svg"
                                                                                alt="edit" /></label>
                                                                    </div>
                                                                    <div class="thumb-preview ec-preview">
                                                                        <div class="image-thumb-preview">
                                                                            <img class="image-thumb-preview ec-image-preview"
                                                                                src="assets/img/products/vender-upload-thumb-preview.jpg"
                                                                                alt="edit" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="ec-vendor-upload-detail">
                                                        <form class="row g-3">
                                                            <div class="col-md-6">
                                                                <label for="inputEmail4" class="form-label">Product
                                                                    name</label>
                                                                <input type="text" name="name"
                                                                    class="form-control slug-title" id="inputEmail4"
                                                                    value="{{ $product->name }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label name="group" class="ms-4">Categories</label>
                                                                <select name="category_ids" class="form-control">
                                                                    <option value="">Select Category</option>
                                                                    @foreach ($categories as $cate)
                                                                        <option value="{{ $cate->id }}">
                                                                            {{ $cate->name }}</option>
                                                                    @endforeach
                                                                </select>

                                                                @error('category_ids')
                                                                    <span class="text-danger"> {{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 mb-25">
                                                                    <div id="sizes_1">
                                                                        <div class="size" id="example-size">
                                                                            <label
                                                                                for="product_details[{{ 0 }}][sizes][0][name]">Name</label>
                                                                            <input type="text"
                                                                                name="product_details[{{ 0 }}][sizes][0][name]"
                                                                                value="{{ $product->details[0]['sizes'][0]['name'] ?? '' }}">
                                                                            <label
                                                                                for="product_details[{{ 0 }}][sizes][0][quantity]">Quantity</label>
                                                                            <input type="number"
                                                                                name="product_details[{{ 0 }}][sizes][0][quantity]"
                                                                                value="{{ $product->details[0]['sizes'][0]['quantity'] ?? '' }}">
                                                                        </div>
                                                                        <div class="size" id="example-size">
                                                                            @if (isset($product->details))
                                                                                @foreach ($product->details as $index => $value)
                                                                                    @if (isset($value['sizes'][0]) && $index > 0)
                                                                                        <label
                                                                                            for="product_details[{{ $index }}][sizes][0][name]">Name</label>
                                                                                        <input type="text"
                                                                                            name="product_details[{{ $index }}][sizes][0][name]"
                                                                                            value="{{ $value['sizes'][0]['name'] }}">
                                                                                        <label
                                                                                            for="product_details[{{ $index }}][sizes][0][quantity]">Quantity</label>
                                                                                        <input type="number"
                                                                                            name="product_details[{{ $index }}][sizes][0][quantity]"
                                                                                            value="{{ $value['sizes'][0]['quantity'] }}">
                                                                                    @endif
                                                                                @endforeach
                                                                            @endif
                                                                        </div>
                                                                    </div>


                                                                    <button type="button" class="add-button"
                                                                        onclick="saveSize()">Add Size</button><br><br>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Price: <span>( In USD
                                                            )</span></label>
                                                    <input type="number" name="price" class="form-control"
                                                        id="price" step="0.01" value="{{ $product->price }}"
                                                        required min="0">
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">Description</label>
                                                    <textarea class="form-control" rows="4" name="description">{{ $product->description }}</textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">Product Tags <span>( Type and
                                                            make comma to separate tags )</span></label>
                                                    <input type="text" class="form-control" id="group_tag"
                                                        name="group_tag" value="" placeholder=""
                                                        data-role="tagsinput" />
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div> <!-- End Content -->
    </div> <!-- End Content Wrapper -->
    </div>
    </form>
    </div>
    </div>

    <style>
        .add-button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .add-button:hover {
            background-color: #0056b3;
        }

        .size {
            margin-bottom: 20px;
        }

        .size label {
            font-weight: bold;
        }

        .size input[type="text"],
        .size input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
    </style>
    <script>
        let sizeCounter = {{ count($product->details) }};
        let countDetail = {{ count($product->details) }};

        function saveSize() {
            sizeCounter++;
            countDetail++;
            const sizeDiv = document.createElement('div');
            sizeDiv.className = 'size';
            sizeDiv.innerHTML = document.getElementById("example-size").innerHTML;
            // set input names
            const inputs = sizeDiv.querySelectorAll("input");
            const length = inputs.length;
            for (let i = 0; i < length; i++) {
                inputs[i].name = inputs[i].name.replace("0", countDetail);
                inputs[i].value = "";
            }
            document.getElementById('sizes_1').appendChild(sizeDiv);
            // Reset modal inputs
            // document.getElementById('modal_size_name').value = '';
            // document.getElementById('modal_quantity').value = '';

            // Close the modal
            // $('#addSizeModal').modal('hide');
        }
    </script>
    <script>
        const onSelectImage = e => {
            const n = e.target.value.split("\\").length;
            document.querySelector("#img_name_label").innerText = e.target.value.split("\\")[n - 1];
        }
    </script>
@endsection
