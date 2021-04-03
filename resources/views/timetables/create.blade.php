@extends('layouts.template')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Timetable</h2>
        </div>
       
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('timetables.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <select class="form-control" name="day_id">
                <option value="">-- Choose Day --</option>
                @foreach ($days as $id => $name)
                    <option
                        value="{{$id}}" {{ (isset($timetable['day_id']) && $timetable['day_id'] == $id) ? ' selected' : '' }}>{{$name}}</option>
                @endforeach
            </select>
        </div>
        <br>        
        <br>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <select class="form-control" name="subject_id">
                <option value="">-- Choose Subject --</option>
                @foreach ($subjects as $id => $name)
                    <option
                        value="{{$id}}" {{ (isset($timetable['subject_id']) && $timetable['subject_id'] == $id) ? ' selected' : '' }}>{{$name}}</option>
                @endforeach
            </select>
        </div>
        <br>        
        <br>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <select class="form-control" name="hall_id">
                <option value="">-- Choose Hall --</option>
                @foreach ($halls as $id => $name)
                    <option
                        value="{{$id}}" {{ (isset($timetable['hall_id']) && $timetable['hall_id'] == $id) ? ' selected' : '' }}>{{$name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <br>
    <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Time From:</strong>
                <input type="text" name="time_from" class="form-control" placeholder="Time From">
            </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Time To:</strong>
                <input type="text" name="time_to" class="form-control" placeholder="Time To">
            </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        
                <a class="btn btn-primary" href="{{ route('timetables.index') }}"> Back</a>
        </div>
    </div>
   
</form>
@endsection