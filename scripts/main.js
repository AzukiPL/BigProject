const mtop = new MenuTop();

function addMenu(homePath) {    
    document.write('<div id="menuTop" class="noselect">');
        mtop.setLogoImage(homePath);
        mtop.setTitleText(homePath);
        mtop.setSearchBar(homePath);
        mtop.setLoginButton(homePath);
    document.write('</div>');
}