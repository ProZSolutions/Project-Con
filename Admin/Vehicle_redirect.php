<?php
session_start();
ob_start();
$data=$_GET['value1'];
$_SESSION["favvehicle"] = $data;

header("location:vehicle_profile");	




?>