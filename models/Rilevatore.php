<?php

    class Rilevatore implements JsonSerializable {

        protected $identificativo;
        protected $arraymisurazioni = [];
        protected $unitaMisura;
        protected $codiceSeriale;
        
        public function __construct($identificativo, $unitaMisura, $codiceSeriale, $arraymisurazioni) {

            $this->identificativo = $identificativo;
            $this->unitaMisura = $unitaMisura;
            $this->codiceSeriale = $codiceSeriale;
            $this->arraymisurazioni = $arraymisurazioni;

        }

        function set_identificativo($identificativo) {
            $this->identificativo = $identificativo;
        }
        
        function get_identificativo() {
            return $this->identificativo;
        }

        function set_unitaMisura($unitaMisura) {
            $this->unitaMisura = $unitaMisura;
        }
        
        function get_unitaMisura() {
            return $this->unitaMisura;
        }

        function set_codiceSeriale($codiceSeriale) {
            $this->codiceSeriale = $codiceSeriale;
        }
        
        function get_codiceSeriale() {
            return $this->codiceSeriale;
        }

        function get_misurazioni() {

            return $this->arraymisurazioni;
        }

        public function jsonSerialize(){

            $a = [
                "identificativo" => $this->identificativo,
                "unitaMisura" => $this->unitaMisura,
                "codiceSeriale" => $this->codiceSeriale,
                "arraymisurazioni" => $this->arraymisurazioni,
            ];
            return $a;
        }

        function get_ValoreMaggiore($max) {

            $array = [];

            foreach($this->arraymisurazioni as $i) {

                if ($i->get_valore() > $max) {
                    array_push($array, $i);
                }
            }

            return $array;

        }

    }

?>