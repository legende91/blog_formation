<?php
require 'config/config.php';
require 'functions/functions.php';
/**
 * On supprime la session avec la fonction suivante
 */
session_unset();
/**
 * Comme nous n'avons plus de session alors nous redirigeons vers la page par défaut
 */
isLogin();
