@extends('layouts.app')
@section('content')
<div class="container show-data">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @if (session()->has('success'))
                    <h4 style="color: green">{{ session('success') }}</h4>
                @endif
                <div class="card-header">Edit Company Information <span class="pull-right-back"> <a href="/companies"> Back</a></span> </div>
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
                    {!! Form::open(['action' =>'App\Http\Controllers\CompanyController@editCompany', 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'container']) !!}
                    @csrf
                    <table class="table table-hover table-bordered">
                        <tr>
                            <td>Id</td>
                            <td>{{ $company->id }}
                                {{ Form::hidden('id',$company->id, ['required','class'=>'form-control']) }}
                            </td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{ Form::text('name',$company->name, ['class'=>'form-control']) }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{!! Form::email('Email',$company->email,['class' => 'form-control']) !!}</td>
                        </tr>
                        <tr>
                            <td>Logo</td>
                            <td>
                                @if ($company->logo != '')
                                <img src="{{ Storage::url($company->logo) }}" alt="Logo" width="100" height="100">
                                @endif
                                {{ Form::file('logo') }}
                            </td>
                        </tr>
                        <tr>
                            <td>Website</td>
                            <td>{{ Form::text('website',$company->website,['class' => 'form-control']) }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ Form::select('active', ['1' => 'Active', '0' => 'Inactive'],$company->active,['required','class'=>'form-control']) }}</td>
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
