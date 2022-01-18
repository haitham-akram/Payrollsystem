@extends('layouts.adminlayout')
@section('nav_content')
<div class="navbar-breadcrumb">
    <h5 class="mb-0">Transactions</h5>
    <nav aria-label="breadcrumb">
       <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('transaction.index')}}">Transactions</a></li>
          <li class="breadcrumb-item active" aria-current="page">Add Transactions</li>
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
                   <h4 class="card-title">Add Transaction</h4>
                </div>
             </div>
             <div class="iq-card-body">
                <form method="post" action="{{route('transaction.store')}}">
                    @csrf
                    <div class="form-group">
                       <label for="dno">Transaction no:</label>
                       <input type="text" class="form-control" id="id" name="id">
                    </div>
                    <div class="form-group">
                       <label for="dname">Employee ID:</label>
                       <input type="text" class="form-control" id="eid" name="eid">
                    </div>
                    <div class="form-group">
                        <label for="dname">Month:</label>
                        <input type="month" class="form-control" id="month" name="month">
                     </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                 </form>
             </div>
          </div>
    </div>
</div>

        </div>
     </div>
@endsection
