<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/curhat/satelite19/satelite19/init.php";
require_once "../class/classes.php";

$db = new db("localhost", "root", "", "satelite");
$message = "";

if(isset($_POST["post"])) {
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
    <title>Submit Post - Admin</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/profile.css">
  </head>
  <body>
    <div class="container-child">
      <h2>Submit Post</h2>
      <div class="admin-message"><?php echo $message ?></div>
      <div class="admin-form" id="submit-post-form">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="admin-form-main">
            <dl><input type="text" name="title" placeholder="Your title here.."/></dl>
            <dl>
              <textarea name="content" placeholder="Your article..."></textarea>
            </dl>
            <dl class="horizontal-group">
              <input type="submit" value="Post" name="post" class="button right"/>
            </dl>
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
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
