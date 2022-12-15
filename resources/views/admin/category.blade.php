@extends('admin/layout');
@section('page_title', 'category')
@section('category_select', 'active')
@section('container')
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
    <h1>category</h1>
    <a href="category/addcategory"><button type="button" class="btn btn-success">Add Category</button></a>

    <div class="row m-t-30">
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category_Name</th>
                        <th>Category_Slug</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $list)
                        <tr>
                            <td>{{ $list->id }}</td>
                            <td>{{ $list->category_name }}</td>
                            <td>{{ $list->category_slug }}</td>
                            <td>

                                <a href="{{ url('admin/category/addcategory/') }}/{{ $list->id }}"><button type="button"
                                        class="btn btn-btn btn-primary">Edit</button></a>


                                @if ($list->status == 1)
                                    <a href="{{ url('admin/category/status/0') }}/{{ $list->id }}"><button
                                            type="button" class="  btn btn-success">Active</button></a>
                                @elseif($list->status == 0)
                                    <a href="{{ url('admin/category/status/1') }}/{{ $list->id }}"><button
                                            type="button" class=" btn btn-warning">DeaActive</button></a>
                                @endif

                                <a href="{{ url('admin/category/delete/') }}/{{ $list->id }}"><button type="button"
                                        class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
