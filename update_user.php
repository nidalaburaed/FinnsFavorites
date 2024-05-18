<?php
    include_once('common/session.php');

    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      //default doesn't work
      
      $country_id = (isset($_POST['country']))?$_POST['country']:'default' ;
      $address = (isset($_POST['address']))?$_POST['address']:'default' ;
      $phone = (isset($_POST['phone']))?$_POST['phone']:'default' ;
      $fname = (isset($_POST['firstname']))?$_POST['firstname']:'default' ;
      $mname = (isset($_POST['middlename']))?$_POST['middlename']:'default' ;
      $lname = (isset($_POST['lastname']))?$_POST['lastname']:'default' ;
      $login = $_POST['login'];
    //   $password_1 = $_POST['pwd1'];
    //   $password_2 = $_POST['pwd2'];
      //$age = (isset($_POST['age']))?$_POST['age']:'default' ;
        
        //$validPWD = strcmp($password_1, $password_2);
        $country = mysql_query("SELECT name FROM country WHERE country_id = ".$country_id, $conn);
        //$address = "$city, $postcode, $street $building, $appartment";
        $_SESSION['country_id'] = $country_id;
    
                    $sql = "UPDATE customer SET first_name='$fname', middle_name='$mname', last_name='$lname', phone='$phone', address='$address', country_id='$country_id' WHERE customer_id='".$_SESSION['id']."'";
                    echo $sql;
                    $resultInsertLogin = mysql_query($sql, $conn);
                    if($resultInsertLogin){
                      header("Location:index.php"); 
                    }else{
                        echo ("<br>insert LoginData fault");             
                    }
           
    }else {
        echo ("<br><h3>Insert User failt</h3>");
    }