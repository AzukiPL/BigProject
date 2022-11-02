class MenuLeft {
    constructor (homePath) {
        this.homePath = homePath;
    }
    
    setMenuLeft() { // creates Left menu and puts all elements on it
        document.write('<div id="menuLeft" class="noselect">');
        this.#setBackTopButton();
        this.#setHomeButton();
        this.#setTicketButton();
        this.#setSettingButton();
        document.write('</div>');
    }

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

    #setTicketButton() {
        document.write('<a href ="'+this.homePath+'tickets/tickets.php">');
        document.write('<div class="menuLeft">');
        document.write('<img src="'+this.homePath+'graphics/ticket.png">');
        document.write('<div class="hide"><h3>Tickets</h3></div>');
        document.write('</div></a>');
    }

    #setSettingButton() {
        document.write('<div class="menuLeft" onclick="oPan.openPanel()">');
        document.write('<img src="'+this.homePath+'graphics/setting.png">');
        document.write('<div class="hide"><h3>Setting</h3></div>');
        document.write('</div>');
    }


}