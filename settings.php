<!DOCTYPE html>
<html>
  <head>
    <?php include 'common/header.php';?>
    <link rel="stylesheet" href="css/settings.css">
    <title>Settings</title>
  </head>
  
  <body>
    <?php include 'common/body.php';?>
    <?php
    $result = mysql_query("SELECT * FROM customer WHERE customer_id=".$_SESSION['id'], $conn);
    $row = mysql_fetch_assoc($result);
    ?>
    <div class="row">
     <form class="col s12" action="update_user.php" method="post" id='settings_form'>
       
       <div class="input-field col s12">
           <?php
                echo '<input name="login" id="user_name" type="text" disabled required class="validate" value="'.$_SESSION['login_user'].'">';
            ?>
         <label for="user_name">Username</label>
       </div>
      
      <!--<div class="input-field col s6">-->
      <!--  <input name="pwd1" id="password" type="password"  required class="validate">-->
      <!--  <label for="password">Password</label>-->
      <!--</div>-->
      <!--<div class="input-field col s6">-->
      <!--  <input name="pwd2" type="password"  required class="validate">-->
      <!--  <label for="password">Confirm Password</label>-->
      <!--</div>-->
       
      <div class="input-field col s4">
        <?php
        echo '<input name="firstname" id="first_name" type="text" required  class="validate" value="'.$row['first_name'].'">';
        ?>
        <label for="first_name">First Name</label>
      </div>
      
      <div class="input-field col s4">
        <?php
        echo '<input name="middlename" id="middle_name" type="text" class="validate" value="'.$row['middle_name'].'">';
        ?>
        <label for="middle_name">Middle Name (if you have any)</label>
      </div>
      
      <div class="input-field col s4">
        <?php
        echo '<input name="lastname" type="text"  required class="validate" value="'.$row['last_name'].'">';
        ?>
        <label for="last_name">Last Name</label>
      </div>
       
       <!--<div class="input-field col s12">-->
       <!--  <input name="age" id="age" type="number" required  class="validate" min="18">-->
       <!--  <label for="age">Age</label>-->
       <!--</div>-->
       
       <div class="input-field col s6">
         <?php
         echo '<input name="phone" id="phone" type="tel" required class="validate" value="'.$row['phone'].'">';
         ?>
         <label for="phone">Phone</label>
       </div>

       <!--Need to import from db-->
       <div class="input-field col s6">
         <select name="country">
           <?php
                  $country_id = getUserParameter('country_id');
                  $country = mysql_fetch_assoc(mysql_query("SELECT * FROM country WHERE country_id = ".$country_id, $conn))['name'];
                
                  $result = mysql_query("SELECT * FROM country", $conn);
                  while ($row1 = mysql_fetch_assoc($result)) {
                      if($country_id == $row1['country_id'])
                          $isselected = ' selected';
                      else {
                          $isselected = '';
                      }
                    echo '<option value="'.$row1['country_id'].'"'.$isselected.'>'.$row1['name'].'</option>';
                  }
                  echo '</ul>';
             ?>
         </select>
         <label>Country</label>
       </div>
       <script type="text/javascript">
        $(document).ready(function() {
          $('select').material_select();
        });
    
        </script>

       <div class="input-field col s12">
         <?php
         echo '<input name="address" id="address" type="text"  required class="validate" value="'.$row['address'].'">';
         ?>
         <label for="address">Address</label>
       </div>

       <div class="row">
           <div class="col s6" align="center">
               <button class="btn waves-effect waves-light" type="submit" name="action" align="center">Update
                  <i class="material-icons right">send</i>
               </button>
           </div>
           <div class="col s6" align="center">
               <div id='btn'>
                  <a class="btn waves-effect waves-light" href="index.php" class="btn btn-default">Back</a>
               </div>
           </div>
       </div>
     </form>
   </div>
  </body>
</html>
