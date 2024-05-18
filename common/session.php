<?php
  include_once('connection.php');
	session_start();
  function isLoggedIn(){

    if(!isset($_SESSION['login_user'])){
      //echo("not loged in");
    	//mysql_close($connection); // Closing Connection
    	//header('Location: login.php'); // Redirecting To Home Page
      return false;
  	}else{
  	  return true;
  	}
  }
  
  function getUserParameter($str){
    global $conn;
    return mysql_fetch_assoc(mysql_query("SELECT `$str` FROM customer WHERE customer_id=" . $_SESSION['id'], $conn))[$str];
  }
  
  function checkSession(){
    if(isLoggedIn()){
      return true;
  	}else{
        header("Location: login.php");
  	  return false;
  	}
  }
  
  
?>