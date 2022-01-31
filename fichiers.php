<?php


$contents = file_get_contents('./index.php');

if ($contents !== false){
    echo $contents;
}

if (isset($_FILES['user']) && $_FILES['user']['error'] === 0){
    $allowedMimeType = ['text/plain', 'image/jpeg', 'image/jpg'];
    if (in_array($_FILES['user']['type'], $allowedMimeType)){
        $maxSize = 2 * 1024 * 1024;
        if ((int)$_FILES['user']['size'] <= $maxSize){
            $tmp_name = $_FILES['user']['tmp_name'];

            $name = $_FILES['user']['name'];

            move_uploaded_file($tmp_name, $name);
        }
        else{
            echo "Le poid du fichier est trop élevé, vous ne pouvez upluoader des fichier que de moi de 3MO" . $contents;
        }
    }
    else{
        echo "vous avez fournis un mauvais type de fichiers";
    }
}
else{
    echo "Une erreur s'est produite en uploadant votre fichiers";
}

