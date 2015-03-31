<html>
<head>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  	
  	<script type="text/javascript">
  		jQuery(document).ready(function($) {
  			/**
  			This code is to handle the add event 
  			**/
  			$('#addItem').click(function(event) {
  				
  				var channelName = $('[id^="channelName"]').last().attr('id');
				var index = channelName.substr("channelName".length, channelName.length);
				var newChannelName = "channelName" + (parseInt(index)+1);
				var newChannelDate = "channelDate" + (parseInt(index)+1);
				var newChannelQuantity = "channelQuantity" + (parseInt(index)+1);
				var newChannelSpecificCost = "specialUnitCost" + (parseInt(index)+1);
				var htmlCode = '<tr>' + 
					'<td> <label class="control-label col-sm-2" >Channel:</label> </td> ' +
					'<td> <input type="text" class="form-control" id="'+ newChannelName + '" name="'+ newChannelName + '" placeholder="Channel name"> </td>' + 
					'<td> &nbsp&nbsp&nbsp </td>' +
					'<td> <input type="text" class="form-control" id="'+ newChannelDate + '" name="'+ newChannelDate + '" placeholder="dd/mm/yy"> </td>' +
					'<td> &nbsp&nbsp&nbsp </td>' +
					'<td> <input type="text" class="form-control" id="'+ newChannelQuantity + '" name="'+ newChannelQuantity + '" placeholder="50 [units]"> </td>' + 
					'<td> &nbsp&nbsp&nbsp </td>' + 
					'<td> <input type="text" class="form-control" id="' + newChannelSpecificCost + '" name="' + newChannelSpecificCost + '" placeholder="Rs. 50"> </td>'	
				'</tr>';
				$('#ChannelStartingRow').append(htmlCode);
  			});	
			
			$('#submit').click(function(event) {
				var dataString = '&name='+ $('#name').val() +'&description='+ $('#description').val() + '&category='+ $('#category').val() + 
				'&subCategory=' + $('#subCategory').val() + '&lowerThreshold=' +  $('#lowerThreshold').val() + '&upperThreshold=' + $('#upperThreshold').val() + 
				'&shelf=' + $('#shelf').val() + '&perUnitCost=' + $('#perUnitCost').val() + '&totalQuantity=' + $('#totalQuantity').val();

				//Get the last index from the DOM
				var channelName = $('[id^="channelName"]').last().attr('id');
				var lastIndex = channelName.substr("channelName".length, channelName.length);

				var i = 1;
				while (i <= parseInt(lastIndex)) {
					
					dataString = dataString + '&channelName' + i + '=' + $('#channelName' + i).val() + 
					'&channelDate' + i + '=' + $('#channelDate' + i).val() + 
					'&channelQuantity' + i + '=' + $('#channelQuantity' + i).val() + 
					'&specialUnitCost' + i + '=' + $('#specialUnitCost' + i).val() ;
					i = i + 1 ;
				}
				
				console.log(dataString);

	            /**
	              Send request to file to get all the near by locations given the latitude and langitude. 
	            **/
		        var request = $.ajax({
		              type:'POST',
		              data:dataString,
		              url:'./SaveNewItem.php'
		             });
		        request.done(function(textStatus) {
		        	console.log("Request Done: " + textStatus);
		        	if (textStatus == "success") {
		        		console.log("Item saved successfully ! !" + textStatus);	
		        	} else {
		        		console.log("Failed: " +textStatus);
            			console.log( "Request failed: " + textStatus );	
		        	}
		         	
		         });
			});

  		});
  	</script>
</head>
<body>
	<form class="form-horizontal" role="form" >
		<table>
			<tr>
				<td> <label class="control-label col-sm-2" >Name:</label></td>
      			<td> <input type="text" class="form-control" id="name" name="name" placeholder="Enter item's name" ></td>
      			<td> <label class="control-label col-sm-2" >Description:</label></td>
      			<td> <input type="text" class="form-control" id="description"  name="description" placeholder="Enter item's description" ></td>
      			<td> <label class="control-label col-sm-2" >Category:</label></td>
      			<td> <input type="text" class="form-control" id="category" name="category" placeholder="Category" ></td>
			</tr>
			<tr>
				<td> <label class="control-label col-sm-2" >Lower Threshold:</label> </td>
				<td> <input type="text" class="form-control" id="lowerThreshold" name="lowerThreshold" placeholder="0 [units]" > </td>
				<td> <label class="control-label col-sm-2" >Upper Threshold:</label> </td>
				<td> <input type="text" class="form-control" id="upperThreshold" name="upperThreshold" placeholder="10000000 [units]" ></td>
				<td> <label class="control-label col-sm-2" >Sub Category:</label></td>
      			<td> <input type="text" class="form-control" id="subCategory" name="subCategory" placeholder="Sub Category" ></td>
			</tr>
			<tr>
				<td> <label class="control-label col-sm-2" >Shelf:</label> </td>
				<td> <input type="text" class="form-control" id="shelf" name="shelf" placeholder="P10-10"></td>
				<td> <label class="control-label col-sm-2" >Cost:</label> </td>
				<td> <input type="text" class="form-control" id="perUnitCost" name="perUnitCost" placeholder="500"></td>
				<td> <label class="control-label col-sm-2" >Quantity:</label> </td>
				<td> <input type="text" class="form-control" id="totalQuantity" name="totalQuantity" placeholder="500"></td>
			</tr>
		</table>
		<br />
		<table id="ChannelStartingRow">
			<tr>
				<td> <label class="control-label col-sm-2" >Channel:</label> </td>
				<td> <input type="text" class="form-control" id="channelName1" name="channelName1" placeholder="Channel name" > </td>
				<td> &nbsp&nbsp&nbsp </td>
				<td> <input type="text" class="form-control" id="channelDate1" name="channelDate1" placeholder="dd/mm/yy" > </td>
				<td> &nbsp&nbsp&nbsp </td>
				<td> <input type="text" class="form-control" id="channelQuantity1" name="channelQuantity1" placeholder="50 [units]" > </td>
				<td> &nbsp&nbsp&nbsp </td>
				<td> <input type="text" class="form-control" id="specialUnitCost1" name="specialUnitCost1" placeholder="Rs. 50" > </td>
				<td> <img src=".\Images\AddMoreItems.png" alt="click to add more" id="addItem" height="40" width="50"/> </td>
			</tr>
		</table>
		<br />
		<center><input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary"></center>			
	</form>


</body>
</html>