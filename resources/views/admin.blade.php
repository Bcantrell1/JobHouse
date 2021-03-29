@extends('layouts.logged')

@section('title')
			Admin Dashboard
@endsection()

@section('content')
  <nav class="navbar navbar-dark navbar-expand" style="background-color: #F58A07;">
    <div class="container">
      <div class=" collapse navbar-collapse justify-content-center" id="navbarText">
        <h1 class="navbar-brand text-center">Admin Page</h1>
      </div>
    </div>
  </nav>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 align-self-center" style="margin: 100px 0px 0px 0px;">
          <h2 class="text-center" style="margin: 0px 0px 30px;">Modify Users</h2>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Registered User's</h4>
            @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
            @endif
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead style="color: #F58A07;">
                  <th>ID</th>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Banned</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </thead>
                <tbody>
                  @foreach($users as $row)
                  <tr>
                    <td>{{ $row->ID }}</td>
                    <td>{{ $row->FIRSTNAME . ' ' . $row->LASTNAME }}</td>
                    <td>{{ $row->EMAIL }}</td>
                    <td>{{ $row->ROLE }}</td>
                    <td>{{ $row->SUSPENDED == 1 ? 'BANNED' : 'Not Banned' }}</td>
                    <td>
                      <a href="{{ url('/admin/edit', $row->ID) }}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                      <form action="{{ url('/admin/delete', $row->ID) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger">Remove</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach()
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection()