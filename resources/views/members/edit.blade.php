@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
{{--  member name from variable passed through controller --}}
            <h2> Edit {{ $member->first_name }} {{ $member->last_name }}</h2>
        </div>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::model($member, ['method' => 'PATCH','route' => ['member-update', $member->id], 'enctype'=>'multipart/form-data']) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <strong>First Name: </strong>
                            <input name="f_name" type="text" class="form-control" value="{{ $member->first_name }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <strong>DS Division: *</strong>
                            <select class="form-control" name="division" value="">{{ $member->ds_division }}>
                                <option value="Colombo 1">Colombo 1</option>
                                <option value="Colombo 2">Colombo 2</option>
                                <option value="Colombo 3">Colombo 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <strong>Last Name: </strong>
                            <input name="l_name" type="text" class="form-control" value="{{ $member->last_name }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <strong>Date of Birth: </strong>
                            <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $member->dob }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <strong>Summery: </strong>
                            <textarea name="summery" type="text" class="form-control" value="" rows="3">{{ $member->summery }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin-bottom: 10px;">
                    <button type="reset" class="btn btn-primary">Reset</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
                {!! Form::close() !!}
            </div>

            <a href="{{ url('/') }}"><button type="submit" class="btn btn-secondary">Back</button></a>
        </div>

    </div>
@endsection
