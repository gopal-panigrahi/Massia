<?php

session_start();

if(isset($_SESSION["login"]))

{
session_destroy();
echo "<script>location.href='login.html'</script>";

}

?>
