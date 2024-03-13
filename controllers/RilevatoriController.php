<?php

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;

    class RilevatoriController {

        function rilevatoriUmidita (Request $request, Response $response, $args) {
            $impianto = new Impianto("Pippo", "10", "20");

            $response->getBody()->write(json_encode($impianto->get_umidita()));
            return $response;
        }

        function rilevatoriTemperatura (Request $request, Response $response, $args) {
            $impianto = new Impianto("Pippo", "10", "20");

            $response->getBody()->write(json_encode($impianto->get_temperatura()));
            return $response;
        }

        function rilevatoreSearch (Request $request, Response $response, $args){
            $impianto = new Impianto("Pippo", "10", "20");
            
            $response->getBody()->write(json_encode($impianto->search($args)));
            return $response;

        }

    }

?>