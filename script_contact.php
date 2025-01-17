<?php
session_start(); // Démarrer la session pour gérer les messages d'erreur et autres données
require 'vendor/autoload.php'; // Si vous utilisez Composer, inclure l'autoloader PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Initialisation des messages d'erreur
$_SESSION['error_message'] = "";
$_SESSION['attributes'] = "alert-danger";

// Vérification de la soumission du formulaire
if (isset($_POST['ok'])) {

    // Validation du commentaire (au moins 1 caractère)
    // il est en premier pour pas qu il s efface si l email n' est pas bon. 
    if (!empty($_POST['commentaire'])) {
        $_SESSION['commentaire'] = $_POST['commentaire'];
    }else{
        $_SESSION['error_message'] = "Entrez un commentaire.";
        $_SESSION['commentaire'] = $_POST['commentaire'];
        header("Location: contact.php");
        exit;
    }
    

    // Validation du nom (au moins 1 caractère et que des lettres)
    if (!empty($_POST['nom']) && preg_match('/^[A-Za-zÀ-ÖØ-öø-ÿ\-]+$/', $_POST['nom'])) {
        $_SESSION['nom'] = $_POST['nom'];
    }else {
        $_SESSION['error_message'] = "Entrez un nom valide (lettres seulement).";
        $_SESSION['nom'] = $_POST['nom'];
        header("Location: contact.php");
        exit;
    }

    // Validation du prénom (au moins 1 caractère et que des lettres)
    if (!empty($_POST['prenom']) && preg_match('/^[A-Za-zÀ-ÖØ-öø-ÿ\-]+$/', $_POST['prenom'])) {
        $_SESSION['prenom'] = $_POST['prenom'];
    }else{
        $_SESSION['error_message'] = "Entrez un prénom valide (lettres seulement).";
        $_SESSION['prenom'] = $_POST['prenom'];
        header("Location: contact.php");
        exit;
    }

    // Validation de l'email
    if (!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['email'] = $_POST['email'];
    }else{
        $_SESSION['error_message'] = "Entrez un email valide.";
        $_SESSION['email'] = $_POST['email'];
        header("Location: contact.php");
        exit;
    }


    try {
        $mail = new PHPMailer(true);

        // l'email
        $mail->isSMTP(); 
        $mail->Host = 'localhost'; 
        $mail->Port = 1025;
        $mail->SMTPAuth = false;
        
        $mail->setFrom($_POST['email'], $_POST['nom'] . " " . $_POST['prenom'] );
        $mail->addAddress('thedistrict@restaurant.com', 'the district restaurant'); 

        // Contenu de l'email
        $mail->isHTML(true); // Format HTML
        $mail->Subject = 'Nouveau message de contact';
        $mail->Body    = 'Nom : ' . $_POST['nom'] . '<br>' .
                         'Prénom : ' . $_POST['prenom'] . '<br>' .
                         'Email : ' . $_POST['email'] . '<br>' .
                         'Commentaire : ' . nl2br($_POST['commentaire']); // Corps de l'email

        // Envoi de l'email
        $mail->send();

        if (isset($mail)) {
            $_SESSION['error_message'] = "Votre message a été envoyé avec succès !";
            $_SESSION['attributes'] = "alert-success";

            unset($_SESSION['nom']);
            unset($_SESSION['prenom']);
            unset($_SESSION['email']);
            unset($_SESSION['commentaire']);

        }

        header("Location: contact.php");
        exit;

    } catch (Exception $e) {
        // Gestion des erreurs d'envoi d'email
        $_SESSION['error_message'] = "Message non envoyé. Erreur de PHPMailer: " . $e;
        header("Location: contact.php");
        exit;
    }
}
