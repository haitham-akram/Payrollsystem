<!doctype html>
<html lang="en">
<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      @include('includes.appStyle')
   </head>
   <body>
{{-- Start all  --}}
<div id="" class="">
    <div class="container">
       <div class="row">
          <div class="col-sm-12">
             <div class="iq-card">
                <div class="iq-card-body">
                   <div class="text-center">
                   <h4> {{$Owner_name}}</h4>
                   <p class="text-primary">{{$University}}<br>{{$Address}}<br>  {{$City}}, {{$State_ZIP}}</p>
                  </div>
                  <div class=" mt-2"><p>PAY ONLY {{$Amount}} $</p></div>
                   <div class=" mt-2">
                    <div class="table">
                        <table id="user-list-table" class="table  table-bordered" role="grid" aria-describedby="user-list-page-info">
                          <thead>
                              <tr>
                                 <th>DATE</th>
                                 <th>Full Name</th>
                                 <th>CHECK NO.</th>
                                 <th>DESCRIPTION</th>
                                 <th>Address</th>
                                 <th>City, State ZIP</th>
                              </tr>
                          </thead>

                          <tbody>

                              <tr>
                                 <td class="text-center">{{$Date}}</td>
                                 <td class="text-center">{{$Employee_name}} </td>
                                 <td class="text-center">{{$Check_No}}</td>
                                 <td class="text-center">{{$DESCRIPTION}}</td>
                                 <td class="text-center">{{$Employee_address}}</td>
                                 <td class="text-center">{{$City}}, {{$State_ZIP}}</td>
                              </tr>

                          </tbody>
                        </table>
                     </div>

                   </div>
                   <div class=" mt-2"><p>Bank Name: {{$Bank_Name}}</p></div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>

{{-- end  all--}}

   </body>
</html>
