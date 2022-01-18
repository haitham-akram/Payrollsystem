@extends('layouts.casualLayout')
@section('nav_content')
<div class="navbar-breadcrumb">
    <h5 class="mb-0">Edit Payment</h5>
    <nav aria-label="breadcrumb">
       <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('casual.profile',$current->id)}}">Academic Kiosk</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit Payment</li>
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
                         <h4 class="card-title">Edit Payment</h4>
                      </div>
                   </div>
                   <div class="iq-card-body">
                      <div class="new-user-info">
{{--  --}}
<form method="post" action="{{route('casual.payment.update',$current->payment_info->id)}}">
    @csrf
    <div class="row">
        <div class="form-group col-md-12">
           <label for="uname">Bank Account Number:</label>
           <input type="text" class="form-control" id="account" name="account" placeholder="Bank Account Number" value="{{$current->payment_info->bank_account}}">
        </div>
        <div class="form-group col-md-12">
           <label for="method">Payment Method:</label>
           <select class="form-control" id="method" name="method">
              <option selected="" disabled="">Select Payment Method</option>
              <option  @if ($current->payment_info->methode == 'Cheque')
                 selected
              @endif>Cheque</option>
              <option @if ($current->payment_info->methode == 'Back Account')
                 selected
              @endif>Back Account</option>
           </select>
        </div>
{{-- make it disabled --}}
        <div class="form-group col-md-12">
        <div class="custom-control custom-switch custom-switch-text custom-control-inline">
               <p class="mb-0 mr-3"> Email Notifications </p>
               <input type="checkbox" class="custom-control-input" id="customSwitch-11" name="notify" disabled
               @if ($current->payment_info->notify_email == 1)
               checked=""
               @endif>
               <label class="custom-control-label" for="customSwitch-11" data-on-label="On" data-off-label="Off">
               </label>

         </div>
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
