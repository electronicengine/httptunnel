<?php

    $commandFilePath = "consequences.txt";

    clearstatcache();

    if(filesize($commandFilePath)) {

        $myfile = fopen($commandFilePath, "r");

        echo fread($myfile,filesize($commandFilePath));
    }

    $commandFile = fopen($commandFilePath, "wb");
    fwrite($commandFile, '');

?>
