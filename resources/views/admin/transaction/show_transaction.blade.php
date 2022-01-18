@extends('layouts.adminlayout')
@section('nav_content')
<div class="navbar-breadcrumb">
    <h5 class="mb-0">Transactions For Employee</h5>
    <nav aria-label="breadcrumb">
       <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('transaction.index')}}">Transactions</a></li>
          <li class="breadcrumb-item active" aria-current="page">Transactions List for Employee</li>
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
              <div class="col-sm-12">
                    <div class="iq-card">
                       <div class="iq-card-header d-flex justify-content-between">
                          <div class="iq-header-title">
                             <h4 class="card-title">Transaction List for {{$employee->fname}} {{$employee->lname}}</h4>
                          </div>
                       </div>
                       <div class="iq-card-body">
                          <div class="table-responsive">
                             <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                               <thead>
                                   <tr>
                                      <th class="text-center">Transaction ID</th>
                                      <th class="text-center">Transaction Amount</th>
                                      <th class="text-center">Month</th>
                                      <th class="text-center">Action</th>
                                   </tr>
                               </thead>
                               <tbody>
                                    @foreach ( $employee->transaction as $transaction )
                                   <tr>
                                      <td class="text-center">{{$transaction->id}} </td>
                                      <td class="text-center">{{$transaction->amount}}</td>
                                      <td class="text-center">{{$transaction->month}}</td>
                                      <td>
                                         <div class="flex align-items-center list-user-action text-center">
                                            <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show Transactions" href="{{route('transaction.edit',$transaction->id)}}"><i class="ri-pencil-line"></i></a>
                                            <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show Transactions" href="{{route('transaction.delete',$transaction->id)}}"><i class="ri-delete-bin-line"></i></a>
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
