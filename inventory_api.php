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
        if(isset($_POST))
        {
            if($_SESSION["login"]==1)
            {
                  include 'connectDB.php';
                  $sql = "INSERT INTO inventory VALUES (null,'".$_POST["material_name"]."',".$_POST["quantity"].");";
                  $result = mysqli_query($conn,$sql);
                  mysqli_close($conn);
            }
            header("Location: inventory.php");
        }
    }


function putData()
{
  echo "pass";
}
function deleteData()
{
  echo "pass";
}
?>
