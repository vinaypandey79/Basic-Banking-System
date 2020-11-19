<html>
	<head>
		<title>Transaction</title>
		<meta http-equiv="refresh" content="6;url=Homepage.html"/>
	</head>
	<body>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="collapse navbar-collapse"id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
					<a href="Homepage.html" class="nav-link"><b>Home</b>
					<span class="sr-only">(current)</span></a>
				   </li>
				   <li class="nav-item active">
					<a class="nav-link" href="prac.php"><b>Users</b></a>
				   </li>
				   <li class="nav-item">
					<a class="nav-link" href="transfer.php"><b>Transaction</b></a>
				   </li>
				</ul>
			</div>
		</nav>
			
			<br>
			<div id="text"name="text1"class="alert alert-success"role="alert">
				Successfull.....
				please wait ,redirect to Homepage....
				avoid this error.....
			</div>
			<div id="text2" name="text2"class="alert alert-danger"role="alert">
				Insufficent Balance
			</div>
			<p id="message"></p>
			<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
			<script>
				$('#text').hide();
				$('#text2').hide();

				function pageRedirect(){
					var delay=1000;
					document.getElementById("message").innerHTML="Please wait ,you are redirecting to new page";
					setTimeout(function(){
						window.location="Homepage.html";
					},delay);
				}
			</script>
	</body>
</html>

<?php
 $servername="localhost";
  $username="root";
  $password="vinay";
  $dbname="mywebsite";

  $conn=new mysqli($servername,$username,$password,$dbname);

  if($conn->connect_error){
  	die("connection failed".$conn->connect_error);
  }
  $flag=false;
  if(isset($_POST['transfer'])){
  	$sender=$_POST["sender"];
  	$reciever=$_POST["reciever"];
  	$amount=$_POST["amount"];

  	$sql="SELECT balance FROM users WHERE fname='$sender'";
  	$result=$conn->query($sql);
  	if($result->num_rows>0){
  		while($row=$result->fetch_assoc()){
  			if($row["balance"]-$amount>100){
  				$sql="UPDATE `users` SET balance=(balance-$amount)WHERE fname='$sender'";
  				if($conn->query($sql)==TRUE){
  					$flag=true;
  				}else{
  					echo "Error updating records:".$conn->error;
  				}
  			}
  			else{
  				echo " ";
  			}
  		}
  		}else{
  			echo "0 results";
  		}
  		if($flag==true){
  			$sql="UPDATE `users` SET balance=(balance+$amount)WHERE fname='$reciever'";
  		

  		if($conn->query($sql)==TRUE){
  			$flag=true;
  		}else{
  			echo "Error updating records:".$conn->error;
  		}
  	}
  	if($flag==TRUE){
  		$sql="INSERT INTO transfer record(Transfer ID,Sender,Reciever,Amount)VALUES (NULL,'$sender','$reciever','$amount')";
  		if($conn->query($sql==TRUE)){

  		}else{
  			echo"Error updating records".$conn->error;
  		}
  	}
  }
  if($flag==true){
  	echo"<script>
  	       $('#text').show();
  	       </script>";
  }
  elseif($flag==false){
  	echo"<script>
  	       $('#text2').show();
  	       </script>";
  }
?>