<div class="col-md-8 text-center offset-3 mt-2">
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block text-center">
            <strong>Well Done! </strong>{{ $message }}
            <button type="button" class="close" data-dismiss = "alert">x</button>
{{--            <strong>{{ $message }}</strong>--}}
        </div>
    @endif

        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block text-center">
                <strong>Well Done! </strong>{{ $message }}
                <button type="button" class="close" data-dismiss = "alert">x</button>
                {{--            <strong>{{ $message }}</strong>--}}
            </div>
        @endif

</div>
