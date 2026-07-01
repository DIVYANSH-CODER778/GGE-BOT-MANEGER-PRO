<?php

session_start();

include("database/db.php");

$id=$_GET['id'];

mysqli_query($conn,"DELETE FROM bots WHERE id='$id'");

header("Location:dashboard.php");

?>
