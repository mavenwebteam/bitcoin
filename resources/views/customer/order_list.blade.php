    
@extends('layouts.nav')

@section('content')
<div class="container buy ">
	<div class="login-form col-sm-12">
		<h4>Order History</h4>
		<table>
			<tr id="tbl-head">
				<th>
					Order ID
				</th>
				<th>
					Name
				</th>
				<th>
					Phone Number
				</th>
				<th>
					Email
				</th>
				<th>
					Date
				</th>
			</tr>
                @foreach($data as $key =>$data)

			<tr id="tbl-body">
				<td>
					<a href="{{  route('customer.invoice',[$data->order_id])}}">{{$data->order_id;}}</a>
				</td>
				<td>
					{{$data->username;}}
				</td>
				<td>
				{{$data->phone;}}
				</td>
				<td>
				{{$data->email;}}
				</td>
				<td>
				{{$data->created_at;}}
				</td>
			</tr>
            @endforeach
		</table>
		
	</div>
</div>

<style type="text/css">
	a{
		color: #ffd700;
	}
	.login-form{
		margin: auto;
		margin-top: 50px;
		margin-bottom: auto;
		width: 1000px;
		height: 450px;
		text-align:center;
	}
	.form-field{
		margin: 10px;
	}
	.form-field label{
		margin-right: 5px;
		font-size: 18px;
		width: 90px;
		padding: 5px;
		text-align: left;
	}
	.form-field span{
		border-bottom: 1px solid;
		width: 200px;
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
	
	#tbl-head{
		background: #ffd700;
	}
	#tbl-body{
		border-bottom: 1px solid #ffd700;
	}
	th,td{
		padding-left: 20px;
		padding-right: 20px;
		padding-bottom: 10px;
		padding-top: 10px;
		color: #000;
		font-size: 18px;
		border-left: 1px solid;
	}
	td{
		color: #ffd700;
		border-left: 0px;
	}
	td a{
		color: #ffd700;
	}
</style>
@endsection