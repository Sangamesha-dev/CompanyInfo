@extends('layouts.app')
@section('content')
<div class="container show-data">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Upload Companies Information <div class="pull-right-back"> <span> <a href="/employees">Back</a></span></div></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            Upload all the branches of your employee here. Download the template, fill the details and upload the template(template should be in .csv format)
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary pull-right-back"><i class="fa fa-upload"></i> Bulk upload</button>
                        </div>
                        <div class="col-md-6">
                            {!! Form::open(['action' =>'App\Http\Controllers\EmployeeController@downloadCsv', 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'container']) !!}
                            @csrf
                            {{ Form::hidden('name','Employee', ['class'=>'form-control']) }}
                            {!! Form::submit('Download template', ['class' => 'btn btn-primary']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
