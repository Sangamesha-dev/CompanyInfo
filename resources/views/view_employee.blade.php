@extends('layouts.app')
@section('content')
<div class="container show-data">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Employee Information <span class="pull-right-back"> <a href="/employees"> Back</a></span> </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <td>Id</td>
                            <td>{{ $employee->id }}</td>
                        </tr>
                        <tr>
                            <th>First Name</th>
                            <td>{{ $employee->first_name }}</td>
                        </tr>
                        <tr>
                            <th>Last Name</th>
                            <td>{{ $employee->last_name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $employee->email }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ $employee->phone }}</td>
                        </tr>
                        <tr>
                            <th>Designation</th>
                            <td>{{ $employee->designation }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
