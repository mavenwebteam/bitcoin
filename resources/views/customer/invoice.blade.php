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
<div class="container row col-sm-12">
	<h3 class="content-title">Invoice</h3>
	<div class="row col-sm-12">
		<div class="content col-sm-5">
			<h4>User Information</h4>
			<div class="info col-sm-12">
				<label>Name : </label>
				<span>{{$data->username}}</span>	
			</div>
			<div class="info col-sm-12">
				<label>Email : </label>
				<span>{{$data->email}}</span>	
			</div>
			<div class="info col-sm-12">
				<label>Phone Number : </label>
				<span>{{$data->phone}}</span>	
			</div>
			<div class="info col-sm-12">
				<label>Order ID : </label>
				<span>{{$data->order_id}}</span>	
			</div>
		</div>
		<div class="content col-sm-7">
			<h4>Invoice Information</h4>
			<div class="row col-sm-12">
				<div class="info col-sm-6">
					<label>Date : </label>
					<span>{{$data->created_at}}</span>	
				</div>
				<div class="info col-sm-6">
					<label>Refrence No : </label>
					<span>{{$data->referenceno}}</span>	
				</div>
			</div>
			<div class="info col-sm-12">
				<label>Coin Type : </label>
				<span>{{$data->facetoken}}</span>	
			</div>
			<div class="info col-sm-12">
				<label>Amount : </label>
				<span>{{$data->amount}} Ks</span>	
			</div>
			<div class="info col-sm-12">
				<label>Payment Method : </label>
				<span>{{$data->paymentmethod}}</span>	
			</div>
			<div class="info col-sm-12">
				<label>Transaction ID : </label>
				<span>{{$data->transaction_id}}</span>	
			</div>
		</div>
	</div>
	<div class="row col-sm-12">
		<div class="content col-sm-12">
			<h4>Redeem Code</h4>
			<div class="info col-sm-12">
				<label>Redeem Code : </label>
				<span>{{$data->username}}</span>	
			</div>
			<div class="info col-sm-12">
				<label>Order Status </label>
				<span>{{$data->order}}</span>	
			</div>
			<a href="/customer/order_list">Back to User Page</a>
		</div>
	</div>
</div>
<style type="text/css">
	.container{
		margin: auto;
		width: 1200px;
		border: 1px solid #060606;
	}
	.content-title{
		font-size: 30px;
		padding: 10px;
		padding-bottom: 5px;
	}
	.content{
		padding: 10px;
		padding-top: 5px;
	}
	.info{
		margin-bottom: 5px;
	}
	.info label{
		font-weight: bold;
	}
</style>