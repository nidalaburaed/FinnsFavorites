<?php
    include_once('common/connection.php');

  if($myDB){
    echo("<br> +Connection - myDB = " . $myDB);
  }else {
    echo("<br> -Connection - myDB = " . $myDB);  
  }
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      //default doesn't work
      $appartment = (isset($_POST['appartment'])) ? $_POST['appartment']:'default' ;
      $building = (isset($_POST['building']))?$_POST['building']:'default' ;
      $country_id = (isset($_POST['country']))?$_POST['country']:'default' ;
      $street = (isset($_POST['street']))?$_POST['street']:'default' ;
      $postcode = (isset($_POST['postcode']))?$_POST['postcode']:'default' ;
      $phone = (isset($_POST['phone']))?$_POST['phone']:'default' ;
      $fname = (isset($_POST['firstname']))?$_POST['firstname']:'default' ;
      $mname = (isset($_POST['middlename']))?$_POST['middlename']:'default' ;
      $lname = (isset($_POST['lastname']))?$_POST['lastname']:'default' ;
      $login = $_POST['login'];
      $password_1 = $_POST['pwd1'];
      $password_2 = $_POST['pwd2'];
      //$age = (isset($_POST['age']))?$_POST['age']:'default' ;
        
        $validPWD = strcmp($password_1, $password_2);
        $country = mysql_query("SELECT name FROM country WHERE country_id = ".$country_id, $conn);
        $address = "$country, $postcode, $street $building, $appartment";
        
        
        $sql = "SELECT `login` FROM `customer` WHERE `login` = '" .$username . "'";
        $resultUniqueUserName = mysql_query($sql, $conn);
        echo $resultUniqueUserName;
          
        if($resultUniqueUserName){
            $numrow = mysql_num_rows($resultUniqueUserName);
            if($numrow == 0 && $validPWD == 0){
                $pwd = trim($validPWD);
                if(strlen($pwd)==0){
                  echo("<br>PWD is empty<br>");
                }else{
                    $sql = "INSERT INTO customer (login, password, first_name, middle_name, last_name, phone, address, country_id) " .
                    "VALUES ('$login', '$password_1', '$fname', '$mname', '$lname', '$phone', '$address', '$country_id')";
                    echo $sql;
                    $resultInsertLogin = mysql_query($sql, $conn);
                    if($resultInsertLogin){
                      header("Location:login.php"); 
                    }else{
                        echo ("<br>insert LoginData fault");             
                    }
              }              
            } else{
              echo("<br><h3>Username already exists or Passwords are different</h3>");
            }
            
            
            
        }else{
            echo("<br>username select unique fault");
        }
      
//3.1)check username => unique
      //3.2)insert login (use userID) 
      //ToDo or payATTENTIONto:
	    //  username already existes (uniqe) -> error
		//  pwd1 != pwd2 -> error
	    //	anything else:  value.trim().length > 0 -> ok
		//		-->


//------------------------------------------------------------------------------ 
    }else {
        echo ("<br><h3>Insert User failt</h3>");
    }