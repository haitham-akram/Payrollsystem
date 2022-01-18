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

                  {{-- start --}}
                  <ul id="iq-sidebar-toggle" class="iq-menu">
                    {{-- start Employee options --}}
                   <li class=" @if (Route::currentRouteName() == 'profile')
                   active active-menu
                   @endif" ><a class="iq-waves-effect"  href="{{route('profile',$current->id)}}" ><i class="las la-user-tie "></i><span>Profile</span></a></li>
                      {{--end of employee options  --}}
                         {{-- start payment and leaves options --}}
                   <li class=" @if (Route::currentRouteName() == 'payment')
                   active
                   @endif"><a class="iq-waves-effect"  href="{{route('payment',$current->id)}}"><i class="las la-tags"></i><span>Payment & leaves</span> </a></li>
                      {{--end of payment and leaves  options  --}}
                              {{-- start Transaction options --}}
                   <li class=" @if (Route::currentRouteName() == 'transaction')
                   active active-menu
                   @endif"><a class="iq-waves-effect"  href="{{route('transaction',$current->id)}}"><i class="las la-money-bill-wave-alt"></i><span>Transaction</span></a></li>
                      {{--end of Transaction options  --}}
                </ul>
                  {{-- end --}}
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
