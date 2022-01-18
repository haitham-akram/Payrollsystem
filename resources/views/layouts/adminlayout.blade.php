<!doctype html>
<html lang="en">
<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Universty Payroll System</title>
      @include('includes.appStyle')
   </head>
   <body>
      <!-- Wrapper Start -->
      <div class="wrapper">
      <!-- Sidebar  -->
         <div class="iq-sidebar">
            <div class="iq-sidebar-logo d-flex justify-content-between">
               <a href="#" class="header-logo">
                  <i class="fa fa-credit-card-alt fa-2x" aria-hidden="true" class="img-fluid rounded-normal"></i>
                  <div class="logo-title">
                     <span class="text-primary text-uppercase">Payroll</span>
                  </div>
               </a>
               <div class="iq-menu-bt-sidebar">
                  <div class="iq-menu-bt align-self-center">
                     <div class="wrapper-menu">
                        <div class="main-circle"><i class="las la-bars"></i></div>
                     </div>
                  </div>
               </div>
            </div>
            <div id="sidebar-scrollbar">
               <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="iq-menu">
                      {{-- start Employee options --}}
                     <li  class=" @if (Route::currentRouteName() == 'create_employee'
                     ||Route::currentRouteName() == 'employees')
                        active active-menu
                     @endif">
                        <a href="#userinfo" class="iq-waves-effect" data-toggle="collapse" aria-expanded="@if (Route::currentRouteName() == 'create_employee'
                        ||Route::currentRouteName() == 'employees')
                           true
                           @else
                           false
                        @endif "><span class="ripple rippleEffect"></span><i class="las la-user-tie iq-arrow-left"></i><span>Employees</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="userinfo" class="iq-submenu collapse @if (Route::currentRouteName() == 'create_employee'
                        ||Route::currentRouteName() == 'employees')
                           show
                        @endif " data-parent="#iq-sidebar-toggle" style="">
                           <li class="
                           @if (Route::currentRouteName() == 'create_employee')
                           active
                           @endif"><a href="{{route('create_employee')}}"><i class="las la-plus-circle"></i>Add Empolyee</a></li>
                           <li class="
                           @if (Route::currentRouteName() == 'employees')
                           active
                           @endif"><a href="{{route('employees')}}"><i class="las la-th-list"></i>Employees List</a></li>
                        </ul>
                     </li>
                        {{--end of employee options  --}}
                        {{-- start of contract options --}}
                     <li class="
                     @if (Route::currentRouteName() == 'contract.create'
                     ||Route::currentRouteName() == 'contract.index')
                        active active-menu
                     @endif
                     ">
                        <a href="#contract" class="iq-waves-effect " data-toggle="collapse" aria-expanded="
                        @if (Route::currentRouteName() == 'contract.create'
                        ||Route::currentRouteName() == 'contract.index')
                           true
                           @else
                           false
                        @endif"><i class="las la-file-alt iq-arrow-left"></i><span>Contracts</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="contract" class="iq-submenu collapse @if (Route::currentRouteName() == 'contract.create'
                        ||Route::currentRouteName() == 'contract.index')
                           show
                        @endif

                        " data-parent="#iq-sidebar-toggle">
                            <li class=" @if (Route::currentRouteName() == 'contract.create')
                            active
                            @endif"><a href="{{route('contract.create')}}"><i class="las la-plus-circle"></i>Add Contract</a></li>
                            <li class=" @if (Route::currentRouteName() == 'contract.index')
                            active
                            @endif"><a href="{{route('contract.index')}}"><i class="las la-th-list"></i>Contract List</a></li>
                        </ul>
                     </li>
                     {{-- end of contract options --}}
                     <li class="@if (Route::currentRouteName() == 'department.index'
                     ||Route::currentRouteName() == 'department.edit')
                        active active-menu
                     @endif">
                        <a href="#menu-level" class="iq-waves-effect" data-toggle="collapse" aria-expanded="@if (Route::currentRouteName() == 'department.index'
                        ||Route::currentRouteName() == 'department.edit') true @else false @endif ">

                    <i class="las la-university"></i><span>Departments</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="menu-level" class="iq-submenu collapse
                        @if (Route::currentRouteName() == 'department.create'
                        ||Route::currentRouteName() == 'department.index')
                           show
                        @endif
                        " data-parent="#iq-sidebar-toggle">
                            <li class=" @if (Route::currentRouteName() == 'department.index') active @endif">
                                <a href="{{route('department.index')}}"><i class="las la-th-list"></i>Department List</a></li>
                        </ul>
                     </li>

                     <li class="@if (Route::currentRouteName() == 'leave.index'
                     ||Route::currentRouteName() == 'leave.edit')
                        active active-menu
                     @endif">
                        <a href="#leave" class="iq-waves-effect " data-toggle="collapse" aria-expanded="false"><i class="las la-calendar-day"></i><span>Leaves</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="leave" class="iq-submenu collapse
                        @if (Route::currentRouteName() == 'leave.create'
                        ||Route::currentRouteName() == 'leave.index')
                           show
                        @endif
                        " data-parent="#iq-sidebar-toggle">
                            <li class="@if (Route::currentRouteName() == 'leave.index')
                               active
                            @endif"><a href="{{route('leave.index')}}"><i class="las la-th-list"></i>Leaves List</a></li>
                        </ul>
                     </li>

                     <li class="@if (Route::currentRouteName() == 'deduction.index'
                     ||Route::currentRouteName() == 'deduction.create')
                        active active-menu
                     @endif">
                        <a href="#deduction" class="iq-waves-effect " data-toggle="collapse" aria-expanded="false"><i class="las la-tags"></i><span>Deductions</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="deduction" class="iq-submenu collapse
                        @if (Route::currentRouteName() == 'deduction.create'
                        ||Route::currentRouteName() == 'deduction.index')
                           show
                        @endif
                        " data-parent="#iq-sidebar-toggle">
                            <li class="
                            @if (Route::currentRouteName() == 'deduction.create')
                               active
                            @endif"><a href="{{route('deduction.create')}}"><i class="las la-plus-circle"></i>Add Deduction</a></li>
                            <li class="@if (Route::currentRouteName() == 'deduction.index')
                            active
                         @endif"><a href="{{route('deduction.index')}}"><i class="las la-th-list"></i>Deduction List</a></li>
                        </ul>
                     </li>

                     <li class="@if (Route::currentRouteName() == 'transaction.index'
                     ||Route::currentRouteName() == 'transaction.create')
                        active active-menu
                     @endif">
                        <a href="#transaction" class="iq-waves-effect " data-toggle="collapse" aria-expanded="false"><i class="las la-money-bill-wave-alt"></i><span>Transactions</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="transaction" class="iq-submenu collapse
                        @if (Route::currentRouteName() == 'transaction.create'
                        ||Route::currentRouteName() == 'transaction.index')
                           show
                        @endif
                        " data-parent="#iq-sidebar-toggle">
                            <li class="@if (Route::currentRouteName() == 'transaction.create')
                            active
                         @endif"><a href="{{route('transaction.create')}}"><i class="las la-plus-circle"></i>Add Transaction</a></li>
                            <li class="@if (Route::currentRouteName() == 'transaction.index')
                            active
                         @endif"><a href="{{route('transaction.index')}}"><i class="las la-th-list"></i>Transaction List</a></li>
                        </ul>
                     </li>

                  </ul>
               </nav>
               <div id="sidebar-bottom" class="p-3 position-relative">
                  <div class="iq-card">
                     <div class="iq-card-body">
                        <div class="sidebarbottom-content">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                @csrf
                           <button type="submit" class="btn w-100 btn-primary mt-4 view-more">logout <i class="ri-login-box-line ml-2"></i></button>
                            </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- TOP Nav Bar -->
         <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
               <nav class="navbar navbar-expand-lg navbar-light p-0">
                  <div class="iq-menu-bt d-flex align-items-center">
                     <div class="wrapper-menu">
                        <div class="main-circle"><i class="las la-bars"></i></div>
                     </div>
                     <div class="iq-navbar-logo d-flex justify-content-between">
                        <a href="index.html" class="header-logo">
                            <i class="fa fa-credit-card-alt fa-2x" aria-hidden="true" class="img-fluid rounded-normal"></i>
                            <div class="logo-title">
                               <span class="text-primary text-uppercase">Payroll</span>
                           </div>
                        </a>
                     </div>
                  </div>
                @yield('nav_content')
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
                  <i class="ri-menu-3-line"></i>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav ml-auto navbar-list">

                        <li class="line-height pt-3">
                           <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                              <div class="">
                                 <h6 class="mb-1 line-height">Welcome MR/S {{ Auth::user()->username }}</h6>
                              </div>
                           </a>
                        </li>

                     </ul>
                  </div>
               </nav>
            </div>
         </div>
         <!-- TOP Nav Bar END -->
@yield('content')
    <!-- Footer -->
      <footer class="bg-white iq-footer">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-6">
                  <ul class="list-inline mb-0">
                     <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                     <li class="list-inline-item"><a href="#">Terms of Use</a></li>
                  </ul>
               </div>
               <div class="col-lg-6 text-right">
                  Copyright 2021 <a href="#">Payroll</a> All Rights Reserved.
               </div>
            </div>
         </div>
      </footer>
      <!-- Footer END -->

   </body>
@include('includes.appJS')
</html>
