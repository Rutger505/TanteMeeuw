<header>
  <div id="img-slider" class="back-bottom">
    <div class="img-slider-container">
      <button id="img-slider-left" class="img-slider-button">
        <div class="margin-left">
          <div class="arrow left"></div>
        </div>
      </button>
      <div>
        <h1 id="img-slider-title">Tante Meeuw</h1>
        <h2 id="img-slider-discription">in je element</h2>
      </div>
      <button id="img-slider-right" class="img-slider-button">
        <div class="margin-right">
          <div class="arrow right"></div>
        </div>
      </button>
    </div>
  </div>
  <nav>
    <ul>
      <li><a class="page-button" href="index.php">Home</a></li>
      <li><a class="page-button" href="deTent.php">De tent</a></li>
      <li><a class="page-button" href="omgeving.php">Omgeving</a></li>
      <li>
        <a class="page-button" href="beschikbaarheid.php">Beschikbaarheid/Prijzen</a>
      </li>
      <li><a class="page-button" href="contact.php">Contact</a></li>
      <li><a class="page-button" href="links.php">links</a></li>
      <li><a class="page-button" href="gasten.php">Gasten</a></li>
      <li><a class="page-button" href="nieuws.php">Nieuws</a></li>
      <li><a class="page-button" href="login.php">Login</a></li>
      <li><a class="page-button" href="admin.php">admin</a></li>
    </ul>
  </nav>
</header>
<?php
if (isset($_SESSION['username'])) {
  echo "logged in as: ";
  echo $_SESSION['username']."<br>";
  var_dump($_SESSION);
} else {
  echo "not logged in";
}
?> 