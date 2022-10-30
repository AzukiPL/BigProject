class MenuTop {
    constructor (homePath) {
        this.homePath = homePath;
    }
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
    #setLoginButton() {
        document.write('<div id="loginMenu">');  
        document.write('<input type="button" value="Login">');
        document.write('</div>');
    }
    setMenuTop() {
        document.write('<div id="menuTop" class="noselect">');
        this.#setLogoImage();
        this.#setTitleText();
        this.#setSearchBar();
        this.#setLoginButton();
        document.write('</div>');
    }

}