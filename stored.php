<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css/index.css">
    <?php include 'common/header.php';?>
    <title>Stored</title>
  </head>
    
  <body>
    <?php include 'common/body.php';?>
    <h3 align="center">Storage</h3>
    <h4 align="center">Shows how much goods in all regions</h4>
    <div class="container">
    <div class="row align-items-center">
      <form class="col s12" action="index.php" method="post" id='purchase_form'>
        <div class="col s4">
           <div class="image" align="center">
                  <img src="/static/images/reissumies.jpg" alt="">
           </div>
           <?php
           $row = mysql_fetch_assoc(mysql_query("SELECT * FROM fifaonlinestore.stored WHERE product_id=3", $conn))['amount'];
           $row2 = mysql_fetch_assoc(mysql_query("SELECT * FROM fifaonlinestore1.stored WHERE product_id=3", $conn2))['amount'];
           $row3 = mysql_fetch_assoc(mysql_query("SELECT * FROM fifaonlinestore2.stored WHERE product_id=3", $conn3))['amount'];
           ?>
           <table class="centered">
                <thead>
                  <tr>
                      <th>Finland</th>
                      <th>Norway</th>
                      <th>Sweden</th>
                  </tr>
                </thead>
        
                <tbody>
                  <tr>
                    <td><?php echo $row?></td>
                    <td><?php echo $row2?></td>
                    <td><?php echo $row3?></td>
                  </tr
                </tbody>
              </table>
           
        </div>
        <div class="col s4">
           <div class="image" align="center">
                  <img src="/static/images/kulta.jpg" alt="">
           </div>
           <?php
           $row = mysql_fetch_assoc(mysql_query("SELECT * FROM fifaonlinestore.stored WHERE product_id=2", $conn))['amount'];
           $row2 = mysql_fetch_assoc(mysql_query("SELECT * FROM fifaonlinestore1.stored WHERE product_id=2", $conn2))['amount'];
           $row3 = mysql_fetch_assoc(mysql_query("SELECT * FROM fifaonlinestore2.stored WHERE product_id=2", $conn3))['amount'];
           ?>
           <table class="centered">
                <thead>
                  <tr>
                      <th>Finland</th>
                      <th>Norway</th>
                      <th>Sweden</th>
                  </tr>
                </thead>
        
                <tbody>
                  <tr>
                    <td><?php echo $row?></td>
                    <td><?php echo $row2?></td>
                    <td><?php echo $row3?></td>
                  </tr
                </tbody>
              </table>
        </div>
        <div class="col s4">
           <div class="image" align="center">
                  <img src="/static/images/salmiakki.jpg" alt="">
           </div>
           <?php
           $row = mysql_fetch_assoc(mysql_query("SELECT * FROM fifaonlinestore.stored WHERE product_id=1", $conn))['amount'];
           $row2 = mysql_fetch_assoc(mysql_query("SELECT * FROM fifaonlinestore1.stored WHERE product_id=1", $conn2))['amount'];
           $row3 = mysql_fetch_assoc(mysql_query("SELECT * FROM fifaonlinestore2.stored WHERE product_id=1", $conn3))['amount'];
           ?>
           <table class="centered">
                <thead>
                  <tr>
                      <th>Finland</th>
                      <th>Norway</th>
                      <th>Sweden</th>
                  </tr>
                </thead>
        
                <tbody>
                  <tr>
                    <td><?php echo $row?></td>
                    <td><?php echo $row2?></td>
                    <td><?php echo $row3?></td>
                  </tr
                </tbody>
              </table>
        </div>
        </br
        <div class="row">
               <div class="col s12" align="center">
                   <button class="btn waves-effect waves-light" type="submit" name="action" align="center">To main page
                      <!--<i class="material-icons right">arrow_back</i>-->
                   </button>
               </div>
            </div>
    </form>
    </div>
    </div>
    </body>
</html>

