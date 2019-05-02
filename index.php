<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Focused Web Crawler</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="vendor/bootstrap/css/btstrap_slider.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/portfolio-item.css" rel="stylesheet">
	
<script type="text/javascript">
 
function displayQ()
{
document.getElementById('badge').innerHTML='<span class="badge badge-secondary">New</span>';

}

var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
  output.innerHTML = this.value;
}

</script>
	
	
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Twitter Data</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Crawler
                <span class="sr-only">(current)</span>
              </a>
            </li>

          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Portfolio Item Heading -->
      <h1 class="my-4">Focused Crawler
        <small>1.0</small>
      </h1>

      <!-- Portfolio Item Row -->
      <div class="row">

<div class="col-md-8">
		
		

		
		
		<!-- FORM -->
		
<form class="form-horizontal" name="crawlform" action="crawl.py" method="get">


<table class="table table-bordered">



<!--KEYWORD-->
<tr>
<div class="form-group">
		
		<td>		<label class="control-label col-sm-2" for="word"><b>KEYWORD </b></label>
		</td>
		<td>		<div class="col-sm-10">
				  <input type="text" name="keyword" class="form-control" id="keyword" value="" placeholder="Enter Keyword" required> 
				</div>
		</td>
</div>
</tr>

<!--DATE-->
<tr>
<div class="form-group">
			


		<td>	<label class="control-label col-sm-2" for="pwd"><b>DATE</b></label>


		</td>
		
		<td>

			<div class="col-sm-10"> 
			  <b>SINCE</b><input type="date" name="start" value="" class="form-control" id="start" required>
			  <b>UNTIL</b><input type="date" name="end" value="" class="form-control" id="end" required>
			</div>

		</td>
</div>
</tr>

<!--LANGUAGE-->
<tr>
<div class="form-group">
			  
			  
			
			<td>	<label for="language"><b>LANGUAGE</b></label></td>
			<td><select class="form-control" name="language" id="language" required>
					<option value="en" selected>English</option>
					<option value="ms">Bahasa Melayu</option>
					<option value="id">Malay</option>
					
			  </select>
			  </td>
</div>
</tr>

<!--LOCATION-->
<tr>
<div class="form-group">
			  
			  
			
			<td>	<label for="location"><b>LOCATION</b></label></td>
			<td><select type="text" pattern="^([-+]?)([\d]{1,2})(((\.)(\d+)(,)))(\s*)(([-+]?)([\d]{1,3})((\.)(\d+))?)$" name="location" required>
					<option value="5.416394,100.332679">PENANG</option>
					<option value="3.073838,101.518347">SELANGOR</option>
					<option value="1.485368,103.761815">JOHOR</option>
					<option value="5.97884,116.07532">SABAH</option>
					<option value="1.553278,110.359213">SARAWAK</option>
					<option value="2.194418,102.249063">MALACCA</option>
					<option value="4.592113,101.090109">PERAK</option>
					<option value="6.118396,100.368459">KEDAH</option>
					<option value="6.125397,102.238071">KELANTAN</option>
					<option value="3.812632,103.32562">PAHANG</option>
					<option value="5.311692,103.132415">TERENGGANU</option>
					<option value="2.725806,101.942378">NEGERI SEMBILAN</option>
					<option value="6.444913,100.204769">PERLIS</option>
					<option value="4.5693754,102.2656823">Malaysia</option>
			  </select>
			  </td>
</div>
</tr>


<!--RADIUS-->
<tr>
<div class="form-group">
			  
			  
			
			<td>	<p><b>RADIUS  </b><span style="color:green;" id="demo"></span> <b><i>KM</i></b></p></td>
			<td>
						<div class="slidecontainer">
						  <input type="range" name="radius" value="" min="1" max="500" class="slider" id="myRange" required>
						</div>
			  </td>

<script>
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
</script>			  
</div>
</tr>

<!--NO OF TWEETS-->
<tr>
<div class="form-group">
			  
			  
			
			<td>	<label for="numb"><b>NUMBER OF TWEETS</b></label></td>
			<td>
			
			<input type="number" name="qty" min="1" max="99999999999999999999999999999999" class="form-control" id="number">
			
			</td>
</div>
</tr>

</table>

<!--SUBMIT-->
<div class="form-group">
			  
			<button type="submit" name="Submit" value="Submit" class="btn btn-default" onclick="displayQ()">SUBMIT</button>
			
</div>



</form>
</div>

        <div class="col-md-4">
          <h3 class="my-3">Crawler Description</h3>
          <p>The benefit of the focused crawling approach is that it is able to find a large number of relevant documents on that specific domain and is able to effectively discard irrelevant documents and hence leading to significant savings in both computation and communication resources, and high quality retrieval results</p>
          <h3 class="my-3">Operator Illustration </h3>
          <ul>
            <li><a href="https://developer.twitter.com/en/docs/tweets/search/guides/standard-operators" target="" style="text-decoration:none;">Standard Operators</a></li>
          </ul>
        </div>

      </div>
      <!-- /.row -->



    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; MMU 2019</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
