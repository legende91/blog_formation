<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


/**
 * Titre de la page
 */
$title="Login";
/**
 * Attention le session starts est dans le fichier de config
 * On ajoutes sur toutes les pages les fichiers suivant
 */
require 'config/config.php';
require 'includes/db.php';
require 'functions/functions.php';

/**
 * On regarde que les variables éxiste et ne soit pas ne sont pas vide
 */
if(isset($_POST['login'],$_POST['password']) && !empty($_POST['login']) &&!empty($_POST['password'])){
    /**
     * On créer une requète préparer afin de regarder si notre user existe
     */
    $data = $db->prepare('SELECT  * FROM user  WHERE `login`=:login AND password=:password');
    $data->execute(array(
            'login'=> $_POST['login'],
            'password'=> $_POST['password']
        )
    );
    /**
     * on affecter la valeur trouvé à la variable user et on la cast en objet d'ou le PDO::FETCH_OBJ
     */
    $user = $data->fetch(PDO::FETCH_OBJ);
    // on regarde si on à bien trouvé un user
    if(isset($user) && !empty($user)){
        /**
         * On affecter ensuite notre objet à un index de la session
         * Attention le $user est un objet de type user qui représentes les champs de la DB
         * Donc pour accéder à un membre de cette objet nous devons utiliser ->
         * Nous verrons cela dans la page home
         */
        $_SESSION['user']= $user;
        home();
    }
}
   include_once('corp/head.phtml');
?>
    <body class="text-center">
    <link href="css/inscription.css" rel="stylesheet">
    <main class="form-signin">
        <div class="container-fluid">
            <form method="POST">
                <h1 class="h3 mb-3 fw-normal">Connexion</h1>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" name="login" placeholder="Ex: Asterix">
                    <label for="floatingInput">Login</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                <p class="mt-5 mb-3 text-muted">© 2021</p>
            </form>
            <a type="button" href="/inscription.php" role="button" class="btn btn-warning">inscription</a>
        </div>
    </main>


<?php
include_once('corp/footer.phtml');
