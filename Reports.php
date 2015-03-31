<html>
<head>
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	 <script src="Chart.js"></script>
	 <script src="vis.js"></script>
	 <link href="vis.css" rel="stylesheet" type="text/css" />
	 
	 <script type="text/javascript">
	 	jQuery(document).ready(function($) {

	 		var itemData = "";
	 		var channelData = "";
	 		$.ajax({
	 			url: './GetAllItemsFromTable.php',
	 			type: 'GET',
	 			dataType: 'json'
	 		})
	 		.done(function(json) {
	 			console.log("success");
	 			itemData = json;
	 			itemCount(json);
	 			costItemBarGraph(json);
	 		})
	 		.fail(function(jqXHR, textStatus, errorThrown) {
	 			console.log("error" + errorThrown);
	 		})
	 		
	 		$.ajax({
	 			url: './GetItemsChannelData.php',
	 			type: 'GET',
	 			dataType: 'json'
	 		})
	 		.done(function(json) {
	 			console.log("successful to get channel only info");
	 			channelData = json;
	 			timeLineGraph(json);
	 		})
	 		.fail(function() {
	 			console.log("Failed to get channel only info ");
	 		});
	 	

	 		$.ajax({
	 			url: './GetDataForReports.php',
	 			type: 'GET',
	 			dataType: 'json'
	 		})
	 		.done(function(json) {
	 			console.dir("success" );
	 			UnitVsTime();
	 		})
	 		.fail(function(jqXHR, textStatus, errorThrown) {
	 			console.log("error" + errorThrown);
	 		});

	 		function itemCount(json) {

	 			 var data = [];
	 			 var numbers = [];

	 			 for (i = 0, len = json.length; i < len; i++) {
	 			 	console.log(json.length);
              		e=json[i];
              		console.log(e.quantity + " --" + e.name);

              		while(true) {
              			var num = Math.random();
              			if (num != 0 && ($.inArray(num, numbers) == -1)) {
              				var tempObj = {value: e.quantity, color: '#'+(num*0xFFFFFF<<0).toString(16), label: e.name}
							data.push(tempObj);
							break;
              			}
              		}
              	}

	 			var ctx = $("#itemCount").get(0).getContext("2d");
	 			ctx.font="20px Arial";
	 			ctx.textBaseline="bottom"; 
				ctx.fillText("Item Count", 5000, 100);
	 			var myPieChart = new Chart(ctx).Pie(data);
	 		}

	 		function costItemBarGraph(json) {

	 			var labelsData = [];
	 			var costData = [];

	 			for(i = 0, len = json.length; i < len; i++) {
	 				e = json[i];
	 				console.log(e.name + "--" + e.perUnitCost);
	 				labelsData.push(e.name);
	 				costData.push(parseInt(e.perUnitCost));
	 			}
	 			var data = {
	 				labels: labelsData,
	 				datasets: [
							        {
							            label: "My First dataset",
							            fillColor: "rgba(" + parseInt(Math.random()*100) + "," + parseInt(Math.random()*100) + "," + parseInt(Math.random()*100) + ",0.5)",
							            strokeColor: "rgba(" + parseInt(Math.random()*100) + "," + parseInt(Math.random()*100) + "," + parseInt(Math.random()*100) + ",0.8)",
							            data: costData
							        }
							  ]
	 			};

	 			var ctx = $("#costItem").get(0).getContext("2d");
	 			var myBarChart = new Chart(ctx).Bar(data);
	 		}
	 		
	 		function timeLineGraph(json) {
	 			var container = document.getElementById('visualization');
	 			var items = new vis.DataSet();
	 			var overallIdIndex = 0;

	 			console.log("Starting making time line chart");

	 			for (i = 0; i < json.length; i++) {
	 				var name = "";
	 				e = json[i];
	 				//2015-10-05 yyyy-dd-mm to give yyyy-mm-dd
	 				dateRecieved = e.channelDate.substring(0, e.channelDate.indexOf(" 00:00:00"));
	 				console.log(e.uniqueId + ".) " + dateRecieved + " -- " + e.channelName + " -- " + e.channelQuantity);
	 				console.log("Year = " + dateRecieved.substring(0,4));
	 				console.log("Month = " + dateRecieved.substring(8,10));
	 				console.log("Date = " + dateRecieved.substring(5,7));
	 				for (j = 0; j < itemData.length; j++) {
	 					if (itemData[j].uniqueId == e.uniqueId) {
	 						name = itemData[j].name;
	 						console.log("Found item name : " + name);
	 						break;
	 					}
	 				}
	 				var singleData = {id: ++overallIdIndex, content: e.channelName + " :: " +  name + " :: " + e.channelQuantity , start: new Date(dateRecieved.substring(0,4), dateRecieved.substring(8,10) , dateRecieved.substring(5,7))};
	 				console.log("Deepika: " + singleData.start);
	 				items.add(singleData);
	 			}

	 			 var options = {
					  	
					  	 width:  '250%',
					     style: 'box',
					     margin :{
					     	item : {
					     		horizontal: 300
					     	}
					     }
					  };
 				var timeline = new vis.Timeline(container, items, options);
			}
	 	});
	 </script>
</head>

<body>
	<?php include("./HeaderAndNavigator.php") ?>
	<div class="col-sm-8" style="background-color:white;">
		<table>
			
			<tr>
				<td>
					<canvas id="itemCount" width="500" height="300"></canvas></td>
					<td>
					<canvas id="costItem" width="500" height="300"></canvas>
				</td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td>
					<div id='visualization'  width="1300" height="500"></div>
				</td>
			</tr>
			
			
		</table>
	</div>

</body>
</html>