<section>
    <div class="container" id="container__form">
        <div class="row">
            <div class="col">
                <!-- carte contenant le form -->
                <div class="card bg-light mb-3" id="card__add--galleries">
                    <div class="card-header">
                        Ajouter un nouveau véhicule
                    </div>
                    <div class="card-body p-5">
                        <!-- form -->
                        <form action="traitement_formulaire.php" method="post" enctype="multipart/form-data">
                            <div class="form-group pb-5">
                                <div>
                                    <label for="name">Nom :</label>
                                </div>
                                <div>
                                    <input type="text" name="name" required>
                                </div>
                            </div>
                            <div class="form-group pb-5">
                                <label class="w-100" for="date">Date :</label>
                                <input type="date" name="date" required>
                            </div>
                            <div class="form-group pb-5">
                                <label class="w-100" for="password">Passe d'accès :</label>
                                <input type="password" name="password" required>
                            </div>
                            <div class="form-group pb-5">
                                <label class="w-100" for="photo">Sélectionner une photo existante :</label>
                                <select name="photo" required>
                                    <option value="photo1.jpg">Photo 1</option>
                                    <option value="photo2.jpg">Photo 2</option>
                                </select>
                            </div>

                            <input type="submit" class="btn btn-dark" value="Ajouter la galerie">
                        </form>
                    </div>
                </div>
                <a href="/controllers/dashboard/vehicles/listVehicles-ctrl.php">
                    <p>Retour à la liste des véhicules</p>
                </a>
            </div>
        </div>
    </div>
</section>