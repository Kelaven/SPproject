<section>
    <div class="container container__form">
        <div class="row">
            <div class="col">
                <div class="card bg-light mb-3 card__add">
                    <div class="card-header">
                        <h1 class="form__h1 pt-2">Modifier une photo</h1>
                    </div>
                    <div class="text-info text-center pt-2">
                        <?= $result ?? '' ?>
                    </div>
                    <div class="card-body p-5">
                        <!-- form -->
                        <form method="post" enctype="multipart/form-data" novalidate>
                            <div class="form-group pb-3">
                                <label class="w-100" for="isSelection">Afficher sur la page Sélection ?</label>
                                <select id="isSelection" name="isSelection" class="form__inputs">
                                    <option value="non" selected>Non</option>
                                    <option value="oui">Oui</option>
                                </select>
                            </div>
                            <div class="form-group pb-3">
                                <label class="w-100" for="id_gallery">Choisir une galerie :</label>
                                <select id="id_gallery" name="id_gallery" class="form__inputs">
                                    <option value="" disabled></option>
                                    <?php
                                    foreach ($galleries as $gallery) {
                                    ?>
                                        <option value="<?= $gallery->id_gallery ?>" <?php if ((isset($id_gallery)) && ($id_gallery == $gallery->id_gallery)) { ?> selected <?php } ?>><?= $gallery->id_gallery ?> - <?= $gallery->gallery_name ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <small class="text-danger"><?= $error['id_gallery'] ?? '' ?></small>
                            </div>
                            <div class="form-group pb-3">
                                <label for="name">Nom de la photo :</label>
                                <input class="form__inputs" type="text" id="name" name="name" placeholder="pauline_022024_shootingbruges" minlength="2" maxlength="50" pattern="<?= REGEX_NAME_PHOTOS ?>" value="<?= $picture->name ?? '' ?>" required>
                                <small class="text-danger"><?= $error['name'] ?? '' ?></small>
                                <small class="text-danger"><?= $error['isExistByName'] ?? '' ?></small>
                            </div>
                            <div class="form-group pb-3">
                                <label for="photo">Sélectionner la photo :</label>
                                <input class="form__inputs" type="file" id="photo" name="photo" accept="jpg" required>
                                <?php if (!empty($photo) && isset($photo) && empty($error)) { ?>
                                    <small class="text-success fst-italic">Vous venez d'ajouter la photo "<?= $photo ?? '' ?>".</small>
                                <?php } ?>
                                <small class="text-danger"><?= $error['photo'] ?? '' ?></small>
                            </div>
                            <div class="form-group pb-3">
                                <label for="description">Description :</label>
                                <textarea class="form__inputs" id="description" name="description" rows="4" placeholder="Ajoutez une description..."><?php if (empty($result) || !isset($result)) {
                                                                                                                                                            echo ($picture->description) ?? '';
                                                                                                                                                        } ?></textarea>
                                <small class="text-danger"><?= $error['description'] ?? '' ?></small>
                                <small class="text-danger"><?= $error['isExistByDescription'] ?? '' ?></small>
                            </div>
                            <input type="submit" class="btn btn-dark" value="Valider">
                        </form>
                    </div>
                </div>
                <a href="/controllers/dashboard/pictures/list-ctrl.php">
                    <p><i class="fa-regular fa-circle-left pe-2"></i>Retour à la liste des photos</p>
                </a>
            </div>
        </div>
    </div>
</section>