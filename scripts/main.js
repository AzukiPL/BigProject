var homePath; // Global Variable of home folder path from current page folder
const oPan = new OptionPanel();

function getData(path) {
    homePath = path;
}

function addMenu(login, isLoggedIn) {
    const mLeft= new MenuLeft(homePath);
    const mTop = new MenuTop(homePath);
    mLeft.setMenuLeft();
    mTop.setMenuTop(login, isLoggedIn);
    oPan.setOptionPanel();
}
