@extends('admin.master')

@section('admin_title', 'Create | Subcategory')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">

                <div class="card-header">
                    <h3 class="card-title">Create Sub-Category</h3>
                    <a href="{{ route('subcategory.index') }}" class="btn btn-outline-success btn-sm float-right"><i class="fa fa-plus-circle"></i> All Sub-Category</a>
                </div>

                @include('admin.includes.message')

                <div class="card-body">
                    <form action="{{ route('subcategory.store') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="Subcategory Name">Subcategory Name</label>
                            <input type="text" class="form-control {{ $errors->has('subcategory_name') ? 'is-invalid' : '' }}" name="subcategory_name" placeholder="Subcategory Name" value="{{ old('subcategory_name') }}">
                            @if($errors->has('subcategory_name'))
                                <strong class="text-danger">{{ $errors->first('subcategory_name') }}</strong>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Status</label><br>
                            <input type="radio" name="subcategory_status" value="1">
                            <label class="form-check-label">Active</label><br>
                            <input type="radio" name="subcategory_status" value="0">
                            <label class="form-check-label">Disable</label><br>
                            @if($errors->has('subcategory_status'))
                                <strong class="text-danger">{{ $errors->first('subcategory_status') }}</strong>
                            @endif
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
