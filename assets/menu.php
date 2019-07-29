<link rel="stylesheet" href="../css/navbar.css">
<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">
        <img src="https://ctosummit.geekshubs.com/wp-content/uploads/2019/02/logo-cto-summit-1024x216.png"
             alt="">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">

            <?php
              if(isset($_SESSION['email'])){

                if($_SESSION['role'] == "ADMIN"){
                  ?>
                  <a class="nav-item nav-link" href="asistants.php">Ver asistentes</a>
                  <?php
                }
            ?>

            <a class="nav-item nav-link" href="profile.php"><?php echo $_SESSION['email'];?></a>
            
            <?php
              }else{
            ?>

              <a class="nav-item nav-link" href="register.php">Registro</a>
              <a class="nav-item nav-link"  href="login.php">Login</a>
            
            <?php
              }
            ?>
        </div>
    </div>
</nav>