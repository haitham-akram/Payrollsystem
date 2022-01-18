@extends('layouts.adminlayout')
@section('nav_content')
<div class="navbar-breadcrumb">
    <h5 class="mb-0">Add Contract</h5>
    <nav aria-label="breadcrumb">
       <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('contract.index')}}">Contracts</a></li>
          <li class="breadcrumb-item active" aria-current="page">Add Contract</li>
       </ul>
    </nav>
 </div>
@stop
@section('content')
      <!-- Page Content  -->
      <div id="content-page" class="content-page">
        <div class="container-fluid">
{{-- start here  --}}
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
                   <h4 class="card-title">Add Contract</h4>
                </div>
             </div>
             <div class="iq-card-body">
                <form method="post" action="{{route('contract.store')}}">
                    @csrf
                    <div class="form-group">
                       <label for="dno">Contract ID:</label>
                       <input type="text" class="form-control" id="id" name="id">
                    </div>
                    <div class="form-group">
                       <label for="base">Base salary</label>
                       <input type="text" class="form-control" id="base" name="base">
                    </div>
                    <div class="form-group">
                        <label for="hours_num"> Number of hours</label>
                        <input type="number" class="form-control" id="hours_num" name="hours_num">
                     </div>
                     <div class="form-group">
                        <label for="paid_per_hour"> Paid per hour</label>
                        <input type="number" class="form-control" id="paid_per_hour" name="paid_per_hour">
                     </div>
                     <div class="form-group">
                        <label for="eid"> Employee ID</label>
                        <input type="text" class="form-control" id="eid" name="eid">
                     </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                 </form>
             </div>
          </div>
    </div>
</div>
        </div>
     </div>
@endsection
