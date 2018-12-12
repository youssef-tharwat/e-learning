@extends('layouts.app')

@section('css')
    <style>

    </style>

@endsection

@section('content')
    <div class="container" id="app" style="margin-top:  5em; margin-bottom: 5em;">
        <div class="row justify-content-center">
            <chat-component></chat-component>
            <user-component></user-component>
        </div>
    </div>
@endsection

@section('vue')
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
@endsection