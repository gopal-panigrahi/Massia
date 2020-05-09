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
        include 'connectDB.php';

        $sql = "SELECT customer_name,company_name,PID,order_details.CID,drawing_no,qty,deadline,DATEDIFF(deadline, CURDATE()) as remainingdays FROM order_details,customer where order_details.CID = customer.CID and customer_name LIKE \"".@$_GET['customer']."%\";";
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
        //if($_SESSION["login"]==1)
        //{
            include 'connectDB.php';

            $sql = "INSERT INTO order_details VALUES (null,'".$_POST["CID"]."','".$_POST["drawing_no"]."','".$_POST["qty"]."',CURDATE(),'".$_POST["deadline"]."',FALSE)";
            if(mysqli_query($conn,$sql)){
              echo "Ok";
            }
            mysqli_close($conn);
            header("Location: order.php");
        //}
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
