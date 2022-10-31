class OptionPanel {
    constructor (homePath) {
        this.homePath = homePath;
    }
    openPanel() {
        document.getElementById("optionBackground").style.visibility="visible";
        document.getElementById("optionPanel").style.visibility="visible";
    }
    closePanel() {
        document.getElementById("optionBackground").style.visibility="hidden";
        document.getElementById("optionPanel").style.visibility="hidden";
    }
    

    setOptionPanel() {
        document.write('<div id="optionBackground" onclick="oPan.closePanel()"></div>');
        document.write('<div id="optionPanel">');
        document.write('</div>');
    }
}