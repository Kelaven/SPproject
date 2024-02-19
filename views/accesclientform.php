<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col p-0 accesclientform__bg2">
                <img class="accesclientform__img2" src="/public/assets/img/uploads/<?php
                                                                                    if (isset($gallery->picture_photoCover)) {
                                                                                        echo ($gallery->picture_photoCover);
                                                                                    }
                                                                                    ?>" alt="photographie de couverture de la galerie" loading="lazy">

                <div class="accesclientform__overlay2"></div>
                <div class="accesclientform__infosContainer">
                    <div>
                        <h1 class="accesclientform__h1 pb-5"><?php if (isset($gallery->picture_photoCover)) {
                                                                    echo ($gallery->name);
                                                                } ?></h1> <!-- ! il faudra charger dynamiquement le prénom pour qu'il corresponde -->
                        <form method="post" class="accesclientform__form d-flex flex-wrap justify-content-center">
                            <div class="w-100 d-flex justify-content-center">
                                <div class="input-group pe-xl-3 ps-xl-3 px-1 accesclientform__input">
                                    <label for="passwordAccess"></label>
                                    <span class="input-group-text accesclientform__span"><i class="fa-solid fa-lock"></i></span>
                                    <input required type="password" name="passwordAccess" id="passwordAccess" placeholder="Mot de passe" class="form-control" autocomplete="new-password">
                                    <span class="input-group-text span__signup__pwd--eye accesclientform__span"><i class="fa-solid fa-eye" id="pwd-eye-gallery"></i><i class="fa-solid fa-eye-slash d-none" id="pwd-eye-slash-gallery"></i></span>
                                </div>
                            </div>
                            <small class="text-danger w-100 text-center" style="max-height: 30px;"><?= $error['passwordAccess'] ?? '' ?></small>
                            <div class="text-center py-5">
                                <button class="btn btn-primary" type="submit">Envoyer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>