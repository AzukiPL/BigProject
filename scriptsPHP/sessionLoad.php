<?php
    class SessionLoad {
        function __construct($homePath)
        {
            $this->homePath = $homePath;
        }

        public function onLoad() {
            if(!empty($_SESSION['logged_in'])) {
                echo '<script>addMenu("Profile",1);</script>';
            }
            else {
                echo '<script>addMenu("Login",0);</script>';
            }
        }
    }
?>