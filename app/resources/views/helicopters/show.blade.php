@extends('helicopters.layout')

@section('helicopters')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Helicopter</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('Helicopters.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $Helicopter->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $Helicopter->detail }}
            </div>
        </div>
    </div>
@endsection