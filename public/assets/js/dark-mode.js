
//lors du chargement de la page
window.addEventListener('load', function() {
  // on recupere le cookie
  const mode = getCookie('mode');

  if (mode === 'dark') {
    // si le cookie a le mode dark
    enableDarkMode();
    document.getElementById('toggleMode').checked = true;
    //si le cookie est vide (par défaut)
  } else {
    //on appel la fonction mode jour
    enableLightMode();
    //le bouton est desactivé
    document.getElementById('toggleMode').checked = false;
  }

  const logo = getCookie('logo');
  if (logo) {
    changeLogo(logo);
  }
});
//si le toggle change
document.getElementById('toggleMode').addEventListener('change', function() {
  // on enregistre les class dans des variable
  const logoElement = document.getElementById('logo');
  let logoSrc = logoElement.getAttribute('src');

  //si c'est activé 
  if (this.checked) {
    //on appel la fonction enabledarkmode()
    enableDarkMode();
    //on ajoute un cookie pour enregistré le mode pour qui soit enregistré pour les autres page
    setCookie('mode', 'dark', 365);
    //on remplace logo.png par logo-dark.png
    logoSrc = logoSrc.replace('logo.png', 'logo-dark.png');
    //on ajoute un cookie pour enregistré le logo pour qu'il soit enregistré dans les autres page
    setCookie('logo', 'logo-dark.png', 365);

  } else {
    enableLightMode();
    setCookie('mode', 'light', 365);
    logoSrc = logoSrc.replace('logo-dark.png', 'logo.png');
    setCookie('logo', 'logo.png', 365);
  }

  logoElement.setAttribute('src', logoSrc);
});

function enableDarkMode() {
  document.body.classList.add('dark-mode');
}

function enableLightMode() {
  document.body.classList.remove('dark-mode');
}

function changeLogo(logo) {
  const logoElement = document.getElementById('logo');
  //pb a réglé ici 
  const logoSrc = "<?=TELECHARGEMENT?>logo/" + logo;
  logoElement.setAttribute('src', logoSrc);
}

function getCookie(name) {
  const cookieName = name + '=';
  const decodedCookie = decodeURIComponent(document.cookie);
  const cookieArray = decodedCookie.split(';');

  for (let i = 0; i < cookieArray.length; i++) {
    let cookie = cookieArray[i];
    while (cookie.charAt(0) === ' ') {
      cookie = cookie.substring(1);
    }
    if (cookie.indexOf(cookieName) === 0) {
      return cookie.substring(cookieName.length, cookie.length);
    }
  }

  return '';
}

function setCookie(name, value, days) {
  const date = new Date();
  date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
  const expires = 'expires=' + date.toUTCString();
  document.cookie = name + '=' + value + ';' + expires + ';path=/';
}
