<?php
    $request_method = $_SERVER['REQUEST_METHOD'];
    switch($request_method)
    {
        case "GET":
            getData();
            break;
        case "POST":
            postData();
            break;
        case "DELETE":
            deleteData();
            break;
        case "PUT":
            putData();
            break;
        default:
            echo "Invalid Request";
    }

    function getData()
    {
        $conn = mysqli_connect("localhost","root","","sayali_industries");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
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
      include 'connectDB.php';

      $sql = "INSERT INTO order_details VALUES (null,'".$_POST["CID"]."','".$_POST["drawing_no"]."','".$_POST["qty"]."',CURDATE(),'".$_POST["deadline"]."')";
      if(mysqli_query($conn,$sql))
      {
        echo "fine";
        header("Location: index.php");
      }
      else{
        echo "error";
      }
      mysqli_close($conn);
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
