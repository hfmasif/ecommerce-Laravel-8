@extends('admin.master')

@section('admin_title', 'Edit | Brand')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Edit Brand</h3>
                    <a href="{{ route('brand.index') }}" class="btn btn-outline-success btn-sm float-right"><i class="fa fa-plus-circle"></i> All Brand</a>
                </div>

                @include('admin.includes.message')

                <div class="card-body">
                    <form action="{{ route('brand.update', $brand->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Brand Name</label>
                            <input type="text" class="form-control {{ $errors->has('brand_name') ? 'is-invalid' : '' }}" name="brand_name" placeholder="Brand Name" value="{{ $brand->brand_name }}">
                            @if ($errors->has('brand_name'))
                                <strong class="text-danger">{{ $errors->first('brand_name') }}</strong>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Status</label><br>
                            <input type="radio" name="brand_status" {{ $brand->brand_status == 1 ? 'checked' : '' }} value="1">
                            <label for="" class="form-check-label">Active</label>
                            <input type="radio" name="brand_status" {{ $brand->brand_status == 0 ? 'checked' : '' }} value="0">
                            <label for="" class="form-check-label">Inactive</label>
                            @if($errors->has('brand_status'))
                                <strong class="text-danger">{{ $errors->first('brand_status') }}</strong>
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
