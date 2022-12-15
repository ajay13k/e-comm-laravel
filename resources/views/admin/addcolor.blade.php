@extends('admin/layout');
@section('page_title', 'add Size')
@section('container')
    <h1>addcolor</h1>
    <a href="{{ url('admin/color') }}">
        <button type="button" class="btn btn-success">Back</button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">

            <form action="{{ route('color.manage_color_process') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="color" class="control-label mb-1">Color</label>
                    <input id="color" value="{{ $color }}" name="color" type="text" class="form-control"
                        required>
                    @error('color')
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
