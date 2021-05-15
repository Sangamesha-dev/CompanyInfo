@extends('layouts.app')
@section('content')
<div class="container show-data">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Employees Information <div class="pull-right-back"> <span> <a href="/employee/upload" class="btn btn-info">Bulk Upload</a></span> <span> <a href="/employee/create" class="btn btn-info">New</a></span></div></div>
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th>Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Designation</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee['id'] }}</td>
                            <td>{{ $employee['first_name'] }}</td>
                            <td>{{ $employee['last_name'] }}</td>
                            <td>{{ $employee['email'] }}</td>
                            <td>{{ $employee['phone'] }}</td>
                            <td>{{ $employee['designation'] }}</td>
                            <td><div class="btn-group sub-menus">
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Actions
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/employees/{{ encrypt($employee['id']) }}">View</a>
                                    <a class="dropdown-item" href="/employee/edit/{{ encrypt($employee['id']) }}">Edit</a>
                                    <div class="dropdown-item delete-option" onclick="deleteInfo(this);" name="{{ $employee['first_name'] }}"  url="/employees/delete/{{ encrypt($employee['id']) }}">Delete</div>
                                </div>
                              </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <span class="show-pages">
                        {{ $employees->links() }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

