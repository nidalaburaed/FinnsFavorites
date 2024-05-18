<?php
    include_once("common/session.php");
    
    checkSession();
    
    $prod1 = (isset($_POST['prod1'])) ? $_POST['prod1']:'default' ;
    $prod2 = (isset($_POST['prod2']))?$_POST['prod2']:'default' ;
    $prod3 = (isset($_POST['prod3']))?$_POST['prod3']:'default' ;
    $customer_id = $_SESSION['id'];
    $country_id = $_SESSION['country_id'];
    // echo $prod1;
    // echo $prod2;
    // echo $prod3;
    
    $prod = array($prod1, $prod2, $prod3);
     

    $payment_id = mysql_fetch_assoc(mysql_query("SELECT MAX(payment_id) FROM payment", $conn))['MAX(payment_id)'] + 1;
    mysql_query("INSERT INTO payment (payment_id, type, status, cost) VALUES ('".$payment_id."', 'Cash', 'Completed', '1')", $conn);
    mysql_query("INSERT INTO fifaonlinestore.order (order_id, customer_id, payment_id) VALUES ('".$payment_id."', '".$customer_id."', '".$payment_id."')", $conn);
    $i=0;
    while($i < count($prod))
    {
        $i++;
        mysql_query("INSERT INTO ordered (order_id, product_id, amount) VALUES ('".$payment_id."', '".$i."', '".$prod[$i-1]."')", $conn);
    }
    
    $i=0;
    while($i < count($prod))
    {
        $i++;
        //echo $country_id;
        switch($country_id) {
            case 1: $con = $conn;
                    break;
            case 2: $con = $conn2;
                    break;
            case 3: $con = $conn3;
                    break;
        }
        if($country_id-1)
        {
            $lul = $country_id -1;
            
        }
        else {
            $lul = '';
        }
        $result = mysql_query("SELECT * FROM fifaonlinestore".$lul.".stored WHERE warehouse_id='".$country_id."' and product_id='".$i."'", $con);
        $amount = mysql_fetch_assoc($result)['amount'];
        $amount = $amount - $prod[$i-1];
        mysql_query("UPDATE fifaonlinestore".$lul.".stored SET amount='".$amount."' WHERE warehouse_id='".$country_id."' and product_id='".$i."'", $con);
        header("location: success.php");
    }
?>