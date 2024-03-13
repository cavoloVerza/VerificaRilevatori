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
            
            $response->getBody()->write(json_encode($impianto->search($args["identificativo"])));
            return $response;
        }

        function rilevatoreSearchMisurazioni (Request $request, Response $response, $args) {
            $impianto = new Impianto("Pippo", "10", "20");
            $R = $impianto->search($args["identificativo"]);

            $response->getBody()->write(json_encode($R->get_misurazioni()));
            return $response;
        }

        function rilevatoreValoreMaggiore (Request $request, Response $response, $args){
            $impianto = new Impianto("Pippo", "10", "20");
            $R = $impianto->search($args["identificativo"]);

            $response->getBody()->write(json_encode($R->get_ValoreMaggiore($args["valore_minimo"])));
            return $response;
        }

        function rilevatoreUmiditaPost (Request $request, Response $response, $args) {

            $body = $request->getBody()->getContents();
            $params = json_decode($body, true);

            $rilevatore = new RilevatoreUmidita($params["identificativo"], $params["codiceSeriale"], $params["tipologia"]);

            $response->getBody()->write(json_encode($rilevatore));
            return $response->withHeader("Content-Type", "application/json")->withStatus(201);

        }

        function rilevatoreTemperaturaPost (Request $request, Response $response, $args) {

            $body = $request->getBody()->getContents();
            $params = json_decode($body, true);

            $rilevatore = new RilevatoreTemperatura ($params["identificativo"], $params["codiceSeriale"], $params["tipologia"]);

            $response->getBody()->write(json_encode($rilevatore));
            return $response->withHeader("Content-Type", "application/json")->withStatus(201);

        }

        function rilevatorePut (Request $request, Response $response, $args) {
            $impianto = new Impianto("Pippo", "10", "20");

            $body = $request->getBody()->getContents();
            $params = json_decode($body, true);

            $rilevatore = $impianto->search($args["identificativo"])

            $rilevatore->set_identificativo($params["identificativo"]);
            $rilevatore->set_codiceSeriale($params["codiceSeriale"]);
            $rilevatore->set_tipologia($params["tipologia"]);

            $response->getBody()->write(json_encode());
            return $response->withHeader("Content-Type", "application/json")->withStatus(204);

        }

    }

?>