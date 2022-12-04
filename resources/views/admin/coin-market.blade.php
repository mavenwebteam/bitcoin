@extends('layouts.admin-login-nav')

@section('content')
<style type="text/css">
	.content{
		margin-top: -15px;
		background: #101010;
		color: #FFD700;
	}
	#about-us,#coin-cap{
		margin-top: 10px;
	}
	#coin-cap{
		color: #f9f9f9;
		width: 1000px;
	}
	.content-title{
		color: #f9f9f9;
		text-align: center;
		font-family: Times New Roman;
		font-size: 28px;
		padding: 5px;
	}
	.content-body{
		padding: 10px;
	}
	.content-body img {
		border: solid 0.5px #aeaeae;
	}
	.content-body p{
		color: #f7f7f7;
		text-align: justify;
		font-size: 16px;
		font-family: Helvetica;
	}
	.service-wrapper{
		margin-top: 10px;
		margin-bottom: 10px;
	}
	.service{
		background: #030303;
		opacity: 0.9;
		padding: 10px;
		border: 1px solid #aeaeae;
		border-radius: 3px;
		height: 150px;
		text-align: center;
	}
	.service span{
		font-size: 30px;
	}
	.service p{
		font-size: 18px;
	}
	tr{
		color: #FFD700;
	}
</style>

<div class="container content">
	<h4 class="content-title">What is Crypto?</h4>
	<div class="row col-sm-12 content-body">

		<div class="col-sm-6">
			<img src="include/bg1.jpg" width="500" height="300">
		</div>
		<div class="col-sm-6">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
	</div>
</div>
<div class="container service-wrapper">
	<div class="row">
		<div class="col-sm-3">
			<div class="service">
				<span>Icon</span>
				<p class="service-info">Good To Serve</p>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="service">
				<span>Icon</span>
				<p class="service-info">Good To Serve</p>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="service">
				<span>Icon</span>
				<p class="service-info">Good To Serve</p>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="service">
				<span>Icon</span>
				<p class="service-info">Good To Serve</p>
			</div>
		</div>
		
	</div>
</div>
<div class="container content" id="coin-cap">
	<h4 class="content-title">Coin Rate</h4>
	<div class="row col-sm-12 content-body">
		<table class="col-lg-12">
        <tr>
        	<th>#</th>
            <th>Coin Name</th>
            <th>Coin Rate(BTC)</th>
            <th>Coin Code</th>
        </tr>
      <?php
         $url = "http://bitpay.com/api/rates";
         $json =   json_decode(file_get_contents($url));
         $dollar = $btc = 0 ;
         $i = 1;
         foreach($json as $obj){
            if($i <=10){
      ?>
   
      <tr>
         <td><?php echo $i ?></td>
         <td><?php echo $obj->name ?></td>
         <td><?php echo $obj->rate ?></td>
         <td><?php echo $obj->code ?></td>
      </tr>
   <?php
      $i++;}
   }
   ?>
</table>
	</div>
</div>
<div class="container content" id="about-us">
	<h4 class="content-title">About us</h4>
	<div class="row col-sm-12 content-body">

		<div class="col-sm-6">
			<img src="include/bg1.jpg" width="500" height="300">
		</div>
		<div class="col-sm-6">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
	</div>
</div>
<!-- Style -->

@endsection