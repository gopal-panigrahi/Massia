<?php
    include 'connectDB.php';

    session_start();

    $sql = "SELECT * FROM stage;";
    $result = mysqli_query($conn,$sql);

    if(!(isset($_SESSION["login"]))){
      $_SESSION["login"]=0;
    }
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>

	<style>
	.myfont{
      font-size: 13px;
      color: white;
      background-color: #0d0d0d;
    }

		html {
	-webkit-font-smoothing: antialiased!important;
	-moz-osx-font-smoothing: grayscale!important;
	-ms-font-smoothing: antialiased!important;
}

.md-stepper-horizontal {
	display:table;
	width:100%;
	margin:0 auto;
	background-color:#FFFFFF;
	box-shadow: 0 3px 8px -6px rgba(0,0,0,.50);
}
.md-stepper-horizontal .md-step {
	display:table-cell;
	position:relative;
	padding:24px;
}
.md-stepper-horizontal .md-step:hover,
.md-stepper-horizontal .md-step:active {
	background-color:rgba(0,0,0,0.04);
}
.md-stepper-horizontal .md-step:active {
	border-radius: 15% / 75%;
}
.md-stepper-horizontal .md-step:first-child:active {
	border-top-left-radius: 0;
	border-bottom-left-radius: 0;
}
.md-stepper-horizontal .md-step:last-child:active {
	border-top-right-radius: 0;
	border-bottom-right-radius: 0;
}
.md-stepper-horizontal .md-step:hover .md-step-circle {
	background-color:#757575;
}
.md-stepper-horizontal .md-step:first-child .md-step-bar-left,
.md-stepper-horizontal .md-step:last-child .md-step-bar-right {
	display:none;
}
.md-stepper-horizontal .md-step .md-step-circle {
	width:30px;
	height:30px;
	margin:0 auto;
	background-color:#999999;
	border-radius: 50%;
	text-align: center;
	line-height:30px;
	font-size: 16px;
	font-weight: 600;
	color:#FFFFFF;
}
.md-stepper-horizontal.green .md-step.active .md-step-circle {
	background-color:#00AE4D;
}
.md-stepper-horizontal.orange .md-step.active .md-step-circle {
	background-color:#F96302;
}
.md-stepper-horizontal .md-step.active .md-step-circle {
	background-color: rgb(33,150,243);
}
.md-stepper-horizontal .md-step.done .md-step-circle:before {
	font-family:'FontAwesome';
	font-weight:100;
	content: "\f00c";
}
.md-stepper-horizontal .md-step.done .md-step-circle *,
.md-stepper-horizontal .md-step.editable .md-step-circle * {
	display:none;
}
.md-stepper-horizontal .md-step.editable .md-step-circle {
	-moz-transform: scaleX(-1);
	-o-transform: scaleX(-1);
	-webkit-transform: scaleX(-1);
	transform: scaleX(-1);
}
.md-stepper-horizontal .md-step.editable .md-step-circle:before {
	font-family:'FontAwesome';
	font-weight:100;
	content: "\f040";
}
.md-stepper-horizontal .md-step .md-step-title {
	margin-top:16px;
	font-size:16px;
	font-weight:600;
}
.md-stepper-horizontal .md-step .md-step-title,
.md-stepper-horizontal .md-step .md-step-optional {
	text-align: center;
	color:rgba(0,0,0,.26);
}
.md-stepper-horizontal .md-step.active .md-step-title {
	font-weight: 600;
	color:rgba(0,0,0,.87);
}
.md-stepper-horizontal .md-step.active.done .md-step-title,
.md-stepper-horizontal .md-step.active.editable .md-step-title {
	font-weight:600;
}
.md-stepper-horizontal .md-step .md-step-optional {
	font-size:12px;
}
.md-stepper-horizontal .md-step.active .md-step-optional {
	color:rgba(0,0,0,.54);
}
.md-stepper-horizontal .md-step .md-step-bar-left,
.md-stepper-horizontal .md-step .md-step-bar-right {
	position:absolute;
	top:36px;
	height:1px;
	border-top:1px solid #DDDDDD;
}
.md-stepper-horizontal .md-step .md-step-bar-right {
	right:0;
	left:50%;
	margin-left:20px;
}
.md-stepper-horizontal .md-step .md-step-bar-left {
	left:0;
	right:50%;
	margin-right:20px;
}

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
    <button class="btn px-4 mx-2 btn-primary" onclick="location.href='customer.php'">PLACE ORDER</button>

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

  <h1 class="display-5 text-center" style="padding-top: 5%; font-size:70px;">CURRENT PRODUCTS</h1>

      <?php
          while($row = mysqli_fetch_assoc($result)) {
            $onclickaction = "";
            if(isset($_SESSION["login"]))
            {
                if($_SESSION["login"]==1){
                  $onclickaction = 'onclick="changestate('.$row["PID"].',this.id)"';
                }
            }
      ?>
            <div class="md-stepper-horizontal orange" style="padding-top: 50px">

            <div style="text-align: center"><button class="btn btn-link" onclick="fillinfo(this.id)" id=<?php echo $row["PID"]; ?> data-toggle="modal" data-target="#product_info" >Product <?php echo $row["PID"]; ?> </button></div>


                  <?php
                  	$stage = array("Fabrication","Rubberising","Grinding","Balancing","Packing");
                    $i=0;
                    for($i=1;$i<=$row["current_stage"];$i++)
                    {
                        echo '<div class="md-step active p'.$row["PID"].'" id="p'.$row["PID"].'s'.$i.'" '.$onclickaction.'>
                              <div class="md-step-circle"><span>'.$i.'</span></div>
                              <div class="md-step-title">'.$stage[$i-1].'</div>
                              <div class="md-step-bar-left"></div>
                              <div class="md-step-bar-right"></div>
                              </div>';
                    }
                    for($i;$i<=5;$i++)
                    {
                   		echo '<div class="md-step p'.$row["PID"].'" id="p'.$row["PID"].'s'.$i.'" '.$onclickaction.'>
                              <div class="md-step-circle"><span>'.$i.'</span></div>
                              <div class="md-step-title">'.$stage[$i-1].'</div>
                              <div class="md-step-bar-left"></div>
                              <div class="md-step-bar-right"></div>
                              </div>';
                   	}
                  ?>
            </div>
      <?php } ?>
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

    <div class="modal fade" id="product_info">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">PRODUCT</h5>
            <button type="button" class="close" data-dismiss="modal">
              <span>&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <table class="table w-75 mx-auto text-center" id="product_info_table">
              </table>
              <br/>
              <div class="modal-footer">
                <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
              </div>
          </div>
        </div>
      </div>
    </div>

<script type="text/javascript" src="project.js"></script>
<script type="text/javascript" >
  display_product_details("")
  function fillinfo(id) {
    products = localStorage.getItem('product_details');
    products = JSON.parse(products);
    products.forEach((product) => {
      if(product.PID == id){
          let content =
              `<tr>
                  <td>Customer Name</td>
                  <td>${product.customer_name}</td>
              <tr>
              <tr>
                  <td>Company Name</td>
                  <td>${product.company_name}</td>
              <tr>
              <tr>
                  <td>Drawing Number</td>
                  <td>${product.drawing_no}</td>
              <tr>
              <tr>
                  <td>Quantity</td>
                  <td>${product.qty}</td>
              <tr>
              <tr>
                  <td>Deadline</td>
                  <td>${product.deadline}</td>
              <tr>
              <tr>
                  <td>Days Remaining</td>
                  <td>${product.remainingdays}</td>
              <tr>
              `;
          document.getElementById('product_info_table').innerHTML = content;
      }
    });
  }

</script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
    mysqli_close($conn);
?>
