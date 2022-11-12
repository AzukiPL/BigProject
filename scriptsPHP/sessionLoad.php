<?php
    class SessionLoad {
        function __construct($homePath)
        {
            $this->homePath = $homePath;
        }

        public function onLoad() {
            if(!empty($_SESSION['logged_in'])) {
                
                if ($_SESSION['permission'] > 5) {
                    include_once('adminPanel.php'); 
                    echo '<link rel="stylesheet" href="'.$this->homePath.'style/adminPanel.css" >';
                }
                echo '<script>addMenu("Profile",1);</script>';
            }
            else {
                echo '<script>addMenu("Login",0);</script>';
            }
        }
    }
?>