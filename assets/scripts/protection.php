<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['iduser'])) {

    die("Vous ne pouvez pas accéder à cette page car vous n'êtes pas connecté.<p><a href='/assets/pages/login'>Connecté</a></p>");
}