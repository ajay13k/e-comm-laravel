@extends('admin/layout');
@section('page_title', 'add product')
@section('container')

    @if ($id > 0)
        {{ $image_required = '' }}
    @else
        {{ $image_required = 'required' }}
    @endif

    <h1>addproduct</h1>
    <a href="{{ url('admin/product') }}">
        <button type="button" class="btn btn-success">Back</button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">

            <form action="{{ route('product.manage_product_process') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="control-label mb-1">Product Name</label>
                    <input id="name" value="{{ $name }}" name="name" type="text" class="form-control"
                        required>
                    @error('name')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="brand" class="control-label mb-1">Product Brand</label>
                    <input id="brand" value="{{ $brand }}" name="brand" type="text" class="form-control"
                        required>
                    @error('brand')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="model" class="control-label mb-1">Product Model</label>
                    <input id="model" value="{{ $model }}" name="model" type="text" class="form-control"
                        required>
                    @error('model')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="short_desc" class="control-label mb-1">Product Short_Disc</label>
                    <textarea id="short_desc" name="short_desc" type="text" class="form-control" required>{{ $short_desc }}</textarea>
                    @error('short_desc')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="desc" class="control-label mb-1">Product Disc</label>
                    <textarea id="desc" name="desc" type="text" class="form-control" required>{{ $desc }}</textarea>

                    @error('desc')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="keywords" class="control-label mb-1">Product Keywords</label>
                    <textarea id="keywords" name="keywords" type="text" class="form-control" required>{{ $keywords }}</textarea>

                    @error('keywords')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="technical_specification" class="control-label mb-1">Product Technical_Specification</label>
                    <textarea id="technical_specification" name="technical_specification" type="text" class="form-control" required>{{ $technical_specification }}</textarea>

                    @error('technical_specification')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="uses" class="control-label mb-1">Product Uses</label>
                    <textarea id="uses" name="uses" type="text" class="form-control" required>{{ $uses }}</textarea>

                    @error('uses')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="warranty" class="control-label mb-1">Product Warranty</label>
                    <textarea id="warranty" name="warranty" type="text" class="form-control" required>{{ $warranty }}</textarea>

                    @error('warranty')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group has-success">
                    <label for="slug" class="control-label mb-1">product_Slug</label>
                    <input id="slug" value="{{ $slug }}" name="slug" type="text"
                        class="form-control cc-name valid" required>
                    @error('slug')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="form-group has-success">
                    <label for="image" class="control-label mb-1">product_image</label>
                    <input id="image" name="image" type="file" class="form-control cc-name valid"
                        {{ $image_required }}>
                    @error('image')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="form-group has-success">
                    <label for="category" class="control-label mb-1">product_category</label>
                    <select id="category_id" name="category_id" class="form-control cc-name valid" required>

                        <option value="">Select Categories</option>
                        @foreach ($category as $list)
                            @if ($category_id == $list->id)
                                <option selected value="{{ $list->id }}">
                                @else
                                <option value="{{ $list->id }}">
                            @endif
                            {{ $list->category_name }}</option>
                        @endforeach
                    </select>

                </div>




                <div>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                        submit
                    </button>
                    <input type="hidden" name="id" value="{{ $id }}">
                </div>
            </form>
        </div>

    </div>
@endsection
