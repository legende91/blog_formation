<?php
/**
 * Titre de la page
 */
$title = "Inscription";
/**
 * Nos 3 fichiers principaux.
 */
require 'config/config.php';
require 'includes/db.php';
require 'functions/functions.php';


if (isset($_POST['login'], $_POST['password'], $_POST['name']) && !empty($_POST['login']) && !empty($_POST['name']) && !empty($_POST['password'])) {
    $data = $db->prepare('INSERT INTO user (`login`, `password`,`name`) VALUES (:login, :password,:name )');
    $ok = $data->execute(array(
            'login' => $_POST['login'],
            'password' => $_POST['password'],
            'name' => $_POST['name'],
        )
    );
    /**
     * On regarde que notre inscription est ok.
     * Si oui on renvoie vers la page de login
     */
    if ($ok === true)
        isLogin();
}
include_once('corp/head.phtml');
?>
    <body class="text-center">
    <link href="css/inscription.css" rel="stylesheet">
    <main class="form-signin">
        <div class="container-fluid">
            <form method="POST">
                <h1 class="h3 mb-3 fw-normal">Formulaire d'inscription</h1>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" name="login" placeholder="Ex: Asterix">
                    <label for="floatingInput">Login</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating">
                    <input type="name" name="name" class="form-control" id="floatingPassword" placeholder="name">
                    <label for="floatingPassword">Username</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Inscription</button>
                <p class="mt-5 mb-3 text-muted">© 2021</p>
            </form>
            <a type="button" href="/index.php" role="button" class="btn btn-warning">Login</a>
        </div>
    </main>


<?php
include_once('corp/footer.phtml');




