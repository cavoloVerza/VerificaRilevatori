<?php

    class RilevatoreTemperatura extends Rilevatore implements JsonSerializable {

        protected $tipologia;
        
        public function __construct($identificativo, $codiceSeriale, $tipologia) {

            $M1 = new Misurazioni("11/02/2023", 18);
            $M2 = new Misurazioni("19/12/2022", 20);
            $M3 = new Misurazioni("24/07/2024", 25);
            $arraymisurazioni = [$M1,$M2,$M3];

            parent:: __construct($identificativo, "°C", $codiceSeriale, $arraymisurazioni);
            $this->tipologia = $tipologia;

        }

        function set_tipologia($tipologia) {
            $this->tipologia = $tipologia;
        }
        
        function get_tipologia() {
            return $this->tipologia;
        }

        public function jsonSerialize(){

            $a = parent:: jsonSerialize();
            $b = [
                "tipologia" => $this->tipologia,
            ];
            return array_merge($a,$b);
        }

    }

?>