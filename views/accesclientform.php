<section class="container-fluid px-0">
    <img class="accesclientform__bg" src="/public/assets/img/ftp/<?php
                                                                    if (isset($gallery->picture_photoCover)) {
                                                                        echo ($gallery->picture_photoCover);
                                                                    }
                                                                    ?>" alt="photographie de couverture de la galerie" loading="lazy">
    <div class="row accesclientform__bg justify-content-center align-items-center"> <!-- ! il faudra charger dynamiquement l'image pour qu'elle corresponde -->
        <!-- <div class="accesclientform__overlay"> -->
        <div class="col-12 col-md-8 col-xl-5 ps-4 ms-2">
            <h1 class="accesclientform__h1 pb-5"><?php if (isset($gallery->picture_photoCover)) {
                                                        echo ($gallery->name);
                                                    } ?></h1> <!-- ! il faudra charger dynamiquement le prénom pour qu'il corresponde -->
            <form method="post">
                <!-- ! passwordAccess -->
                <div class="input-group pe-xl-3 ps-xl-3 px-1">
                    <label for="passwordAccess"></label>
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    <input required type="password" name="passwordAccess" id="passwordAccess" placeholder="Mot de passe" class="form-control" autocomplete="new-password">
                    <span class="input-group-text span__signup__pwd--eye"><i class="fa-solid fa-eye" id="pwd-eye-gallery"></i><i class="fa-solid fa-eye-slash d-none" id="pwd-eye-slash-gallery"></i></span>
                </div>
                <small class="text-danger ps-3"><?= $error['passwordAccess'] ?? '' ?></small>
                <!-- ! validation btn -->
                <div class="text-center py-5">
                    <button class="btn btn-primary" type="submit">Envoyer</button>
                </div>
            </form>
        </div>
        <!-- </div> -->
    </div>
</section>