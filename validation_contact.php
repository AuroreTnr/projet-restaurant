<?php

$name = isset($name) ? htmlentities($_POST['nom']) : "";
$prenom = isset($prenom) ? htmlentities($_POST['prenom']) : "";
$email = isset($email) ? htmlentities($_POST['email']) : ""; // ???
$commentaire =  isset($commentaire) ? htmlentities($_POST['commentaire']) : "";



if (isset($_POST['ok']) ) {

    $_SESSION['nom'] = isset($_POST['nom']) ? trim(htmlentities($_POST['nom'], ENT_QUOTES, 'UTF-8')) : "";
    $_SESSION['prenom'] = isset($_POST['prenom']) ? trim(htmlentities($_POST['prenom'], ENT_QUOTES, 'UTF-8')) : "";
    $_SESSION['email'] = isset($_POST['email']) ? trim(htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8')) : "";
    $_SESSION['commentaire'] = isset($_POST['commentaire']) ? trim(htmlentities($_POST['commentaire'], ENT_QUOTES, 'UTF-8')) : "";

    // validation passeword au format : au moins 1 caractere et que des lettres.
    if (!empty($_POST['nom']) && preg_match('/^[A-Za-zÀ-ÖØ-öø-ÿ-]*$/', $_POST['nom'])){
        $lastname = trim(htmlentities($_POST['nom'], ENT_QUOTES, 'UTF-8'));
    }else {
        $_SESSION['error_message'] = "Entrez votre nom";
        header("Location: contact.php");
        exit;
    }
    
    // validation passeword au format : au moins 1 caractere et que des lettres.
    if (!empty($_POST['prenom']) && preg_match('/^[A-Za-zÀ-ÖØ-öø-ÿ-]*$/', $_POST['prenom'])){
        $firstname = trim(htmlentities($_POST['prenom'], ENT_QUOTES, 'UTF-8'));
    }else {
        $_SESSION['error_message'] = "Entrez votre prénom";
        header("Location: contact.php");
        exit;
    }

    if (!empty($_POST['email']) && filter_var(trim(htmlentities($_POST['email'])), FILTER_VALIDATE_EMAIL)) {
        $email = trim(htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8'));
    }else {
        $_SESSION['error_message'] = "Entrez votre email";
        header("Location: contact.php");
        exit;
    }
}