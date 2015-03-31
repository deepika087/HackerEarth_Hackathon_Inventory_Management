<html>
<head>
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	 <script src="Chart.js"></script>
	 <script src="vis.js"></script>
	 <link href="vis.css" rel="stylesheet" type="text/css" />
	 
	 <script type="text/javascript">
	</script>
</head>


<body>
	<?php include("./HeaderAndNavigator.php") ?>
	<div class="col-sm-8" style="background-color:white;">
		<div class="row">
	    	<div class="container">
				  <table class="table">
				    <thead>
				      <tr>
				        <th>Channel Name</th>
				        <th>Email Address</th>
				        <th>Contact person Name</th>
				        <th>Max Item purchased</th>
				        <th>Mim Item purchased</th>
				        <th>Last transaction Date</th>
				        <th>Next transaction date</th>
				      </tr>
				    </thead>
				    <tbody> 
				    	<tr class = "warning">
				    		<td>Snapdeal</td>
				    		<td>contact@snapdeal.com</td>
				    		<td>Sanjeev kapoor</td>
				    		<td>Laptops</td>
				    		<td>Leggings</td>
				    		<td>01/01/2015</td>
				    		<td>03/05/2015</td>
				    	</tr>

						<tr class = "danger">
				    		<td>Amazon</td>
				    		<td>meenakshi@amazon.com</td>
				    		<td>Meenakshi singh</td>
				    		<td>Books</td>
				    		<td>Laptops</td>
				    		<td>11/01/2014</td>
				    		<td>03/05/2015</td>
				    	</tr>

				    	<tr class = "success">
				    		<td>Flipkart</td>
				    		<td>flip123@flipkart.com</td>
				    		<td>Hemant singhal</td>
				    		<td>Leggings</td>
				    		<td>Books</td>
				    		<td>03/01/2015</td>
				    		<td>03/05/2015</td>
				    	</tr>
				    	
				    </tbody>
				</table>
		   	</div>
	    </div>
	</div>
</body>
</html>