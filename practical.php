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
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width initial-scale=1, shrink-to-fit=no">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <title>Users</title>
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
		<br><br>
		<form action ="view.php"method="post">
			<h3 style="text-align:center;
			height:100px;
			color:grey;
			font-size:35px;
			padding:-top:20px;">
			View Details</h3>
			<h6 style="text-align:center;color:gray">
				<select name="user"id="user" required>
					<option>Select Users</option>
				<?php
				$db=mysqli_connect("localhost","root","vinay","mywebsite");
				$res=mysqli_query($db,"SELECT *FROM users");
				while($row=mysqli_fetch_array($res)){
					echo("<option>".$row['fname']."</option>");
				}
				?>
			</select>
		</h6>
		<br><br>

		<div style="text-align:center">
			<button href="view.php"id="submit"name="submit"class="btn btn-outline-secondary"><b>View Users Details</b></button>
		</div>
		</form>

		<h3 style="text-align:center;height:200px;color:gray;font-size:35px;padding-top:80px">List of Users</h3>
			<table class="table table-hover">
				<tr>
					<th>User ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Amount</th>
				</tr>
				<?php

				$result=mysqli_query($conn,"SELECT * FROM users ");
				while($row=mysqli_fetch_array($result)){
					echo "<tr>";
					echo "<td id='ID'name='ID'class='nr'>".$row['id']."</td>";
					echo "<td>".$row['fname']."</td>";
					echo "<td>".$row['email']."</td>";
					echo "<td>".$row['date']."</td>";
					echo "</tr>";

				}
				?>
			</table>
	</body>
	    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</html>