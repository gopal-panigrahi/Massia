<?php
  session_start();
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>

    <title>Customer</title>
    <style>
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
     <button class="btn px-4 mx-2 btn-primary" data-toggle="modal" data-target="#add_customer" >ADD CUSTOMER</button>

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
  <h1 class="display-5 text-center" style="padding-top: 10%; font-size:70px;">CUSTOMER DETAILS</h1>
  <div class="input-group w-75 mx-auto my-5">
    <div class="input-group-prepend">
      <span class="input-group-text p-3">SEARCH</span>
    </div>
    <input type="text" class="form-control" onkeyup="customerData(this.value)"/>
  </div>
  <table class="table table-striped w-75 mx-auto text-center">
    <thead>
      <tr>
        <th>Company</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Place Order</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody id = "cust-details">
    </tbody>
  </table>

  <div class="modal fade" id="ord">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Place Order</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
        	<form method="POST" action="order_api.php" >
            <table>
              <tr>
                <td><label >Customer ID </label></td>
          			<td><input type="text" class="form-control" name="CID" id="Order_CID" value="" readonly required></td>
              </tr>
          		<tr>
          			<td><label >Drawing Number </label></td>
          			<td><select class="form-control" name="drawing_no" id="Order_drawing_no">
                        <?php
                            include 'connectDB.php';

                            $sql = "SELECT * FROM rate_card;";
                            $result = mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_assoc($result))
                            {
                              echo "<option>".$row["drawing_no"]."</option>";
                            }
                            mysqli_close($conn);
                         ?>
                    </select>
                </td>
          		</tr>
          		<tr>
          			<td><label>Quantity</label></td>
          			<td><input type="number" class="form-control" name="qty" id="Order_quantity" min="1" placeholder="Quantity"></td>
          		</tr>
          		<tr>
          			<td><label>Deadline </label></td>
          			<td><input type="date" class="form-control" name="deadline" id="Order_deadline" placeholder="Date"></td>
          		</tr>

          	</table>
            <br/>
            <div class="modal-footer">
              <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
              <input type="submit" class="btn btn-info" <?php echo $disable; ?> value="Place Order" >
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

  <div class="modal fade" id="add_customer">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Customer</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="customer_api.php">
            <table>
          		<tr>
          			<td><label > Company Name </label></td>
          			<td><input type="text" class="form-control" name="company_name" placeholder="Company Name" required></td>
          		</tr>
          		<tr>
                <td><label> Customer Name </label></td>
          			<td><input type="text" class="form-control" name="customer_name" placeholder="Customer Name" required></td>
          		</tr>
          		<tr>
          			<td><label> Address </label></td>
          			<td><textarea class="form-control" name="address" placeholder="Company Address" rows="5" cols="10" required></textarea></td>
          		</tr>
          		<tr>
          			<td><label> Phone </label></td>
          			<td><input type="text" class="form-control" name="phone" placeholder="Phone" pattern="[0-9]+{10}" required></td>
          		</tr>
          		<tr>
          			<td><label> Email </label></td>
          			<td><input type="email" class="form-control" name="email" placeholder="Email" required></td>
          		</tr>
          	</table>
            <br/>
            <div class="modal-footer">
              <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
              <input type="submit" class="btn btn-primary" <?php echo $disable; ?> value="Add" >
            </div>
        	</form>
        </div>
      </div>
    </div>
  </div>

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
          <form method="POST" action="customer_api.php">
            <input type="hidden" name="_method" value="put">
            <input type="hidden" name="cid" id="Update_cid" value="">
            <table>
          		<tr>
          			<td><label > Company Name </label></td>
          			<td><input type="text" class="form-control" name="company_name" id="Update_company_name" placeholder="Company Name" required></td>
          		</tr>
          		<tr>
                <td><label> Customer Name </label></td>
          			<td><input type="text" class="form-control" name="customer_name" id="Update_customer_name" placeholder="Customer Name" required></td>
          		</tr>
          		<tr>
          			<td><label> Address </label></td>
          			<td><textarea class="form-control" name="address" id="Update_address" placeholder="Company Address" rows="5" cols="10" required></textarea></td>
          		</tr>
          		<tr>
          			<td><label> Phone </label></td>
          			<td><input type="number" class="form-control" name="phone" id="Update_phone" placeholder="Phone" pattern="[0-9]+{10}" required></td>
          		</tr>
          		<tr>
          			<td><label> Email </label></td>
          			<td><input type="email" class="form-control" name="email" id="Update_email" placeholder="Email" required></td>
          		</tr>
          	</table>
            <br/>
            <div class="modal-footer">
              <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
              <input type="submit" class="btn btn-warning" <?php echo $disable; ?> value="Update">
            </div>
        	</form>
        </div>
      </div>
    </div>
  </div>

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
        	<form method="POST" action="customer_api.php">
            <input type="hidden" name="_method" value="delete">
        		<input type="hidden" name="cid" id="Delete_cid" value="">
            <h5 class="text-center">Do you want to delete this ??  </h5>
            <br/>
            <div class="modal-footer">
              <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
              <input type="submit" class="btn btn-danger" <?php echo $disable; ?> value="Delete">
            </div>
        	</form>
        </div>
      </div>
    </div>
  </div>


<script type="text/javascript" src="project.js"></script>
<script type="text/javascript">
customerData("");
function fillupdate(cid){
  const customerData = JSON.parse(localStorage.getItem('customerData'));
  customerData.forEach((row) => {
    if(row.CID == cid){
      document.getElementById('Update_cid').value=row.CID;
      document.getElementById('Update_company_name').value=row.company_name;
      document.getElementById('Update_customer_name').value=row.customer_name;
      document.getElementById('Update_address').value=row.address;
      document.getElementById('Update_phone').value=row.phone;
      document.getElementById('Update_email').value=row.email;
    }
  });
}
</script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
