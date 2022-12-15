@extends('admin/layout');
@section('page_title', 'add Size')
@section('container')
    <h1>addSize</h1>
    <a href="{{ url('admin/size') }}">
        <button type="button" class="btn btn-success">Back</button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">

            <form action="{{ route('size.manage_size_process') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="size" class="control-label mb-1">size</label>
                    <input id="title" value="{{ $size }}" name="size" type="text" class="form-control"
                        required>
                    @error('size')
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
