@extends('layouts.fulltimeLayout')
@section('nav_content')
<div class="navbar-breadcrumb">
    <h5 class="mb-0">Academic Transactions</h5>
    <nav aria-label="breadcrumb">
       <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('profile',$current->id)}}">Academic Kiosk</a></li>
          <li class="breadcrumb-item active" aria-current="page">Academic Transactions</li>
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
                             <h4 class="card-title">Transactions for {{$current->fname}} {{$current->lname}}</h4>
                          </div>
                       </div>
                       <div class="iq-card-body">
                          <div class="table-responsive">
                             <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                               <thead>
                                   <tr>
                                      <th class="text-center">Transaction ID</th>
                                      <th class="text-center">Month</th>
                                      <th class="text-center">Transaction Amount</th>
                                   </tr>
                               </thead>
                               <tbody>
                                    @foreach ( $current->transaction as $transaction )
                                   <tr>
                                      <td class="text-center">{{$transaction->id}} </td>
                                      <td class="text-center">{{$transaction->month}}</td>
                                      <td class="text-center">{{$transaction->amount}}$</td>
                                   </tr>
                                   @endforeach

                               </tbody>
                               <tfoot><tr>
                                <th class="text-center" colspan="2" >Total Transaction Amount</th>
                                {{-- <th class="text-center">Transaction Amount</th> --}}
                                <th class="text-center">{{$current->total}}$</th>
                             </tr> </tfoot>
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
