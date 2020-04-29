<?php
    class Data {
        public $database;
        public $table;
       
        function __construct($database, $table) {
            $this->database = $database;
            $this->table = $table;
        }

        function setDatabase($database) {
            $this->database = $database;
        }

        function getDatabase() {
            return $this->database;
        }

        function setTable($table) {
            $this->table = $table;
        }

        function getTable() {
            return $this->table;
        }
    }
?>