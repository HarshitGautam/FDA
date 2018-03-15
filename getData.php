<!DOCTYPE html>
<html>
<head>
  <link rel="icon" type="image/png" href="assets/img/icon.png">
  <link rel="stylesheet" href="assets/css/css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = ($_GET['q']);

echo $q;
			$servername ='localhost';
			$username = 'root';
			$password = '';
			$dbname = 'fda';

$con = new mysqli($servername, $username, $password, $dbname);

if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"fda");
$sql="SELECT * FROM result WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);

			
			
				echo "<div class='container'>
				<table class='table table-hover table-bordered'>
				<thead class='thead-inverse'>"; 
		
				echo 
					"<th style='width:5%; background-color: #dee1e5 !important;'>ID</th>
					<th style='width:5%; background-color: #dee1e5 !important;'>Label</th>
					<th style='width:5%; background-color: #dee1e5 !important;'>Type Label</th>
					<th style='width:5%; background-color: #dee1e5 !important;'>PMID Link</th>
				</thead>
				<tbody>";
          
		 
           while($row = mysqli_fetch_array($result))  
		   {
               echo "<tr><td>".$row["id"]."</td>";
			   echo "<td>".$row["label"]."</td>";
			   echo "<td>".$row["type_label"]."</td>";
			   echo "<td><a href=".$row["pmid_link"].">".$row["pmid_link"]."</a></td>";
		   }
				echo"</tr></tbody></table></div>";


?>
</body>
</html>