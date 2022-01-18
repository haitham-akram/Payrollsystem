@extends('layouts.fulltimeLayout')
@section('nav_content')
<div class="navbar-breadcrumb">
    <h5 class="mb-0">Academic Profile</h5>
    <nav aria-label="breadcrumb">
       <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('profile',$current->id)}}">Academic Kiosk</a></li>
          <li class="breadcrumb-item active" aria-current="page">Academic Information</li>
       </ul>
    </nav>
 </div>
@stop
@section('content')
 <!-- Page Content  -->
  <div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-lg-9">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">

                      <div class="iq-header-title">
                         <h4 class="card-title">Academic Information</h4>
                      </div>
                   </div>
                   <div class="iq-card-body">
                      <div class="new-user-info">
                          {{-- start list--}}
                          <ul class="list-inline p-0 mb-0">
                            <h5 class="mb-3">Personal Information</h5>
                            <li>
                               <div class="row align-items-center justify-content-between mb-3">
                                  <div class="col-sm-3">
                                     <h6>ID</h6>
                                  </div>
                                  <div class="col-sm-3">
                                     <p class="mb-0">{{$current->id}}</p>
                                  </div>
                                  <div class="col-sm-3">
                                    <h6>Name</h6>
                                 </div>
                                 <div class="col-sm-3">
                                    <p class="mb-0">{{$current->fname}} {{$current->lname}}</p>
                                 </div>
                               </div>
                            </li>
                            <li>
                               <div class="row align-items-center justify-content-between mb-3">
                                  <div class="col-sm-3">
                                     <h6>Email</h6>
                                  </div>
                                  <div class="col-sm-3">
                                     <p class="mb-0">{{$current->email}}</p>
                                  </div>
                                  <div class="col-sm-3">
                                    <h6>Phone</h6>
                                 </div>
                                 <div class="col-sm-3">
                                    <p class="mb-0">{{$current->phone}}</p>
                                 </div>
                               </div>
                            </li>

                            <li>
                               <div class="row align-items-center justify-content-between mb-3">
                                  <div class="col-sm-3">
                                     <h6>Date of Birth</h6>
                                  </div>
                                  <div class="col-sm-3">
                                     <p class="mb-0">{{$current->dob}}</p>
                                  </div>
                                  <div class="col-sm-3">
                                    <h6>Date of Join</h6>
                                 </div>
                                 <div class="col-sm-3">
                                    <p class="mb-0">{{$current->doj}}</p>
                                 </div>
                               </div>
                            </li>

                            <li>
                                <div class="row align-items-center justify-content-between mb-3">
                                   <div class="col-sm-3">
                                      <h6>Gender</h6>
                                   </div>
                                   <div class="col-sm-3">
                                      <p class="mb-0">{{$current->gender}}</p>
                                   </div>
                                   <div class="col-sm-3">
                                    <h6>Address</h6>
                                 </div>
                                 <div class="col-sm-3">
                                    <p class="mb-0">{{$current->address}}</p>
                                 </div>
                                </div>
                             </li>
                             <li>
                                <div class="row align-items-center justify-content-between mb-3">
                                    <div class="col-sm-3">
                                        <h6>Work Nature</h6>
                                     </div>
                                     <div class="col-sm-3">
                                        <p class="mb-0">{{$current->type}}</p>
                                     </div>
                                     <div class="col-sm-3">
                                        <h6>Designation</h6>
                                     </div>
                                     <div class="col-sm-3">
                                        <p class="mb-0">{{$current->designation}}</p>
                                     </div>
                                </div>
                             </li>
                             <hr>
                             <h5 class="mb-3">Department</h5>
                             <li>
                                <div class="row align-items-center justify-content-between mb-3">
                                   <div class="col-sm-3">
                                      <h6>Department Number</h6>
                                   </div>
                                   <div class="col-sm-3">
                                      <p class="mb-0">{{$current->dno}}</p>
                                   </div>
                                   <div class="col-sm-3">
                                    <h6>Department Name</h6>
                                 </div>
                                 <div class="col-sm-3">
                                    <p class="mb-0">{{$current->department->dname}}</p>
                                 </div>
                                </div>
                             </li>
                             <hr>
                             <h5 class="mb-3">Salary & Deductions</h5>
                             <li>
                                <div class="row align-items-center justify-content-between mb-3">
                                   <div class="col-sm-3">
                                      <h6>Base Salary</h6>
                                   </div>
                                   <div class="col-sm-3">
                                      <p class="mb-0">{{$current->contract->base}}</p>
                                   </div>
                                   <div class="col-sm-3">
                                     <h6>Tax Deduction</h6>
                                  </div>
                                  <div class="col-sm-3">
                                    <p class="mb-0">{{$current->deduction->tax_deduction}}</p>
                                  </div>
                                </div>
                             </li>
                             <li>
                                <div class="row align-items-center justify-content-between mb-3">
                                   <div class="col-sm-3">
                                      <h6>Leave deduction</h6>
                                   </div>
                                   <div class="col-sm-3">
                                      <p class="mb-0">{{$current->deduction->leave_deduction}}</p>
                                   </div>
                                   <div class="col-sm-3">
                                     <h6>Provident Fund</h6>
                                  </div>
                                  <div class="col-sm-3">
                                    <p class="mb-0">{{$current->deduction->Provident_Fund}}</p>
                                  </div>
                                </div>
                             </li>
                             <li>
                                <div class="row align-items-center justify-content-between mb-3">
                                   <div class="col-sm-3">
                                      <h6>Welfare Fund</h6>
                                   </div>
                                   <div class="col-sm-3">
                                      <p class="mb-0">{{$current->deduction->welfare_Fund}}</p>
                                   </div>
                                   <div class="col-sm-3">
                                     <h6>Loan Deduction</h6>
                                  </div>
                                  <div class="col-sm-3">
                                    <p class="mb-0">{{$current->deduction->loan_deduction}}</p>
                                  </div>
                                </div>
                             </li>
                             <hr>
                             <h5 class="mb-3">Security</h5>
                             <li>
                                <div class="row align-items-center justify-content-between mb-3">
                                   <div class="col-sm-3">
                                      <h6>Username</h6>
                                   </div>
                                   <div class="col-sm-3">
                                      <p class="mb-0">{{$current_user->username}}</p>
                                   </div>
                                   <div class="col-sm-3">
                                     <h6>Password</h6>
                                  </div>
                                  <div class="col-sm-3">
                                    <p class="mb-0"><a href="#" class="__cf_email__">[Pasword&#160;protected]</a></p>
                                  </div>
                                </div>
                             </li>
                             <hr>
                             <li>
                                <div class="row align-items-center justify-content-between mb-3">
                                   <div class="col-sm-6">
                                    <a class="iq-bg-primary" href="{{route('profile.edit',$current->id)}}"><button class="btn btn-primary">Edit Your Information</button></a>
                                  </div>
                                </div>
                             </li>

                         </ul>
                          {{-- end list--}}
                      </div>
                   </div>
                </div>
          </div>
       </div>
    </div>
 </div>
 </div>
@endsection
