<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/curhat/satelite19/satelite19/init.php";
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
    <title>Admin Page - SATELITE 19</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/profile.css">
    <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
    <style>
      html, body {
        height: 100%;
      }
    </style>
  </head>
  <body>
    <div class="admin-left">
      <div class="container-admin">
        <h1>SATELITE 19</h1>
        <p>Admin Page</p>
        <div class="admin-links">
          <ul>
            <li class="parent"><a class="parent">Post</a>
              <ul>
                <li data-link="post-list.php">Post List</li>
                <li data-link="submit-post.php">Submit Post</li>
              </ul>
            </li>
            <li class="parent"><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
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
      $("li.parent").find("li").click(function() {
        console.log("GASD");
        var url = $(this).attr("data-link");
        $(".admin-iframe").attr("src", url);
        $(".admin-iframe").contentWindow.location.reload(true);
      })
    });
    </script>
    <div class="admin-right">
      <iframe class="admin-iframe" src="submit-post.php"/>
    </div>
  </body>

</html>
