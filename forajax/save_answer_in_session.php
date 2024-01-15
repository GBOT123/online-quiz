<?php 
session_start();
$id=$_GET["id"];
$value1=$_GET["value1"];
$_SESSION["answer"][$id]=$value1;
?>