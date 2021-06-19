<?php

/**
 * Fonction servant a faire rediriger le user vers la page d'accueil
 */
function home()
{
    if(isset($_SESSION['user']) && !empty($_SESSION['user']) &&  $_SESSION['user']->id > 0 ){
        header('Location:/home.php');
    }
}

/**
 * Fonction servant a savoir si le user est connecter ou pas
 */
function isLogin(){
    if(empty($_SESSION['user']) || $_SESSION['user']=== null)
    {
        header('Location:/index.php');
    }
}

function isUserAdmin(){

}
