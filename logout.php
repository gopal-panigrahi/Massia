<?php

session_start();

if(isset($_SESSION["login"]))
{
  $_SESSION["login"]=0;
  if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
  }
}
?>
