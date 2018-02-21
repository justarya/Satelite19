<?php

require_once "../init.php";
require_once "../class/classes.php";

$db = new db("localhost", "root", "", "satelite");
$message = "";

$cat = $db->get_data("category", "name");

?>
<!DOCTYPE html>
<html class="html-full">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#000">
    <link rel="icon" href="../assets/logo.png" type="image/png" sizes="16x16">
    <title>Satelite 19th</title>
    <link rel="stylesheet" href="../font/tw-cen-mt/font.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/main.css">

    <!-- fontawesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  </head>
  <body>
    <div class="container-child">
      <h2>Main Page</h2>
      <div class="main-page-menu">
        <a href='post-list.php'><i class="fas fa-th-list"></i><p>Post List</p></a>
      </div>
      <div class="main-page-menu">
        <a href='submit-post.php'><i class="far fa-plus-square"></i><p>Create Post</p></a>
      </div>
      <div class="main-page-menu">
        <a href='post-list.php'><i class="fas fa-edit"></i><p>Edit Post</p></a>
      </div>
    </div>
  </body>
</html>
