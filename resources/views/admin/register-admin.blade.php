@extends('layouts.admin-login-nav')

@section('content')
<div class="container buy">
	<div class="login-form col-sm-12">
		<h4>Registration Form</h4>
		<form action="{{url('admin/register-submit')}}" method="post">
        @csrf
			<div class="form-field">
				<label>Name</label>
				<input type="text" name="name" required>
			</div>
			<div class="form-field">
				<label>Country Code</label>
				<select name="countrycode">
					<option value="" disabled selected hidden>Choose Country Code</option required>
					<option value="95">Myanmar(+95)</option>
					<option value="86">China(+86)</option>
					<option value="1">USA(+1)</option>
				</select>
			</div>
			<div class="form-field">
				<label>Phone Number</label>
				<input type="text" name="phonenumber" required>
			</div>
			<div class="form-field">
				<label>Email Address</label>
				<input type="text" name="email" required>
			</div>
			<div class="form-field">
				<label>Password</label>
				<input type="password" name="password" required>
			</div>
			<div class="form-field">
				<button type="submit">Confirm</button>
			</div>
		</form>
	</div>
</div>
<style type="text/css">
	.login-form{
		margin-top: 20px;
		margin-bottom: 180px;
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
