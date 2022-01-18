@extends('layouts.fulltimeLayout')
@section('nav_content')
<div class="navbar-breadcrumb">
    <h5 class="mb-0">Payment Profile</h5>
    <nav aria-label="breadcrumb">
       <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('profile',$current->id)}}">Academic Kiosk</a></li>
          <li class="breadcrumb-item active" aria-current="page">Payment & leave Information</li>
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
       <div class="row profile-content">
           {{-- start first col --}}

          <div class="col-12 col-md-12 col-lg-4">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">

                      <div class="iq-header-title">
                         <h4 class="card-title">Payment Information For {{$current->fname}} {{$current->lname}}</h4>
                      </div>
                   </div>
                   <div class="iq-card-body">
                      <div class="new-user-info">
                          {{-- start list--}}
                          <ul class="list-inline p-0 mb-0">
                            <li>
                               <div class="row align-items-center justify-content-between mb-3">
                                  <div class="col-sm-6">
                                    <h6>Method</h6>
                                 </div>
                                 <div class="col-sm-6">
                                    <p class="mb-0">{{$current->payment_info->methode}}</p>
                                 </div>
                               </div>
                            </li>
                            <li>
                                <div class="row align-items-center justify-content-between mb-3">
                                   <div class="col-sm-6">
                                     <h6>Bank Acocount Number</h6>
                                  </div>
                                  <div class="col-sm-6">
                                     <p class="mb-0">{{$current->payment_info->bank_account}}</p>
                                  </div>
                                </div>
                             </li>
                             <li>
                                <div class="row align-items-center justify-content-between mb-3">
                                   <div class="col-sm-6">
                                     <h6>Email Notification</h6>
                                  </div>
                                  <div class="col-sm-6">
                                     <p class="mb-0">
                                    @if ($current->payment_info->notify_email == 1)
                                        ON
                                    @else
                                        OFF
                                    @endif
                                    </p>
                                  </div>
                                </div>
                             </li>
                             <li>
                                <div class="row align-items-center justify-content-between mb-3">
                                   <div class="col-sm-6">
                                    <a class="iq-bg-primary" href="{{route('payment.edit',$current->id)}}"><button class="btn btn-primary">Edit Payment Information</button></a>
                                  </div>
                                </div>
                             </li>

                         </ul>
                          {{-- end list--}}
                      </div>
                   </div>
                </div>
          </div>
            {{-- end first col --}}
            {{-- start second col --}}
            <div class="col-12 col-md-12 col-lg-7">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">

                      <div class="iq-header-title">
                         <h4 class="card-title">Leave Information For {{$current->fname}} {{$current->lname}}</h4>
                      </div>
                   </div>
                   <div class="iq-card-body">

                        <div class="form-group row mb-2">
                        <h5 class="control-label col-sm-3 align-self-center">Your Leave Balance: </h5>
                         <h5 class="control-label col-sm-3 align-self-center">{{$leave->balance}} Days</h5>
                        </div>
                           <form class="form-horizontal" action="{{route('full.leave.update',$current->id)}}" method="POST">
                            @csrf
                           <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="num"> <h6>Leaves Number in Days: </h6></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="num_leave" name="num_leave" placeholder="Leaves Number In Days">
                            </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-primary">Request Leave</button>
                                </div>
                                </div>
                           </form>
                   </div>
                </div>
          </div>

            {{-- end second col --}}
       </div>
    </div>
 </div>
 </div>
@endsection
