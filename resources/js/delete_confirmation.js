// Lista pulsanti di cancellazione
const deleteForms = document.querySelectorAll('.delete-form')
// Modale
const modal = document.getElementById('delete-modal');
const modalText = document.querySelector('.modal-body');
// Pulsante conferma nella modale
const confirmButton = document.querySelector('.confirm-btn');
// Pulsante chiusura nella modale
const closeButton = document.getElementById('button-close');

deleteForms.forEach(form => {
    form.addEventListener('submit', e => {
        e.preventDefault();
        modal.style = "display: block"
        modalText.innerText += ` ${form.dataset.title}?`;
        confirmButton.addEventListener('click', () => {
            form.submit();
        })
    })
})
closeButton.addEventListener('click', () => {
    modal.style = "display: none"

})