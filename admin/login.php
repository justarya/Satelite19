<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/curhat/satelite19/satelite19/init.php";
require_once "../class/classes.php";

$db = new db("localhost", "root", "", "satelite");

if(!isset($_SESSION["user"])) { 
  if(isset($_POST["user"]) && isset($_POST["password"])) {
    $username = mysqli_real_escape_string($db->conn, $_POST["user"]);
    $password = mysqli_real_escape_string($db->conn, $_POST["password"]);
    // check it
    $checkAccount = $db->q("SELECT * FROM user WHERE username='$username' and password='$password'");
    if($checkAccount->num_rows > 0) {
      $_SESSION["user"] = $db->get_data("user", "ID", "username", $username);
      if(isset($_GET["next"])) {
        header("Location: $_GET[next]");
      } else {
        header("Location: index.php");
      }
    }
  }
} else {
  header("Location: ../index.php");
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
      <input type="text" name="user"/>
      <input type="password" name="password"/>
      <input type="submit" value="Login"/>
    </form>
  </body>
</html>
