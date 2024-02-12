<section>
    <div class="container container__form">
        <div class="row">
            <div class="col">
                <div class="card bg-light mb-3 card__add">
                    <div class="card-header">
                        <h1 class="form__h1 pt-2">Ajouter une nouvelle photo</h1>
                    </div>
                    <div class="text-info pt-2 px-5">
                        <?= $result ?? '' ?>
                    </div>
                    <div class="card-body p-5">
                        <!-- form -->
                        <form method="post" enctype="multipart/form-data" novalidate>
                            <div class="form-group pb-5">
                                <label class="w-100" for="isSelection">Afficher sur la page Sélection ?</label>
                                <select id="isSelection" name="isSelection" class="form__inputs">
                                    <option value="non" selected>Non</option>
                                    <option value="oui">Oui</option>
                                </select>
                            </div>
                            <div class="form-group pb-5">
                                <label for="name">Nom de la photo :</label>
                                <input class="form__inputs" type="text" id="name" name="name" placeholder="pauline_022024_shootingbruges" minlength="2" maxlength="50" pattern="<?= REGEX_NAME_PHOTOS ?>"<?php if (empty($result) || !isset($result)) { ?> value="<?= $name ?? '' ?>" <?php } ?>   required>
                                <small class="text-danger"><?= $error['name'] ?? '' ?></small>
                                <small class="text-danger"><?= $error['isExistByName'] ?? '' ?></small>
                            </div>
                            <div class="form-group pb-5">
                                <label for="photo">Sélectionner la photo :</label>
                                <input class="form__inputs" type="file" id="photo" name="photo" accept="jpg" required>
                                <?php if (!empty($photo) && isset($photo) && empty($error)) { ?>
                                    <small class="text-success fst-italic">Vous venez d'ajouter la photo "<?= $photo ?? '' ?>".</small>
                                <?php } ?>
                                <small class="text-danger"><?= $error['photo'] ?? '' ?></small>
                            </div>
                            <div class="form-group pb-5">
                                <label for="description">Description :</label>
                                <textarea class="form__inputs" id="description" name="description" rows="4" placeholder="Ajoutez une description..."><?php if (empty($result) || !isset($result)) { echo($description) ?? ''; } ?></textarea>
                                <small class="text-danger"><?= $error['description'] ?? '' ?></small>
                                <small class="text-danger"><?= $error['isExistByDescription'] ?? '' ?></small>
                            </div>
                            <input type="submit" class="btn btn-dark" value="Ajouter la photo">
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