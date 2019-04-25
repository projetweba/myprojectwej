<?php
session_start(); 
if(session_destroy()){ // Destroying All Sessions 
  header("Location: login-register.php"); // Redirecting To Home Page 
}
?>