<?php

    use Slim\Factory\AppFactory;

    require __DIR__ . '/vendor/autoload.php';

    spl_autoload_register(function($class){
        
        if(file_exists("./models/$class.php"))
            require_once("./models/$class.php");

        else if(file_exists("./controllers/$class.php"))
            require_once("./controllers/$class.php");

    });


    $app = AppFactory::create();
    

    $app->get('/', 'SiteController:index');
    $app->get('/impianto', 'SiteController:impianto');

    $app->get('/rilevatori_di_umidita', 'RilevatoriController:rilevatoriUmidita');
    $app->get('/rilevatori_di_umidita/{identificativo}', 'RilevatoriController:rilevatoreSearch');
    $app->get('/rilevatori_di_umidita/{identificativo}/misurazioni', 'RilevatoriController:rilevatoreSearchMisurazioni');
    $app->get('/rilevatori_di_umidita/{identificativo}/misurazioni/maggiore_di/{valore_minimo}', 'RilevatoriController:rilevatoreValoreMaggiore');

    $app->post('/rilevatori_di_umidita', 'RilevatoriController:rilevatoreUmiditaPost');
    $app->put('/rilevatori_di_umidita/{identificativo}', 'RilevatoriController:rilevatorePut');

    $app->get('/rilevatori_di_temperatura', 'RilevatoriController:rilevatoriTemperatura');
    $app->get('/rilevatori_di_temperatura/{identificativo}', 'RilevatoriController:rilevatoreSearch');
    $app->get('/rilevatori_di_temperatura/{identificativo}/misurazioni', 'RilevatoriController:rilevatoreSearchMisurazioni');
    $app->get('/rilevatori_di_temperatura/{identificativo}/misurazioni/maggiore_di/{valore_minimo}', 'RilevatoriController:rilevatoreValoreMaggiore');

    $app->post('/rilevatori_di_temperatura', 'RilevatoriController:rilevatoreTemperaturaPost');
    $app->put('/rilevatori_di_temperatura/{identificativo}', 'RilevatoriController:rilevatorePut');

    $app->run();

?>