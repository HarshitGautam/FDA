<?php
$connect = mysqli_connect("localhost", "root", "", "fda");
$request = mysqli_real_escape_string($connect, $_POST["query"]);
$query = "
 SELECT distinct target_gene FROM target WHERE target_gene LIKE '%".$request."%'
";

$result = mysqli_query($connect, $query);

$data = array();

if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_assoc($result))
 {
  $data[] = $row["target_gene"];
 }
 echo json_encode($data);
}
 ?>