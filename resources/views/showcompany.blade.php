@extends('layouts.app')
@section('content')
<div class="container show-data">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @if (session()->has('success'))
                    <h4 style="color: green">{{ session('success') }}</h4>
                @endif
                <div class="card-header">Create new company information. <span class="pull-right-back"> <a href="/companies"> Back</a></span></div>
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
                        {!! Form::open(['action' =>'App\Http\Controllers\CompanyController@showform', 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'container']) !!}
                        @csrf
                       {{  Form::label('name', 'Enter Company Name', ['class' => 'form-group required control-label','required']) }}
                        {{ Form::text('name','', ['class'=>'form-control']) }}
                        <br>
                        {{  Form::label('email', 'E-Mail Address', ['class' => 'email']) }}
                        {!! Form::email('Email', '',['class' => 'form-control']) !!}
                        <br>
                        {{  Form::label('logo', 'Enter Company Logo', ['class' => 'logo']) }}
                        {{ Form::file('logo') }}
                        <br>
                        {{  Form::label('website', 'Enter Company Website', ['class' => 'website']) }}
                        {{ Form::text('website',  '',['class' => 'form-control']) }}
                        <br>
                        {{  Form::label('Status', '', ['class' => 'form-group required control-label']) }}
                        {{ Form::select('active', ['1' => 'Active', '0' => 'Inactive'],null,['placeholder'=>'select','required','class'=>'form-control']) }}
                        <br>
                        {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                        {!! Form::close() !!}
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

