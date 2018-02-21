<?php

require_once "../init.php";
require_once "../class/classes.php";

$db = new db("localhost", "root", "", "satelite");

if(isset($_POST["post"])) {
  $message = "";
  if(!isset($_POST["title"]) || !isset($_POST["content"]) || !isset($_POST["cat"])) {
    $message = "<font color=red>Semua field wajib diisi.</font>";
  } else {
    $title = $_POST["title"];
    $content = $_POST["content"];
    $cat = $_POST["cat"];
    if(!isset($_FILES["img"])) {
      $db->submit($_POST["title"], $_POST["content"], $_POST["cat"], $_SESSION["user"]);
    } else {
      $db->submit($_POST["title"], $_POST["content"], $_POST["cat"], $_SESSION["user"], null, $_FILES["img"]);
    }
  }
}

$get_data = $db->get_data("category", "name");
?>
<!DOCTYPE html>
<html class="html-full">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#000">
    <link rel="icon" href="../assets/logo.png" type="image/png" sizes="16x16">
    <title>Create Post | Admin Panel Satelite 19th</title>
    <link rel="stylesheet" href="../font/tw-cen-mt/font.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/main.css">

    <!-- fontawesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  </head>
  <body>
    <div class="container-child">
      <h2>Submit Post</h2>
      <?php if(isset($message)){ ?>
        <div class="admin-message"><?php echo $message; ?></div>
      <?php } ?>
      <div class="admin-form" id="submit-post-form">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="admin-form-main">
            <input type="text" name="title" placeholder="Your title here.."/>
            <textarea name="content" placeholder="Your article..."></textarea>
          </div>
          <div class="admin-form-sidebar">
            <div class="af-sidebar-widget">
              <div class="afsw-title">
                <p>Image Upload</p>
              </div>
              <div class="afsw-content">
                <input type="file" name="img"/>
              </div>
            </div>
            <div class="af-sidebar-widget">
              <div class="afsw-title">
                <p>Category</p>
              </div>
              <div class="afsw-content">
                <p>
                  <select name="cat">
                    <option value="" selected disabled>Select category...</option>
                    <?php
                    foreach($get_data as $g) {
                      echo "<option value='$g[name]'>$g[name]</option>";
                    }
                    ?>
                  </select>
                </p>
              </div>
            </div>
            <input type="submit" value="Post" name="post" class="button right"/>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
