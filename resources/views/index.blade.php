@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <center><h1>Member List</h1></center>
                <br><br>
{{--                Validation message for success and error--}}
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p class="success-message-leads">Successfully Completed Task</p>
                    </div>
                @endif
                @if ($message = Session::get('error'))
                    <div class="alert alert-warning">
                        <p class="success-message-leads">Not Added</p>
                    </div>
                @endif
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search By Last Name">
                    <span class="input-group-btn">
                    <button class="btn btn-search" type="button"><i class="fa fa-search fa-fw"></i> Search</button>
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <a href="{{ route('member-create') }}"><button class="btn btn-primary" type="submit"><i class="fa fa-search fa-fw"></i> Add New Member</button></a>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="tablewrapper" id="irtcptable">
                    <table class="table table-hover table-dark table-bordered">

                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>DS Division</th>
                            <th>Date Of Birth</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($data as $datas)
                            <tr>
                                <td>{{ $datas->first_name }}</td>
                                <td>{{ $datas->last_name }}</td>
                                <td>{{ $datas->ds_division }}</td>
                                <td>{{ $datas->dob }}</td>
                                <td><a href="{{ url('/') }}/member-edit/{{$datas->id}}">Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ url('/') }}/member-delete/{{$datas->id}}">Delete</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
