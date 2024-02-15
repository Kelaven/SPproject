const displayWrite = document.getElementById('gallerypictures__row--write');
const clickBtn = document.getElementById('gallerypictures__btn--write');

clickBtn.addEventListener('click', () => {
    displayWrite.classList.remove('d-none');
});