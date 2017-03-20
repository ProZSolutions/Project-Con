<?php $ctitle="ProZ Solutions"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $ctitle; ?> | <?php echo $title; ?> </title>
     <?php require("stylesheet.php"); 
	
	if( $_csheet == 0){
	?>
	<style>
	.ioc {
  display: inline-block;
  width: 25px;
  height: 25px;
}
</style>
</head>
<?php } ?>