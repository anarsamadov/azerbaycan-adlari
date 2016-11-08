<?php
    $string = @file_get_contents("http://data.e-gov.az/api/v1/IEGOVService.svc/GetMeaningOfName/".urlencode($_POST["ad"]));
    $json = json_decode($string, true);

    if($json["fault"]["faultCode"]==0)
    {
        if ($json)
        {
            echo '<div class="panel panel-default">
                <div class="panel-heading"><strong>Axtarılan ad: </strong>'.$_POST["ad"].'</div> 
                <div class="panel-body">';
            foreach ($json as $js)
            {
                echo $json["response"]["name_meaningField"];
            }
            echo '</div></div>';
        }
    }
    else
    {
        echo "Məlumat tapılmadı!";
    }
    