<html>
<head>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  	$(document).ready(function($) {

  		/** To get the existing data in database **/
  		function fetchResultsFromDatabase() {
  			var request = $.ajax({
	            url: "./GetAllItemsFromTable.php",
	            type: "GET",      
	            dataType: "json"
         	});

	      	request.done(function(json) {
	      		var bootstrapClass = ['success', 'info', 'warning', 'danger'];
	      		for (i = 0, len = json.length; i < len; i++) {
	          		e=json[i];
	          		if (e.name != "") {
	          			//Assign the class
	          			if (parseInt(e.quantity) <= parseInt(e.lowerThresh) ) {
	          				console.log(e.quantity + " " + e.lowerThresh + " therefore danger");
	          				bc = 'danger';
	          			} else if (parseInt(e.quantity) >= parseInt(e.upperThresh)) {
	          				console.log(e.quantity + " " + e.upperThresh + " therefore warning");
	          				bc = 'warning';
	          			} else {
	          				console.log(e.quantity  + " therefore normal case");
	          				bc = 'info';
	          			}
	         	 		var htmlCode = '<tr class = ' + bc + '>' + 
					        '<td>' + e.uniqueId + '</td>' +
					        '<td>' + e.name + '</td>' +
					        '<td> ' + e.description + '</td>' +
					        '<td>' + e.lowerThresh + '</td>' +
					        '<td>' + e.upperThresh + '</td>' +
					        '<td>' + e.category + '</td>' + 
					        '<td>' + e.perUnitCost + '</td>' +
					      '</tr>';
					    $('#allItems').append(htmlCode);
	          		}
	         	}	
	        });
	    
	         request.fail(function(jqXHR, textStatus) {
	            alert( "Request failed: " + textStatus );
	         });
  		}
		fetchResultsFromDatabase();
  	});
  </script>
</head>
<body>

<?php include("./HeaderAndNavigator.php") ?>
	<div class="col-sm-8" style="background-color:white;">
	    <div class="row">
	    	<p> <?php include("./NewItemAddForm.php") ?>
	    </div>
	    <div class="row">
	    	<div class="container">
				  <table class="table">
				    <thead>
				      <tr>
				        <th>UniqueId</th>
				        <th>Name</th>
				        <th>Description</th>
				        <th>Lower Threshold</th>
				        <th>Upper Threshold</th>
				        <th>Category</th>
				        <th>Cost(in Rs per unit)</th>
				      </tr>
				    </thead>
				    <tbody id="allItems">
				    </tbody>
				</table>
		   	</div>
	    </div>
	</div>

</div> <!-- This is the closing tag of row which was started by HeaderAndNavigator.php -->
</div>
    
</body>
</html>
