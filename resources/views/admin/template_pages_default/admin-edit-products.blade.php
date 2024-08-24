<x-mylayouts.layout-default>
<div class="container my-5">
        <div class="card">

            <div class="card-body">


                <div class="card-title">
                    <h2>Edit Product</h2>
                </div>


                <form action="{{ route('admin.products.update', ['product' => $data->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')




                    <div class="form-group">
                        <label for="product_title">Product Title:</label>
                        <input type="text" value="{{ $data->title }}" class="form-control" id="product_title"
                            name="title" required>
                    </div>

                    <div class="form-group">
                        <label for="product_short_description">Short Description:</label>
                        <textarea class="form-control" rows="3" id="product_short_description"
                            name="short_description" required>{{ $data->short_description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="product_full_description">Long Description:</label>
                        <textarea class="form-control" rows="5" id="product_full_description"
                            name="full_description">{{ $data->full_description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="product_price">Price:</label>
                        <input type="text" value="{{ $data->price }}" class="form-control" id="product_price"
                            name="price" required>
                    </div>

                    <div class="form-group">
                        <label for="product_quantity">Quantity:</label>
                        <input type="text" value="{{ $data->quantity }}" class="form-control"
                            id="product_quantity" name="quantity" required>
                    </div>

                    <div class="form-group">
                        <label for="product_image_path">Image Path:</label>
                        <input type="text" value="{{ $data->image_path}}" class="form-control"
                            id="product_image_path" name="image_path" required>
                    </div>
                    <div class="form-group">
                        <label for="product_image">Image:</label>
                        <input type="text" value="{{ $data->image }}" class="form-control" id="product_image"
                            name="image_name">
                        <input type="file" class="form-control" id="product_image_upload" name="product_image_upload">

                        <div class="card flex d-flex">
                            <span>Current image:</span>
                            <img style="width: 80px; height:90px" src="{{ $data->getImage() }}" alt="image">
                            <span>New image uploaded:</span>
                            {{-- <img id="image_upload_preview" style="width: 80px; height:90px" src="#" alt="image">
                            --}}

                            <img id="preview-image-before-upload"
                                src="https://www.riobeauty.co.uk/images/product_image_not_found.gif" alt="preview image"
                                style="display: none;">





                        </div>
                    </div>


                    <div class="form-group">
                        <label for="product_category">Category:</label>
                        <input type="text" value="{{ $data->category }}" class="form-control"
                            id="product_category" name="category" required>
                    </div>

                    <div class="form-group">
                        <label for="product_group">Group:</label>
                        <select class="form-control" id="product_group" name="group" required>


                            <option value="{{ $data->group }}">{{ Str::ucfirst($data->product_group) }}</option>
                            <option value="exclusive">Exlusive</option>
                            <option value="featured">Featured</option>
                            <option value="upcoming">Upcoming</option>
                            <option value="none">None</option>


                        </select>
                    </div>



                    <div class="form-group">
                        <label for="product_is_active">Product Status:</label>
                        <select class="form-control" id="product_is_active" name="product_status" required>

                            @if($data->status == 'active')
                            <option value="active" selected>Active</option>
                            <option value="inactive">Inactive</option>
                            @else
                            <option value="inactive" selected>Inactive</option>
                            <option value="active">Active</option>

                            @endif
                        </select>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a class="btn btn-danger" href="{{ route('admin.products.index') }}">Cancel</a>
                    </div>

                </form>

            </div>
            {{-- End Card Body --}}
        </div>
        {{-- End Card --}}
    </div>
    {{-- End Container --}}
</x-mylayouts.layout-default>