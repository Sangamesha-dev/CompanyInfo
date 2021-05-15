@extends('layouts.app')
@section('content')
<div class="container show-data">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @if (session()->has('success'))
                    <h4 style="color: green">{{ session('success') }}</h4>
                @endif
                <div class="card-header">Create new company information. <span class="pull-right-back"> <a href="/employees"> Back</a></span></div>
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
                        {!! Form::open(['action' =>'App\Http\Controllers\EmployeeController@create', 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'container', 'id' => 'employee-form-submit']) !!}
                        @csrf
                        {{  Form::label('first_name', 'Enter First Name', ['class' => 'form-group required control-label','required']) }}
                        {{ Form::text('first_name','', ['required','class'=>'form-control']) }}
                        <br>
                        {{  Form::label('last_name', 'Enter Last Name', ['class' => 'form-group required control-label','required']) }}
                        {{ Form::text('last_name','', ['required','class'=>'form-control']) }}
                        <br>
                        {{  Form::label('Company','', ['class' => 'form-group required control-label']) }}
                        {{ Form::select('company_id', $companies,null,['placeholder'=>'select','required','class'=>'form-control']) }}
                        <br>
                        {{  Form::label('email', 'E-Mail Address', ['class' => 'email']) }}
                        {!! Form::email('email', '',['class' => 'form-control']) !!}
                        <br>
                        {{  Form::label('phone', 'Phone', ['class' => 'phone']) }}
                        {!! Form::number('phone', '',['class' => 'form-control']) !!}
                        <br>
                        {{  Form::label('Designation', 'Enter Designation', ['class' => 'designation']) }}
                        {{ Form::text('designation','',['class' => 'form-control']) }}
                        <br>
                        {{  Form::label('Status', '', ['class' => 'status']) }}
                        {{ Form::select('active', ['1' => 'Active', '0' => 'Inactive'],null,['placeholder'=>'select','required','class'=>'form-control']) }}
                        <br>
                        {!! Form::submit('Submit', ['class' => 'btn btn-success', 'onclick'=>'return createEmployee();']) !!}
                        {!! Form::close() !!}
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
