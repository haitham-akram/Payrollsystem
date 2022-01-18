@extends('layouts.adminlayout')
@section('nav_content')
<div class="navbar-breadcrumb">
    <h5 class="mb-0">Add Deduction</h5>
    <nav aria-label="breadcrumb">
       <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('deduction.index')}}">Deductions</a></li>
          <li class="breadcrumb-item active" aria-current="page">Add Deduction</li>
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
@if(Session::has('error'))
<div class="alert alert-danger" role="alert">
    {{Session::get('error')}}
</div>
@endif
       <div class="row">
          <div class="col-lg-10">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">New Deduction</h4>
                      </div>
                   </div>
                   <div class="iq-card-body">
                      <div class="new-user-info">
                         <form method="post" action="{{route('deduction.store')}}">
                             @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                  <label for="ID">ID:</label>
                                  <input type="text" class="form-control" id="ID" name="ID" placeholder="ID">
                               </div>
                               <div class="form-group col-md-6">
                                  <label for="fname">Employee ID:</label>
                                  <input type="text" class="form-control" id="eid" name='eid' placeholder="Employee ID">
                               </div>
                               <div class="form-group col-md-6">
                                  <label for="lname">tax:</label>
                                  <input type="text" class="form-control" id="tax" name='tax' placeholder="tax">
                               </div>
                               <div class="form-group col-md-6">
                                  <label for="address">Leave Deduction:</label>
                                  <input type="text" class="form-control" id="leave" name='leave' placeholder="Leave Deduction">
                               </div>
                               <div class="form-group col-md-6">
                                <label for="dob">Provident Fund:</label>
                                <input type="text" class="form-control" id="provident"  name='provident'  placeholder="Provident Fund">
                             </div>
                             <div class="form-group col-md-6">
                                <label for="doj">Welfare Fund:</label>
                                <input type="text" class="form-control" id="welfare" name='welfare' placeholder="Welfare Fund">
                             </div>
                               <div class="form-group col-md-12">
                                  <label for="phone">Loan Deduction:</label>
                                  <input type="text" class="form-control" id="loan" name="loan" placeholder="Loan Deduction">
                               </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add New Deduction</button>
                         </form>
                      </div>
                   </div>
                </div>
          </div>
       </div>
    </div>
 </div>
@endsection
