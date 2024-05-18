<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css/login.css">
    <?php include 'common/header.php';?>
    <title>Login</title>
  </head>
    
    <body>
    <?php include 'common/body.php';?>
    <div class="row">
        <!-- action is done even if the passwort is wrong or the user dose NOT exist -->
     <form class="col s12" action="login.php" method="post" id='login_form'>
       
         <div class="input-field col s12">
            <input name="login" id="user_name" type="text" class="validate">
            <label for="user_name">Username</label>
         </div>
         
         <div class="input-field col s12">
           <input name="password" id="password" type="password" class="validate">
           <label for="password">Password</label>
         </div>
           <div class="row">
               <div class="col s6" align="center">
               <button class="btn waves-effect waves-light" type="submit" id='btn'>Submit
                  <i class="material-icons right">send</i>
               </button>
               </div>
               <div class="col s6" align="center">
               <div id='btn'>
                  <a class="btn waves-effect waves-light" href="/register.php" class="btn btn-default">Register</a>
               </div>
               </div>
            </div>
     </form>
   </div>
  </body>
</html>

<?php
   include_once('common/connection.php');
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form
      //$myusername = mysqli_real_escape_string($db,$_POST['username']);
      //mysqli_real_escape_string() expects parameter 1 to be mysqli, null given in /home/ubuntu/workspace/login.php on line 41
      if (!isset($_POST['login']) || !isset($_POST['password'])) {
          return;
      }
      
      $myusername = $_POST['login'];
      //$mypassword = mysqli_real_escape_string($db,$_POST['password']);
      $mypassword = $_POST['password'];
      $country_id = mysql_fetch_assoc(mysql_query("SELECT country_id FROM customer WHERE login='".$myusername."'", $conn))['country_id'];
      
      $sql = "SELECT customer_id FROM customer WHERE login = '$myusername' and password = '$mypassword'";  
      $result = mysql_query($sql, $conn);
      if($result){
      }else{
          //echo ("<br>result failt <br>");
      }
      $row = mysql_fetch_array($result);
      if($row){
      }else{
          //echo("<br>mysql_fetch_array(€result) failt<br>");
      }
      $id = $row['customer_id'];
      
      $count = mysql_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("myusername");
         //Fatal error: Call to undefined function session_register() in /home/ubuntu/workspace/login.php on line 68 Call Stack: 0.0007 237696 1. {main}() /home/ubuntu/workspace/login.php:0 
         session_start();
         $_SESSION['login_user'] = $myusername;
         $_SESSION['id'] = $id;
         $_SESSION['country_id'] = $country_id;
         //$_SESSION['online'] = true;
         echo 'sfsdfsdfsfdsf';
         
         //echo $country_id;
         header("location: index.php");
      }else {
         $error = "   Your Login Name or Password is invalid";
         echo "<p><span class='error'><i class='material-icons'>error</i>" . $error . "</span></p>";
      }
   }
?>