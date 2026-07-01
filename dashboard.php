<?php
session_start();

if(!isset($_SESSION['id'])){
header("Location: login.php");
exit();
}

include("database/db.php");

$user_id=$_SESSION['id'];

$user=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM users WHERE id='$user_id'"));

$bots=mysqli_query($conn,"SELECT * FROM bots WHERE user_id='$user_id'");
?>

<!DOCTYPE html>
<html>
<head>

<title>Dashboard</title>

<link rel="stylesheet" href="css/style.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<div class="sidebar">

<h2>Bot Manager</h2>

<a href="dashboard.php"><i class="fa fa-home"></i> Dashboard</a>

<a href="create_bot.php"><i class="fa fa-plus"></i> Create Bot</a>

<a href="#"><i class="fa fa-robot"></i> Templates</a>

<a href="#"><i class="fa fa-key"></i> Licenses</a>

<a href="#"><i class="fa fa-user"></i> Profile</a>

<a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>

</div>

<div class="main">

<div class="topbar">

<h2>Welcome <?php echo $user['username']; ?></h2>

<a class="create" href="create_bot.php">
Create Bot
</a>

</div>

<div class="banner">

<h3>⚠ Verify Your Email</h3>

<p>Email verification unlocks all features.</p>

</div>

<div class="cards">

<?php

if(mysqli_num_rows($bots)==0){

?>

<div class="empty">

<h2>No Bots Found</h2>

<p>Create your first bot.</p>

<a class="btn" href="create_bot.php">

Create Bot

</a>

</div>

<?php

}else{

while($bot=mysqli_fetch_assoc($bots)){

?>

<div class="card">

<h2><?php echo $bot['bot_name']; ?></h2>

<p>Status :
<?php echo $bot['status']; ?>
</p>

<a class="delete"
href="delete_bot.php?id=<?php echo $bot['id']; ?>">
Delete
</a>

</div>

<?php

}

}

?>

</div>

</div>

</body>
</html>
