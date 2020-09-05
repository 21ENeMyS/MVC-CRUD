<?php 

session_start();
function isLogin()
{
  if (isset($_SESSION['id'])) {
    return true;
  }else {
    return false;
  }
}
?>