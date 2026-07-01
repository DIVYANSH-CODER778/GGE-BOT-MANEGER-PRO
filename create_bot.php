<?php
session_start();

include("database/db.php");

if(!isset($_SESSION['id'])){
header("Location:login.php");
}

if(isset($_POST['create'])){

$name=$_POST['name'];

$token=$_POST['token'];

$id=$_SESSION['id'];

mysqli_query($conn,"INSERT INTO bots(user_id,bot_name,bot_token)
VALUES('$id','$name','$token')");

header("Location:dashboard.php");

}
?>

<!DOCTYPE html>
<html>

<head>

<title>Create Bot</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="box">

<h2>Create Bot</h2>

<form method="POST">

<input
type="text"
name="name"
placeholder="Bot Name"
required>

<input
type="text"
name="token"
placeholder="Bot Token"
required>

<button
name="create">
Create Bot
</button>

</form>

</div>

</body>

</html>
