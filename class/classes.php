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

  function submit($title, $content, $cat, $userID, $tag = null) {
    // create new
    $new_post = $this->q("INSERT INTO post (title, content, category, userID) VALUES ('$title', '$content', '$cat', '$userID')");

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