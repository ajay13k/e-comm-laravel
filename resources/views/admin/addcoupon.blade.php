@extends('admin/layout');
@section('page_title', 'add category')
@section('container')
    <h1>addCoupon</h1>
    <a href="{{ url('admin/coupon') }}">
        <button type="button" class="btn btn-success">Back</button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">

            <form action="{{ route('coupon.manage_category_process') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title" class="control-label mb-1">Title</label>
                    <input id="title" value="{{ $title }}" name="title" type="text" class="form-control"
                        required>
                    @error('title')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group has-success">
                    <label for="code" class="control-label mb-1">Code</label>
                    <input id="code" value="{{ $code }}" name="code" type="text"
                        class="form-control cc-name valid" required>
                    @error('code')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="form-group has-success">
                    <label for="value" class="control-label mb-1">Value</label>
                    <input id="value" value="{{ $value }}" name="value" type="text"
                        class="form-control cc-name valid" required>
                    @error('value')
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
