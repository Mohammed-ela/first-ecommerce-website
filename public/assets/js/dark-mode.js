// Vérifie si le mode est déjà stocké dans un cookie lors du chargement de la page
window.addEventListener('load', function() {
    if (getCookie('mode') === 'dark') {
      enableDarkMode(); // Active le mode sombre
      document.getElementById('toggleMode').checked = true; // Coche le bouton toggle
    } else {
      enableLightMode(); // Active le mode clair
      document.getElementById('toggleMode').checked = false; // Décoche le bouton toggle
    }
  });
  
  // Ajoute un gestionnaire d'événement pour le bouton toggle
  document.getElementById('toggleMode').addEventListener('change', function() {
    if (this.checked) {
      enableDarkMode(); // Active le mode sombre
      setCookie('mode', 'dark', 365); // Stocke le mode sombre dans un cookie pendant 365 jours
    } else {
      enableLightMode(); // Active le mode clair
      setCookie('mode', 'light', 365); // Stocke le mode clair dans un cookie pendant 365 jours
    }
  });
  
  // Fonction pour activer le mode sombre
  function enableDarkMode() {
    document.body.classList.add('dark-mode');
  }
  
  // Fonction pour activer le mode clair
  function enableLightMode() {
    document.body.classList.remove('dark-mode');
  }
  
  // Fonction pour obtenir la valeur d'un cookie
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
  
  // Fonction pour définir un cookie
  function setCookie(name, value, days) {
    const date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    const expires = 'expires=' + date.toUTCString();
    document.cookie = name + '=' + value + ';' + expires + ';path=/';
  }
  