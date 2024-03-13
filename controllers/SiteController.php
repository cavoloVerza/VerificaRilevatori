<?php

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;

    class SiteController {

        function index (Request $request, Response $response, $args) {

            $response->getBody()->write("Hello World!");
            return $response;
        }

        function impi (Request $request, Response $response, $args) {
            
            $impianto = new Impianto("Pippo", "10", "20");

            $response->getBody()->write(json_encode($impianto));
            return $response;
        }

    }

?>