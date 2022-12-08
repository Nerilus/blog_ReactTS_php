<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../../style.css" rel="stylesheet" />
    <title><?= $_pageTitle; ?></title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="http://localhost:5656/">Accueil</a></li>
                <?php if (isset($admin)) { ?>
                    <li class="nav-item"><a class="nav-link" href="/logOut">Se déconnecter</a></li>
                    <li class="nav-item btn btn-primary" id="btn-inscription"><a class="nav-link" href="/users">Gestion utilisateurs</a></li>
                <?php } else {
                    ?>
                    <li class="nav-item"><a class="nav-link" href="/loginForm">Se connecter</a></li>
                    <li class="nav-item btn btn-primary" id="btn-inscription"><a class="nav-link" href="/registerForm">S'inscrire</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

<?= $_pageContent; ?>

<footer class="py-5 bg-dark">
    <div class="mt-4 text-center">

    <?php
    if (isset($admin)) {
        ?>
        <h4>Vous souhaitez contribuer au blog ?</h4>
        <div class="btn btn-primary" id="button-comment">
            <a href="/post">
                Ajoutez un article
            </a>
        </div>
    <?php } ?>

    </div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>
</html>

