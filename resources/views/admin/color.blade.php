@extends('admin/layout');
@section('page_title', 'color')
@section('color_select', 'active')
@section('container')
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
    <h1>color</h1>
    <a href="{{ url('admin/color/addcolor') }}"><button type="button" class="btn btn-success">Add Color</button></a>

    <div class="row m-t-30">
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Color</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $list)
                        <tr>
                            <td>{{ $list->id }}</td>
                            <td>{{ $list->color }}</td>
                            <td>

                                <a href="{{ url('admin/color/addcolor/') }}/{{ $list->id }}"><button type="button"
                                        class="btn btn-primary">Edit</button></a>

                                @if ($list->status == 1)
                                    <a href="{{ url('admin/color/status/0') }}/{{ $list->id }}"><button type="button"
                                            class="btn btn-success">Active</button></a>
                                @elseif($list->status == 0)
                                    <a href="{{ url('admin/color/status/1') }}/{{ $list->id }}"><button type="button"
                                            class="btn btn-warning">DeActive</button></a>
                                @endif


                                <a href="{{ url('admin/color/delete/') }}/{{ $list->id }}"><button type="button"
                                        class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
