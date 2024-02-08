<section>
    <div class="container" id="container__form">
        <div class="row">
            <div class="col">
                <!-- carte contenant le form -->
                <div class="card bg-light mb-3" id="card__add--galleries">
                    <div class="card-header">
                        <h1 class="form__h1 pt-2">Ajouter une nouvelle galerie</h1> 
                    </div>
                    <div class="card-body p-5">
                        <!-- form -->
                        <form action="traitement_formulaire.php" method="post" enctype="multipart/form-data">
                            <div class="form-group pb-5">
                                <div>
                                    <label for="name">Nom :</label>
                                </div>
                                <div>
                                    <input class="form__inputs" type="text" id="name" name="name" placeholder="Pauline" minlength="2" maxlength="20" pattern="<?= REGEX_NAME_GALLERIES ?>" required>
                                </div>
                            </div>
                            <div class="form-group pb-5">
                                <label class="w-100" for="date">Date :</label>
                                <input class="form__inputs" type="date" id="date" name="date" min="<?= date("Y-m-d") ?>" max="2040-12-31" pattern="<?= REGEX_DATE ?>" required>
                            </div>
                            <div class="form-group pb-5">
                                <label class="w-100" for="password">Passe d'accès :</label>
                                <input class="form__inputs" type="password" id="password" name="password" placeholder="galeriedepauline1234" minlength="8" maxlength="16" pattern="<?= REGEX_PASSWORD ?>" required>
                            </div>
                            <div class="form-group pb-5">
                                <label class="w-100" for="photo">Sélectionner une photo existante :</label>
                                <select class="form__inputs" id="photo" name="photo" required>
                                    <!-- <option value="" disabled selected>Sélectionner une photo</option> -->
                                    <option value="" selected></option>
                                    <option value="photo1.jpg">Photo 1</option>
                                    <option value="photo2.jpg">Photo 2</option>
                                </select>
                            </div>

                            <input type="submit" class="btn btn-dark" value="Ajouter la galerie">
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