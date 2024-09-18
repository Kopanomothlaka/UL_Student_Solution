const searchButton = document.querySelector(".search-button");
const cancelButton = document.querySelector(".cancel-button");
const searchInput = document.querySelector(".search-input");

searchButton.addEventListener('click', () => {
    searchButton.classList.remove('active');
    cancelButton.classList.add('active');
    searchInput.classList.add('active');
})

cancelButton.addEventListener('click', () => {
    searchButton.classList.add('active');
    cancelButton.classList.remove('active');
    searchInput.classList.remove('active');
})