
@extends('layouts.nav')

@section('content')
<div class="container buy">
	<div class="login-form col-sm-12">
		<h4>Buy Gift Card</h4>
		<form action="/customer/store_giftcard" method="post">
		@csrf
			<div class="form-field">
				<label>Name</label>
				<input type="text" name="name" value="{{Auth::user()->name;}}" readonly>
			</div>
			<div class="form-field">
				<label>Phone Number</label>
				<input type="text" name="phone" value="{{Auth::user()->phone;}}" readonly>
			</div>
			<div class="form-field">
				<label>Email Address</label>
				<input type="text" name="email" value="{{Auth::user()->email;}}" readonly>
			</div>
			<div class="form-field">
				<label>Coin Type</label>
				<select name="coin">
					<option value="BTC">BTC</option>
					<option value="USDT">USDT</option>
				</select>
			</div>
			<div class="form-field">
				<label>Amount</label>
				<input type="text" name="amount" required>
			</div>
			<div class="form-field">
				<label>Pay with..</label>
				<select name="paymentmethod">
					<option value="" disabled selected hidden>Choose Payment</option>
					<option value="Kpay">Kpay(09 987 654 321)</option>
					<option value="Wave">Wave Pay(09 987 654 321)</option>
				</select>
			</div>
			<div class="form-field">
				<label>Transaction ID</label>
				<input type="text" name="transaction_id" required>
			</div>
			<div class="form-field">
				<button type="submit">Buy</button>
			</div>
		</form>
	</div>
</div>

<!-- Style -->
<style type="text/css">
	.login-form{
		margin-top: 20px;
		margin-bottom: 20px;
		width: 800px;
		margin-left: auto;
		margin-right: auto;
		text-align: center;
	}
	.form-field{
		margin: 10px;
	}
	.form-field label{
		margin-right: 5px;
		font-size: 18px;
		width: 150px;
		padding: 5px;
		text-align: left;
	}
	.form-field input,select{
		width: 300px;
		border: 0.5px solid #FFD700;
		background: #030303;
		border-radius: 3px;
		color: #fff;
		padding: 5px;
	}
	select{
		padding-top: 3px;
		padding-bottom: 3px;
	}
	.form-field button{
		width: 100px;
		padding-top: 5px;
		padding-bottom: 5px;
		border: 1px solid #FFD700;
		background: #090909;
		color: #ffd700;
		border-radius: 5px;
	}
</style>
@endsection