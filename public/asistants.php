<?php
require_once __DIR__.'/../vendor/autoload.php';
use Geeks\controller\Autenticacion as Auth;

//Abrimos la sesion
$auth=new Auth();

if(isset($_GET['deleteId'])){
    $auth -> deleteAsistant($_GET['deleteId']);
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

    <title>Asistentes</title>
</head>

<body>
    <?php
    include __DIR__ . '/../assets/menu.php';
    ?>

    <div class="asistants">
        <h1>ASISTENTES - CTO SUMMIT 2019</h1>

        <div class="asistantsList">
                <div class="asistant asistantHeader">
                    <span>TICKET</span>
                    <span>NOMBRE</span>
                    <span>EMAIL</span>
                    <span>EDAD</span>
                    <span>GÉNERO</span>
                    <span>EMPRESA</span>
                    <!-- <span>USUARIO/ADMIN</span> -->
                    <span>ACCIONES</span>
                </div>
            <?php
                foreach ($auth->getAsistants() as $asistant) {
                    if($asistant['email'] != "admin"){
            ?>
                <div class="asistant">
                    <span>#<?php echo $asistant['id'] ?></span>
                    <span><?php echo $asistant['name'] . " " . $asistant['surnames']?></span>
                    <span><?php echo $asistant['email'] ?></span>
                    <span><?php echo $asistant['age'] ?></span>
                    <span><?php echo $asistant['genre'] ?></span>
                    <span><?php echo $asistant['company'] ?></span>
                    <!-- <span><?php echo $asistant['role'] ?></span> -->
                    <a href="asistants.php?deleteId=<?php echo $asistant['id']?>">
                        <img src="https://images.vexels.com/media/users/3/128556/isolated/preview/85f5b98f0add824f50e0ec19316c1e6b-reciclaje-de-basura-symbol2-svg-by-vexels.png" alt="">
                    </a>
                </div>
            <?php     
                    }  
                }
            ?>
        </div>
    </div>
</body>

</html>