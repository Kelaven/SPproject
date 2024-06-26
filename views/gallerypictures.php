<section class="container">
    <div class="row">
        <div class="col-12 text-center p-5">
            <h1><?= $gallery->name ?></h1>
        </div>
        <div class="text-center text-info py-2 px-5">
            <?= $result ?? '' ?>
        </div>
    </div>
    <div class="row justify-content-center">
        <?php
        foreach ($pictures as $picture) {
            // if ($picture->id_gallery === $gallery->id_gallery) {
        ?>
                <div class="col-12 col-md-5 col-lg-4 col-xl-3 p-3">
                    <div class="galleryPictures__img--container">
                        <button type="button" class="btn btn-primary modalGallery__btn" data-bs-toggle="modal" data-bs-target="#modal<?= $picture->name ?>" aria-label="Open">Click to open modal</button>
                        <img class="galleryPictures__img" src="/public/assets/img/uploads/<?= $picture->photo ?>" alt="Photographie <?= $picture->name ?> de la galerie <?= $picture->gallery_name ?>">
                    </div>
                </div>



                <!-- ! modal -->
                <div class="modal fade" id="modal<?= $picture->name ?>">
                    <div class="modal-dialog">
                        <div class="modal-content galleryPictures__modal">
                            <div class="modal-header">
                                <!-- <h5 class="modal-title">Modal title</h5> -->
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center p-5">
                                <img class="modal__imgGallery pictureList__modalImg" src="/public/assets/img/uploads/<?= $picture->photo ?>" alt="Photographie <?= $picture->name ?> de la galerie <?= $picture->gallery_name ?>">
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            // }
        }
        ?>
    </div>
    <div class="row pt-5">
        <div class="col text-center pt-4">
            <h2>Livre d'Or ✨</h2>
        </div>
    </div>
    <div class="row pt-3">
        <?php if (!empty($_SESSION['user'])) { ?>
            <div class="col text-center">
                <button type="button" class="btn btn-dark gallerypictures__btn" id="gallerypictures__btn--write">Ecrire un message</button>
            </div>
        <?php } ?>
        <?php if (empty($_SESSION['user'])) { ?>
            <div class="col text-center">
                <a href="/connexion.html" class="btn btn-dark gallerypictures__btnSignIn pt-3">Connectez-vous pour écrire un message</a>
            </div>
        <?php } ?>
    </div>
    <div class="row d-none" id="gallerypictures__row--write">
        <div class="col d-flex justify-content-center">
            <form method="POST" class="gallerypictures__form mt-4" id="commentForm" novalidate>
                <h3 class="py-3 py-xl-4 px-3 text-center">Ajouter un commentaire</h3>
                <div class="form__comment--container">
                    <div class="input-group pe-xl-3 ps-xl-3 px-1">
                        <label for="comment"></label>
                        <!-- <span class="input-group-text"><i class="fa-solid fa-comment"></i></span> -->
                        <textarea required name="comment" id="comment" placeholder="Votre commentaire..." class="form-control" minlength="5" maxlength="2000"><?= $comment ?? '' ?></textarea>
                    </div>
                    <small class="text-danger ps-3" id="smallIndicators"><?= $error['comment'] ?? '' ?></small>
                </div>
                <div class="text-center py-5 w-100">
                    <button class="btn btn-primary signUp__btn" type="submit">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row justify-content-center pt-3 pb-5">
        <?php
        foreach ($comments as $comment) {
            // d($comment);
            if (($comment->id_gallery === $id_gallery) && ($comment->confirmed_at != NULL)) { ?>
                <div class="col-12 col-lg-6 py-4 gallerypictures__cardContainer">
                    <div class="card gallerypictures__card">
                        <div class="card-header">
                            <?= $comment->user_username ?>, le <?= date('Y-m-d à H:i', strtotime($comment->created_at)) ?> <!-- $comment->created_at is a string, became a timestamp with strtotime to be used with date() -->
                        </div>
                        <div class="card-body">
                            <p class="card-text"><?= $comment->text ?></p>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</section>



<!-- <script>
    let test = "<?php echo $error['comment'] ?>"
    console.log(error);
</script> -->