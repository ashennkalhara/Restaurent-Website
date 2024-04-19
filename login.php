<?php 
include('config/constants.php') ?>
<link rel="stylesheet" href="css/style.css">

<?php 

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:'.SITEURL.'index.php');
   }
   else
   {
      $message[] = 'incorrect password or email!';
   }

}

?>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Login now</h3>
      <input type="email" name="email" required placeholder="Enter your email" class="box">
      <input type="password" name="password" required placeholder="Enter your password" class="box">
      <input type="submit" name="submit" class="btn" value="login now">
      <p>Don't have an account? <a href="register.php">Register now</a></p>
   </form>

</div>

<?php include('partials-front/footer.php'); ?>