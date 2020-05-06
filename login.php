<?php



session_start();

if(isset($_SESSION["login"]))
{
	
	
	echo '<a href="logout.php"><input type="submit" name="submit" value="logout"></a>';
}
else
{
	$uname = $_POST["uname"];
	$pwd = $_POST["pwd"];
	
	if($uname=='admin' && $pwd=='1234')
	{	$_SESSION["login"]=1;
	echo"welcome";
	echo "<script>location.href='customer.php'</script>";
	//echo '<a href="logout.php"><input type="submit" name="submit" value="logout"></a>';
	}
	if($uname=='local' && $pwd=="local")
	{	$_SESSION["login"]=2;
		echo "<script>location.href='customer.php'</script>";
	
	
	}

}

?>
