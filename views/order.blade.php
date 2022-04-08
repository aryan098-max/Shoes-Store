@extends('master')

@section('content')
<div style="background-color:#00FFFF" class =" custom-product">
    <div class="col-sm-10">
    <table class="table">
  
    <tbody>
      <tr>
        <td>Amount</td>
        <td>${{$total}}</td>
      </tr>
      <tr>
        <td>Tax</td>
        <td>$0</td>
      </tr>
      <tr>
        <td>Delivery</td>
        <td>$10</td>
      </tr>
      <tr>
        <td>Toal Amount</td>
        <td>${{$total+10}}</td>
      </tr>

    </tbody>
  </table>
  <div>
        <form action="/placeorder" method="POST">
            @csrf

        <div class="form-group">
            <textarea name="address" placeholder= "enter your address" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label>Payment Method</label> <br> <br>
            <input type="radio" value="cash" name="payment"><span>online Payment</span> <br> <br>
            <input type="radio" value="cash" name="payment"><span>EMI Payment</span> <br> <br>
            <input type="radio" value="cash" name="payment"><span>Payment on Deilvery</span>
        </div>
        <button type="submit" class="btn btn-default">Order Item</button>
        </form>
    </div>

    </div> 
</div>
@endsection