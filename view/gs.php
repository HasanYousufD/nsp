<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="shortcut icon" href="assets/logo/gs.png">
<title>Hello, Developer!</title>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card">
    <a href="<?php route('home');?>" class="w3-bar-item w3-button"><b>GS</b> Architecture</a>
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="#projects" class="w3-bar-item w3-button">Projects</a>
      <a href="#about" class="w3-bar-item w3-button">About</a>
      <?php if(isset($_SESSION['password'])){
        ?>
          <a href="<?php route('dashboard');?>" class="w3-bar-item w3-button">dashboard</a>
          
          <?php
          } ?>
      <a href="demos/signup-form-09/" class="w3-bar-item w3-button">Connect</a>
      <a href="demos/login-form-09/" class="w3-bar-item w3-button">Get In</a>
    </div>
  </div>
</div>

<!-- Header -->


<!-- Footer -->
<footer class="w3-center w3-black w3-padding-16">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>

</body>
</html>
