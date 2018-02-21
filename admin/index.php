<?php

require_once "../init.php";
require_once "../class/classes.php";

$db = new db("localhost", "root", "", "satelite");

if(!isset($_SESSION["user"])) {
  header("Location: login.php?next=index.php");
  exit();
} else {
  if($db->get_data("user", "role", "ID", $_SESSION["user"]) != "admin") {
    header("Location: ../index.php");
    exit();
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#000">
    <link rel="icon" href="../assets/logo.png" type="image/png" sizes="16x16">
    <title>Admin Panel | Satelite 19th</title>
    <link rel="stylesheet" href="../font/tw-cen-mt/font.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/main.css">

    <!-- fontawesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  </head>
  <body>
    <div class="admin-left">
      <div class="brand">
        <a href="javascript:void(0)" class="iframe-link" data-link="main.php"><h1>SATELITE 19</h1></a>
        <a href="javascript:void(0)" class="iframe-link" data-link="main.php"><h1 class="responsive">19</h1></a>
      </div>
      <div class="admin-links">
        <ul>
          <li class="parent"><a class="parent"><i class="far fa-clone"></i><span>Post</span></a>
            <ul>
              <li data-link="submit-post.php"><i class="fas fa-plus"></i><span>Create Post</span></li>
              <li data-link="post-list.php"><i class="fas fa-th-list"></i><span>Post List</span></li>
            </ul>
          </li>
          <li class="parent"><a class="parent"><i class="far fa-images"></i><span>Gallery</span></a>
            <ul>
              <li data-link="submit-photo.php"><i class="fas fa-plus"></i><span>Add Photo</span></li>
              <li data-link="gallery.php"><i class="fas fa-th-list"></i><span>All Photo</span></li>
            </ul>
          <li id="logout" class="parent"><a href="logout.php"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a></li>
        </ul>
      </div>
    </div>
    <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
    console.log("HA");
    $(document).ready(function() {
      $("a.parent").click(function() {
        console.log("GA");
        if($(this).parent().children("ul").css("display") == "none") {
          $(this).parent().children("ul").slideDown();
        } else {
          $(this).parent().children("ul").slideUp();
        }
      });
      $(".iframe-link").click(function() {
        var url = $(this).attr("data-link");
        $(".admin-iframe").attr("src", url);
        $(".admin-iframe").contentWindow.location.reload(true);
      })
      $("li.parent").find("li").click(function() {
        console.log("GASD");
        var url = $(this).attr("data-link");
        $(".admin-iframe").attr("src", url);
        $(".admin-iframe").contentWindow.location.reload(true);
      })
    });
    </script>
    <div class="admin-right">
      <iframe class="admin-iframe" src="main.php"/>
    </div>
  </body>

</html>
