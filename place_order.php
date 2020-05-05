<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Place Order</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<h5>Order Details</h5>
<form action="order_api.php" method="post">
	<table>
    <tr>
			<td><label> Customer Name</label></td>
			<td><input type="text" class="form-control" placeholder="Name"></td>
		</tr>
		<tr>
			<td><label >Drawing Number </label></td>
			<td><input type="text" class="form-control" placeholder="Order Name here.."></td>
		</tr>
		<tr>
			<td><label>Quantity</label></td>
			<td><input type="number" class="form-control" placeholder="Quantity"></td>
		</tr>
		<tr>
			<td><label>Deadline </label></td>
			<td><input type="date" class="form-control" placeholder="Date"></td>
		</tr>
		<tr>
			<td><input type="submit" value="Submit" class="btn"></td>
		</tr>
	</table>
</form>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
