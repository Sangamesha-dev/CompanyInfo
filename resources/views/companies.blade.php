@extends('layouts.app')
@section('content')
<div class="container show-data">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Companies Information <div class="pull-right-back"> <span> <a href="/company/upload" class="btn btn-info">Bulk Upload</a></span> <span> <a href="/company/create" class="btn btn-info">New</a></span></div></div>
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Logo</th>
                            <th>Website</th>
                            <th>Employees Count</th>
                            <th></th>
                        </tr>
                        @foreach ($companies as $company)
                        <tr>
                            <td>{{ $company['id'] }}</td>
                            <td>{{ $company['name'] }}</td>
                            <td>{{ $company['email'] }}</td>
                            @if ($company['logo'] == "")
                            <td>{{ '--' }}</td>
                            @else
                            <td> <img src="{{ Storage::url($company['logo']) }}" alt="" width="100" height="100"> </td>
                            @endif

                            <td>{{ $company['website'] }}</td>
                            <td>{{ $company['employees_count'] }}</td>
                            <td>
                                <div class="btn-group sub-menus">
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Actions
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/companies/{{ encrypt($company['id']) }}">View</a>
                                        <a class="dropdown-item" href="/companies/edit/{{ encrypt($company['id']) }}">Edit</a>
                                        <div class="dropdown-item delete-option" onclick="deleteInfo(this);" name="{{ $company['name'] }}"  url="/companies/delete/{{ encrypt($company['id']) }}">Delete</div>
                                    </div>
                                  </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <span class="show-pages">
                        {{ $companies->links() }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
