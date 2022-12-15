@extends('admin/layout');
@section('page_title', 'coupon')
@section('coupon_select', 'active')
@section('container')
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
    <h1>coupon</h1>
    <a href="{{ url('admin/coupon/addcoupon') }}"><button type="button" class="btn btn-success">Add Coupon</button></a>

    <div class="row m-t-30">
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Code</th>
                        <th>Value</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $list)
                        <tr>
                            <td>{{ $list->id }}</td>
                            <td>{{ $list->title }}</td>
                            <td>{{ $list->code }}</td>
                            <td>{{ $list->value }}</td>
                            <td>

                                <a href="{{ url('admin/coupon/addcoupon/') }}/{{ $list->id }}"><button type="button"
                                        class="btn btn-primary">Edit</button></a>

                                @if ($list->status == 1)
                                    <a href="{{ url('admin/coupon/status/0') }}/{{ $list->id }}"><button type="button"
                                            class="btn btn-success">Active</button></a>
                                @elseif($list->status == 0)
                                    <a href="{{ url('admin/coupon/status/1') }}/{{ $list->id }}"><button
                                            type="button" class="btn btn-warning">DeActive</button></a>
                                @endif


                                <a href="{{ url('admin/coupon/delete/') }}/{{ $list->id }}"><button type="button"
                                        class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
