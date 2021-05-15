@extends('layouts.app')
@section('content')
<div class="container show-data">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @if (session()->has('success'))
                    <h4 style="color: green">{{ session('success') }}</h4>
                @endif
                <div class="card-header">Edit Employee Information <span class="pull-right-back"> <a href="/employees"> Back</a></span> </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {!! Form::open(['action' =>'App\Http\Controllers\EmployeeController@editEmployee', 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'container']) !!}
                    @csrf
                    <table class="table table-hover table-bordered">
                        <tr>
                            <td>Id</td>
                            <td>{{ $employee->id }}
                                {{ Form::hidden('id',$employee->id, ['required','class'=>'form-control']) }}
                            </td>
                        </tr>
                        <tr>
                            <th>First Name</th>
                            <td>{{ Form::text('first_name',$employee->first_name, ['required','class'=>'form-control']) }}</td>
                        </tr>
                        <tr>
                            <th>Last Name</th>
                            <td>{{ Form::text('last_name',$employee->last_name, ['required','class'=>'form-control']) }}</td>
                        </tr>
                        <tr>
                            <th>Company</th>
                            <td>{{ Form::select('company_id', $companies,$employee->company_id,['required','class'=>'form-control']) }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{!! Form::email('email', $employee->email,['class' => 'form-control']) !!}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{!! Form::number('phone',  $employee->phone,['class' => 'form-control']) !!}</td>
                        </tr>
                        <tr>
                            <th>Designation</th>
                            <td>{{ Form::text('designation',  $employee->designation,['class' => 'form-control']) }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ Form::select('active', ['1' => 'Active', '0' => 'Inactive'],$employee->active,['required','class'=>'form-control']) }}</td>
                        </tr>
                    </table>
                    {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
