// import dictonnaire from "dictionary-fr"
// console.log(dictonnaire);









const linkPlat = document.querySelector(".link-plats");
const transfertDonnee = localStorage.categorie;
const input = document.querySelector(".search-input");
const listItem = document.querySelectorAll(".food-card");




//Fonction qui nettoie la chaine de caractère
function nettoyerMot(mot) {
    return mot.replace(/[^a-zA-Z ]/g, '').toLowerCase().trim();
}

//Fonction qui filtre les éléments
function FilterElementDisplay(element, attributRecherche, stringRecherche){
  element.getAttribute(attributRecherche).toLowerCase().includes(stringRecherche) ? element.style.display="" : element.style.display="none";
}

  

// Filtre les éléments en fonction de la valeur entrée dans l input
input.addEventListener("input", filterElementValueFromInput);

function filterElementValueFromInput(){
  
    const mot = this.value;
    let motUtilisateur = nettoyerMot(mot).toLowerCase();

    listItem.forEach(card => {

      FilterElementDisplay(card, "data-key", motUtilisateur)

    });
        
}
// encore la gestion des erreur de saisie de l utilisateur => trouver une bibliotheque facile à implémenter ? ou une méthode ?




// Filtre les éléments en fonction de la valeur du local storage instancier lors du clique effectué sur la page catégorie.
window.addEventListener("load", filterElementValueFromCategorie);

function filterElementValueFromCategorie(){

  // but supprimer le local storage quand on clique sur plat de la nav 
  if (transfertDonnee === undefined) {
    clearLocalStorage();
    return
  }
  
  listItem.forEach(card => {

    FilterElementDisplay(card, "data-key", transfertDonnee);

  })
  
}
// console.log(transfertDonnee);



// but supprimer le local storage quand on clique sur plat de la nav
linkPlat.addEventListener("click", clearLocalStorage);

function clearLocalStorage(e) {
  e.preventDefault();
  listItem.forEach(card =>{
    card.style.display="";
  })
}


//  CLEAR LE LOCAL STORAGE SUR LE FICHIER .JS LA PAGE ACCUEIL;

// https://alexandre.alapetite.fr/doc-alex/alx_special.html

