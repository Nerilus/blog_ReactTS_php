<?php
/** @var App\Entity\User[] $user */
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <h1 class="fw-bolder mb-1">Gestion des utilisateurs</h1>

            <section class="w-100 p-4 d-flex justify-content-center pb-4">

                <div class="grid-users card">
                    <div class="row-1">
                        <p class="fw-bold fs-5">Prénom</p>
                        <p class="fw-bold fs-5">Nom</p>
                        <p class="fw-bold fs-5">Adresse mail</p>
                        <p class="fw-bold fs-5">Admin</p>
                        <p class="fw-bold fs-5">Action</p>
                    </div>
                    <?php
                    $id = $user->getId();
                    ?>
                        <div class="row-user">
                            <p class="fs-6"><?=$user->getFirstName()?></p>
                            <p class="fs-6"><?=$user->getLastName()?></p>
                            <p class="fs-6"><?=$user->getMail()?></p>
                            <p class="fs-6"><?=$user->getRoles()?></p>
                        </div>
                <br><br>
                <form action="/updateUser/<?=$id?>" method="POST" class="form-log">
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
                    <button type="submit" id="submit" class="btn btn-primary btn-block mb-4">modifier l'utilisateur</button>
                </form>
                </div>
            </section>
        </div>
    </div>
</div>
