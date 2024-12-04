<?php 
// sanitize
if(isset($_POST["btnContact"])){
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
    echo "nom {$name} \n";

    $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_SPECIAL_CHARS);
    echo "prenom : {$prenom} \n";
    
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    echo "email : {$email} \n";
    
    $commentaire = filter_input(INPUT_POST, "commentaire", FILTER_SANITIZE_SPECIAL_CHARS);
    echo "commentaire : {$commentaire} \n";
}
?>



