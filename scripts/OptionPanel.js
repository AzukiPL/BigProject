class OptionPanel {
    constructor () {

        this.toggleSelect = document.getElementById('themeSelect');
        this.currentTheme = localStorage.getItem('theme');

        this.sizeSelect = document.getElementById('FontSizeSelect');
        this.currentSize = localStorage.getItem('fontSize');
    }

    //------------------------------------------------------------- On Load Panel create ---------------------------------------------------------------

    #onload() { // on load check if theme is declared, to set correct theme on load
        if(this.currentTheme)
            document.documentElement.setAttribute('data-theme', this.currentTheme); 
        if(this.currentSize)
            document.documentElement.setAttribute('data-size', this.currentSize); 
    }
    setOptionPanel() { // creates whole option panel
        document.write('<div id="optionBackground" onclick="oPan.closePanel()"></div>');
        document.write('<div id="optionPanel" class="noselect">');
        this.#onload();
        this.#setCloseButton(); 
        document.write('<div id="options">');
        this.#setThemeSelect();
        this.#setFontSizeSelect();
        this.#setSaveOptionButton();
        document.write('</div>'); //options
        document.write('</div>'); //optionPanel
    }

    //------------------------------------------------------------- Close Button ---------------------------------------------------------------

    #setCloseButton() { // creates close button to close window
        document.write('<div id="close" onclick="oPan.closePanel()">X</div>');
    }

    //------------------------------------------------------------- Theme Button and change Scripts ---------------------------------------------------------------

    #setThemeSelect() { // creates Select of theme options
        document.write('<h3>Theme:</h3>');
        document.write('<select name="theme" id="themeSelect">');
        document.write('<option value="dark">Dark</option>');
        document.write('<option value="light">Light</option>');
        document.write('<option value="dark-contrast">dark contrast</option>');
        document.write('<option value="light-contrast">light contrast</option>');
        document.write('</select><br>');
    }
    
    saveThemeChange () {
        this.#themeInstance('dark');
        this.#themeInstance('light');
        this.#themeInstance('dark-contrast');
        this.#themeInstance('light-contrast');
    }
    
    #themeInstance(name) { // instances that checks which theme is saved
        if (this.toggleSelect.value == name) { 
            document.documentElement.setAttribute('data-theme', name);
            localStorage.setItem('theme', name); 
        }
    }

    //------------------------------------------------------------- Font Size Button and change Scripts ---------------------------------------------------------------

    #setFontSizeSelect() { // creates select of font size
        document.write('<h3>Font Size:</h3>');
        document.write('<select name="FontSize" id="FontSizeSelect">');
        document.write('<option value="small">small</option>');
        document.write('<option value="medium">medium</option>');
        document.write('<option value="large">large</option>');
        document.write('</select><br>');
    }
    
    saveFontSizeChange() {
        this.#fontSizeInstance('small');
        this.#fontSizeInstance('medium');
        this.#fontSizeInstance('large');
    }

    #fontSizeInstance(name) { // instances that checks which theme is saved
        if (this.sizeSelect.value == name) { 
            document.documentElement.setAttribute('data-size', name);
            localStorage.setItem('fontSize', name); 
        }
    }

    //------------------------------------------------------------- Save Changes Button ---------------------------------------------------------------

    #setSaveOptionButton() { // creates button that saves all changes in settings
        document.write('<button onclick="oPan.saveThemeChange(), oPan.saveFontSizeChange()" id="saveButton">Save Changes</button>');
        this.toggleSelect = document.getElementById('themeSelect');
        this.currentTheme = localStorage.getItem('theme');

        this.sizeSelect = document.getElementById('FontSizeSelect');
        this.currentSize = localStorage.getItem('fontSize');
    }
    


    //------------------------------------------------------------- Open and Close Panel ---------------------------------------------------------------

    openPanel() {
        document.getElementById("optionBackground").style.visibility="visible";
        document.getElementById("optionPanel").style.visibility="visible";
    }

    closePanel() {
        document.getElementById("optionBackground").style.visibility="hidden";
        document.getElementById("optionPanel").style.visibility="hidden";
    }
}