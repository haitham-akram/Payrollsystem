@extends('layouts.adminlayout')
@section('nav_content')
<div class="navbar-breadcrumb">
    <h5 class="mb-0">Leaves</h5>
    <nav aria-label="breadcrumb">
       <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('leave.index')}}">Leaves</a></li>
          <li class="breadcrumb-item active" aria-current="page">Add Leave & Leave List</li>
       </ul>
    </nav>
 </div>
@stop
@section('content')
      <!-- Page Content  -->
      <div id="content-page" class="content-page">
        <div class="container-fluid">
{{-- start here  --}}
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{Session::get('success')}}
</div>
@endif
<div class="row">
    <div class="col-sm-12">
          <div class="iq-card">
             <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                   <h4 class="card-title">Add Leave</h4>
                </div>
             </div>
             <div class="iq-card-body">
                <form method="post" action="{{route('leave.store')}}">
                    @csrf

                    <div class="form-group">
                       <label for="id">Leave ID:</label>
                       <input type="text" class="form-control" id="id" name="id">
                    </div>
                    <div class="form-group">
                       <label for="eid">Employee ID:</label>
                       <input type="text" class="form-control" id="eid" name="eid">
                    </div>
                    <div class="form-group">
                        <label for="eid">Month:</label>
                        <input type="month" class="form-control" id="month" name="month">
                     </div>
                     <div class="form-group">
                        <label for="eid">Leave Balance:</label>
                        <input type="text" class="form-control" id="balance" name="balance">
                     </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                 </form>
             </div>
          </div>
    </div>
</div>


            {{--end here --}}
           <div class="row">
              <div class="col-sm-12">
                    <div class="iq-card">
                       <div class="iq-card-header d-flex justify-content-between">
                          <div class="iq-header-title">
                             <h4 class="card-title">Leaves List</h4>
                          </div>
                       </div>
                       <div class="iq-card-body">
                          <div class="table-responsive">
                             <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                               <thead>
                                   <tr>
                                      <th class="text-center">Leave ID</th>
                                      <th class="text-center">Employee ID</th>
                                      <th class="text-center">Month</th>
                                      <th class="text-center">Leave Balance</th>
                                      <th class="text-center">Action</th>
                                   </tr>
                               </thead>
                               <tbody>
                                    @foreach ($leaves as $leave )
                                   <tr>
                                      <td class="text-center">{{$leave->id}}</td>
                                      <td class="text-center">{{$leave->employee_id}}</td>
                                      <td class="text-center">{{$leave->month}}</td>
                                      <td class="text-center">{{$leave->balance}} days</td>
                                      <td>
                                         <div class="flex align-items-center list-user-action text-center ">
                                            <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{route('leave.edit',$leave->id)}}"><i class="ri-pencil-line"></i></a>
                                            <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{route('leave.delete',$leave->id)}}"><i class="ri-delete-bin-line"></i></a>
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

