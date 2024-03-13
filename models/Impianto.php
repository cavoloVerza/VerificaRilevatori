<?php

    class Impianto implements JsonSerializable {

        protected $nome;
        protected $latitudine;
        protected $longitudine;
        protected $arrayRilevatori = [];
        
        public function __construct($nome, $latitudine, $longitudine) {

            $this->nome = $nome;
            $this->latitudine = $latitudine;
            $this->longitudine = $longitudine;

            $R1 = new RilevatoreTemperatura(1, 001, "acqua");
            $R2 = new RilevatoreTemperatura(2, 002, "aria");
            $R3 = new RilevatoreUmidita(3, 003, "acqua");
            $R3 = new RilevatoreUmidita(4, 004, "aria");

            $this->arrayRilevatori = [$R1,$R2,$R3];

        }

        function set_nome($nome) {
            $this->nome = $nome;
        }
        
        function get_nome() {
            return $this->nome;
        }

        function set_latitudine($latitudine) {
            $this->latitudine = $latitudine;
        }
        
        function get_latitudine() {
            return $this->latitudine;
        }

        function set_longitudine($longitudine) {
            $this->longitudine = $longitudine;
        }
        
        function get_longitudine() {
            return $this->longitudine;
        }

        public function jsonSerialize(){

            $a = [
                "nome" => $this->nome,
                "latitudine" => $this->latitudine,
                "longitudine" => $this->longitudine,
                "rilevatori" => $this->arrayRilevatori,
            ];
            return $a;
        }

        function get_temperatura() {

            $array = [];
            foreach($this->arrayRilevatori as $i) {

                if ($i->get_unitaMisura() == "°C") {
                    array_push($array, $i);
                }

            }

            return $array;

        }

        function get_umidita() {

            $array = [];
            foreach($this->arrayRilevatori as $i) {

                if ($i->get_unitaMisura() == "%") {
                    array_push($array, $i);
                }
            }

            return $array;

        }

        function search($id) {

            $R = "";
            foreach($this->arrayRilevatori as $i) {

                if ($i->get_identificativoa() == $ide) {
                    $R = $i;
                }
            }

            return $R;

        }

    }

?>