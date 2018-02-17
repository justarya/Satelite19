<?php

class db {

  public function __construct($localhost, $user, $pw, $db) {
    $errCheck = $this->conn = new mysqli($localhost, $user, $pw, $db);
  }

  public function q($query) {
    $do = $this->conn->query($query);
    echo mysqli_error($this->conn);
    return $do;
  }

  function submit($title, $content, $cat, $userID, $tag = null, $img = null) {
    // security
    $title = mysqli_real_escape_string($this->conn, $title);
    $content = mysqli_real_escape_string($this->conn, $content);
    $cat = mysqli_real_escape_string($this->conn, $cat);
    $userID = mysqli_real_escape_string($this->conn, $userID);
    $tag = mysqli_real_escape_string($this->conn, $tag);
    // create new
    if($img == null) {
      $new_post = $this->q("INSERT INTO post (title, content, category, userID) VALUES ('$title', '$content', '$cat', '$userID')");
    } else {
      // creating thumb
      $img_tmp = $img["tmp_name"];
      $img_name = $img["name"];
      $img_dir = $_SERVER["DOCUMENT_ROOT"] . "/curhat/satelite19/satelite19/assets/$img_name";
      $img_url = "http://localhost:8080/curhat/satelite19/satelite19/assets/$img_name";
      // move it
      $moveIt = move_uploaded_file($img_tmp, $img_dir);
      if($moveIt) {
        // insert to query
        $new_post = $this->q("INSERT INTO post (title, content, category, userID, img) VALUES ('$title', '$content', '$cat', '$userID', '$img_url')");
        if($new_post) {
          return true;
        } else {
          return false;
        }
      }
    }

    echo mysqli_error($this->conn);

  }

  function err_check() {
    echo mysqli_error($this->conn);
  }

  function get_data($from, $what = null, $where = null, $whereID = null) {
    if($what == null) {
      $what = "*";
    }
    if($where != null && $whereID != null) {
      $where = "WHERE $where='$whereID'";
    }
    if(is_array($what)) {
      $what = implode(",", $what);
    }
    $query = "SELECT $what FROM $from $where";
    $get_data = $this->q($query);
    if($get_data->num_rows > 0) {
      if($where == null) {
        $get_data = $get_data->fetch_all(MYSQLI_ASSOC);
        return $get_data;
      } else {
        $get_data = $get_data->fetch_assoc();
        return $get_data[$what];
      }
    } else {
      return false;
    }
  }
}

?>
