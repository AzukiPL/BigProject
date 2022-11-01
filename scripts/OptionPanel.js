class OptionPanel {
    constructor (homePath) {
        this.homePath = homePath;
        this.toggleSelect = document.getElementById('themeSelect');
        this.currentTheme = localStorage.getItem('theme');
    }
    #onload() {
        if(this.currentTheme)
            document.documentElement.setAttribute('data-theme', this.currentTheme);
        
    }
    

    openPanel() {
        document.getElementById("optionBackground").style.visibility="visible";
        document.getElementById("optionPanel").style.visibility="visible";
    }

    closePanel() {
        document.getElementById("optionBackground").style.visibility="hidden";
        document.getElementById("optionPanel").style.visibility="hidden";
    }
    #setCloseButton() {
        document.write('<div id="close" onclick="oPan.closePanel()">X</div>');
    }

    #setThemeSelect() {
        document.write('<h3>Light Theme:</h3>');
        document.write('<select name="theme" id="themeSelect">');
        document.write('<option value="dark">Dark</option>');
        document.write('<option value="light">Light</option>');
        document.write('<option value="dark-contrast">dark contrast</option>');
        document.write('<option value="light-contrast">light contrast</option>');
        document.write('</select>');
        document.write('<button onclick="oPan.themeChange()">set</button>');
        this.toggleSelect = document.getElementById('themeSelect');
        this.currentTheme = localStorage.getItem('theme');
    }
    #themeInstance(name) {
        if (this.toggleSelect.value == name) { 
            document.documentElement.setAttribute('data-theme', name);
            localStorage.setItem('theme', name); 
        }
    }

    themeChange () {
        this.#themeInstance('dark');
        this.#themeInstance('light');
        this.#themeInstance('dark-contrast');
        this.#themeInstance('light-contrast');
    }

    setOptionPanel() {
        this.#onload();
        document.write('<div id="optionBackground" onclick="oPan.closePanel()"></div>');
        document.write('<div id="optionPanel" class="noselect">');
        this.#setCloseButton(); 
        document.write('<div id="options">');
        this.#setThemeSelect();
        document.write('</div>');
        document.write('</div>');
    }
}