@extends('admin.master')

@section('admin_title', 'All | Size')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Size</h3>
                    <a href="{{ route('size.create') }}" class="btn btn-outline-success btn-sm float-right"><i class="fa fa-plus-circle"></i> Create Size</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Size Name</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sizes as $size)
                            <tr>
                                <td>{{ $size->id }}</td>
                                <td>{{ $size->size_name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('size.edit', $size->id) }}" class="btn btn-outline-info btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('size.destroy', $size->id) }}" class="btn btn-outline-danger btn-sm" title="Delete"><i class="fa fa-trash-alt"></i></a>
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
