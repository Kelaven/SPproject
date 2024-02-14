<section class="container">
    <div class="row">
        <div class="col text-center p-5">
            <h1><?= $gallery->name ?></h1>
        </div>
    </div>
    <div class="row justify-content-center">


        <?php
        foreach ($pictures as $picture) {
            if ($picture->id_gallery === $gallery->id_gallery) {
        ?>
                <div class="col-12 col-md-5 col-lg-4 col-xl-3 p-3">
                    <div class="galleryPictures__img--container">
                        <button type="button" class="btn btn-primary modalGallery__btn" data-bs-toggle="modal" data-bs-target="#modal<?= $picture->name ?>" aria-label="Open">Click to open modal</button>
                        <img class="galleryPictures__img" src="/public/assets/img/ftp/<?= $picture->photo ?>" alt="Photographie <?= $picture->name ?> de la galerie <?= $picture->gallery_name ?>">
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
                                <img class="modal__imgGallery" src="/public/assets/img/ftp/<?= $picture->photo ?>" alt="Photographie <?= $picture->name ?> de la galerie <?= $picture->gallery_name ?>">
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>


    </div>
</section>