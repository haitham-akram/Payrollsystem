<!doctype html>
<html lang="en">
<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      @include('includes.chequeStyle')
   </head>
   <body>
<div class="check">
    <div class="border">
      <div class="container">
        <div class="content">
          <div class="one">
          <div class="title">
          <div id="bold">{{$Owner_name}} </div>
          <div class="name">{{$University}}<br>{{$Address}}<br>  {{$City}}, {{$State_ZIP}}</div>
            </div>
            <table class="following">
              <tbody >
                <tr style="max-width: 415px; min-width: 415px;">
                    <td class="line" size="13">This check is in payment of the following</td>
                </tr>
                <tr style="max-width: 415px; min-width: 415px;"><td class="line" size="13">{{$DESCRIPTION}}</td></tr>
              </tbody>

            </table>
          <div class="number">{{$Check_No}}</div>
          </div>




      <div class="orderof"><label name="amount" size="15"> {{$Amount}}</label><span class="dollar"><span class="bd">****************</span>dollars</span></div>
  <table class="info">


      <tbody>
      <tr  style="max-width: 760px; min-width: 760px;" >
        <td class="chart">date</td>
        <td class="chart">to the order of</td>
        <td class="chart">check no.</td>
        <td class="chart">description</td>
      </tr>
      <tr style="max-width: 760px; min-width: 760px;">
      <td class="blank short"><label name="date" size="15"> {{$Date}}</label></td>
      <td class="blank long"><label  name="name" size="15"> {{$Employee_name}} </label></td>
      <td class="blank short"><label  name="num" size="15">{{$Check_No}}</label></td>
      <td class="blank long des"><label name="description" size="15">{{$DESCRIPTION}}</label></td>
      </tr>
      </tbody>
  </table>

      <div class="amount">
        <span class="amounts"><p>check</p> <p>amount</p></span>
        <div class="box">
          <div class="whole"><label  name="whole" size="13">{{$Amount}}$</label></div>
          </div>
          </div>

      <table class="add">
         <tr>
          <td class="lines"><labe name="address" size="13"> {{$Employee_address}}</labe></td>
         </tr>
          <tr>
          <td class="lines"><label name="citystate" size="13"> {{$City}}, {{$State_ZIP}} </label></td>
          </tr>
          <tr>
          <td class="bank">{{$Bank_Name}}</td>
          </tr>
      </table>

      </div>
        </div>
      </div>
        </div>
   </body>
</html>
