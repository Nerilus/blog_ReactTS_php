<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <section class="w-100 p-4 d-flex justify-content-center pb-4">
                <form action="/login" method="POST" class="form-log">
                    <h1 class="fw-bolder mb-1">Se connecter</h1>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" name="email" id="email-login" class="form-control" placeholder="Adresse mail" required>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" name="password" id="password-login" class="form-control" placeholder="Mot de passe" required>
                    </div>

                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4">
                        <div class="col">
                            <!-- Simple link -->
                            <a href="#!">Mot de passe oublié ?</a>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" id="submit" class="btn btn-primary btn-block mb-4">Se connecter</button>

                    <!-- Register buttons -->
                    <div class="text-center link">
                        <p>Pas encore membre ? <a href="#!">S'inscrire</a></p>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>