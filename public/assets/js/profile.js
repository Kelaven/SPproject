



profile__delete.addEventListener('click', (event) => {
    const confirmDelete = window.confirm('Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible ! Vos informations personnelles n\'apparaîtrons plus dans la base de données.'); // The window object is the global object in the browser where global methods like confirm() reside.
    if (confirmDelete) {
        let profileUserId = event.currentTarget.getAttribute('data-delete-profile');
        let redirectionPage;
        redirectionPage = `/controllers/profile-delete-ctrl.php?id_user=${profileUserId}`;
        window.location.replace(redirectionPage);
    }
})