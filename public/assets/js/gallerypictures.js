const displayWrite = document.getElementById('gallerypictures__row--write');
const clickBtn = document.getElementById('gallerypictures__btn--write');

clickBtn.addEventListener('click', () => {
    displayWrite.classList.remove('d-none');
});





// * don't submit if errors :

    // const commentForm = document.getElementById('commentForm');
    // const commentTextArea = document.getElementById('comment');


    commentForm.addEventListener('submit', function (event) {
        if ((comment.value.trim().length === 0) || (comment.value.trim().length < 5) || (comment.value.trim().length > 2000)){
            smallIndicators.innerText = 'Le texte ne peut pas contenir les symboles "<" ">" et doit faire entre 5 et 2000 caractères.';
            console.log('pas ok');
            console.log(smallIndicators);
            event.preventDefault();
        } else {
            console.log('ok');
            // commentForm.submit();
        }
    });
