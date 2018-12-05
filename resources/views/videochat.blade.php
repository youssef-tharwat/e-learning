@extends('layouts.app')
@section('css')
    @if(auth()->user())
        <script>
            window.user = {
                id: {{ \Illuminate\Support\Facades\Auth::user()->id }},
                name: "{{ \Illuminate\Support\Facades\Auth::user()->name }}"
            };
            window.csrfToken = "{{ csrf_token() }}";
        </script>
    @endif
    <style type="text/css">
        .navbar-laravel {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
        }

        .video-container {
            width: 500px;
            height: 380px;
            margin: 0px auto;
            border: 2px solid #645cff;
            position: relative;
            box-shadow: 1px 1px 11px #9e9e9e;
        }

        .my-video {
            width: 130px;
            position: absolute;
            left: 10px;
            bottom: 10px;
            border: 6px solid #2196F3;
            border-radius: 6px;
            z-index: 2;
        }

        .user-video {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }
        }
    </style>
@endsection
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