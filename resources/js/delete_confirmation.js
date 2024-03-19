const deleteForms = document.querySelectorAll('.delete-form')
const modal = document.getElementById('delete-modal');
const confirmButton = document.querySelector('.confirm-btn');
const closeButton = document.getElementById('button-close');

deleteForms.forEach(form => {
    form.addEventListener('submit', e => {
        e.preventDefault();
        modal.style = "display: block"
        confirmButton.addEventListener('click', () => {
            form.submit();
        })
    })
})
closeButton.addEventListener('click', () => {
    modal.style = "display: none"

})