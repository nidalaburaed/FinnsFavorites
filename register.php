<!DOCTYPE html>
<html>
  <head>
    <?php include 'common/header.php';?>
    <link rel="stylesheet" href="css/register.css">
    <title>Register</title>
  </head>
  
  <body>
    <?php include 'common/body.php';?>
    <div class="row">
     <form class="col s12" action="do_register.php" method="post" id='register_form'>
       
       <div class="input-field col s12">
         <input name="login" id="user_name" type="text" required class="validate"  >
         <label for="user_name">Username</label>
       </div>
      
      <div class="input-field col s6">
        <input name="pwd1" id="password" type="password"  required class="validate">
        <label for="password">Password</label>
      </div>
      <div class="input-field col s6">
        <input name="pwd2" type="password"  required class="validate">
        <label for="password">Confirm Password</label>
      </div>
       
      <div class="input-field col s4">
        <input name="firstname" id="first_name" type="text" required  class="validate">
        <label for="first_name">First Name</label>
      </div>
      
      <div class="input-field col s4">
        <input name="middlename" id="middle_name" type="text" class="validate">
        <label for="middle_name">Middle Name (if you have any)</label>
      </div>
      
      <div class="input-field col s4">
        <input name="lastname" type="text"  required class="validate">
        <label for="last_name">Last Name</label>
      </div>
       
       <!--<div class="input-field col s12">-->
       <!--  <input name="age" id="age" type="number" required  class="validate" min="18">-->
       <!--  <label for="age">Age</label>-->
       <!--</div>-->
       
       <div class="input-field col s12">
         <input name="phone" id="phone" type="tel" required class="validate">
         <label for="phone">Phone</label>
       </div>

       <!--Need to import from db-->
       <div class="input-field col s4">
         <select name="country">
             <?php
                  $result = mysql_query("SELECT * FROM country", $conn);
                  while ($row = mysql_fetch_assoc($result)) {
                      if($row['country_id'] == 1)
                          $isselected = ' selected';
                      else {
                          $isselected = '';
                      }
                    echo '<option value="'.$row['country_id'].'"'.$isselected.'>'.$row['name'].'</option>';
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
       
       <!--<div class="input-field col s6">-->
       <!--  <input name="country" id="country" type="text"  required class="validate">-->
       <!--  <label for="country">Country</label>-->
       <!--</div>-->
       
       <div class="input-field col s4">
         <input name="postcode" id="postcode" type="text"  required class="validate">
         <label for="postcode">Postcode</label>
       </div>
       
       <div class="input-field col s4">
         <input name="city" id="city" type="text" required  class="validate">
         <label for="city">City</label>
       </div>
       
       <div class="input-field col s4">
         <input name="street" id="street" type="text" required  class="validate">
         <label for="street">Street</label>
       </div>
       
       <div class="input-field col s4">
         <input name="building" id="building" type="text"  required class="validate">
         <label for="building">Building</label>
       </div>
       
       <div class="input-field col s4">
         <input name="appartment" id="appartment" type="text" required  class="validate">
         <label for="appartment">Appartment</label>
       </div>
       <div class="row">
           <div class="col s12" align="center">
               <button class="btn waves-effect waves-light" type="submit" name="action" align="center">Submit
                  <i class="material-icons right">send</i>
               </button>
           </div>
       </div>
     </form>
   </div>
  </body>
</html>