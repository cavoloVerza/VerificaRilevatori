<?php

    class Misurazioni implements JsonSerializable {

        protected $data;
        protected $valore;
        
        public function __construct($data, $valore) {

            $this->data = $data;
            $this->valore = $valore;

        }

        function set_data($data) {
            $this->data = $data;
        }
        
        function get_data() {
            return $this->data;
        }

        function set_valore($valore) {
            $this->valore = $valore;
        }
        
        function get_valore() {
            return $this->valore;
        }

        public function jsonSerialize(){

            $a = [
                "data" => $this->data,
                "valore" => $this->valore,
            ];
            return $a;

        }


    }

?>