var homePath; // Global Variable of home folder path from current page folder
const oPan = new OptionPanel();

function getData(path) {
    homePath = path;
}

function addMenu(login) {
    const mLeft= new MenuLeft(homePath);
    const mTop = new MenuTop(homePath);
    mLeft.setMenuLeft();
    mTop.setMenuTop(login);
    oPan.setOptionPanel();
}
