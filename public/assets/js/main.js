window.onload = function(){


var badgeElement = document.getElementById('panier-badge');
var valeurSpan = badgeElement.innerText;

nombreArticles = valeurSpan;
    // Ajouter une classe 'two-digits' si le nombre est à deux chiffres
    if (nombreArticles >= 10 && nombreArticles <= 99) {
        badgeElement.classList.add('two-digits'); // Utilisation de classList.add()
    } else {
        badgeElement.classList.remove('two-digits'); // Utilisation de classList.remove()
    }
    
    // Ajouter une classe 'three-digits' si le nombre est à trois chiffres
    if (nombreArticles >= 100 && nombreArticles <= 999) {
        badgeElement.classList.add('three-digits'); // Utilisation de classList.add()
    } else {
        badgeElement.classList.remove('three-digits'); // Utilisation de classList.remove()
    }

}