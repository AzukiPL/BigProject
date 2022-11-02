var homePath; // Global Variable of home folder path from current page folder
const oPan = new OptionPanel();
function addMenu(path) {
    homePath = path;
    const mLeft= new MenuLeft(homePath);
    const mTop = new MenuTop(homePath);
    mLeft.setMenuLeft();
    mTop.setMenuTop();
    oPan.setOptionPanel();
}

