<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="<?php echo $css_framework;?>" rel="stylesheet" >

    <link rel="shortcut icon" href="assets/logo/gs.png">

    <title>Hello, Developer!</title>
  </head>
  <body style="background-color:#f2f2f2">

  <nav class="navbar navbar-expand-lg navbar-light mx-5 px-5 " style="background-color:#f2f2f2">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="d-flex bd-highlight mb-3">
        
        <div class="ms-auto p-2 bd-highlight mx-3">
          <ul class="navbar-nav  mb-2 mb-lg-0 ">
            
            <?php if(isset($_SESSION['password'])){ ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-dark text" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php 
              echo $_SESSION['name'];
              ?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="<?php dashboard();?>">Dashboard</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="<?php route('log_out');?>">Log Out</a></li>
              </ul>
            </li>
            <?php }else{ ?>
              <a class="navbar-brand" href="<?php route('sign_in');?>">Log in</a>
              <?php }?>
            
          </ul>
        </div>
      </div>
    </div>
  </nav>
