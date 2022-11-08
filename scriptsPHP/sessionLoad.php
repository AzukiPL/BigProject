<?php
    class SessionLoad {
        function __construct($homePath)
        {
            $this->homePath = $homePath;
        }

        public function onLoad() {
            session_start();
            if($_SESSION['logged_in']) {
                echo '<script>addMenu("logged");</script>';
            }
            else {
                echo '<script>addMenu("login");</script>';
            }
        }
    }
?>