<?php
    $conn = mysql_connect("35.205.200.52", "root", "fifastore");
    $conn2 = mysql_connect("35.205.219.107", "root", "fifastore", true);
    $conn3 = mysql_connect("35.187.75.54", "root", "fifastore", true);
    mysql_select_db('fifaonlinestore', $conn);
    mysql_select_db('fifaonlinestore1', $conn2);
    mysql_select_db('fifaonlinestore2', $conn3);
    
    //mysql_query("SELECT * FROM country", $conn);
    //echo $conn
    //  mysql_query("INSERT INTO country (country_id, name) VALUES (1, 'Finland')");
     
    //  $result = mysql_query("SHOW TABLES");
    
    //  while($row = mysql_fetch_assoc($result))
    //   {
    //     var_dump($row);
    //   }
?>