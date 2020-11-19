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
        <title>History</title>
	</head>
  <body>
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a href="Homepage.html" class="nav-link"><b>Home</b>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="prac.php"><b>Users</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="transfer.php"><b>Transaction</b><span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </nav> 
    <h3 style="text-align:center;height:200px;color:gray;font-size:35px;padding-top:80px">Transaction History</h3>
    <form action="view.php"method="POST">
      <table class="table table-hover">
        <tr>
          <th>Transfer ID</th>
          <th>Sender</th>
          <th>Reciever</th>
          <th>Amount transfered</th>
        </tr>
        <?php
          
          $result=mysqli_query($conn,"SELECT * FROM `transfer record`");
           while($row=mysqli_fetch_array($result))
           {
             echo "<tr>";
             echo "<td name='ID'>".$row['Transfer ID']."</td>";
             echo "<td>".$row['Sender']."</td>";
             echo "<td>".$row['Reciever']."</td>";
             echo "<td>".$row['Amount']."</td>";
             echo "</tr>";
           }         
          ?>

      </table>
    </form>
  </body>
</html>