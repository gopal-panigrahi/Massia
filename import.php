<!DOCTYPE html>
<html>
<head>
	<title>Import Details</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	  <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>


	<style type="text/css">
	    .myfont{
	      font-size: 1vw;
	      color: white;
	      background-color: #0d0d0d;
	      padding-right: 35px;
	    }
	</style>

</head>
<body>

	<span class="d-flex flex-column" style="background-color: #0d0d0d;">
    <span class="p-3"></span>
    <span class="d-flex flex-row">
      	<span class="p-2 w-50 text-center" style="border-radius: 0 60px 0 0;font-size: 2vw;background-color: #66ff33;font-family: 'Aclonica'">SAYALI INDUSTRIES</span>
      		<span class="p-2 text-center">
				<input type="button" class="btn myfont" value="HOME" onclick="window.location='index.php'" />
				<input type="button" class="btn myfont" value="IMPORTS" onclick="window.location='import.php'"/>
				<input type="button" class="btn myfont" value="INVENTORY" onclick="window.location='inventory.php'"/>
				<input type="button" class="btn myfont" value="CUSTOMER" onclick="window.location='customer.php'"/>
				<input type="button" class="btn myfont" value="RATE CARD" onclick="window.location='rate_card.php'"/>
				<input type="button" class="btn myfont" value="ORDERS" onclick="window.location='order.php'"/>
				<input type="button" class="btn myfont" value="ABOUT"/>
      		</span>
   		 </span>
 	 </span>
	  
	<h1 class="display-5 text-center" style="padding-top: 10%; font-size:70px;">IMPORT DETAILS</h1>
	<!-- Button trigger modal -->
	<div class="text-right mb-3 " style="padding-right: 2%">
		<button type="button" class="btn px-md-5" style="background-color: #00e600" data-toggle="modal" data-target="#add">
  			<b>ADD IMPORT</b>
		</button>
	</div>

	<div class="input-group w-75 mx-auto my-5">
    <div class="input-group-prepend">
      <span class="input-group-text p-3">SEARCH</span>
    </div>
    <input type="text" class="form-control" onkeyup="importData(this.value)"/>
  </div>

<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	    <form action="import_api.php" method="POST">
		  <div class="row" style="padding-top: 10px">
		    <div class="col">
		      <input type="text" class="form-control" pattern="*[0-9]" name="gate" placeholder="Gate Entry No.">
		    </div>
		    <div class="col">
		      <input type="Date" class="form-control" name="date" placeholder="Date">
		    </div>
		  </div>
		  <div class="row" style="padding-top: 10px">
		  	<div class="col">
		  		<input type="text" class="form-control" name="po" placeholder="PO/PR">
		  	</div>
		  </div>

		  <div class="row" style="padding-top: 10px">
		  	<div class="col">
		  		<input type="Time" class="form-control" name="in" placeholder="Time In">
		  	</div>
		  	<div class="col">
		  		<input type="Time" class="form-control" name="out" placeholder="Time Out">
		  	</div>
		  </div>

		   <div class="row" style="padding-top: 10px">
		  	<div class="col">
		  		<input type="text" class="form-control" name="veh" placeholder="Vehicle Number">
		  	</div>
		  	<div class="col">
		  		
		  	</div>
		  </div>

		   <div class="row" style="padding-top: 10px">
		  	<div class="col">
		  		<input type="text" class="form-control" name="nm" placeholder="Name">
		  	</div>
		  </div>

		   <div class="row" style="padding-top: 10px">
		  	<div class="col">
		  		<input type="text" class="form-control" name="add" placeholder="Address">
		  	</div>
		  </div>
		  
		   <div class="row" style="padding-top: 10px">
		  	<div class="col">
		  		<input type="text" class="form-control" name="des" placeholder="Description">
		  	</div>
		  	<div class="col">
		  		<input type="Number" class="form-control" name="qnt" placeholder="Qnty.">
		  	</div>
		  </div>

		   <div class="row" style="padding-top: 10px">
		  	<div class="col">
		  		
		  	</div>
		  	<div class="col">
		  		<button class="btn btn-primary">Add More</button>
		  	</div>
		  </div>

		   <div class="row" style="padding-top: 10px">
		  	<div class="col">
		  		<input type="text" class="form-control" name="rec" placeholder="Received By">
		  	</div>
		  </div>
		  <div class="modal-footer">
        <button type="button" onclick="window.close()" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" onclick="">Add Drawing</button>
      </div>
		</form>
      </div>
      
    </div>
  </div>
</div>

<div style="padding-top: 5%">
<table class="table table-striped ">
  <thead>
    <tr>
    	<th scope="col">Invoice No.</th>
      <th scope="col">Date</th>
      <th scope="col">Gate Entry No.</th>
      <th scope="col">PO/PR</th>
      <th scope="col">Time In</th>
      <th scope="col">Time Out</th>
      <th scope="col">Vehicle No.</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Description</th>
      <th scope="col">Quantity</th>
      <th scope="col">Received By</th>
    </tr>
  </thead>
  <tbody id="import_table">
      </tbody>
</table>
</div>
<script type="text/javascript" src="project.js"></script>
<script type="text/javascript">importData("");</script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
