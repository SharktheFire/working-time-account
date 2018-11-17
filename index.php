<?php
    require 'scripts/autoload.php';

    function includeCss()
    {
      $cssFiles = [
        '/dist/bootstrap.min.css',
        '/dist/starter-template.css'
      ];
      foreach ($cssFiles as $file) {
        echo "<link href='$file' rel=stylesheet>";
      }
    }

    function includeJs()
    {
      $jsFiles = [
        '/dist/jquery.js',
        '/dist/bootstrap.min.js'
      ];
      foreach ($jsFiles as $file) {
        echo "<script src='$file'></script>";
      }
    }
    $router = new Router(new Controller());
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Arbeitszeitkonto</title>
    <link rel="icon" href="./assets/favicon.ico">
    <?php includeCss(); ?>
  </head>
  <body>
    <?php echo $router->navigate(); ?>
    <!-- Placed at the end of the document so the pages load faster -->
    <?php includeJs(); ?>
  </body>
</html>
