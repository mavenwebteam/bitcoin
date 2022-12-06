<!DOCTYPE html>
<html lang="en">
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<head>
<!--- Page Title & logo --->
<title>Binance Gift Card</title>
<!--- Bootstrap --->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
    <div style="text-align:center; margin:20px">
    <img src="{{asset('/logo.png')}}" alt="logo.png" style=" height:150px; margin:auto">
    </div>
    <div class="head" style="    background-color:#F3A812;
    height:80px;
    text-align:center;
    padding-top:10px;">
    <h2>Thanks for Shopping with Us</h2>
    </div>
    <div class="container">
    <div>
        <p>Hi,{{$details['username']}}</p>
        <p>We have finished processing your order</p>
    </div>
    <div class="orderid" style="color:gold;">
        <h4>[{{$details['order_id']}}]({{$details['date']}})</h4>
    </div>
    <div>
        <table style="border:1px solid #E2E2E2;">
            <tr style="border:1px solid #E2E2E2;">
                <th style="padding:5px;">Product</th>
                <th style="padding:10px;">Quantity</th>
                <th style="padding:10px;">Price</th>
            </tr>
            <tr style="border:1px solid #E2E2E2;">
                <td>Binance Gift Card <br>
                Gift card code: {{$details['reference_no']}}</td>
                <td>1</td>
                <td>$0.00</td>
            </tr>
            <tr style="border:1px solid #E2E2E2; ">
                <td colspan="2">Subtotal:</td>
                <td>{{$details['amount']}}</td>
            </tr>
            <tr style="border:2px solid #E2E2E2;">
                <td colspan="2">Total:</td>
                <td>{{$details['amount']}}</td>
            </tr>
        </table>
    </div>
    <div>
        <h3 style="color:gold">BIlling Address</h3>
    </div>
    <div class="card" style="padding:20px; border:1px soild black;" >
        <p>{{$details['username']}}</p>
        <p>{{$details['phone']}}</p>
        <p>{{$details['email']}}</p>
    </div>
    <div>
        <h3>Thanks for shopping with us.</h3>
    </div>
    </div>
<style>
.head{
    background-color:#F3A812;
    height:100px;
    text-align:center;
    padding-top:10px;
}
.orderid{
    color:gold;
}
table{
    border:1px soild black;
}
</style>