<?php
    require_once "karyawan.php";

    class Parttime extends Employee {
        public $status = "Part time";

        function get_status() {
            return $this->status;
        }

        function get_gaji() {
            if($this->level == "Junior") {
                return 2000000/2;
            } else if($this->level == "Amateur") {
                return 3500000/2;
            } else if($this->level == "Senior") {
                return 5000000/2;
            }
        }
    }
?>