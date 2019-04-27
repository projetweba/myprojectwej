<?php
session_start();
if(isset($_SESSION['login_user']) and $_SESSION['login_user']=="wejdene"){
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Animation Text</title>
    <link rel="stylesheet" href="style.css">
    <embed src="welcome.wav" autostart="true" loop="false" width="2" height="0"> </embed>
  </head>
  <body>

<div class="container">
  <span class="text1">Welcome in</span>
  <span class="text2">Zanimo</span>
</div>


  <div>
<li><a   href="shop-page.php">--></a></li>
</div>

  </body>

</html>
<?php
}
else{
    header("location: login-register.php"); 
}
?>
