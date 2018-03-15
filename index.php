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
  <script>
$(document).ready(function(){
 $('#mir').typeahead({
  source: function(query, result)
  {
   $.ajax({
    url:"type.php",
    method:"POST",
    data:{query:query},
    dataType:"json",
    success:function(data)
    {
     result($.map(data, function(item){
      return item;
     }));
    }
   })
  }
 });
 
});


$(document).ready(function(){
 $('#target').typeahead({
  source: function(query, result)
  {
   $.ajax({
    url:"type_target.php",
    method:"POST",
    data:{query:query},
    dataType:"json",
    success:function(data)
    {
     result($.map(data, function(item){
      return item;
     }));
    }
   })
  }
 });
 
});



$(document).ready(function(){
 $('#disease').typeahead({
  source: function(query, result)
  {
   $.ajax({
    url:"type_disease.php",
    method:"POST",
    data:{query:query},
    dataType:"json",
    success:function(data)
    {
     result($.map(data, function(item){
      return item;
     }));
    }
   })
  }
 });
 
});





</script>

<style>
.table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
  background-color: #a5c9f7;
}
</style>


</head>
<body>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Miraging</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Browse</a></li>
      <li><a href="#">Documentation</a></li>
	  <li><a href="#">Download</a></li>
      <li><a href="ontology.php">Ontology</a></li>
	  <li><a href="#">About us</a></li>
      <li><a href="#">Contact</a></li>
    </ul>
    <form class="navbar-form navbar-left">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
  </div>
</nav>

<article>
  <div class="jumbotron">
  <div class="container">
    <h1>Search for microRNA</h1><br> 
					<div class="row">
						<div class="wrapper">
							<form id="myForm" class="form" action="index.php" method="post">
							<div class="col-sm-3">
							<input id="mir" type="text" name='mir' type="text" class="form-control" autocomplete = "off" placeholder="Enter miR"  value = "" autofocus=""/>
							</div>
							<div class="col-sm-3">
							<input id="target" type="text" name='target' type="text" class="form-control" autocomplete = "off" placeholder="Enter target (Optional)"  value = "" autofocus=""/>
							</div>
							<div class="col-sm-3">
							<input id="disease" type="text" name='disease' type="text" class="form-control" autocomplete = "off" placeholder="Enter disease (Optional)"  value = "" autofocus="" />
							</div>
							<div class="col-sm-3">
							<select class="form-control" name="evidence" id="dropdown2" >
								<option value="0" selected>Choose evidence level (All)</option>
								<option value="1">Evidence level 1</option>
								<option value="2">Evidence level 2</option>
								<option value="3">Evidence level 3</option>
								<option value="4">Evidence level 4</option>
							</select>
							</div>
							<div class="col-sm-12">
							<br><br><center><button class="btn btn-primary" type="submit" value="Search" name= "submit">Submit</button>
							&nbsp;	<button class="btn btn-primary" type="submit" href="index.php">Clear Search</button></center>
							</div>
							</form>
						</div>
					</div>
  </div>
  </div>


<div class="container">
	 
<?php 
		include 'dbconfig.php';
		include 'C:\xampp\htdocs\FDA\table.php';
?>

</div>

<p><br><br><br></p>

</article>

<footer>Copyright &copy; Miraging.org</footer>

</body>

<style>
footer {position: fixed;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1rem;
  color:#505050;
  background-color: #080808;
  text-align: center;}
</style>








</html>