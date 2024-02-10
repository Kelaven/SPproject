// ! Bootstrap tooltips :

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));


// ! Delete warning

// * variable
const deleteLinks = document.querySelectorAll('.delete__link');
console.log(deleteLinks);


// * fonction
function openPopup(event) {

    const confirmDelete = window.confirm('Êtes-vous sûr de vouloir supprimer cette galerie ? Cette action est irréversible !'); // The window object is the global object in the browser where global methods like confirm() reside.

    if (confirmDelete) {
        let galleryId = event.currentTarget.getAttribute('data-delete'); // I am using the dataset that I set in archive.php to retrieve the redirect link, considering that PHP cannot be interpreted within JS. currentTarget refers to the element to which the event handler is attached. It would have been possible to use event.target, which refers to the element that triggered the event (this can be different from currentTarget if the event was propagated from a child element).
    
        let redirectionPage = `/controllers/dashboard/galleries/delete-ctrl.php?id_gallery=${galleryId}`; // I removed the originally present href="" in list.php within the <a> tag.
    
        window.location.replace(redirectionPage); // window.location represents the current page's URL in the browser. replace() is a method of the window.location object that replaces the current URL with a new one. It would have worked with href as well.
    };

};

// * évènement
deleteLinks.forEach(deleteLink => {
    deleteLink.addEventListener('click', openPopup);
});