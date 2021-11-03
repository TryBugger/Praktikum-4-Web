<?php
    abstract class Employee {
        protected $nama;
        protected $ttl;
        protected $gender;
        protected $level;
        protected $status;

        function __construct($nama, $ttl, $gender) {
            $this->nama = $nama;
            $this->ttl = $ttl;
            $this->gender = $gender;
        }

        abstract function get_status();
        abstract function get_gaji();

        function set_level($level) {
            $this->level = $level;
        }

        function get_level() {
            return $this->level;
        }

        function get_nama() {
            return $this->nama;
        }

        function get_ttl() {
            return $this->ttl;
        }

        function get_gender() {
            return $this->gender;
        }
    }
?>