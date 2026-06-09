<?php
echo ("<h1>HOLA Despliegue y Arquitectura de despliegue</h1>");
echo ("<h3>He montado LEMP, Moyano Oriana </h3>");

try {
  // Importante, la dirección del host es como hayamos en el docker, en mi caso es mariadb
  $servername = "mariadb";
  $username = "root";
  $password = "password";
  $database = "docker_sample";
  $port = "3306";

  $pdo = new PDO("mysql:host=$servername; port=$port; dbname=$database", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Conexión Realizada con éxito";

  $res = $pdo->query('select nombre, email from usuarios');
  foreach ($res as $user) {
    echo '<p>' . $user[0] . ' - ' . $user[1];
  }
  $pdo = null;
} catch (PDOException $e) {
  print "¡Error!: " . $e->getMessage() . "<br/>";
  die();
}
