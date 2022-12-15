@extends('admin/layout');
@section('page_title', 'add category')
@section('container')
    <h1>addcategory</h1>
    <a href="{{ url('admin/category') }}">
        <button type="button" class="btn btn-success">Back</button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">

            <form action="{{ route('category.manage_category_process') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="category_name" class="control-label mb-1">Category_Name</label>
                    <input id="category_name" value="{{ $category_name }}" name="category_name" type="text"
                        class="form-control" required>
                    @error('category_name')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group has-success">
                    <label for="category_slug" class="control-label mb-1">Category_Slug</label>
                    <input id="category_slug" value="{{ $category_slug }}" name="category_slug" type="text"
                        class="form-control cc-name valid" required>
                    @error('category_slug')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

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
