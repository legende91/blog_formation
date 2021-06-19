<?php
// affichage d'un article avec possibilité de mettre un com
require 'config/config.php';
require 'includes/db.php';
require 'functions/functions.php';
isLogin();

if(!isset($_GET['id']) && empty($_GET['id'])){
    home();
}

/**
 * on va faire la request pour voir l'article demander ainsi que tous les commentaires liée
 */
$data = $db->prepare('SELECT a.id as articleId, a.title, a.description, a.img, a.created_at, u.name as articleUserName, u.id as articleUserId, u2.name as commentUserName, c.text as commentText FROM article a JOIN comment c on a.id = c.article_id LEFT JOIN user u on a.user_id= u.id LEFT join user u2 ON u2.id=c.user_id where a.id=:id ');
$data->execute(array(
    'id'=>$_GET['id']
));
/**
 * on affecter la valeur trouvé à la variable
 */
$articles = $data->fetchAll(PDO::FETCH_OBJ);
if(empty($articles))
    home();
/**
 * Titre de la page
 */
$title=$articles[0]->title;

include_once('corp/head.phtml');
?>
    <body>
<main class="container" style="">
    <div class="btn-group" style="margin: 30px 0px">
        <a href="/home.php" type="button" class="btn btn-sm btn-outline-secondary">retour</a>
    </div>
    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <div class="col-md-12" style="text-align: center">
            <img src="<?php echo $articles[0]->img ?>" />
        </div>
        <div class="col-md-12 px-0">
            <h1 class="display-4 fst-italic"><?php echo $articles[0]->title ?></h1>
            <p class="lead my-3"><?php echo $articles[0]->description ?></p>
            <p class="lead my-1" >De <?php echo $articles[0]->articleUserName ?></p>
        </div>
    </div>

    <?php foreach ($articles as $k): ?>
        <div class="card" style="margin-bottom: 10px ">
            <div class="card-header">
                De <?php echo $k->commentUserName ?>
            </div>
            <div class="card-body">
                <p class="card-text"><?php echo $k->commentText?></p>
            </div>
        </div>
    <?php endforeach;?>

</main>

<?php
include_once('corp/footer.phtml');

