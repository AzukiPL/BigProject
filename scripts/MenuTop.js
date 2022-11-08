class MenuTop {
    constructor (homePath) {
        this.homePath = homePath;
    }

    //------------------------------------------------------------- On Load Menu Top create ---------------------------------------------------------------

    setMenuTop(login) { // creates top menu and put all elements on it
        document.write('<div id="menuTop" class="noselect">');
        this.#setLogoImage();
        this.#setTitleText();
        this.#setSearchBar();
        this.#setLoginButton(login);
        document.write('</div>');
    }

    //------------------------------------------------------------- Create Elements of Menu Top ---------------------------------------------------------------

    #setLogoImage() {
        document.write('<a href="'+this.homePath+'index.php">');  
        document.write('<div id="logo">');  
        document.write('<img src="'+this.homePath+'graphics/logo.png">');
        document.write('</div>');
        document.write('</a>');                                   
    }
    #setTitleText() {
        document.write('<a href="'+this.homePath+'index.php">');    
        document.write('<div id="title"><p>Project Cinema<p></div>');
        document.write('</a>');                                   
    }
    #setSearchBar() {
        document.write('<div id="search">');  
        document.write('<form action="'+this.homePath+'/search/index.php" method="POST">');
        document.write('<input type="text" name="keyWords" placeholder="Search Movie">\t');
        document.write('<input type="submit" value="search">');
        document.write('</form>');
        document.write('</div>');
    }
    #setLoginButton(login) {
        document.write('<a href="'+this.homePath+'login/index.php"><div id="loginMenu">');  
        document.write('<input type="button" value="'+login+'">');
        document.write('</div></a>');
    }


}