<?php
    include 'connectDB.php';
    $sql = "SELECT * FROM rate_card;";
    $result = mysqli_query($conn,$sql);

    session_start();
    if(!(isset($_SESSION["login"]))){
      $_SESSION["login"]=0;
    }

    if($_SESSION['login']==0){
        $disable = "value='Login as Admin' disabled";
    }
    else{
        $disable = '';
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  	<title>Rate Card</title>
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
     <button class="btn px-4 mx-2 btn-primary" data-toggle="modal" data-target="#add" >ADD DRAWING</button>

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

  <h1 class="display-5 text-center" style="padding-top: 10%; font-size:70px;">RATE CARD</h1>

	<table class="table table-striped w-75 mx-auto text-center">
  <thead>
    <tr>
      <th scope="col">Drawing Number</th>
      <th scope="col">Price</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
      while($row = mysqli_fetch_assoc($result))
      {
    ?>
    <tr>
        <td><?php echo $row["drawing_no"]; ?></td>
        <td><?php echo $row["price"]; ?></td>
        <td><button class="btn btn-warning" onclick="document.getElementById('UpdateDrawingNo').value='<?php echo $row["drawing_no"]?>'" data-toggle="modal" data-target="#upd">UPDATE</button></td>
        <td style="padding-right: 70px;"><button class="btn btn-danger" data-toggle="modal" onclick="document.getElementById('DeleteDrawingNo').value='<?php echo $row["drawing_no"]?>'" data-target="#del">DELETE</button></td>
    </tr>
    <?php
      }
    ?>
  </tbody>
</table>
    </div>
    <center>
      <div class="justify-text-center">
        <table>
          <tr>
            <td style="padding-right: 70px"></td>

            <td></td>
          </div>
          </tr>
        </table>
      </div>
    </center>


<!-- Modal -->
<div class="modal fade" id="add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Drawing</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form method="POST" action="rate_api.php" >
      		<table>
      			<tr>
		      		<td><label>Drawing No.  </label></td>
		      		<td><input class="form-control" type="text" id="AddDrawingNo" name="DrawingNo" placeholder="Drawing No." title="xxx-x-xxx [Only Numbers]" pattern = "[0-9]{3}-[0-9]-[0-9]{3}" required></td>
		      	</tr>
		      	<tr>
		      		<td><label>Price</label></td>
      				<td><input class="form-control" type="text" id="AddPrice" name="Price" placeholder="Price" title=" Only Numbers " pattern = "[0-9]{1,10}" required></td>
		      	</tr>
          </table>
          <br/>
          <div class="modal-footer">
            <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
            <input type="submit" class="btn btn-primary"  <?php echo $disable; ?>  value="Add Drawing">
          </div>
      	</form>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="del">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form method="POST" action="rate_api.php">
          <input type="hidden" name="_method" value="delete">
      		<table>
      			<tr>
      				<td><label>Drawing No.</label></td>
      				<td><input type="text" class="form-control" id="DeleteDrawingNo" name="DrawingNo" placeholder="Drawing No." title="xxx-x-xxx [Only Numbers]" pattern = "[0-9]{3}-[0-9]-[0-9]{3}" readonly required ></td>
      			</tr>
          </table>
          <br/>
          <div class="modal-footer">
            <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
            <input type="submit" class="btn btn-danger"  <?php echo $disable; ?>  value="Delete">
          </div>
      	</form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="upd">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="rate_api.php">
          <input type="hidden" name="_method" value="put">
      		<table>
      			<tr>
		      		<td><label>Drawing No.  </label></td>
		      		<td><input type="text" class="form-control" id="UpdateDrawingNo" name="DrawingNo" placeholder="Drawing No." title="xxx-x-xxx [Only Numbers]" pattern = "[0-9]{3}-[0-9]-[0-9]{3}" readonly required></td>
		      	</tr>
		      	<tr>
		      		<td><label>Price</label></td>
      				<td><input type="text" class="form-control" id="UpdatePrice" name="Price" title="Numbers Only" placeholder="Price" pattern = "[0-9]{1,10}" required></td>
		      	</tr>
          </table>
          <br/>
          <div class="modal-footer">
            <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
            <input type="submit" class="btn btn-warning"  <?php echo $disable; ?>  value="Update">
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

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

  </body>
</html>
