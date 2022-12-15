@extends('admin/layout');
@section('page_title', 'product')
@section('product_select', 'active')
@section('container')
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
    <h1>product</h1>
    <a href="product/addproduct"><button type="button" class="btn btn-success">Add Product</button></a>

    <div class="row m-t-30">
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $list)
                        <tr>
                            <td>{{ $list->id }}</td>
                            <td>{{ $list->name }}</td>
                            <td>{{ $list->slug }}</td>
                            <td>
                               @if($list->image == "")

                               @else
                               <img width="100px" src="{{asset('storage/media/'.$list->image)}}"/>

                               @endif

                                </td>
                            <td>

                                <a href="{{ url('admin/product/addproduct/') }}/{{ $list->id }}"><button type="button"
                                        class="btn btn-btn btn-primary">Edit</button></a>


                                @if ($list->status == 1)
                                    <a href="{{ url('admin/product/status/0') }}/{{ $list->id }}"><button
                                            type="button" class="  btn btn-success">Active</button></a>
                                @elseif($list->status == 0)
                                    <a href="{{ url('admin/product/status/1') }}/{{ $list->id }}"><button
                                            type="button" class=" btn btn-warning">DeaActive</button></a>
                                @endif

                                <a href="{{ url('admin/product/delete/') }}/{{ $list->id }}"><button type="button"
                                        class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
