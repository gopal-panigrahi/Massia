<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Add Customer</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<h5>Customer Details</h5>
<form action="customer_api.php" method="post">
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
			<td><input type="number" class="form-control" name="phone" placeholder="Phone" pattern="[0-9]+{10}" required></td>
		</tr>
		<tr>
			<td><label> Email </label></td>
			<td><input type="email" class="form-control" name="email" placeholder="Email" required></td>
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
