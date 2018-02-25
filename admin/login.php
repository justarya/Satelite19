<?php

require_once "../init.php";
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
  header("Location: index.php");
}
?>

<?php require_once('view/simple-header.php'); ?>
  <div id="login" class="form">
    <form action="" method="post">
      <h1>Login</h1>
      <input type="text" name="user" placeholder="Username"/>
      <input type="password" name="password" placeholder="Password"/>
      <input type="submit" value="Login"/>
    </form>
  </div>
<?php require_once('view/footer.php'); ?>
