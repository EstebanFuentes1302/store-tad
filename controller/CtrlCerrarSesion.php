<?php  
session_start();
function logout()
{
  $_SESSION = array(); //destruir variables sesion
  session_destroy();
  header( 'Location: ../index.php' );
}

logout();
?>