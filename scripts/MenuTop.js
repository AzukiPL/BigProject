class MenuTop {
    constructor () {

    }
    setLogoImage(homePath) {
        document.write('<a href="'+homePath+'index.html">');  
        document.write('<div class="menuTop">');  
        document.write('<img src="'+homePath+'graphics/logo.png" height=100%>');
        document.write('</div>');
        document.write('</a>');                                   
    }
    setTitleText(homePath) {
        document.write('<a href="'+homePath+'index.html">');    
        document.write('<div class="menuTop"><p>Project Cinema<p></div>');
        document.write('</a>');                                   
    }
    setSearchBar(homePath) {
        document.write('<div class="menuTop" id="search">');  
        document.write('<form action="'+homePath+'/search/index.php" method="POST">');
        document.write('<input type="text" name="keyWords">');
        document.write('<input type="submit" value="search">');
        document.write('</form>');
        document.write('</div>');
    }
    setLoginButton(homePath) {
        document.write('<div id="loginMenu" class="menuTop">');  
        document.write('<button>Login</button>');
        document.write('</div>');
    }


}