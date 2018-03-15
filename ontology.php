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


<div class="container">
	 <h3>Description</h3>
  <p>microRNAs (short for miRNAs or miRs) are small, non-coding RNA molecules that regulate the expression of their respective target proteins. As such, miRNAs are associated with the development, diagnosis, treatment, and prognosis of various human diseases.</p>
  <p>The complete elucidation of miRNA interactions requires more than a list of biologically validated miRNA targets, as these could represent a subset of the possibly hundreds of targets. miRNA target prediction databases can fill potential gaps. However, the ~30 such databases use different prediction algorithms and use heterogeneous semantics, preventing easy comparison. In addition, gene expression, protein function, and impacted processes are critical pieces of information for biologists to determine the impact of miRNAs.</p>
  <p>OmniSearch software was developed to handle the significant challenge of miRNA-related data integration and query. It will significantly assist biologists, bioinformaticians, and clinical investigators to unravel critical roles performed by different microRNAs in human disease.
  </p>

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