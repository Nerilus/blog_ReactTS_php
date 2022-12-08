<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <section class="w-100 p-4 d-flex justify-content-center pb-4">
                <form action="/register" method="POST" class="form-log">
                    <h1 class="fw-bolder mb-1">S'inscrire</h1>
                    <div class="form-outline mb-4">
                        <input type="text" name="firstName" id="prenom-register" class="form-control" placeholder="Prénom" required>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="text" id="nom-register" name="lastName" class="form-control" placeholder="Nom" required>
                    </div>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="email-register" class="form-control" name="email" placeholder="Adresse mail" required>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="password-register" class="form-control" name="password" placeholder="Mot de passe" required>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" id="submit" class="btn btn-primary btn-block mb-4">S'inscrire</button>

                    <!-- Register buttons -->
                    <div class="text-center link">
                        <p>Déjà membre ? <a href="#!">Se connecter</a></p>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>