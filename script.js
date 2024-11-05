const input = document.querySelector(".search-input");
const cards = document.querySelectorAll(".main-card");
const nameFood = document.querySelectorAll(".name-food");


input.addEventListener("input", filterItems);

function filterItems() {
    const filter = this.value.toLowerCase();
    console.log(filter);



    nameFood.forEach(nameFood => {

        console.log(nameFood.textContent);

        let found = false;

        if (nameFood.textContent.toLowerCase().includes(filter)) {
            found = true;
        }

        cards.forEach(card => {
            card.style.display = found ? '' : 'none'
        })




        // let valeur = found ? console.log("ok") : console.log("pas ok");



        // cards.style.display = found ? '' : 'none';
    });
}



// Filtrer les éléments de la liste
// input.addEventListener('input', filterItems);

// function filterItems() {
//     const filter = this.value.toLowerCase();
//     const rows = tableBody.querySelectorAll('tr');

//     rows.forEach(row => {
//         const cells = row.querySelectorAll("td")
//         let found = false;

//         cells.forEach(cell => {
//             if (cell.textContent.toLowerCase().includes(filter)) {
//                 found = true;
//             }
//         });

//         row.style.display = found ? '' : 'none';
//     });
// };




