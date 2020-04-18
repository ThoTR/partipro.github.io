<?php
    class Event {
        private $db;

        public function __construct()
        {
            $this->db = new Db_config();
        }

        public function getEvent(){
            $this->db->query("SELECT * FROM users");
            return $this->db->result();
        }
    }