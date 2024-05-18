<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css/index.css">
    <?php include 'common/header.php';?>
    <title>Payment</title>
  </head>
    
  <body>
    <?php include 'common/body.php';?>
    <?php 
    checkSession();
    
    $prod1 = (isset($_POST['prod1'])) ? $_POST['prod1']:'default' ;
    $prod2 = (isset($_POST['prod2']))?$_POST['prod2']:'default' ;
    $prod3 = (isset($_POST['prod3']))?$_POST['prod3']:'default' ;
    
    $row = mysql_fetch_assoc(mysql_query("SELECT * FROM product WHERE product_id=1", $conn))['cost'];
    $row2 = mysql_fetch_assoc(mysql_query("SELECT * FROM product WHERE product_id=2", $conn))['cost'];
    $row3 = mysql_fetch_assoc(mysql_query("SELECT * FROM product WHERE product_id=3", $conn))['cost'];
    
    
   $cost = $row*$prod1 + $row2*(float)$prod2 + $row3*(float)$prod3;
    
    if(!$cost)
    {
        header("location: index.php");
    }
    ?>
    <div align="center">
      <h3>Payment page</h3>
    </div>
    <div class="container">
    <div class="row align-items-center">
        <form method="post" action="purchase.php">
            <input id="prod1" type="hidden" name="prod1" value="<?php echo $prod1; ?>">
            <input id="prod2" type="hidden" name="prod2" value="<?php echo $prod2; ?>">
            <input id="prod3" type="hidden" name="prod3" value="<?php echo $prod3; ?>">
            <div align="center">
             <h5>
               Total cost: <?php echo $cost?>$
             </h5>
           </div>
            <div class="row">
               <div class="col s12" align="center">
                   <button class="btn waves-effect waves-light" type="submit" name="action" align="center">Purchase
                      <i class="material-icons right">send</i>
                   </button>
               </div>
            </div>
        </form>
    </div>
    </div>
    </body>
</html>

