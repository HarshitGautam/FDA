<!DOCTYPE html>
<html lang="en">
<head>
  <title>Miraging</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="icon" type="image/png" href="assets/img/icon.png">
  <link rel="stylesheet" href="assets/css/css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script> 
  </head>
<body>

<?php 
	if(isset($_POST) && array_key_exists('submit',$_POST))
		{
			$query = NULL;
			$mir = isset($_POST['mir']) ? $_POST['mir'] : '';
			$target = isset($_POST['target']) ? $_POST['target'] : '';
			$disease = isset($_POST['disease']) ? $_POST['disease'] : '';
			$evidence = isset($_POST['evidence']) ? $_POST['evidence'] : '';
			echo "$mir";
			echo "$target";
			echo "$disease";
			echo "$evidence";
			
			if ($mir != NULL&&$target==''&& $disease=='' && $evidence==0)
			{ 
			$query = "select * from target where mirna = '$mir'";
			}
			if ($mir != NULL&&$target!=NULL&& $disease=='' && $evidence==0)
			{ 
			$query = "select * from target where mirna = '$mir' and target_gene='$target'";
			}
			if ($mir != NULL&&$target!=''&& $disease=='' && $evidence!=0)
			{ 
			$query = "select * from target where mirna = '$mir' and target_gene='$target' and evidence_level='$evidence'";
			}
			if ($mir != NULL&&$target!=''&& $disease!='' && $evidence!=0)
			{ 
			$query = "select * from target where mirna = '$mir'";
			}
			if ($mir != NULL&&$target==''&& $disease=='' && $evidence!=0)
			{ 
			$query = "select * from target where mirna = '$mir' and evidence_level='$evidence'";
			}
			if ($mir == NULL&&$target==''&& $disease=='' && $evidence!=0)
			{ 
			$query = "select * from target where evidence_level='$evidence'";
			}
			if ($mir == NULL&&$target!=''&& $disease=='' && $evidence!=0)
			{ 
			$query = "select * from target where target_gene='$target' and evidence_level='$evidence'";
			}
			else{
				echo("<h1>Enter a Search</h1>");
			}
			if($query!=NULL)
			{
			
			//echo "loop entered";
				if (!$conn->query($query)) 
				{
				printf("Errormessage: %s\n", $conn->error);
				}
				$result = $conn->query($query);
			}
   
			if($query!=NULL)
			{
			
			  if( mysqli_num_rows($result) == 0)
			 {
				 echo "<script language=\"Javascript\"> alert(\"Re enter a new search\")</script>";
			 }
			 else{
				echo "<p>Total row count: ";
				echo mysqli_num_rows($result);
				echo "</p>";
				echo "<table class='table table-hover table-bordered'>
				<thead class='thead-inverse'>"; 
		
				echo 
					"<th style='width:5%; background-color: #dee1e5 !important;'>miR</th>
					<th style='width:5%; background-color: #dee1e5 !important;'>id</th>
					<th style='width:5%; background-color: #dee1e5 !important;'>Target_gene</th>
					<th style='width:5%; background-color: #dee1e5 !important;'>Evidence_level</th>
				</thead>
				<tbody>";
           $i = 0;
		 
           while ($row = $result->fetch_assoc()) 
		   {
               $class = ($i == 0) ? "" : "alt";
			   $inp = $row["id"];
               echo "<tr onclick=\"showData('$inp');\" data-toggle='collapse' data-target='.order1'>";
			   echo "<td>".$row["mirna"]."</td>";
			   echo "<td>".$row["id"]."</td>";
			   echo "<td>".$row["target_gene"]."</td>";
			   echo "<td>".$row["evidence_level"]."<span style='float:right;' class='glyphicon glyphicon-eye-open'></td>";
		   }
				echo"</tr></tbody></table>";
			 }
			}
		}
		else{
			
			$query = "select * from target t RIGHT JOIN result r ON t.id = r.id;";
			
			if($query!=NULL)
			{
			
			//echo "loop entered";
				if (!$conn->query($query)) 
				{
				printf("Errormessage: %s\n", $conn->error);
				}
				$result = $conn->query($query);
			}
   
			if($query!=NULL)
			{
			
			  if( mysqli_num_rows($result) == 0)
			 {
				 echo "<script language=\"Javascript\"> alert(\"Re enter a new search\")</script>";
			 }
			 else{
				 echo "<p>Total row count: ";
				echo mysqli_num_rows($result);
				echo "</p>";
				echo "
				<table class='table table-hover table-bordered'>
				<thead class='thead-inverse'>"; 
		
				echo 
					"<th style='width:5%; background-color: #dee1e5 !important;'>miR</th>
					<th style='width:5%; background-color: #dee1e5 !important;'>Target_gene</th>
					<th style='width:5%; background-color: #dee1e5 !important;'>Evidence Level</th>
					<th style='width:5%; background-color: #dee1e5 !important;'>Label</th>
				</thead>
				<tbody>";
           $i = 0;
		 
           while ($row = $result->fetch_assoc()) 
		   {
               $class = ($i == 0) ? "" : "alt";
               echo "<tr><td>".$row["mirna"]."</td>";
			   echo "<td>".$row["target_gene"]."</td>";
			   echo "<td>".$row["evidence_level"]."</td>";
			   echo "<td>".$row["label"]."</td>";
			   echo "<tr id='txtHint'></tr>";
		   }
				echo"</tr></tbody></table>";
			 }
			}
		}
?>

</body>

  <script>
function showData(str) {
	alert(str);
	st1 = "txtHint_" + str;
	alert(st1);
    if (str == "") 
		alert(document.getElementById("st1").innerHTML);
        document.getElementById("st1").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("st1").innerHTML = this.responseText;
				var result_style = document.getElementById('st1').style;
				result_style.display = 'table-row';
				myFunction(this.responseText, 800, 400)
            }
        };
        xmlhttp.open("GET","getData.php?q="+str,true);
        xmlhttp.send();
    }
	
}

function myFunction(text1, w, h) {
	var left = (screen.width/2)-(w/2);
  var top = (screen.height/2)-(h/2);
    var myWindow = window.open("", "", 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
    myWindow.document.write(text1);
    myWindow.focus();
}

</script>

</html>


