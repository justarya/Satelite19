<?php

require_once "../init.php";
require_once "../class/classes.php";

$db = new db("localhost", "root", "", "satelite");

if(isset($_GET["action"])) {
  // delete
  if($_GET["action"] == "delete") {
    $postID = $_GET["postid"];
    $db->q("DELETE FROM post WHERE ID='$postID'");
  }
}
?>

<!DOCTYPE html>
<html class="html-full">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#000">
    <link rel="icon" href="../assets/logo.png" type="image/png" sizes="16x16">
    <title>Post List | Admin Panel Satelite 19th</title>
    <link rel="stylesheet" href="../font/tw-cen-mt/font.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/main.css">

    <!-- fontawesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  </head>
  <body>
    <div class="container-child admin">
      <h2>Post List</h2>
      <table>
        <tr>
          <th>Title</th>
          <th>Image</th>
          <th>Content</th>
          <th>Category</th>
          <th class="action">Actions</th>
        </tr>
        <?php

        // show post list
        $getPost = $db->q("SELECT * FROM post");
        if($getPost->num_rows > 0) {
          $posts = $getPost->fetch_all(MYSQLI_ASSOC);
          foreach($posts as $p) {
            echo "
            <tr>
            <td>$p[title]</td>
            <td><img src='$p[img]'/></td>
            <td>$p[content]</td>
            <td>$p[category]</td>
            <td class='action'><a class='edit' href='edit-post.php?postid=$p[ID]>'><i class='fas fa-pencil-alt'></i> Edit</a> | <a class='delete' href='?action=delete&postid=$p[ID]'><i class='far fa-trash-alt'></i> Delete</a></td>
            </tr>
            ";
          }
        } else {
          echo "No post found.";
        }
        ?>
      </table>
      </table>
    </div>
  </body>
</html>
