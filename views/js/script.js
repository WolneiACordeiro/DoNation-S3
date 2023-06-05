const btnContributions = document.getElementById("button-contribution");
const backgroundForm = document.getElementById("background-form");
const closeButtonInsert = document.getElementById("close-button__insert");
const closeButtonAlter = document.getElementById("close-button__alter");
const insertContribution = document.getElementById("insert-contribution-form");
const alterContribution = document.getElementById("alter-contribution-form");
const alterButton = document.getElementById("alter-button");

const deleteContribution = document.getElementById("delete-contribution-form");
const deleteButton = document.getElementById("delete-button");
const noDelete = document.getElementById("no-delete");

// closeButtonInsert.addEventListener("click", () => {
//     backgroundForm.classList.remove("active-background");
//     insertContribution.classList.remove("active-form");
// });

// closeButtonAlter.addEventListener("click", () => {
//     backgroundForm.classList.remove("active-background");
//     alterContribution.classList.remove("active-form");
// });

// btnContributions.addEventListener("click", () => {
//     backgroundForm.classList.toggle("active-background");
//     insertContribution.classList.toggle("active-form");
// });

// alterButton.addEventListener("click", () => {
//     backgroundForm.classList.toggle("active-background");
//     alterContribution.classList.toggle("active-form");
// });

deleteButton.addEventListener("click", () => {
    backgroundForm.classList.add("active-background");
    deleteContribution.classList.add("active-form");
});

noDelete.addEventListener("click", () => {
    backgroundForm.classList.remove("active-background");
    deleteContribution.classList.remove("active-form");
});