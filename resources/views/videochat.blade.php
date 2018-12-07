@extends('layouts.app')
@section('css')
    <script src='https://cdn.scaledrone.com/scaledrone.min.js'></script>
    <style type="text/css">

        #video-section video {
            max-width: calc(50% - 100px);
            margin: 0 50px;
            box-sizing: border-box;
            border-radius: 2px;
            padding: 0;
            background: white;
        }

        #video-section{
            display: flex;
            justify-content: center;

        }
    </style>
@endsection
@section('content')
   <div class="container" style="  margin-top: 10em;
            margin-bottom: 10em;">
       <h2>Video Call Room</h2>
       <div id="video-section">
           <video id="localVideo" autoplay muted></video>
           <video id="remoteVideo" autoplay></video>
       </div>
   </div>


@endsection


@section('js')
    <script src="{{asset('js/script.js')}}"></script>
@endsection