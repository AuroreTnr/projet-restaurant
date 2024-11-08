// implémentation de Fuse.js

// 1. Créer un tableau de tes éléments (plats)
const plats = [
  {id: 1, name: 'burger charolais'},
  {id: 2, name: 'cheesburger'},
  {id: 3, name: 'classique'},
];

// 2. Initialiser Fuse.js avec les options de configuration
const options = {
  keys: ['name'],
  includeScore: true,
  threshold: 0.3
};
const fuse = new Fuse(plats, options);

// à étudier









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

    // Afficher en fonction de la presence ou non de la key categorie dans ler local storage.
    if (localStorage.getItem("categorie")) {
      listItem.forEach(card => {

        FilterElementDisplay(card, "data-key", transfertDonnee);
      })
  
    }else {
      listItem.forEach(card => {
        card.style.display="";
      })
    }
    
  
  }



// Clear le local storage au clique du lien plat afin d afficher tous les plats. Sans créer de bug lié au local storage.
linkPlat.addEventListener("click", clearLocalStorage);

function clearLocalStorage() {
  localStorage.removeItem("categorie");

  listItem.forEach(card => {
    card.style.display="";
  });
}



// https://alexandre.alapetite.fr/doc-alex/alx_special.html

