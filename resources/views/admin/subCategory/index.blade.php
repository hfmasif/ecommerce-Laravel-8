@extends('admin.master')

@section('admin_title', 'All | Subcategory')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Sub-Category</h3>
                    <a href="{{ route('subcategory.create') }}" class="btn btn-outline-success float-right btn-sm"><i class="fa fa-plus-circle"></i> Create SubCategory</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">

                        <thead>
                        <tr>
                            <th>#</th>
                            <th>SubCategory Name</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($subcategories as $subcategory)
                        <tr>
                            <td>{{ $subcategory->id }}</td>
                            <td>{{ $subcategory->subcategory_name }}</td>

                            <td class="text-center">
                                @if($subcategory->sub_status == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-warning">Inactive</span>
                                @endif
                            </td>

                            <td class="text-center">

                                @if($subcategory->sub_status == 1)
                                    <a href="{{ route('subcategory.inactive', $subcategory->id) }}" title="Click to Inactive" class="btn btn-success btn-sm btn-xs"><i class="fa fa-arrow-up"></i></a>
                                @else
                                    <a href="{{ route('subcategory.active', $subcategory->id) }}" title="Click to Active" class="btn btn-info btn-sm btn-xs"><i class="fa fa-arrow-down"></i></a>
                                @endif

                                <a href="{{ route('subcategory.edit', $subcategory->id) }}" class="btn btn-outline-info btn-sm" title="Edit SubCategory"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('subcategory.destroy', $subcategory->id) }}" class="btn btn-outline-danger btn-sm" title="Delete SubCategory"><i class="fa fa-trash-alt"></i></a>

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
