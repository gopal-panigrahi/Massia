<?php
    session_start();
    if(isset($_SESSION["login"]))
    {
    $request_method = $_SERVER['REQUEST_METHOD'];
    switch($request_method)
    {
        case "GET":
            getData();
            break;
        case "POST":
            postData();
            break;
        default:
            echo "Invalid Request";
    }
    }

    function getData()
    {
        include 'connectDB.php';

        $sql = "SELECT * FROM customer WHERE customer_name LIKE \"".$_GET['name']."%\";";
        $result = mysqli_query($conn,$sql);
        $response = array();
        // Push data of each row into response
        while($row = mysqli_fetch_assoc($result)) {
            array_push($response,$row);
        }

        //Converts php array into JSON file
        echo json_encode($response);
        mysqli_close($conn);
    }
    function postData()
    {

      if(@$_POST["_method"]=="put")
      {
          putData();
          return;
      }
      else if(@$_POST["_method"]=="delete")
      {
          deleteData();
          return;
      }
      else
      {
	if($_SESSION["login"]==1)	
	{
        include 'connectDB.php';

        $sql = "INSERT INTO customer VALUES (null,'".$_POST["customer_name"]."','".$_POST["company_name"]."','".$_POST["address"]."','".$_POST["phone"]."','".$_POST["email"]."')";
        if(mysqli_query($conn,$sql))
        {
          echo "fine";
          header("Location: customer.php");
        }
        mysqli_close($conn);
}
	else
	echo "Permission Denied";      
}
    }
    function putData()
    {
	if($_SESSION["login"]==1)	
	{
      include 'connectDB.php';

      $sql = "UPDATE customer SET customer_name='".$_POST["customer_name"]."',company_name='".$_POST["company_name"]."',address='".$_POST["address"]."',phone='".$_POST["phone"]."',email='".$_POST["email"]."' WHERE CID='".$_POST["cid"]."';";
      if(mysqli_query($conn,$sql))
      {
        echo "fine";
        header("Location: customer.php");
      }
      mysqli_close($conn);
	}
	else
	echo "Permission Denied";
    }

    function deleteData()
    {
if($_SESSION["login"]==1)	
	{
      include 'connectDB.php';

      $sql = "DELETE FROM customer WHERE CID=".$_POST["cid"].";";
      if(mysqli_query($conn,$sql))
      {
        echo "fine";
        header("Location: customer.php");
      }
      mysqli_close($conn);
    }
else
echo "Permission Denied";
}
?>
