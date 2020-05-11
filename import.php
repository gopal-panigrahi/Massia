<?php
		session_start();
		if(!(isset($_SESSION["login"]))){
			$_SESSION["login"]=0;
		}
		if($_SESSION["login"]==0){
			$disabled = "value='Log in as Admin' disabled";
		}
		else{
			$disabled = "";
		}
 ?>

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

	 <div class="d-flex flex-row-reverse bd-highlight pt-4">
     <button class="btn px-4 mx-2 btn-primary" data-toggle="modal" data-target="#add">ADD IMPORT</button>

     <?php
           if($_SESSION["login"]==0){
     ?>
           <button class="btn px-4" style="background-color: #00e600;" data-toggle="modal" data-target="#admin_login" >ADMIN LOG IN</button>
     <?php
           }
           else{
     ?>
             <button class="btn px-4" style="background-color: #00e600;" onclick="location.href='logout.php'">LOGOUT</button>
     <?php
           }
     ?>
   </div>

	<h1 class="display-5 text-center" style="padding-top: 10%; font-size:70px;">IMPORT DETAILS</h1>

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
		      <input type="text" class="form-control" pattern="*[0-9]" name="gate" placeholder="Gate Entry No." required>
		    </div>
		    <div class="col">
		      <input type="Date" class="form-control" name="date" placeholder="Date" required>
		    </div>
		  </div>
		  <div class="row" style="padding-top: 10px">
		  	<div class="col">
		  		<input type="text" class="form-control" name="po" placeholder="PO/PR" required>
		  	</div>
		  </div>

		  <div class="row" style="padding-top: 10px">
		  	<div class="col">
		  		<input type="Time" class="form-control" name="in" placeholder="Time In" required>
		  	</div>
		  	<div class="col">
		  		<input type="Time" class="form-control" name="out" placeholder="Time Out" required>
		  	</div>
		  </div>

		   <div class="row" style="padding-top: 10px">
		  	<div class="col">
		  		<input type="text" class="form-control" name="veh" placeholder="Vehicle Number" required>
		  	</div>
		  	<div class="col">

		  	</div>
		  </div>

		   <div class="row" style="padding-top: 10px">
		  	<div class="col">
		  		<input type="text" class="form-control" name="nm" placeholder="Name" required>
		  	</div>
		  </div>

		   <div class="row" style="padding-top: 10px">
		  	<div class="col">
		  		<input type="text" class="form-control" name="add" placeholder="Address" required>
		  	</div>
		  </div>

		   <div class="row" style="padding-top: 10px">
		  	<div class="col">
		  		<input type="text" class="form-control" name="des" placeholder="Description" required>
		  	</div>
		  	<div class="col">
		  		<input type="Number" class="form-control" name="qnt" placeholder="Qnty." required>
		  	</div>
		  </div>

		   <div class="row" style="padding-top: 10px">
		  	<div class="col">
		  		<input type="text" class="form-control" name="rec" placeholder="Received By" required>
		  	</div>
		  </div>
		  <div class="modal-footer">
				<input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
				<input type="submit" class="btn btn-primary" <?php echo $disabled; ?> value="Add Import">
      </div>
		</form>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="admin_login">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Log In</h5>
				<button type="button" class="close" data-dismiss="modal">
					<span>&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="login.php" >
					<table>
							<tr><label> Enter Admin Password</label></tr>
							<tr> <input class="form-control" type="password" name="pwd" value="" placeholder="Password" required></tr>
					</table>
					<br/>
					<div class="modal-footer">
						<input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
						<input type="submit" class="btn btn-success" value="Login">
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
<script type="text/javascript">importData();</script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
