<?php
require_once "_inc/config.php";
?>

<!DOCTYPE html>
<html lang="sk">

<head>
  <meta charset="UTF-8" />
  <meta name="description" content="My Domestic Cat" />
  <meta name="keywords" content="mačka, útulok, túlavá, lovenie myší" />
  <meta name="author" content="Mariia Shorokhova" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <?php
  $assets = new Assets();
  echo $assets->add_styles();
  ?>

  <title>Dyma</title>
</head>

<body>
  <header id="header">
    <nav class="menu">
      <div class="logo">
        <!-- logotyp -->
        <img src="img/logo.jpg" alt="logo" />
      </div>

      <div class="menu-toggle" id="mobile-menu">
        <!-- ikonka -->
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
      </div>

      <ul class="nav-list">
        <li><a href="index.php#Vratit">Domov</a></li>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="vybavenie.php#Vybavenie">Vybavenie</a></li>
        <li><a href="galeria.php#Galeria">Galéria</a></li>

        <li>|</li>

        <?php
        if (isset($_SESSION["role"])) {
          if ($_SESSION["role"] >= 2) {
            echo '<li><a href="admin.php">Admin</a></li>';
          }
          echo '<li><a href="odhlasit.php">Odhlásiť</a></li>';
        } else {
          echo '<li><a href="prihlasenie.php">Prihlásenie</a></li>';
        }
        ?>
      </ul>
    </nav>
  </header>