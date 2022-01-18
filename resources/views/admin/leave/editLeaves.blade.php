@extends('layouts.adminlayout')
@section('nav_content')
<div class="navbar-breadcrumb">
    <h5 class="mb-0">Edit Leave</h5>
    <nav aria-label="breadcrumb">
       <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('leave.index')}}">Leaves</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit Leave</li>
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
                   <h4 class="card-title">Edit Leave</h4>
                </div>
             </div>
             <div class="iq-card-body">
                <form method="post" action="{{route('leave.update',$leave->id)}}">
                    @csrf

                    <div class="form-group">
                       <label for="id">Leave ID:</label>
                       <input type="text" class="form-control" id="id" name="id" value="{{$leave->id}}" >
                    </div>
                    <div class="form-group">
                       <label for="eid">Employee ID:</label>
                       <input type="text" class="form-control" id="eid" name="eid" value="{{$leave->employee_id}}">
                    </div>
                    <div class="form-group">
                        <label for="eid">Month:</label>
                        <input type="text" class="form-control" id="month" name="month" value="{{$leave->month}}">
                     </div>
                     <div class="form-group">
                        <label for="eid">Leave Balance:</label>
                        <input type="text" class="form-control" id="balance" name="balance" value="{{$leave->balance}}">
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
