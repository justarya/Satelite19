<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/curhat/satelite19/satelite19/init.php";
require_once "../class/classes.php";

$db = new db("localhost", "root", "", "satelite");
$message = "";

$cat = $db->get_data("category", "name");

?>
<!DOCTYPE html>
<html class="html-full">
  <head>
    <meta charset="utf-8">
    <title>Main Page - Admin</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/profile.css">
    <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
  </head>
  <body>
    <div class="container-child">
      <h2>Main Page</h2>
      <a href='post-list.php'>Post List</a> | <a href='submit-post.php'>Submit Post</a> | <a href='post-list.php'>Edit Post</a> 
    </div>
  </body>
</html>
