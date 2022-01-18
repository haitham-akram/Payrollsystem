@extends('layouts.casualLayout')
@section('nav_content')
<div class="navbar-breadcrumb">
    <h5 class="mb-0">Timecards</h5>
    <nav aria-label="breadcrumb">
       <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('casual.profile',$current->id)}}">Academic Kiosk</a></li>
          <li class="breadcrumb-item active" aria-current="page">Timecard List</li>
       </ul>
    </nav>
 </div>
@stop
@section('content')
      <!-- Page Content  -->
      <div id="content-page" class="content-page">
        <div class="container-fluid">
            {{-- start form --}}
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
                <div class="col-md-12 ">
                      <div class="iq-card">
                         <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                               <h4 class="card-title">Submitting Timecard For {{$current->fname}} {{$current->lname}}</h4>
                            </div>
                         </div>
                         <div class="iq-card-body">
                            <div class="row mt-2">
                            {{-- start here --}}
                            <div class="col-md-3">
                                <ul id="top-tabbar-vertical" class="p-0">
                                    @if ($current->remaining_hours == 0.00)
                                    <li class="active" id="contact">
                                        <a href="javascript:void();">
                                        <i class="ri-timer-line text-danger"></i><span> {{$current->remaining_hours}} working hours left</span>
                                        </a>
                                     </li>
                                    @else
                                     <li class="active" id="official">
                                        <a href="javascript:void();">
                                        <i class="ri-timer-line text-success"></i><span>{{$current->remaining_hours}} working hours left</span>
                                        </a>
                                     </li>
                                    @endif
                                </ul>
                             </div>
                            {{-- end here  --}}
                            <div class="col-md-9">
                                <div class="col-md-4">
                                   <h6 class="mt-2">Click The Buttons to Start or Stop Tracting Your Timecard.</h6>
                                </div>
                                <div class="col-md-4 mt-3 ">
                                    <div class="row ">
                                        <div class="col-md-2 mr-4">
                                            <form  action="{{route('casual.timecard.store',$current->id)}}" method="POST">
                                               @csrf
                                                <button type="submit" class="btn btn-primary rounded-pill"><i class="ri-play-fill"></i>Start</button>
                                            </form>
                                        </div>
                                        <div class="col-md-2">
                                            <form  action="{{route('casual.timecard.update',$current->id)}}" method="POST">
                                                @csrf
                                                <button type="submit"  class="btn btn-danger rounded-pill"><i class="ri-stop-fill"></i>Stop</button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                 <p> Pay close attention to the number of remaining working hours so that you are not allowed to work more hours than the remaining number.</p> </div>
                            </div>
                        </div>
                      </div>
                </div>
            </div>
{{-- start here  --}}
           <div class="row">
              <div class="col-sm-12">
                    <div class="iq-card">
                       <div class="iq-card-header d-flex justify-content-between">
                          <div class="iq-header-title">
                             <h4 class="card-title">Timecard List For {{$current->fname}} {{$current->lname}}</h4>
                          </div>
                       </div>
                       <div class="iq-card-body">
                          <div class="table-responsive">
                             <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                               <thead>
                                   <tr>
                                      <th class="text-center">ID</th>
                                      <th class="text-center">Started Time</th>
                                      <th class="text-center">End Time</th>
                                      <th class="text-center">Hours Number</th>
                                      <th class="text-center">Date</th>
                                      <th class="text-center">Action</th>
                                   </tr>
                               </thead>
                               <tbody>
                                    @foreach ($timecards as $timecard )
                                   <tr>
                                      <td class="text-center">{{$timecard->id}}</td>
                                      <td class="text-center">{{$timecard->startTime}}</td>
                                      <td class="text-center">{{$timecard->endTime}}</td>
                                      <td class="text-center">{{$timecard->hours_num}}</td>
                                      <td class="text-center">{{$timecard->month}}</td>
                                      <td class="text-center">
                                        <div class="flex align-items-center list-user-action ">
                                            <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{route('casual.timecard.delete',$timecard->id)}}"><i class="ri-delete-bin-line"></i></a>
                                         </div>
                                      </td>
                                   </tr>
                                   @endforeach

                               </tbody>
                             </table>
                          </div>
                             <div class="row justify-content-between mt-3">
                                <div id="user-list-page-info" class="col-md-6">
                                   <span>Showing 1 to 5 of 5 entries</span>
                                </div>
                                <div class="col-md-6">
                                   <nav aria-label="Page navigation example">
                                      <ul class="pagination justify-content-end mb-0">
                                         <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                         </li>
                                         <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                         <li class="page-item"><a class="page-link" href="#">2</a></li>
                                         <li class="page-item"><a class="page-link" href="#">3</a></li>
                                         <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                         </li>
                                      </ul>
                                   </nav>
                                </div>
                             </div>
                       </div>
                    </div>
              </div>
           </div>
        </div>
     </div>
@endsection
