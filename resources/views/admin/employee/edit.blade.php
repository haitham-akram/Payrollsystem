@extends('layouts.adminlayout')
@section('nav_content')
<div class="navbar-breadcrumb">
    <h5 class="mb-0">Edit Employee</h5>
    <nav aria-label="breadcrumb">
       <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('employees')}}">Employees</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit Employee</li>
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
          <div class="col-lg-9">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">

                      <div class="iq-header-title">
                         <h4 class="card-title">Edit Employee Information</h4>
                      </div>
                   </div>
                   <div class="iq-card-body">
                      <div class="new-user-info">
                         <form method="post" action="{{route('employee.update',$current->id)}}">
                             @csrf
                            <div class="row">
                                <div class="form-group col-md-12">
                                  <label for="ID">ID:</label>
                                  <input type="text" class="form-control" id="ID" name="ID" placeholder="ID" value="{{$current->id}}">
                               </div>
                               <div class="form-group col-md-6">
                                  <label for="fname">First Name:</label>
                                  <input type="text" class="form-control" id="fname" name='fname' placeholder="First Name" value="{{$current->fname}}">
                               </div>
                               <div class="form-group col-md-6">
                                  <label for="lname">Last Name:</label>
                                  <input type="text" class="form-control" id="lname" name='lname' placeholder="Last Name" value="{{$current->lname}}">
                               </div>
                               <div class="form-group col-md-12">
                                  <label for="address">Address:</label>
                                  <input type="text" class="form-control" id="address" name='address' placeholder="Address" value="{{$current->address}}">
                               </div>
                               <div class="form-group col-md-6">
                                <label for="dob">Date of birth:</label>
                                <input type="date" class="form-control" id="dob"  name='dob'  placeholder="date of birth" value="{{$current->dob}}">
                             </div>
                             <div class="form-group col-md-6">
                                <label for="doj">Date of join:</label>
                                <input type="date" class="form-control" id="doj" name='doj' placeholder="date of join" value="{{$current->doj}}">
                             </div>
                               <div class="form-group col-md-6 ">
                                <div class=" custom-radio ">
                                  <label for="Gender">Gender: </label>
                                </div>
                                  <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="male" value="male" name="gender" class="custom-control-input" @if ($current->gender == 'male')
                                    checked
                                 @endif>
                                    <label class="custom-control-label" for="male"> Male </label>
                                 </div>
                                 <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="female" value="female" name="gender" class="custom-control-input"  @if ($current->gender == 'female')
                                    checked
                                 @endif>
                                    <label class="custom-control-label" for="female"
                                    > Female </label>
                                 </div>
                               </div>
                               <div class="form-group col-sm-6">
                                  <label>Work Nature:</label>
                                  <select class="form-control" id="type" name="type">
                                     <option selected="" disabled="">Select Nature</option>
                                     <option
                                     @if ($current->type == 'Full time')
                                        selected
                                     @endif>Full time</option>

                                     <option  @if ($current->type == 'Casual')
                                        selected
                                     @endif
                                     >Casual</option>
                                  </select>
                               </div>
                               <div class="form-group col-md-6">
                                  <label for="phone">Mobile Number:</label>
                                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Mobile Number" value="{{$current->phone}}">
                               </div>
                               <div class="form-group col-md-6">
                                  <label for="email">Email:</label>
                                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$current->email}}">
                               </div>
                               <div class="form-group col-md-6">
                                  <label for="dno">Department number:</label>
                                  <input type="text" class="form-control" id="dno"name="dno" placeholder="Department number" value="{{$current->dno}}">
                               </div>
                               <div class="form-group col-md-6">
                                  <label for="designation">Designation:</label>
                                  <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation"value="{{$current->designation}}" >
                               </div>
                            </div>
                            <h5 class="mb-3">Payment</h5>
                            <div class="row">
                               <div class="form-group col-md-6">
                                  <label for="uname">Bank Account Number:</label>
                                  <input type="text" class="form-control" id="account" name="account" placeholder="Bank Account Number" value="{{$current_payment->bank_account}}">
                               </div>
                               <div class="form-group col-md-6">
                                  <label for="method">Payment Method:</label>
                                  <select class="form-control" id="method" name="method">
                                     <option selected="" disabled="">Select Payment Method</option>
                                     <option  @if ($current_payment->methode == 'Cheque')
                                        selected
                                     @endif>Cheque</option>
                                     <option @if ($current_payment->methode == 'Back Account')
                                        selected
                                     @endif>Back Account</option>
                                  </select>
                               </div>
                            </div>
                            <hr>
                            <h5 class="mb-3">Security</h5>
                            <div class="row">
                               <div class="form-group col-md-12">
                                  <label for="uname">User Name:</label>
                                  <input type="text" class="form-control" id="username" name="username" placeholder="User Name" value="{{$current_user->username}}">
                               </div>
                               <div class="form-group col-md-12">
                                  <label for="pass">Password:</label>
                                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                               </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Edit Employee</button>
                         </form>
                      </div>
                   </div>
                </div>
          </div>
       </div>
    </div>
 </div>
 </div>
@endsection
