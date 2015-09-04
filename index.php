<?php
  $conf = [
          'host' => 'localhost',
          'user' => 'root',
          'pass' => 'root',
  ];
  $link = mysqli_connect($conf['host'], $conf['user'], $conf['pass']);
  $hour = date('H:i');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ServerInfo</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div id="content">
    <img src="img/apache.png" alt="Apache">
    <h1>Тестова сторінка сервера.</h1>
    <div class="hour">
      <?php echo $hour; ?>
    </div><!--hour-->
    <div class="greeting">
      <?php if($hour > '06:00' && $hour < '12:00'): ?>
      <h2 class="rn">Доброго ранку!</h2>
      <?php elseif($hour >= '12:00' && $hour < '19:00'): ?>
      <h2 class="dn">Добрий день!</h2>
      <?php elseif($hour >= '19:00' && $hour < '23:00'): ?>
      <h2 class="vr">Добрий вечір!</h2>
      <?php else: ?>
      <h2 class="nc">Доброї ночі!</h2>
      <?php endif; ?>
    </div><!--greeting-->
    <p>Сервер працює на базі бесплатних програм:</p>
    <div class="apps">
      <ul>
        <li>
          <b><a href="http://apache.org/" target="_blank">Apache2</a></b>
          (<samp><?=$_SERVER['SERVER_SOFTWARE'] ?></samp>);
        </li>
        <li>
          <b><a href="http://php.net/" target="_blank">PHP</a></b>
          (<samp><a href="info.php" target="_blank"><?=phpversion(); ?></a></samp>);
        </li>
        <li>
          <b><a href="http://www.mysql.com/" target="_blank">MySQL</a></b>
          (<samp><?=printf(mysqli_get_server_info($link)); ?></samp>).
        </li>
      </ul>
    </div><!--apps-->
  </div><!--content-->
</body>
</html>