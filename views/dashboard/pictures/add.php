<section>
    <div class="container" id="container__form">
        <div class="row">
            <div class="col">
                <div class="card bg-light mb-3" class="card__add--galleries">
                    <div class="card-header">
                        <h1 class="form__h1 pt-2">Ajouter une nouvelle photo</h1>
                    </div>
                    <div class="text-info text-center pt-2">
                        <?= $result ?? '' ?>
                    </div>
                    <div class="card-body p-5">
                        <!-- form -->
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group pb-5">
                                <label class="w-100" for="isSelection">Afficher sur la page Sélection ?</label>
                                <select id="isSelection" name="isSelection" class="form__inputs">
                                    <option value="non" selected>Non</option>
                                    <option value="oui">Oui</option>
                                </select>
                            </div>
                            <div class="form-group pb-5">
                                <label for="photo">Sélectionner une photo :</label>
                                <input class="form__inputs" type="file" id="photo" name="photo" accept="jpg" required>
                                <small class="text-danger"><?= $error['photo'] ?? '' ?></small>
                            </div>
                            <div class="form-group pb-5">
                                <div class="form-group pb-5">
                                    <label for="name">Nom de la photo :</label>
                                    <input class="form__inputs" type="text" id="name" name="name" placeholder="pauline_022024_shootingbruges" minlength="2" maxlength="50" pattern="<?= REGEX_NAME_PHOTOS ?>" value="<?= $name ?? '' ?>" required>
                                    <small class="text-danger"><?= $error['name'] ?? '' ?></small>
                                </div>
                                <label for="description">Description :</label>
                                <textarea class="form__inputs" id="description" name="description" rows="4" placeholder="Ajoutez une description..."><?= $description ?? '' ?></textarea>
                                <small class="text-danger"><?= $error['description'] ?? '' ?></small>
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