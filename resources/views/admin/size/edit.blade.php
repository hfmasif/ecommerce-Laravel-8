@extends('admin.master')

@section('admin_title', 'Edit | Size')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Edit Size</h3>
                    <a href="{{ route('size.index') }}" class="btn btn-outline-success btn-sm float-right"><i class="fa fa-plus-circle"></i> All Size</a>
                </div>

                @include('admin.includes.message')

                <div class="card-body">
                    <form action="{{ route('size.update', $size->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Colour Name</label>
                            <input type="text" class="form-control {{ $errors->has('size_name') ? 'is-invalid' : '' }}" name="size_name" placeholder="Size Name" value="{{ $size->size_name }}">
                            @if($errors->has('size_name'))
                                <strong class="text-danger">{{ $errors->first('size_name') }}</strong>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
