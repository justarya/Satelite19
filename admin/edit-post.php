<?php

require_once "../init.php";
require_once "../class/classes.php";

$db = new db("localhost", "root", "", "satelite");

if(isset($_GET["postid"]) || isset($_POST["postid"])) {
} else {
  header("Location: submit-post.php");
  exit();
}

if(isset($_POST["edit"])) {
  $message = "";
  // edit it
  // check existance of id
  if($db->q("SELECT * FROM post WHERE ID='$_POST[postid]'")->num_rows <= 0) {
    echo "Not Found<br><a href='main.php'>Back to Home</a>";
    $found = false;
    die();
  } else {
    $found = true;
    if(isset($_POST["title"]) && isset($_POST["content"]) && isset($_POST["cat"])) {
      echo 'aSD';
      if(!isset($_FILES["img"])) {
        echo 'ASD';
        $content = mysqli_real_escape_string($db->conn, $_POST["content"]);
        $update = $db->q("UPDATE post SET title='$_POST[title]', content='$content', category='$_POST[cat]' WHERE ID='$_POST[postid]'");
      } else {
        echo 'asdasd';
        // updating thumb
        $img = $_FILES["img"];
        $img_tmp = $img["tmp_name"];
        $img_name = $img["name"];
        $img_dir = $_SERVER["DOCUMENT_ROOT"] . "/curhat/satelite19/satelite19/assets/$img_name";
        $img_url = "http://localhost:8080/curhat/satelite19/satelite19/assets/$img_name";
        // move it
        $moveIt = move_uploaded_file($img_tmp, $img_dir);
        if($moveIt) {
          // update query
          $update = $db->q("UPDATE post SET title='$_POST[title]', content='$_POST[content]', category='$_POST[cat]', img='$img_url' WHERE ID='$_POST[postid]'");
        }
      }

      if($update) {
        $message = "<font color='green'>Berhasil</font>";
      } else {
        $message = "<font color='red'>Gagal</font>";
      }
    }
  }
}

$post = $db->get_data("post", null, "ID", $_GET["postid"]);
$cat = $db->get_data("category", "name");
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
    <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
  </head>
  <body>
    <div class="container-child">
      <h2>Edit Post</h2>
      <?php if(isset($message)){ ?>
        <div class="admin-message"><?php echo $message; ?></div>
      <?php } ?>
      <div class="admin-form" id="submit-post-form">
        <form action="" method="post" enctype="multipart/form-data">
          <!-- important info -->
          <input type="hidden" name="postid" value="<?php echo $_GET["postid"]; ?>"/>
          <div class="admin-form-main">
            <input type="text" name="title" value="<?php echo $post["title"]; ?>" placeholder="Your title here.."/></dl>
            <textarea name="content" placeholder="Your article..."><?php echo $post["content"]; ?></textarea>
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
                  <select name="cat" id="cat" value="<?php echo $post["category"] ?>">
                    <option value="" selected disabled>Select category...</option>
                    <?php
                    foreach($cat as $g) {
                      echo "<option id='cat-$g[name]' value='$g[name]'>$g[name]</option>";
                    }
                    ?>
                  </select>
                  <script type="text/javascript">
                  $(document).ready(function() {
                    $("#cat-<?php echo $post["category"] ?>").attr("selected", "true");
                  });
                  </script>
                </p>
              </div>
            </div>
            <input type="submit" value="Edit" name="edit" class="button right"/>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
