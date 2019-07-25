<?php
require_once __DIR__.'/../vendor/autoload.php';
use Geeks\controller\Autenticacion as Auth;

$a=new Auth();

$error=null;

    if(isset($_POST)&&count($_POST)>0)
    {
        if($_POST["action"]=="register"){
            $error=$a->registrar($_POST);
        }elseif($_POST["action"]=="login"){
            $error=$a->logar($_POST);
            if($error==null){
                header('Location: reto1.php');
            }
        }
    }
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
    <title>CTO SUMMIT</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <?php
        include __DIR__.'/../assets/menu.php';
    ?>

    <div class="main">
        <img src="https://eventosemprendedores.com/wp-content/uploads/2019/06/GeeksHubs-CTO-Summit-Valencia-2019.png"
            alt="">

        <div class="resume">
            <div class="fakebg"></div>

            <span>2 DAYS</span>
            <span>400 PARTICIPANTS</span>
            <span>25 SPEAKERS</span>
        </div>

        <div class="thanks">
            <span>Thank you all for your suppport!</span>

            <div class="sponsors">
                <img src="https://ctosummit.geekshubs.com/wp-content/uploads/2019/06/seat-white.svg" alt="">
                <img src="https://ctosummit.geekshubs.com/wp-content/uploads/2019/06/alfatec.svg" alt="">
                <img src="https://ctosummit.geekshubs.com/wp-content/uploads/2019/06/inter-blanco.svg" alt="">
            </div>
        </div>
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