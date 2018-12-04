@extends('layouts.app')
@section('content')
    <div id="app" style="margin:20em;">
    </div>

@endsection

@section('react')
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
@endsection
@section('js')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endsection