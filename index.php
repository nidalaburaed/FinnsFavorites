<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css/index.css">
    <?php include 'common/header.php';?>
    <title>Finn's Favorites</title>
  </head>
    
  <body>
    <?php include 'common/body.php';?>
    <?php
       $row = mysql_fetch_assoc(mysql_query("SELECT * FROM product WHERE product_id=3", $conn))['cost'];
       $row2 = mysql_fetch_assoc(mysql_query("SELECT * FROM product WHERE product_id=2", $conn))['cost'];
       $row3 = mysql_fetch_assoc(mysql_query("SELECT * FROM product WHERE product_id=1", $conn))['cost'];
    ?>
    
    <h3 align="center">Buy finnish goods</h3>
    <div class="container">
    <div class="row align-items-center">
      <form class="col s12" action="payment.php" method="post" id='purchase_form'>
        <div class="col s4">
           <div class="image" align="center">
                  <img src="/static/images/reissumies.jpg" alt="">
           </div>
           <div align="center">
             <h5>
               Price: <?php echo $row?>$
             </h5>
           </div>
           <div class="input-field col s12">
             <input name="prod3" id="prod3" type="number" required  class="validate" min="0" value="0">
             <label for="prod3">Reisummies</label>
           </div>
        </div>
        <div class="col s4">
           <div class="image" align="center">
                  <img src="/static/images/kulta.jpg" alt="">
           </div>
           <div align="center">
             <h5>
               Price: <?php echo $row2?>$
             </h5>
           </div>
           <div class="input-field col s12">
             <input name="prod2" id="prod2" type="number" required  class="validate" min="0" value="0">
             <label for="prod2">Kulta Katriin</label>
           </div>
        </div>
        <div class="col s4">
           <div class="image" align="center">
                  <img src="/static/images/salmiakki.jpg" alt="">
           </div>
           <div align="center">
             <h5>
               Price: <?php echo $row3?>$
             </h5>
           </div>
           <div class="input-field col s12">
             <input name="prod1" id="prod1" type="number" required  class="validate" min="0" value="0">
             <label for="prod1">Salmiakki</label>
           </div>
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

