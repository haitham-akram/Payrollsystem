@extends('layouts.adminlayout')
@section('nav_content')
<div class="navbar-breadcrumb">
    <h5 class="mb-0">Deductions</h5>
    <nav aria-label="breadcrumb">
       <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('deduction.index')}}">Deductions</a></li>
          <li class="breadcrumb-item active" aria-current="page">Deduction List</li>
       </ul>
    </nav>
 </div>
@stop
@section('content')
      <!-- Page Content  -->
      <div id="content-page" class="content-page">
        <div class="container-fluid">
{{-- start here  --}}
           <div class="row">
              <div class="col-sm-12">
                    <div class="iq-card">
                       <div class="iq-card-header d-flex justify-content-between">
                          <div class="iq-header-title">
                             <h4 class="card-title">Deductions List</h4>
                          </div>
                       </div>
                       <div class="iq-card-body">
                          <div class="table-responsive">
                             <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                               <thead>
                                   <tr>
                                      <th class="text-center">ID</th>
                                      <th class="text-center">Employee ID</th>
                                      <th class="text-center">Tax</th>
                                      <th class="text-center">Leave Deduction</th>
                                      <th class="text-center">Provident Fund</th>
                                      <th class="text-center">Welfare Fund</th>
                                      <th class="text-center">Loan Deduction</th>
                                      <th class="text-center">Action</th>
                                   </tr>
                               </thead>
                               <tbody>
                                    @foreach ($deductions as $deduction )
                                   <tr>
                                      <td class="text-center">{{$deduction->id}}</td>
                                      <td class="text-center">{{$deduction->employee_id}}</td>
                                      <td class="text-center">{{$deduction->tax_deduction}}</td>
                                      <td class="text-center">{{$deduction->leave_deduction}}</td>
                                      <td class="text-center">{{$deduction->Provident_Fund}}</td>
                                      <td class="text-center">{{$deduction->welfare_Fund}}</td>
                                      <td class="text-center">{{$deduction->loan_deduction}}</td>
                                      <td>
                                         <div class="flex align-items-center list-user-action ">
                                            <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{route('deduction.edit',$deduction->id)}}"><i class="ri-pencil-line"></i></a>
                                            <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{route('deduction.delete',$deduction->id)}}"><i class="ri-delete-bin-line"></i></a>
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
