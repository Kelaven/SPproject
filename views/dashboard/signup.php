<!-- form pour ajouter un nouveau client : ID, PWD, confirmation PWD -->
<section class="container">
    <div class="row">
        <div class="col pt-5">
            <div class="card pt-5">
                <form method="POST" class="p-5" novalidate>
                    <legend class="py-3 px-3 text-center">Inscrire un nouveau client</legend>
                    <div class="text-success text-center">
                        <?= $result??'' ?>
                    </div>
                    <!-- ! signup -->
                    <div class="input-group pe-xl-3 ps-xl-3 px-1">
                        <label for="signup"></label>
                        <span class="input-group-text" id="span__signup"><i class="fa-solid fa-user-plus"></i></span>
                        <input 
                        required
                        type="text" 
                        name="signup" 
                        id="signup"
                        placeholder="Identifiant"
                        autocomplete="given-name"
                        minlength="2"
                        maxlength="30"
                        class="form-control"
                        value="<?= $signup??'' ?>" >
                    </div>
                    <small class="text-danger ps-3"><?= $error['signup']??'' ?></small>
                    <!-- ! password -->
                    <div class="input-group pe-xl-3 ps-xl-3 px-1">
                        <label for="password"></label>
                        <span class="input-group-text" id="span__password"><i class="fa-solid fa-key"></i></span>
                        <input 
                        required
                        type="password" 
                        name="password" 
                        id="password"
                        placeholder="Mot de passe"
                        autocomplete="given-name"
                        minlength="10"
                        maxlength="30"
                        class="form-control"
                        value="<?= $password??'' ?>" >
                    </div>
                    <small class="text-danger ps-3"><?= $error['password']??'' ?></small>
                    <!-- ! password check -->
                    <div class="input-group pe-xl-3 ps-xl-3 px-1">
                        <label for="passwordCheck"></label>
                        <span class="input-group-text" id="span__passwordCheck"><i class="fa-solid fa-key"></i></span>
                        <input 
                        required
                        type="password" 
                        name="passwordCheck" 
                        id="passwordCheck"
                        placeholder="Confirmez le mot de passe"
                        autocomplete="given-name"
                        minlength="2"
                        maxlength="30"
                        class="form-control"
                        value="<?= $password??'' ?>" >
                    </div>
                    <small class="text-danger ps-3"><?= $error['password']??'' ?></small>
                    <!-- ! validation btn -->
                    <div class="text-center py-3">
                        <button class="btn btn-primary" type="submit">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>