class MenuLeft {
    constructor (homePath) {
        this.homePath = homePath;
    }
    
    //------------------------------------------------------------- On Load Menu Left create ---------------------------------------------------------------

    setMenuLeft() { // creates Left menu and puts all elements on it
        document.write('<div id="menuLeft" class="noselect">');
        this.#setBackTopButton();
        this.#setHomeButton();
        this.#setRepertoireButton();
        this.#setSettingButton();
        document.write('</div>');
    }

    //------------------------------------------------------------- Create Elements of menu Left ---------------------------------------------------------------

    #setBackTopButton() {
        document.write('<a href ="#">');
        document.write('<div class="menuLeft">');
        document.write('<img src="'+this.homePath+'graphics/arrow.png">');
        document.write('<div class="hide"><h3>Scroll Top</h3></div>');
        document.write('</div></a>');
    }
    #setHomeButton() {
        document.write('<a href ="'+this.homePath+'index.php">');
        document.write('<div class="menuLeft">');
        document.write('<img src="'+this.homePath+'graphics/home.png">');
        document.write('<div class="hide"><h3>Home</h3></div>');
        document.write('</div></a>');
    }
    #setRepertoireButton() {
        document.write('<a href ="'+this.homePath+'repertoire/index.php">');
        document.write('<div class="menuLeft">');
        document.write('<img src="'+this.homePath+'graphics/repertoire.png">');
        document.write('<div class="hide"><h3>Repertoire</h3></div>');
        document.write('</div></a>');
    }

    #setSettingButton() {
        document.write('<div class="menuLeft" onclick="oPan.openPanel()">');
        document.write('<img src="'+this.homePath+'graphics/acces.png">');
        document.write('<div class="hide"><h3>Accesibility</h3></div>');
        document.write('</div>');
    }


}