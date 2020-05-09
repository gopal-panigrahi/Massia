<?php
				include 'connectDB.php';
        $sql = "SELECT * FROM inventory";
        $result = mysqli_query($conn,$sql);
				session_start();
				if(!(isset($_SESSION["login"]))){
		      $_SESSION["login"]=0;
		    }

				if($_SESSION["login"]==1){
					$admin_only = "";
				}
				else{
					$admin_only = "value = 'Login as Admin' disabled";
				}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Inventory</title>
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
     <button class="btn px-4 mx-2 btn-primary" data-toggle="modal" data-target="#add" >ADD MATERIAL</button>

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

	<h1 class="display-5 text-center" style="padding-top: 10%; font-size:70px;">INVENTORY</h1>
<div class="table-wrapper-scroll-y my-custom-scrollbar" style="padding-top: 50px">
<table class="table table-striped w-75 mx-auto" id="dtDynamicVerticalSc">
  <thead>
    <tr>
      <th class="th-sm text-center" scope="col">Material Id.</th>
      <th class="th-sm text-center" scope="col">Material</th>
      <th class="th-sm text-center" scope="col">Quantity</th>
    </tr>
  </thead>
  <tbody>
   		<?php
   			while($row = mysqli_fetch_assoc($result)) {
					$disabled="";
					if($row["qty"]==0){
						$disabled = "disabled";
					}
   		?>
   			<tr>
      			<td class="text-center"><?php echo $row["material_id"]; ?></td>
      			<td class="text-center"><?php echo $row["material"]; ?></td>
      			<td class="text-center">
							<div class="input-group">
									<span type="text" class="form-control"><?php echo $row["qty"]?></span>
								<div class="input-group-append">
									<input class="btn btn-outline-danger" onclick="location.href='decrement_inventory.php?id=<?php echo $row["material_id"];?>'" type="button" <?php echo $disabled?> value="-">
									<input class="btn btn-outline-success" onclick="location.href='increment_inventory.php?id=<?php echo $row["material_id"];?>'" type="button" value="+">
								</div>
							</div>
					</td>
    		</tr>
   		<?php
   			}
   		?>
  </tbody>
</table>
</div>

<div class="modal fade" id="add">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Material</h5>
				<button type="button" class="close" data-dismiss="modal">
					<span>&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="inventory_api.php" >
					<table>
							<tr>
								<td>Material</td>
								<td> <input class="form-control" type="text" name="material_name" required> </td>
							</tr>
								<td>Quantity</td>
								<td><input class="form-control" type="number" min=1 name="quantity" required></td>
							<tr>

							</tr>
					</table>
					<br/>
					<div class="modal-footer">
						<input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
						<input type="submit" class="btn btn-primary" <?php echo $admin_only?> value="Add">
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

<?php
	mysqli_close($conn);
?>
