<?php

    class Misurazioni implements JsonSerializable {

        protected $data;
        protected $ora;
        
        public function __construct($data, $ora) {

            $this->data = $data;
            $this->ora = $ora;

        }

        function set_data($data) {
            $this->data = $data;
        }
        
        function get_data() {
            return $this->data;
        }

        function set_ora($ora) {
            $this->ora = $ora;
        }
        
        function get_ora() {
            return $this->ora;
        }

        public function jsonSerialize(){

            $a = [
                "data" => $this->data,
                "ora" => $this->ora,
            ];
            return $a;

        }


    }

?>