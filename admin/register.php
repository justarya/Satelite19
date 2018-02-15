<?php

session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/curhat/satelite19/satelite19/init.php";
require_once "../class/classes.php";
$db = new db("localhost", "root", "", "satelite");

if(isset($_POST["register"])) {
  if(!isset($_POST["user"]) || !isset($_POST["password"]) || !isset($_POST["repassword"])) {
    echo "Semua field harus diisi.";
  } else {
    $user = mysqli_real_escape_string($db->conn, $_POST["user"]);
    $pw = mysqli_real_escape_string($db->conn, $_POST["password"]);
    $repw = mysqli_real_escape_string($db->conn, $_POST["repassword"]);

    if($pw !== $repw) {
      echo "Konfirmasi password tidak sama.";
    } else {
      $new_user = $db->q("INSERT INTO user (username, password) VALUES ('$user', '$pw')");
      $_SESSION["user"] = $user;
      echo "Anda telah login";
    }
  }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="" method="post">
      <input type="text" name="user" placeholder="Username"/>
      <input type="password" name="password" placeholder="password"/>
      <input type="password" name="repassword" placeholder="re-password"/>
      <input type="submit" name="register" value="Register"/>
    </form>
  </body>
</html>
