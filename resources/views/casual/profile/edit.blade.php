@extends('layouts.casualLayout')
@section('nav_content')
<div class="navbar-breadcrumb">
    <h5 class="mb-0">Academic Profile</h5>
    <nav aria-label="breadcrumb">
       <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('casual.profile',$current->id)}}">Academic Kiosk</a></li>
          <li class="breadcrumb-item active" aria-current="page">Academic Information</li>
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
                         <h4 class="card-title">Edit Academic</h4>
                      </div>
                   </div>
                   <div class="iq-card-body">
                      <div class="new-user-info">
{{--  --}}
<form method="post" action="{{route('casual.profile.update',$current->id)}}">
    @csrf
    <p>Some Information aren't Available Due To Your Authorized Permissions.</p>
   <div class="row">

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
      <div class="form-group col-md-6">
         <label for="phone">Mobile Number:</label>
         <input type="text" class="form-control" id="phone" name="phone" placeholder="Mobile Number" value="{{$current->phone}}">
      </div>
      <div class="form-group col-md-6">
         <label for="email">Email:</label>
         <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$current->email}}">
      </div>
   </div>

   <hr>
   <h5 class="mb-3">Security</h5>
   <div class="row">
      <div class="form-group col-md-6">
         <label for="uname">User Name:</label>
         <input type="text" class="form-control" id="username" name="username" placeholder="User Name" value="{{$current_user->username}}">
      </div>
      <div class="form-group col-md-6">
         <label for="pass">Password:</label>
         <input type="password" class="form-control" id="password" name="password" placeholder="Password">
      </div>
   </div>
   <button type="submit" class="btn btn-primary">Edit</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
