@extends('layouts.adminlayout')
@section('nav_content')
<div class="navbar-breadcrumb">
    <h5 class="mb-0">Departments</h5>
    <nav aria-label="breadcrumb">
       <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('department.index')}}">Departments</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit Department</li>
       </ul>
    </nav>
 </div>
@stop
@section('content')
      <!-- Page Content  -->
      <div id="content-page" class="content-page">
        <div class="container-fluid">
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{Session::get('success')}}
</div>
@endif
<div class="row">
    <div class="col-sm-12">
          <div class="iq-card">
             <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                   <h4 class="card-title">Edit Department</h4>
                </div>
             </div>
             <div class="iq-card-body">
                <form method="post" action="{{route('department.update',$department->dno)}}">
                    @csrf
                    <div class="form-group">
                       <label for="dno">Department no:</label>
                       <input type="text" class="form-control" id="dno" name="dno" value="{{$department->dno}}">
                    </div>
                    <div class="form-group">
                       <label for="dname">Department Name:</label>
                       <input type="text" class="form-control" id="dname" name="dname" value="{{$department->dname}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                 </form>
             </div>
          </div>
    </div>
</div>
        </div>
      </div>
@endsection
