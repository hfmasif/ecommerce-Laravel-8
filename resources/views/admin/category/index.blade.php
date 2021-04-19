@extends('admin.master')

@section('admin_title', 'All | Category')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Category</h3>
                    <a href="{{ route('category.create') }}" class="btn btn-outline-success btn-sm float-right"> <i class="fa fa-plus-circle"></i> Create Category</a>
                </div>

                @include('admin.includes.message')

                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td class="text-center">
                                @if ( $category->status == 1 )
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-warning">Inactive</span>
                                @endif
                            </td>
                            <td class="text-center">

                                @if($category->status == 1)
                                    <a title="Are you want to Inactivated status?" href="{{ route('category.inactive', $category->id) }}" class="btn btn-sm btn-success btn-xs"><i class="fa fa-arrow-up"></i></a>
                                @else
                                    <a title="Are you want to Activate status?" href="{{ route('category.active', $category->id) }}" class="btn btn-sm btn-info btn-xs"><i class="fa fa-arrow-down"></i></a>
                                @endif

                                <a href="{{ route('category.edit', $category->id) }}" title="Edit Category Name" class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('category.destroy', $category->id) }}" title="Delete Category Name" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
