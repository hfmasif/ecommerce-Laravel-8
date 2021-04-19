@extends('admin.master')

{{--@section('admin_title')--}}
{{--    Create | Category--}}
{{--@endsection--}}
@section('admin_title', 'Create | Category')  {{-- evabeo likha jay --}}

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Create Category</h3>
                    <a href="{{ route('category.index') }}" class="btn btn-outline-success btn-sm float-right"> <i class="fa fa-plus-circle"></i> All Category</a>
                </div>

{{--                @if ($message = Session::get('success'))--}}
{{--                    <div class="alert alert-success alert-block text-center">--}}
{{--                        <button type="button" class="close" data-dismiss = "alert">x</button>--}}
{{--                        <strong>{{ $message }}</strong>--}}
{{--                    </div>--}}
{{--                @endif--}}

                @include('admin.includes.message')



                <div class="card-body">
                    <form action="{{ route('category.store') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="category_name">Category Name</label>
                            <input type="text" class="form-control {{ $errors->has('category_name') ? 'is-invalid' : '' }}" name="category_name" placeholder="Category Name" value="{{ old('category_name') }}">

                            @if($errors->has('category_name'))
                                <strong class="text-danger">{{ $errors->first('category_name') }}</strong>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <input type="radio" name="category_status" value="1">
                            <label class="form-check-label">Active</label>
                            <input type="radio" name="category_status" value="0">
                            <label class="form-check-label">Disable</label><br>
                            @if($errors->has('category_status'))
                                <strong class="text-danger">{{ $errors->first('category_status') }}</strong>
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
