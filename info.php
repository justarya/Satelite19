<?php
require_once('view/header.php');
require_once "/class/classes.php";

$db = new db("localhost", "root", "", "satelite");
?>

    <div id="info" class="content">
      <div class="container">
        <?php

        $getPost = $db->q("SELECT * FROM post");
        if($getPost->num_rows > 0) {
          $posts = $getPost->fetch_all(MYSQLI_ASSOC);
          foreach($posts as $p) {
            echo "
            <a href='' class='post' style='background:url($p[img])'>
              <div class='title'>
                <p>$p[title]</p>
              </div>
            </a>
            ";
          }
        } else {
          echo "No post found.";
        }
        ?>
      </div>
    </div>

<?php require_once('view/footer.php'); ?>
