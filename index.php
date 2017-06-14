<?php
require_once '../connect_db.php';
$site = "domu.php";
if(isset($_GET["site"])){
    switch ($_GET["site"]){
        case "vyrobci":
            $site ="vyrobci.php";
            break;
        case "motorovepily":
            $site = "motorovepily.php";
            break;
        default:
            $site = "index.php";  
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    
    <body>
        <ul>
            <li><a href="index.php">Domu</a></li>
            <li><a href="index.php?site=vyrobci">Vyrobci</a></li>
            <li><a href="index.php?site=motorovepily">Motorove Pily</a></li>
            
        </ul>
        <?php
        include_once $site;
        ?>
    </body>
</html>