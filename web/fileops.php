<?php

    if(!empty($_POST['command'])){
    $data = $_POST['command'];
    $fname = "command.txt";//generates random name

    $file = fopen($fname, 'wb');//creates new file
    fwrite($file, $data);
    fclose($file);
    }

    if(!empty($_POST['conseqences'])){
        $data = $_POST['conseqences'];
        $fname = "command.txt";//generates random name
    
        $file = fopen($fname, 'wb');//creates new file
        fwrite($file, $data);
        fclose($file);
        }
    

?>
