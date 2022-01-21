<?php

//$json = "{\n    \"FunctionName\": \"getPossibleDiseases\",\n    \"params\": [\n        \"Failure to thrive\"     ]\n}\n";
$json = file_get_contents('php://input');
$data = json_decode($json);

$function_name = $data->{"FunctionName"};
$params = $data->{"params"};

$service = new TunnelService();
$service->access($function_name , $params); //result: ACANTHOSIS NIGRICANS





class TunnelService
{





    function access($FunctionName, $Params)
    {
        $result = array();

        switch($FunctionName)
        {
            case 'getCommand';
				
                $this->getCommand();

                break;
            case 'setConsequence';

                $this->setConsequence($Params);

                break;

            default:
                break;
        }


    }

    function getCommand(){

        $commandFilePath = "command.txt";

        do {
            clearstatcache();

            if(filesize($commandFilePath)) {
    
                $myfile = fopen($commandFilePath, "r");
    
                echo fread($myfile,filesize($commandFilePath));
            }

            sleep(1);

        }while (!filesize($commandFilePath));

        $commandFile = fopen($commandFilePath, "wb");
        fwrite($commandFile, '');



               
    }

    
    function setConsequence($Params)
    {
        
        $path = "consequences.txt";

        $consFile = fopen($path, "wb");
        fwrite($consFile, $Params);

        echo "Succes";

    }



   
}


