<?php
// Inclure la bibliothèque FPDF
require('./fpdf186/fpdf.php');

class PDF extends FPDF {
    // Page d'initialisation
    function Header() {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Facture', 0, 1, 'C');
    }

    // Page de contenu
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page '.$this->PageNo(), 0, 0, 'C');
    }
}

// Récupérer les informations du client et de la commande
$clientNom = 'Client Exemple';
$clientEmail = 'client@example.com';
$numeroCommande = '12345';
$montantTotal = '100.00€';
$numeroCommande = 2;

// Créer le PDF
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, "Nom du Client: $clientNom", 0, 1);
$pdf->Cell(0, 10, "Numéro de commande: $numeroCommande", 0, 1);
$pdf->Cell(0, 10, "Montant Total: $montantTotal", 0, 1);
// Crée le dossier avec les bonnes permissions
$directory = './FACTURES';
if (!is_dir($directory)) {
    mkdir($directory, 0777, true);  
}

// Un identifiant unique basé sur `uniqid()`
$numeroFacture = 'FAC-' . strtoupper(uniqid()); 
$pdfOutputPath = $directory . '/facture.pdf';

// Sauvegarde le PDF généré
$pdf->Output('F', $pdfOutputPath);


?>