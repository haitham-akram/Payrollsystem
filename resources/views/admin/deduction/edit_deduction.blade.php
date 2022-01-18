@extends('layouts.adminlayout')
@section('nav_content')
<div class="navbar-breadcrumb">
    <h5 class="mb-0">Edit Deduction</h5>
    <nav aria-label="breadcrumb">
       <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('deduction.index')}}">Deductions</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit Deduction</li>
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
          <div class="col-lg-10">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">Edit Deduction</h4>
                      </div>
                   </div>
                   <div class="iq-card-body">
                      <div class="new-user-info">
                         <form method="post" action="{{route('deduction.update',$current->id)}}">
                             @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                  <label for="ID">ID:</label>
                                  <input type="text" class="form-control" id="ID" name="ID" placeholder="ID" value="{{$current->id}}">
                               </div>
                               <div class="form-group col-md-6">
                                  <label for="fname">Employee ID:</label>
                                  <input type="text" class="form-control" id="eid" name='eid' placeholder="Employee ID" value="{{$current->employee_id}}">
                               </div>
                               <div class="form-group col-md-6">
                                  <label for="lname">tax:</label>
                                  <input type="text" class="form-control" id="tax" name='tax' placeholder="tax"value="{{$current->tax_deduction}}">
                               </div>
                               <div class="form-group col-md-6">
                                  <label for="address">Leave Deduction:</label>
                                  <input type="text" class="form-control" id="leave" name='leave' placeholder="Leave Deduction" value="{{$current->leave_deduction}}">
                               </div>
                               <div class="form-group col-md-6">
                                <label for="dob">Provident Fund:</label>
                                <input type="text" class="form-control" id="provident"  name='provident'  placeholder="Provident Fund" value="{{$current->Provident_Fund}}">
                             </div>
                             <div class="form-group col-md-6">
                                <label for="doj">Welfare Fund:</label>
                                <input type="text" class="form-control" id="welfare" name='welfare' placeholder="Welfare Fund" value="{{$current->welfare_Fund}}">
                             </div>
                               <div class="form-group col-md-12">
                                  <label for="phone">Loan Deduction:</label>
                                  <input type="text" class="form-control" id="loan" name="loan" placeholder="Loan Deduction" value="{{$current->loan_deduction}}">
                               </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Edit Deduction</button>
                         </form>
                      </div>
                   </div>
                </div>
          </div>
       </div>
    </div>
 </div>
@endsection
