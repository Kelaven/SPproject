<div id="accesclient__body">
    <section class="container">
        <div class="row justify-content-end py-3">
            <div class="col-12 col-xl-3 d-flex justify-content-end pe-5">
                <form>
                    <label for="search" class="form-label galeries__search--label">Recherche par mots clés :</label>
                    <div class="galeries__search--labelInput">
                        <input id="search" name="search" class="form-control" type="search" placeholder="Nom ou date">
                        <button class="btn btn-dark d-flex justify-content-center galeries__search--logo" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                    <small class="fst-italic"><a href="/controllers/accesclient-ctrl.php" class="galeries__small--search">Afficher toutes les galeries</a></small>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <!-- <div class="px-0 px-md-3 px-lg-5 py-3 pt-5 col-11 col-md-6 col-xl-4">
                <a class="accesclient__a" href="/../controllers/accesclientform-ctrl.php" target="_blank">
                    <img class="accesclient__img" src="/public/assets/img/anais-picture-portrait-women-maroc-beach-resizedforaccesclient-60.jpg" alt="photographie portrait de modèle féminin pendant un coucher de soleil au Maroc avec un livre">
                    <div>
                        <p class="animate__flipInX accesclient__txt text-center"><i class="fa-solid fa-lock pe-2 pt-3"></i>Anaïs | 06.2023</p>
                    </div>
                </a>
            </div> -->
            <?php
            // $addedGallery = [];
            foreach ($galleries as $gallery) {
                // dd($gallery);
                // if (!in_array($gallery->id_gallery, $addedGallery)) {
            ?>
                    <div class="px-0 px-md-3 px-lg-5 py-3 pt-5 col-11 col-md-6 col-xl-4">
                        <a class="accesclient__a" href="/../controllers/accesclientform-ctrl.php?id_gallery=<?= $gallery->id_gallery ?>" target="_blank">
                            <img class="accesclient__img" src="/public/assets/img/uploads/<?php
                                                                                        if ($gallery->gallery_isCover == 1) {
                                                                                            echo ($gallery->gallery_photo);
                                                                                        }
                                                                                        ?>" alt="photographie de couverture de galerie client" loading="lazy">
                            <div>
                                <p class="animate__flipInX accesclient__txt text-center"><i class="fa-solid fa-lock pe-2 pt-3"></i><?= $gallery->name ?></p>
                            </div>
                        </a>
                    </div>
            <?php
                    // $addedGallery[] = $gallery->id_gallery;
                // }
            }
            ?>

            <!-- <div class="px-0 px-md-3 px-lg-5 py-3 pt-5 col-11 col-md-6 col-xl-4">
                <a class="accesclient__a" href="/../controllers/accesclientform-ctrl.php" target="_blank">
                    <img class="accesclient__img" src="/public/assets/img/pauline-picture-portrait-women-france-montains-snow-resizedforaccesclient-60.jpg" alt="photographie portrait de modèle féminin à la montagne avec de la neige">
                    <div>
                        <p class="animate__flipInX accesclient__txt text-center"><i class="fa-solid fa-lock pe-2 pt-3"></i>Pauline | 11.2023</p>
                    </div>
                </a>
            </div>
            <div class="px-0 px-md-3 px-lg-5 py-3 pt-5 col-11 col-md-6 col-xl-4">
                <a class="accesclient__a" href="/../controllers/accesclientform-ctrl.php" target="_blank">
                    <img class="accesclient__img" src="/public/assets/img/jad-picture-portrait-men-france-sunset-streetstyle-resizedforaccesclient-60.jpg" alt="photographie portrait de modèle masculin pendant un coucher de soleil en lifestyle">
                    <div>
                        <p class="animate__flipInX accesclient__txt text-center"><i class="fa-solid fa-lock pe-2 pt-3"></i>Jad  | 08.2022</p>
                    </div>
                </a>
            </div>
            <div class="px-0 px-md-3 px-lg-5 py-3 pb-5 col-11 col-md-6 col-xl-4">
                <a class="accesclient__a" href="/../controllers/accesclientform-ctrl.php" target="_blank">
                    <img class="accesclient__img" src="/public/assets/img/melissa-picture-portrait-women-italie-panorama-resizedforaccesclient-60.jpg" alt="photographie de modèle féminin en vacances en Italie avec une vue sur la ville">
                    <div>
                        <p class="animate__flipInX accesclient__txt text-center"><i class="fa-solid fa-lock pe-2 pt-3"></i>Mélissa</p>
                    </div>
                </a>
            </div>
            <div class="px-0 px-md-3 px-lg-5 py-3 pb-5 col-11 col-md-6 col-xl-4">
                <a class="accesclient__a" href="/../controllers/accesclientform-ctrl.php" target="_blank">
                    <img class="accesclient__img" src="/public/assets/img/romain-picture-portrait-men-france-audi-voiture-resizedforaccesclient-60.jpg" alt="photographie de modèle masculin en France avec une voiture Audi sur un parking en lifestyle">
                    <div>
                        <p class="animate__flipInX accesclient__txt text-center"><i class="fa-solid fa-lock pe-2 pt-3"></i>Romain</p>
                    </div>
                </a>
            </div>
            <div class="px-0 px-md-3 px-lg-5 py-3 pb-5 col-11 col-md-6 col-xl-4">
                <a class="accesclient__a" href="/../controllers/accesclientform-ctrl.php" target="_blank">
                    <img class="accesclient__img" src="/public/assets/img/antoine-picture-portrait-men-france-architecture-streetstyle-resizedforaccesclient-60.jpg" alt="photographie de modèle masculin en France avec une belle architecture de">
                    <div>
                        <p class="animate__flipInX accesclient__txt text-center"><i class="fa-solid fa-lock pe-2 pt-3"></i>Antoine</p>
                    </div>
                </a>
            </div> -->
        </div>
    </section>
</div>