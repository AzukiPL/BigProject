var homePath;
const oPan = new OptionPanel(homePath);

function addMenu(path) {  
    homePath = path;
    const mLeft= new MenuLeft(homePath);
    const mTop = new MenuTop(homePath);
    
    mLeft.setMenuLeft();
    mTop.setMenuTop();
    oPan.setOptionPanel();
}

