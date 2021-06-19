<?php
/**
 *  On active les session directement ici afin d'éviter de devoir l'appeler dans chaque page
 */
session_start();

/**
 * On definie des constantes pour eviter d'aller modifier ces valeurs là partouts dans le code. Cela fait ganger pas mal de temps
 */
define('MYSQL_HOST', 'localhost');
define('MYSQL_DBNAME', 'blog_formation');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', '');



