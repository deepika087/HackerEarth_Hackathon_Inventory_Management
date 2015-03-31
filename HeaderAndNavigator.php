<html>
<head>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
       $('.nav.nav-pills.nav-stacked li a').first(function(e) {
        console.log('capttured event in the ready stage itself');
        if (!$(this).hasClass('active'))
        {
          console.log('Adding class in the ready stage itself');
          $(this).addClass('active');
        }
      });

      $('.nav.nav-pills.nav-stacked li a').click(function(e) {
        console.log('capttured event onclick ');
        if (!$(this).hasClass('active'))
        {
          console.log('Adding class onclick');
          $(this).addClass('active');
        }
        
      });
    });
  </script>
</head>

<div class="container">
  <img class="img-responsive" src=".\Images\Header.PNG" alt="Chania" >
    <!--<a href="#" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-search"></span> Search</a>-->
</div>
<div class="container-fluid">
  <div class="row">
  	<div class="col-md-3" style="background-color:black;color:white;float:left;height:700px">
      <ul class="nav nav-pills nav-stacked">
      
        <li ><a href=".\index.php"><center>Home</center></a></center></li>
		    <li><a href=".\CreateNewItemAndView.php"><center>Items</center></a></li>
		    <li><a href=".\channels.php"><center>Channels</center></a></li>
		    <li><a href=".\Reports.php"><center>Report</center></a></li>
      </ul>
    </div>
