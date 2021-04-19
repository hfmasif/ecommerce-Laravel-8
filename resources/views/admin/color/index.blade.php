@extends('admin.master')

@section('admin_title', 'All | Color')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Colour</h3>
                    <a href="{{ route('color.create') }}" class="btn btn-outline-success btn-sm float-right"><i class="fa fa-plus-circle"></i> Create Colour</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Color Name</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($colors as $color)
                        <tr>
                            <td>{{ $color->id }}</td>
                            <td>{{ $color->color_name }}</td>
                            <td class="text-center">
                                <a href="{{ route('color.edit', $color->id) }}" class="btn btn-outline-info btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('color.destroy', $color->id) }}" class="btn btn-outline-danger btn-sm" title="Delete"><i class="fa fa-trash-alt"></i></a>
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
