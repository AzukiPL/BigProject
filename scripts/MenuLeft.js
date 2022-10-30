class MenuLeft {
    constructor (homePath) {
        this.homePath = homePath;
    }
    #setTicketButton() {
        document.write('<a href ="'+this.homePath+'tickets/tickets.php">')
        document.write('<div class="menuLeft">');
        document.write('<img src="'+this.homePath+'graphics/ticket.png">');
        document.write('<div class="hide"><h3>Tickets</h3></div>')
        document.write('</div></a>');
    }

    #setSettingButton() {
        document.write('<div class="menuLeft">');
        document.write('<img src="'+this.homePath+'graphics/setting.png">');
        document.write('<div class="hide"><h3>Setting</h3></div>')
        document.write('</div>');
    }

    setMenuLeft() {
        document.write('<div id="menuLeft" class="noselect">');
        this.#setTicketButton();
        this.#setSettingButton();
        document.write('</div>');
    }
}