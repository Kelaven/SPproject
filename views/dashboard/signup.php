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
                        </label>
                        <span class="input-group-text span__password"><i class="fa-solid fa-key"></i></span>
                        <input 
                        required
                        type="password" 
                        name="password" 
                        id="password"
                        placeholder="Mot de passe"
                        autocomplete="given-name"
                        minlength="10"
                        maxlength="30"
                        class="form-control password__inputs"
                        value="<?= $password??'' ?>" >
                        <span class="input-group-text" id="span__signup__pwd--eye"><i class="fa-solid fa-eye" id="pwd-eye"></i><i class="fa-solid fa-eye-slash d-none" id="pwd-eye-slash"></i></span>
                    </div>
                    <small class="text-danger ps-3"><?= $error['password']??'' ?></small>
                    <!-- ! password check -->
                    <div class="input-group pe-xl-3 ps-xl-3 px-1">
                        <label for="passwordCheck">
                        </label>
                        <span class="input-group-text span__password"><i class="fa-solid fa-key"></i></span>
                        <input 
                        required
                        type="password" 
                        name="passwordCheck" 
                        id="passwordCheck"
                        placeholder="Confirmez le mot de passe"
                        autocomplete="given-name"
                        minlength="2"
                        maxlength="30"
                        class="form-control password__inputs"
                        value="<?= $password??'' ?>" >
                        <span class="input-group-text" id="span__signup__pwd--eye"><i class="fa-solid fa-eye" id="pwd-eye-check"></i><i class="fa-solid fa-eye-slash d-none" id="pwd-eye-slash-check"></i></span>
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