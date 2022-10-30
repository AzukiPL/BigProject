function addMenu(homePath) {  
    const mLeft= new MenuLeft(homePath);
    const mTop = new MenuTop(homePath);
    mLeft.setMenuLeft();
    mTop.setMenuTop();
}