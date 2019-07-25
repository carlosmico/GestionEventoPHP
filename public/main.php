<?php
require_once __DIR__.'/../vendor/autoload.php';
use Geeks\controller\Autenticacion as Auth;

$auth=new Auth();
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
        include __DIR__.'/../assets/menu.php';3
    ?>


   <div class="mainContent">
       <div class="leftTime">
           <h2>⌛ Faltan 3 días ⌛</h2>
       </div>

       <div>
            <span>#CTOSummit2019</span>
            <a href="imprimirTicket.php?ticket=<?php echo $_SESSION['id']?>" target="blank">
                <span>Imprime tu ticket</span>
            </a>
       </div>
   </div>
</body>

</html>