@extends('layouts.app')
@section('content')
<div class="container show-data">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Company Information <span class="pull-right-back"> <a href="/companies"> Back</a></span> </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <td>Id</td>
                            <td>{{ $companies->id }}</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{ $companies->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $companies->email }}</td>
                        </tr>
                        <tr>
                            <td>Logo</td>
                            @if ($companies->logo == '')
                                <td>{{ '--' }}</td>
                            @else
                                <td><img src="{{ Storage::url($companies->logo) }}" alt="Logo" height="100" weight="100"></td>
                            @endif
                        </tr>
                        <tr>
                            <td>Website</td>
                            <td>{{ $companies->website }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
