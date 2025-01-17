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

    // Validation du nom (au moins 1 caractère et que des lettres)
    if (empty($_POST['nom']) || !preg_match('/^[A-Za-zÀ-ÖØ-öø-ÿ\-]+$/', $_POST['nom'])) {
        $_SESSION['error_message'] = "Entrez un nom valide (lettres seulement).";
        $_SESSION['nom'] = $_POST['nom'];
        header("Location: contact.php");
        exit;
    }else {
        $_SESSION['nom'] = $_POST['nom'];
    }

    // Validation du prénom (au moins 1 caractère et que des lettres)
    if (empty($_POST['prenom']) || !preg_match('/^[A-Za-zÀ-ÖØ-öø-ÿ\-]+$/', $_POST['prenom'])) {
        $_SESSION['error_message'] = "Entrez un prénom valide (lettres seulement).";
        $_SESSION['prenom'] = $_POST['prenom'];
        header("Location: contact.php");
        exit;
    }else{
        $_SESSION['prenom'] = $_POST['prenom'];
    }

    // Validation de l'email
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_message'] = "Entrez un email valide.";
        $_SESSION['email'] = $_POST['email'];
        header("Location: contact.php");
        exit;
    }else{
        $_SESSION['email'] = $_POST['email'];
    }

    // Validation du commentaire (au moins 1 caractère)
    if (empty($_POST['commentaire'])) {
        $_SESSION['error_message'] = "Entrez un commentaire.";
        $_SESSION['commentaire'] = $_POST['commentaire'];
        header("Location: contact.php");
        exit;
    }else{
        $_SESSION['commentaire'] = $_POST['commentaire'];
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

        if ($mail) {
            $_SESSION['error_message'] = "Votre message a été envoyé avec succès !";
            $_SESSION['attributes'] = "alert-success";

        }

        // Redirection vers la page de contact avec un message de succès
        header("Location: contact.php");
        exit;

    } catch (Exception $e) {
        // Gestion des erreurs d'envoi d'email
        $_SESSION['error_message'] = "Message non envoyé. Erreur de PHPMailer: " . $e;
        header("Location: contact.php");
        exit;
    }
}
