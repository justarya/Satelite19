<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Satelite 19th</title>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/info.css">
    <link rel="stylesheet" href="css/event.css">
    <link rel="stylesheet" href="css/galeri.css">
    <link rel="stylesheet" href="css/kontak.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- fontawesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  </head>
  <body>
    <header>
      <div class="container">
        <div class="sponsor">
          <div class="sponsor-item yayasan-telkom">
            <img src="assets/telkom-indonesia.png" alt="Telkom Indonesia">
          </div>
          <div class="sponsor-item telkom-indonesia">
            <img src="assets/yayasan-pendidikan-telkom.png" alt="Yayasan Pendidikan Telkom">
          </div>
          <div class="sponsor-item telkom-school">
            <img src="assets/telkom-school.png" alt="Telkom School">
          </div>
        </div>
        <div class="main">
          <div class="title">
            <h1>SATELITE 19th</h1>
          </div>
          <div class="button">
            <a href="https://docs.google.com/forms/d/e/1FAIpQLSeGH9TSHcIHQHPZijyVTQqn-oJk_p-g0C0AT-1_B1mTvVHFkQ/viewform?usp=sf_link">Daftar Yuk!</a>
          </div>
        </div>
      </div>
    </header>
    <nav>
      <div class="container-nav">
        <ul>
          <?php $class = "class='active'"; ?>
          <li><a <?php if(basename($_SERVER["PHP_SELF"], ".php") == "index" || basename($_SERVER["PHP_SELF"], ".php") == "profile"){ echo $class;}?> href="profile.php">Profile</a></li>
          <li><a <?php if(basename($_SERVER["PHP_SELF"], ".php") == "info"){ echo $class;}?> href="info.php">Info</a></li>
          <li><a <?php if(basename($_SERVER["PHP_SELF"], ".php") == "event"){ echo $class;}?> href="event.php">Event</a></li>
          <li><a <?php if(basename($_SERVER["PHP_SELF"], ".php") == "galeri"){ echo $class;}?> href="galeri.php">Galeri</a></li>
          <li><a <?php if(basename($_SERVER["PHP_SELF"], ".php") == "kontak"){ echo $class;}?> href="kontak.php">Kontak</a></li>
        </ul>
      </div>
    </nav>
