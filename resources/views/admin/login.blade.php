@extends('layouts.admin-login-nav')

@section('content')
<div class="container buy">
	<div class="login-form col-sm-12">
		<h4>Login Admin Account Gift Card</h4>
		<form  method="POST" action="{{ route('admin.login.submit') }}">
            {{ csrf_field() }}
			<div class="form-field">
				<label>Name</label>
				<input type="text" name="name">
			</div>
			<div class="form-field">
				<label>Password</label>
				<input type="password" name="password">
			</div>
			<div class="row col-sm-12">
				<div class="form-field login col-sm-6">
					<button>Login</button>
				</div>
				<div class="form-field register col-sm-5">
					<button><a href="/admin/register-submit">Register</a></button>
				</div>
			</div>
		</form>
	</div>
</div>
<style type="text/css">
	.login-form{
		margin-top: 50px;
		margin-bottom: auto;
		width: 800px;
		height: 450px;
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
	.login{
		text-align: right;
	}
	.register{
		text-align: left;
	}
	.register a{
		color: #FFD700;
	}
</style>
@endsection