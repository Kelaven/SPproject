<section>
    <div class="container container__form">
        <div class="row">
            <div class="col">
                <!-- carte contenant le form -->
                <div class="card bg-light mb-3 card__add">
                    <div class="card-header">
                        <h1 class="form__h1 pt-2">Modifier une galerie</h1>
                    </div>
                    <div class="text-info text-center pt-2">
                        <?= $result ?? '' ?>
                    </div>
                    <div class="card-body p-5">
                        <!-- form -->
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group pb-5">
                                    <label for="name">Nom :</label>
                                    <input class="form__inputs" type="text" id="name" name="name"  minlength="2" maxlength="20" pattern="<?= REGEX_NAME_GALLERIES ?>" value="<?= $gallery->name ?? '' ?>" required>
                                    <small class="text-danger"><?= $error['name'] ?? '' ?></small>
                                    <small class="text-danger"><?= $error['isExist'] ?? '' ?></small>                                    
                            </div>
                            <div class="form-group pb-5">
                                <label class="w-100" for="date">Date :</label>
                                <input class="form__inputs" type="date" id="date" name="date" min="2015-01-01" max="2040-12-31" pattern="<?= REGEX_DATE ?>" value="<?= $gallery->date ?? '' ?>" required>
                                <small class="text-danger"><?= $error['date'] ?? '' ?></small>
                            </div>
                            <div class="form-group pb-5">
                                <label class="w-100" for="password">Passe d'accès :</label>
                                <!-- <input class="form__inputs" type="text" id="password" name="password" placeholder="galeriedepauline1234" minlength="8" maxlength="30" pattern="<?= REGEX_PASSWORD ?>" value="<?= $gallery->password ?? '' ?>" required> -->
                                <input class="form__inputs" type="text" id="password" name="password" placeholder="galeriedepauline1234" minlength="8" maxlength="30" pattern="<?= REGEX_PASSWORD ?>" autocomplete="off">
                                <small class="text-danger"><?= $error['password'] ?? '' ?></small>
                            </div>
                            <!-- ? sélectionner une photo dans une liste déroulante ? -->
                            <!-- <div class="form-group pb-5">
                                <label class="w-100" for="photo">Sélectionner une photo existante :</label>
                                <select class="form__inputs" id="photo" name="photo" required>
                                    <option value="" selected></option>
                                    <option value="photo1.jpg">Photo 1</option>
                                    <option value="photo2.jpg">Photo 2</option>
                                </select>
                                <small class="text-danger"><?= $error['photo'] ?? '' ?></small>
                            </div> -->

                            <input type="submit" class="btn btn-dark" value="Modifier la galerie">
                        </form>
                    </div>
                </div>
                <a href="/controllers/dashboard/galleries/list-ctrl.php">
                    <p><i class="fa-regular fa-circle-left pe-2"></i>Retour à la liste des galeries</p>
                </a>
            </div>
        </div>
    </div>
</section>