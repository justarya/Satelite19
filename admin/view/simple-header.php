<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sport Art And Education In Telecomunication Institute 19th">
    <meta name="keywords" content="Satelite SMK Telkom, Satelite 19th, SMK Telkom Jakarta, Universe">
    <meta name="author" content="Arya & Bagus Seno">
    <meta name="theme-color" content="#000">
    <link rel="icon" href="../assets/logo.png" type="image/png" sizes="16x16">
    <title>Satelite 19th</title>
    <link rel="stylesheet" href="../font/tw-cen-mt/font.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/post.css">
    <link rel="stylesheet" href="../css/login.css">

    <!-- fontawesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  </head>
  <body id="simple-header">
    <header>
      <div class="container">
        <div class="main">
          <a href="index.php" class="title" style="text-decoration: none;">
            <h1>SATELITE 19th</h1>
          </a>
        </div>
      </div>
    </header>
    <nav>
      <div class="container-nav">
        <ul>
          <?php $class = "class='active'"; ?>
          <li><a <?php if(basename($_SERVER["PHP_SELF"], ".php") == "index" || basename($_SERVER["PHP_SELF"], ".php") == "../profile"){ echo $class;}?> href="profile.php">Profile</a></li>
          <li><a <?php if(basename($_SERVER["PHP_SELF"], ".php") == "info"){ echo $class;}?> href="../info.php">Info</a></li>
          <li><a <?php if(basename($_SERVER["PHP_SELF"], ".php") == "event"){ echo $class;}?> href="../event.php">Event</a></li>
          <li><a <?php if(basename($_SERVER["PHP_SELF"], ".php") == "galeri"){ echo $class;}?> href="../galeri.php">Galeri</a></li>
          <li><a <?php if(basename($_SERVER["PHP_SELF"], ".php") == "kontak"){ echo $class;}?> href="../kontak.php">Kontak</a></li>
        </ul>
      </div>
    </nav>
