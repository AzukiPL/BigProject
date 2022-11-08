class MenuTop {
    constructor (homePath) {
        this.homePath = homePath;
    }

    //------------------------------------------------------------- On Load Menu Top create ---------------------------------------------------------------

    setMenuTop(login, isLoggedIn) { // creates top menu and put all elements on it
        document.write('<div id="menuTop" class="noselect">');
        this.#isLogged(login,isLoggedIn);
        document.write('</div>');
    }

    #isLogged(login, isLoggedIn) {
        if(!isLoggedIn) {
            document.write('<table><tr><td width="50px">');
            this.#setLogoImage(); document.write('</td><td width="140px">');
            this.#setTitleText(); document.write('</td><td width="1200px">');
            this.#setSearchBar(); document.write('</td><td width="150px">');
            this.#setLoginButton(login); 
            document.write('</td>');
        }
        else {
            document.write('<table><tr><td width="50px">');
            this.#setLogoImage(); document.write('</td><td width="140px">');
            this.#setTitleText(); document.write('</td><td width="1200px">');
            this.#setSearchBar(); document.write('</td><td width="105px">');
            document.write('</td><td width="45px">');
            this.#setAccountSetting();
            document.write('</td>');
        }
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
    #setAccountSetting() {
            document.write('<div id="accountSettings">');
            document.write('<a href="'+this.homePath+'login/profile.php"><button class="accSetting hide">Profile</button></a>');
            document.write('<img src="'+this.homePath+'graphics/setting.png">');
            document.write('<a href="'+this.homePath+'login/logout.php"><button class="accSetting hide">Log Out</button></a>');
            document.write('</div>');
        }

    #setLoginButton(login) {
        document.write('<a href="'+this.homePath+'login/index.php"><div id="loginMenu">');  
        document.write('<input type="button" value="'+login+'">');
        document.write('</div></a>');
    }


}