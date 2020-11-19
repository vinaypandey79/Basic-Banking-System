<?php

  $servername="localhost";
  $username="root";
  $password="vinay";
  $dbname="mywebsite";

  $conn=new mysqli($servername,$username,$password,$dbname);

  if($conn->connect_error){
  	die("connection failed".$conn->connect_error);
  }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width initial-scale=1, shrink-to-fit=no">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <title>View and Transfer</title>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a href="#" class="nav-link"><b>Home</b>
					<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="prac.php"><b>Users</b></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="transfer.php"><b>Transaction</b></a>
				</li>
			</ul>
		</nav>
		<form action="dummy.php"method="POST">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="card border-secondary mb-3"style="height:400px">
							<div style="font-size:20px;color:gray" class="card-body">
								<h4 class="card-title">User Details</h4>
								<br>
								<?php
								if(isset($_POST['submit'])){
									$user=$_POST['user'];
									$result=mysqli_query($conn,"SELECT * FROM users WHERE fname='$user'");
									while($row=mysqli_fetch_array($result)){
										echo "<p><b>User ID</b> : ".$row['id']."</p><br>";
										echo "<p name='sender'><b>Name</b> : ".$row['fname']."</p><br>";
										echo "<p><b>Email</b> : ".$row['email']."</p><br>";
										echo "<p><b>Balance</b> : ".$row['balance']."</p><br>";
									}
								}
								?>
							</div>
						</div>
					</div>
                      <br><br>
					<div class="col-sm-6">
						<div class="card border-secondary mb-3"style="height:400px">
							<div style="font-size:20px;color:gray" class="card-body">
								<h4 class="card-title">Transfer Money</h4>
								<br>
								Sender : <input type="text" name="sender" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo "$user";?>">
								Select Reciever:
								<select name="reciever" id="dropdown"required>
									<option>--Select Reciever--</option>
									<?php
									$db=mysqli_connect("localhost","root","vinay","mywebsite");
									$res=mysqli_query($db,"SELECT * FROM users WHERE fname!='$user'");
									while($row=mysqli_fetch_array($res)){
										echo("<option>"."  ".$row['fname']."</option>");
									}
									?>
								</select>
								<br><br>
								   Amount to be transfered:
								   <input name="amount"type="number"required>
								   <br><br>
								   <button id="transfer" name="transfer"class="btn btn-outline-secondary"><b>Transfer</b></button>
							</div>
						</div>
					</div>

				</div>
			</div>
		</form>