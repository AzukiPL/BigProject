<?php
    class footer {
        function __construct($homePath) {
            $this->homePath = $homePath;
        }

        public function createFooter() {
            ?>
                <div id="footer">
                    Author: Maciej Wojtkiewicz<br>
                    Contact: nie ma.<br>
                    Pozdrawiam<br>
                    P.S. z dobrej strony sie nie wychodzi.<br>
                </div>
            <?php
        }
    }
?>