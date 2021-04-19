@extends('admin.master')

@section('admin_title', 'All | Brand')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Brand</h3>
                    <a href="{{ route('brand.create') }}" class="btn btn-outline-success btn-sm float-right"><i class="fa fa-plus-circle"></i> Create Brand</a>
                </div>

                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Brand Name</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brands as $brand)
                        <tr>
                            <td>{{ $brand->id }}</td>
                            <td>{{ $brand->brand_name }}</td>
                            <td class="text-center">
                                @if ($brand->brand_status == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-warning">Inactive</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($brand->brand_status == 1)
                                    <a href="{{ route('brand.inactive', $brand->id) }}" class="btn btn-success btn-sm btn-xs" title="Click to Deactive"><i class="fa fa-arrow-up"></i></a>
                                @else
                                    <a href="{{ route('brand.active', $brand->id) }}" class="btn btn-info btn-sm btn-xs" title="Click to Active"><i class="fa fa-arrow-down"></i></a>
                                @endif

                                <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-outline-info btn-sm" title="Edit Brand"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('brand.destroy', $brand->id) }}" class="btn btn-outline-danger btn-sm" title="Delete Brand"><i class="fa fa-trash-alt"></i></a>
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
