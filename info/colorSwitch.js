const toggleSwitch = document.getElementById("themeSwitch");  //pobiera elementy o nazwie themeSwitch
const currentTheme = localStorage.getItem('theme'); //przypisuje wartosc theme z localstorage do zmiennej currentTheme

if (currentTheme) { //jezeli current theme posiada wartosc
  document.documentElement.setAttribute('data-theme', currentTheme); //ustawia data-theme dla CSS o wartosci current theme

  if (currentTheme === 'light') { //jezeli theme = light to ustawia checkboxa z elementu toggleSwitch na true
    toggleSwitch.checked = true;
  }
}

function switchTheme() {
  if (toggleSwitch.checked) { // jezeli pierwszy element toggleSwitch jest zaznaczony to ustawia zmienna data-theme na wartosc light
    document.documentElement.setAttribute('data-theme', 'light');
    localStorage.setItem('theme', 'light'); //zmienia wartosc w localstorage dla zmiennej theme na wartosc light
  }
  else { // w innym wypadku na wartosc dark
    document.documentElement.setAttribute('data-theme', 'dark');
    localStorage.setItem('theme', 'dark'); // zmienia wartosc theme na dark
  }
}
