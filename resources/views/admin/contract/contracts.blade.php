@extends('layouts.adminlayout')
@section('nav_content')
<div class="navbar-breadcrumb">
    <h5 class="mb-0">Contracts</h5>
    <nav aria-label="breadcrumb">
       <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('contract.index')}}">Contracts</a></li>
          <li class="breadcrumb-item active" aria-current="page">Contract List</li>
       </ul>
    </nav>
 </div>
@stop
@section('content')
      <!-- Page Content  -->
      <div id="content-page" class="content-page">
        <div class="container-fluid">
           <div class="row">
              <div class="col-sm-12">
                    <div class="iq-card">
                       <div class="iq-card-header d-flex justify-content-between">
                          <div class="iq-header-title">
                             <h4 class="card-title">Contracts List</h4>
                          </div>
                       </div>
                       <div class="iq-card-body">
                        {{--start here  --}}
                        <ul class="nav nav-tabs" id="myTab-1" role="tablist">
                            <li class="nav-item">
                               <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Full Time Contracts</a>
                            </li>
                            <li class="nav-item">
                               <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Casual Contracts</a>
                            </li>
                         </ul>
                         <div class="tab-content" id="myTabContent-2">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            {{-- full time here  --}}
                            <div class="table-responsive">
                                <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                                  <thead>
                                      <tr>
                                         <th class="text-center">Employee Name</th>
                                         <th class="text-center">Contract ID</th>
                                         <th class="text-center">Salary</th>
                                         <th class="text-center">Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                       @foreach ($fullContracts as $full )
                                      <tr>
                                         <td class="text-center">{{$full->employee->fname}} {{$full->employee->lname}}</td>
                                         <td class="text-center">{{$full->id}}</td>
                                         <td class="text-center">{{$full->base}}</td>
                                         <td>
                                            <div class="flex align-items-center list-user-action text-center">
                                               <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{route('contract.edit',$full->id)}}"><i class="ri-pencil-line"></i></a>
                                               <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{route('contract.delete',$full->id)}}"><i class="ri-delete-bin-line"></i></a>
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
                            {{-- end full time  --}}
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                              {{-- casual start here  --}}
                              <div class="table-responsive">
                                <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                                  <thead>
                                      <tr>
                                        <th class="text-center">Employee Name</th>
                                        <th class="text-center">Contract ID</th>
                                        <th class="text-center">Number Of Hours</th>
                                        <th class="text-center">paid per hour</th>
                                        <th class="text-center">Salary</th>
                                        <th class="text-center">Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                       @foreach ($casualsContracts as $casual )
                                      <tr>
                                         <td class="text-center">{{$casual->employee->fname}} {{$casual->employee->lname}}</td>
                                         <td class="text-center">{{$casual->id}}</td>
                                         <td class="text-center">{{$casual->hours_num}}</td>
                                         <td class="text-center">{{$casual->paid_per_hour}}</td>
                                         <td class="text-center">{{$casual->base}}</td>
                                         <td>
                                            <div class="flex align-items-center list-user-action text-center">
                                              <a class="iq-bg-primary " data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{route('contract.edit',$casual->id)}}"><i class="ri-pencil-line"></i></a>
                                               <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{route('contract.delete',$casual->id)}}"><i class="ri-delete-bin-line"></i></a>
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
                              {{-- casual end here  --}}
                            </div>
                         </div>
                       </div>
                    </div>
              </div>
           </div>
        </div>
     </div>
@endsection
