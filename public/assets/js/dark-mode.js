window.addEventListener('load', function() {
  const mode = getCookie('mode');

  if (mode === 'dark') {
    enableDarkMode();
    document.getElementById('toggleMode').checked = true;
  } else {
    enableLightMode();
    document.getElementById('toggleMode').checked = false;
  }

  const logo = getCookie('logo');
  if (logo) {
    changeLogo(logo);
  }
});

document.getElementById('toggleMode').addEventListener('change', function() {
  const logoElement = document.getElementById('logo');
  let logoSrc = logoElement.getAttribute('src');

  if (this.checked) {
    enableDarkMode();
    setCookie('mode', 'dark', 365);
    logoSrc = logoSrc.replace('logo.png', 'logo-dark.png');
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
