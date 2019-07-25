<?php
require_once __DIR__.'/../vendor/autoload.php';
  use Geeks\controller\Autenticacion as Auth;

  $auth = new Auth();
  $error = null;

  if(isset($_POST['action'])){
    if($_POST['action'] == 'register'){
      $age = null;

      //Comprobacion de campos
      if(strlen($_POST['email']) == 0){
        $error = "Faltan campos";
      }else if(strlen($_POST['name']) == 0){
        $error = "Faltan campos";
      }else if(strlen($_POST['surnames']) == 0){
        $error = "Faltan campos";
      }else if(strlen($_POST['company']) == 0){
        $error = "Faltan campos";
      }else if(strlen($_POST['age']) ==0 || $age = intval($_POST['age']) <= 0){
        $error = "La edad debe ser un valor númerico y positivo.";
      }else if(strlen($_POST['password']) == 0){
        $error = "Faltan campos";
      }else if(strlen($_POST['passwordConfirm']) == 0){
        $error = "Faltan campos";
      }else if($_POST['password'] != $_POST['passwordConfirm']){
        $error = "Las contraseñas no coinciden";
      }else{
        //Registramos el usuario

        $age = intval($_POST['age']);

        $userRegistered = $auth -> register(
          $_POST['email'],
          $_POST['name'],
          $_POST['surnames'],
          $_POST['company'],
          $age,
          $_POST['genre'],
          $_POST['password']
        );

        if($userRegistered == 1){
          header("Location: index.php");
        }else{
          $error = "Fallo en el registro: " . $userRegistered;
        }
      }
    }
  }
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
    <title>Register</title>
</head>

<body>
    <?php
        include __DIR__.'/../assets/menu.php';
    ?>

    <form action="register.php" name="register" method="post">
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" aria-describedby="emailHelp" name="email"
                placeholder="Introduce email">
        </div>

        <div class="form-group">
            <label>Nombre</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name="name"
                placeholder="Introduce nombre">
        </div>

        <div class="form-group">
            <label>Apellidos</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name="surnames"
                placeholder="Introduce apellidos">
        </div>

        <div class="form-group">
            <label>Edad</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name="age"
                placeholder="Introduce edad">
        </div>

        <div class="form-group">
            <label>Empresa</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name="company"
                placeholder="Introduce empresa">
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Género</label>
            <select class="form-control" name="genre">
                <option>Hombre</option>
                <option>Mujer</option>
            </select>
        </div>

        <div class="form-group">
            <label>Contraseña</label>
            <input type="password" class="form-control" name="password" placeholder="Introduce contraseña">
        </div>

        <div class="form-group">
            <label>Confirmar contraseña</label>
            <input type="password" class="form-control" name="passwordConfirm" placeholder="Confirma la contraseña">
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
          <button type="submit" class="btn btn-primary" name="action" value="register">Registrar</button>
        </div>
    </form>

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