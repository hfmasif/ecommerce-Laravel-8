@extends('admin.master')

@section('admin_title', 'Edit | Color')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Edit Colour</h3>
                    <a href="{{ route('color.index') }}" class="btn btn-outline-success btn-sm float-right"><i class="fa fa-plus-circle"></i> All Colour</a>
                </div>

                @include('admin.includes.message')

                <div class="card-body">
                    <form action="{{ route('color.update', $color->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Colour Name</label>
                            <input type="text" class="form-control {{ $errors->has('color_name') ? 'is-invalid' : '' }}" name="color_name" placeholder="Colour Name" value="{{ $color->color_name }}">
                            @if($errors->has('color_name'))
                                <strong class="text-danger">{{ $errors->first('color_name') }}</strong>
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
