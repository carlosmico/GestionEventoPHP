<?php
require_once __DIR__.'/../vendor/autoload.php';
use Geeks\controller\Autenticacion as Auth;

//Abrimos la sesion
$auth=new Auth();

$error = null;

$user = $auth -> getUser($_SESSION['id'])[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">

    <title>Profile</title>
</head>

<body>
    <?php
        include __DIR__.'/../assets/menu.php';
    ?>
    <div class="profile">
        <p>Ticket:</p>
        <div class="ticket">
            <span class="number">#<?php echo $_SESSION['id'];?></span>
        </div>

        <form class="profileForm" action="profile.php" method="post">
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Introduce email"
                    value="<?php echo $user['email'];?>">
            </div>

            <div class="form-group">
                <label>Nombre</label>
                <input type="text" class="form-control" name="name" placeholder="Introduce nombre"
                    value="<?php echo $user['name'];?>">
            </div>

            <div class="form-group">
                <label>Apellidos</label>
                <input type="text" class="form-control" name="surnames" placeholder="Introduce apellidos"
                    value="<?php echo $user['surnames'];?>">
            </div>

            <div class="form-group">
                <label>Edad</label>
                <input type="text" class="form-control" name="age" placeholder="Introduce edad"
                    value="<?php echo $user['age'];?>">
            </div>

            <div class="form-group">
                <label>Empresa</label>
                <input type="text" class="form-control" name="company" placeholder="Introduce empresa"
                    value="<?php echo $user['company'];?>">
            </div>

            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" class="form-control" name="password" placeholder="Introduce contraseña">
            </div>

            <?php
            if ($error != null) {
                    ?>
            <div class="alert alert-danger" role="alert">
                <?=$error?>
            </div>
            <?php                         
                      }
            ?>

            <div>
                <button type="submit" class="btn btn-primary" name="action" value="update">Guardar</button>
            </div>
        </form>

        <a href="logout.php" class="logout">
            Logout
        </a>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

</body>

</html>