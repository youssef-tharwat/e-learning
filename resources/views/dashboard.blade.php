@extends('layouts.app')

@section('content')
    <div class="container" style="margin:7em;">
        <div class="row">
            <div class="col-sm-12">
                    <h2>Dashboard <i class="fa fa-dashboard" aria-hidden="true"></i></h2>
                    <h4>Welcome {{Auth::user()->name}}</h3>
            </div>
           
        </div>

        
    </div>
@endsection