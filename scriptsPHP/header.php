<?php
    class header {

        function __construct($Path) {
            $this->homePath = $Path;
        }

        public function load() { //Path From current page folder to Home page folder (FROM CURRENT PAGE FOLDER NOT SCRIPT FOLDER!!)    
            echo' <link rel="stylesheet" href="'.$this->homePath.'style/style.css" >';
            echo '<link rel="stylesheet" href="'.$this->homePath.'style/menu.css" >';
            echo '<script lang="JavaScript" src="'.$this->homePath.'scripts/MenuTop.js"></script>';
            echo '<script lang="JavaScript" src="'.$this->homePath.'scripts/MenuLeft.js"></script>';
            echo '<script lang="JavaScript" src="'.$this->homePath.'scripts/OptionPanel.js"></script>';
            echo '<script lang="JavaScript" src="'.$this->homePath.'scripts/main.js"></script>';
            echo '<script>getData("'.$this->homePath.'");</script>';
            include_once('sessionLoad.php');
        }
        public function loadSliderSwitch() {
            echo '<script lang="JavaScript" src="'.$this->homePath.'scripts/SliderSwitch.js"></script>';
            include_once("topSlider.php"); 
            $slider = new TopSlider($this->homePath);
            $slider->setTopSlider();
        }
        public function loadScroller($tagName) {
            include_once('slider.php');
            $scroller = new Slider($this->homePath, $tagName);
            $scroller->setTagSlide();
        }
    }
?>