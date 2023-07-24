<?php

session_start();

require realpath(dirname(__FILE__, 2) . "/vendor/autoload.php");
use app\files\FilesData;

$files = [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data" action="">
        <P><label for="">SELECIONE O ARQUIVO</label>
        <input name="file" type="file"></P>
        <button type="submit">Salvar</button>
    </form>
    <?php 
        if(isset($_FILES['file'])){ 
            $files = $_FILES['file'];
            $sizeFile = new FilesData($files);
    ?>
        <ul>
            <li><?php echo $sizeFile->sizeFile() ?></li>
            <li><?php echo $files['name']?></li>
            <li><?php echo $files['type']?></li>
        </ul>        
        <?php
        }
        ?>
    </p>
</body>
</html>