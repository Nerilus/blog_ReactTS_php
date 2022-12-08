<?php
/** @var App\Entity\User[] $users */
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
                    <?php foreach ($users as $user) {
                            $id = $user->getId();
                            $firstName = $user->getFirstName();
                        ?>
                    <div class="row-user">
                        <p class="fs-6"><?=$user->getFirstName()?></p>
                        <p class="fs-6"><?=$user->getLastName()?></p>
                        <p class="fs-6"><?=$user->getMail()?></p>
                        <p class="fs-6"><?=$user->getRoles()?></p>
                        <p class="fs-6 link link-delete">
                            <a href="/updateUserForm/<?=$id?>">
                                modifier
                            </a>
                            <a href="/deleteUser/<?= $id ?>">
                                Supprimer
                            </a>
                        </p>
                    </div>
                    <?php } ?>
                </div>
            </section>
        </div>
    </div>
</div>
