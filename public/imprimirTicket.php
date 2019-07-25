<?php
require_once __DIR__.'/../vendor/autoload.php';
use Geeks\controller\Autenticacion as Auth;

$auth=new Auth();

$user = $auth->getUser($_SESSION['id'])[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon"
        href="https://ctosummit.geekshubs.com/wp-content/uploads/2019/02/logo-cto-summit-1024x216.png"
        type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TICKET</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <div class="printTicket">
        <div class="ticket">
            <span class="number">#<?php echo $user['id'];?></span>
        </div>

        <div class="personalData">
            <p>Nombre: <span><?php echo $user['name'];?></span></p>
            <p>Apellidos: <span><?php echo $user['surnames'];?></span></p>
            <p>Email: <span><?php echo $user['email'];?></span></p>
            <p>Empresa: <span><?php echo $user['company'];?></span></p>
        </div>
    </div>
</body>

</html>