@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Create A New Member</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p class="success-message-leads">Successfully Added</p>
                    </div>
                @endif
                @if ($message = Session::get('error'))
                    <div class="alert alert-warning">
                        <p class="warning-message-leads">Not Added</p>
                    </div>
                @endif
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
                {!! Form::open(array('route' => 'member-store','method'=>'POST', 'enctype'=>'multipart/form-data')) !!}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <strong>First Name: </strong>
                                <input name="f_name" type="text" class="form-control" value="{{ old('first_name') }}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <strong>DS Division: *</strong>
                                <select class="form-control" name="division">
                                    <option value="Colombo 1">Colombo 1</option>
                                    <option value="Colombo 2">Colombo 2</option>
                                    <option value="Colombo 3">Colombo 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <strong>Last Name: </strong>
                                <input name="l_name" type="text" class="form-control" value="{{ old('last_name') }}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <strong>Date of Birth: </strong>
                                <input type="date" class="form-control" id="birthday" name="birthday">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <strong>Summery: </strong>
                                <textarea name="summery" type="text" class="form-control" value="{{ old('summery') }}" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin-bottom: 10px;">
                    <button type="reset" class="btn btn-primary">Reset</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>

                {!! Form::close() !!}
            </div>
            <a href="{{ url('/') }}"><button type="" class="btn btn-secondary">Back</button></a>
        </div>

    </div>
@endsection
