<?php
// Mise en place d'un menu et en dessous de quelques articles
/**
 * Titre de la page
 */
$title="Accueil";
require 'config/config.php';
require 'includes/db.php';
require 'functions/functions.php';
isLogin();

/**
 * on va faire la request pour voir tous les articles avec la relation de qui a écrit les articles
 */
$data = $db->prepare('SELECT  a.*,u.name FROM article a JOIN user u ON a.user_id=u.id');
$data->execute();
/**
 * on affecter la valeur trouvé à la variable
 */
$articles = $data->fetchAll(PDO::FETCH_OBJ);


include_once('corp/head.phtml');
?>

    <body class="text-center">
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($articles as $k) : ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="<?php echo $k->img ?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title><?php echo $k->title ?></title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em"><?php echo $k->title ?></text></img>

                        <div class="card-body">
                            <p class="card-text"><?php echo substr($k->description,0,150) ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="/articles.php?id=<?php echo $k->id ?>" type="button" class="btn btn-sm btn-outline-secondary">En savoir plus</a>
                                </div>
                                <small class="text-muted"><?php echo $k->name ?></small>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>






<?php
include_once('corp/footer.phtml');
