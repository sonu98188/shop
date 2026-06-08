<?php
session_start();
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">C4U SHOP</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="#">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">About us</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Contact us</a>
        </li>
      </ul>

      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search">

        <?php
        if(isset($_SESSION['user_email']))
        {
        ?>

            <a href="./php/logout.php" class="btn btn-danger" id="logout_btn">
                Logout
            </a>
        <?php
        }
        else
        {
        ?>
            <button type="button" class="btn btn-outline-primary" id="signup_btn">
                Signup
            </button>
        <?php
        }
        ?>
      </form>

    </div>
  </div>
</nav>