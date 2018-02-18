<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/curhat/satelite19/satelite19/init.php";
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
<html>
  <head>
    <meta charset="utf-8">
    <title>Post List - Admin</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/profile.css">
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
          <th>Actions</th>
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
            <td><a href='?action=delete&postid=$p[ID]'>Delete</a> | <a href='edit-post.php?postid=$p[ID]>'>Edit</a></td>
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
