<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Azərbaycan adlarının mənası</title>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <style type="text/css">
        .container {max-width: 900px;}
    </style>
</head>
<body>
<div class="container">
    <h1>Azərbaycan adlarının mənası</h1>
    <form method="post" action="">
        <div class="panel panel-success">
            <div class="panel-body">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="adı daxil edin.." name="ad">
                    <span class="input-group-btn">
			        <button type="submit" class="btn btn-default" type="button">Axtar!</button>
			      </span>
                </div><!-- /input-group -->
            </div>
        </div>
    </form>


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

    ?>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>
