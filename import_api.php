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
        $conn = mysqli_connect("localhost","root","","sayali_industries");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM import WHERE name LIKE \"".$_GET['name']."%\";";
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
      if($_SESSION["login"]==1)
      {
            if($_POST)
            {
                $date=$_POST["date"];
                $gat=$_POST["gate"];
                $po=$_POST["po"];
                $in=$_POST["in"];
                $out=$_POST["out"];
                $veh=$_POST["veh"];
                $name=$_POST["nm"];
                $add=$_POST["add"];
                $des=$_POST["des"];
                $qn=$_POST["qnt"];
                $res=$_POST["rec"];

                $gate=(int)$gat;
                $qnt=(int)$qn;

                $que="insert into import(date,gate_no,po_pr,time_in,time_out,vehicle_no,name,address,description,quantity,received_by) values('".$date."',".$gate.",'".$po."','".$in."','".$out."','".$veh."','".$name."','".$add."','".$des."',".$qnt.",'".$res."');";

                include 'connectDB.php';

                $variable=mysqli_query($conn,$que);
                mysqli_close($conn);
            }
      }
      header("Location: import.html");
	}
    function putData()
    {
        echo "hii";
    }
    function deleteData()
    {
        echo "deleted";
    }

?>
