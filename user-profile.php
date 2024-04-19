<?php 
include('config/constants.php') ?>
<link rel="stylesheet" href="css/style.css">

<?php

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
};

$message = [];

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}

?>

<div class="container">

<div class="user-profile">

   <?php
      $fetch_user = []; 

      $select_user = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_user) > 0){
         $fetch_user = mysqli_fetch_assoc($select_user);
      };
   ?>

   <p> Username : <span><?php echo isset($fetch_user['name']) ? $fetch_user['name'] : ''; ?></span> </p>
   <p> Email : <span><?php echo isset($fetch_user['email']) ? $fetch_user['email'] : ''; ?></span> </p>
   <div class="flex">
      <a href="login.php" class="btn">login</a>
      <a href="register.php" class="option-btn">register</a>
      <a href="index.php?logout=<?php echo $user_id; ?>" onclick="return confirm('are your sure you want to logout?');" class="delete-btn">logout</a>
   </div>

