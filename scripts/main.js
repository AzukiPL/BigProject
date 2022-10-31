var homePath;
function addMenu(path) {  
    homePath = path;
    const mLeft= new MenuLeft(homePath);
    const mTop = new MenuTop(homePath);
    const oPan = new OptionPanel(homePath);
    mLeft.setMenuLeft();
    mTop.setMenuTop();
    oPan.setOptionPanel();
}
function openPanel() {
    document.getElementById("optionPanel").style.visibility="visible";
}

