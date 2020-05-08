<?php
    session_start();
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

    function getData()
    {

		    include 'connectDB.php';
        $sql = "SELECT * FROM rate_card"; // WHERE customer_name LIKE \"".$_GET['name']."%\";";
        $result = mysqli_query($conn,$sql);
        $response = array();
        if (mysqli_num_rows($result) > 0) {
            // Push data of each row into response
            while($row = mysqli_fetch_assoc($result)) {
                array_push($response,$row);
            }

            //Converts php array into JSON file
            echo json_encode($response);
        }
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
                  $sql = "INSERT INTO rate_card VALUES ('".$_POST["DrawingNo"]."',".$_POST["Price"].");";
                  $result = mysqli_query($conn,$sql);
                  mysqli_close($conn);
            }
            header("Location: rate_card.php");
        }
    }


function putData()
{
    	if($_SESSION["login"]==1){
            include 'connectDB.php';
            $sql = "UPDATE rate_card SET price = '".$_POST["Price"]."' WHERE drawing_no = '".$_POST["DrawingNo"]."';";
            $result = mysqli_query($conn,$sql);
            mysqli_close($conn);
      }
      header("Location: rate_card.php");
}
function deleteData()
{
  if($_SESSION["login"]==1)
  {
      include 'connectDB.php';
      $sql = "DELETE FROM rate_card WHERE drawing_no='".$_POST["DrawingNo"]."';";
      $result = mysqli_query($conn,$sql);
      mysqli_close($conn);
    }
    header("Location: rate_card.php");
}
?>
