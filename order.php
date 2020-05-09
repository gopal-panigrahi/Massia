<?php
	session_start();
	if(!(isset($_SESSION["login"]))){
		$_SESSION["login"]=0;
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Order</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
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
     <button class="btn px-4 mx-2 btn-primary" data-toggle="modal" data-target="#history_modal" >HISTORY</button>
   </div>
	<h1 class="display-5 text-center" style="padding-top: 10%; font-size:70px;">ORDER DETAILS</h1>

  <div class="input-group w-75 mx-auto my-5">
    <div class="input-group-prepend">
      <span class="input-group-text p-3">SEARCH</span>
    </div>
    <input type="text" class="form-control" onkeyup="orderdata(this.value)"/>
  </div>

<div class="table-wrapper-scroll-y my-custom-scrollbar" style="padding-top: 50px">
<table class="table table-striped w-75 mx-auto text-center">
  <thead>
    <tr>
      <th class="th-sm" scope="col">Customer Name</th>
			<th class="th-sm" scope="col">Company Name</th>
      <th class="th-sm" scope="col">CID</th>
      <th class="th-sm" scope="col">Drawing No.</th>
      <th class="th-sm" scope="col">Quantity</th>
      <th class="th-sm" scope="col">Remaining Days</th>
    </tr>
  </thead>
  <tbody id="order_table">
  </tbody>
</table>
</div>


  <div class="modal fade" id="history_modal">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">History</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table table-striped w-75 mx-auto text-center">
							<thead>
						    <tr>
						      <th class="th-md" scope="col">Customer Name</th>
									<th class="th-md" scope="col">Company Name</th>
						      <th class="th-md" scope="col">Drawing No.</th>
						      <th class="th-md" scope="col">Quantity</th>
						    </tr>
						  </thead>
						  <tbody id="history">
						  </tbody>

            </table>
            <div class="modal-footer">
              <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
            </div>
        </div>
      </div>
    </div>
  </div>

<script type="text/javascript" src="project.js"></script>
<script type="text/javascript" >orderdata("")</script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
