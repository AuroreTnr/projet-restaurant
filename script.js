const containerPlat = document.querySelector(".container-plat-search");
console.log(containerPlat);

const input = document.querySelector(".search-input");


input.addEventListener("input", appelData)

async function appelData() {
    const response = await fetch("./data.json");
    const data = await response.json();
  
  
    createFuse(data);
      
};
  
// Instanciation de fuse.js

function createFuse(data){

    containerPlat.innerHTML ="";

    // instanciation de fuse
    const fuse = new Fuse(data, {keys : ["name", "categorie"]});

    // Renvoie un array Filtre basé sur la valeur entrée dans l' input
    const result = fuse.search(input.value);
    // recuperation de nos items
    const platResult = result.map(result => result.item);

  
    // creation des cards
      platResult.forEach(food => {
      let cardFood = document.createElement("div");
      cardFood.classList.add("col-9");
      cardFood.classList.add("col-md-6");
      cardFood.classList.add("col-lg-3");
      cardFood.classList.add("food-card");
      cardFood.setAttribute("data-key", food.categorie + " " + food.name);
      
      cardFood.innerHTML = `
                  <div class="card mb-3" style="max-width: 540px; min-width: 198px;">
                    <div class="row g-0">
                      <div class="col-md-2">
                        <img src= ${food.image} class="img-fluid rounded-start" alt="burger charolais">
                      </div>
                      <div class="col-md-10">
                        <div class="card-body">
                          <div class="d-flex align-items-baseline justify-content-between align-self-end">
                            <p class="card-text"><small class="text-body-secondary">${food.prix} €</small></p>
                            <div class="btn small border-warning text-dark border-warning text-dark">add <i class="bi bi-plus"></i></div>
                          </div>
                          <h5 class="card-title">${food.name}</h5>
                          <p class="card-text">${food.description}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
    
      `
      containerPlat.appendChild(cardFood);
    
    })

    
}

  






