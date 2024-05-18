<?php include 'session.php';?>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>
<nav style='background-color: #008DAA !important;'>
    <div class="nav-wrapper">
      <img style="height: 64px" src="static/images/logo.jpg">&emsp;<a href="index.php" class="brand-logo">Finn's Favorites</a>
      <ul class="right hide-on-med-and-down">
        <!--<li><a href=""><i class="material-icons">search</i></a></li>-->
        <!--<li><a href="map.php"><i class="material-icons">map</i></a></li>-->
        <li><a href="stored.php"><i class="material-icons">storage</i></a></li>
        <?php
        if (isLoggedIn()) {
          
          echo '<li><a href="settings.php">' . getUserParameter('first_name') . '</a></li>';
          echo '<li><a href="logout.php"><i class="material-icons">exit_to_app</i></a></li>';
        }
        else {
        ?>
        <li><a href="login.php"><i class="material-icons">perm_identity</i></a></li>
        <?php
        }
        ?>
        <!--<li><a href=""><i class="material-icons">more_vert</i></a></li>-->
      </ul>
    </div>
  </nav>