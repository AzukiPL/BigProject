<!-- <?php include_once("header.php"); load(""); ?> -->
<?php
    function load($homePath) {
        echo' <link rel="stylesheet" href="'.$homePath.'style/style.css" >';
        echo '<link rel="stylesheet" href="'.$homePath.'style/menu.css" >';
        echo '<script lang="JavaScript" src="'.$homePath.'scripts/MenuTop.js"></script>';
        echo '<script lang="JavaScript" src="'.$homePath.'scripts/MenuLeft.js"></script>';
        echo '<script lang="JavaScript" src="'.$homePath.'scripts/OptionPanel.js"></script>';
        echo '<script lang="JavaScript" src="'.$homePath.'scripts/main.js"></script>';
    }
?>