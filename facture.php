<?php
// Définir le type MIME pour un fichier PDF
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="facture_the_district.pdf"');
header('Cache-Control: no-cache, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

// Créer un fichier PDF basique avec des données simples
echo "%PDF-1.4\n";
echo "1 0 obj\n";
echo "<< /Type /Catalog /Pages 2 0 R >>\n";
echo "endobj\n";
echo "2 0 obj\n";
echo "<< /Type /Pages /Kids [3 0 R] /Count 1 >>\n";
echo "endobj\n";
echo "3 0 obj\n";
echo "<< /Type /Page /Parent 2 0 R /MediaBox [0 0 612 792] /Contents 4 0 R >>\n";
echo "endobj\n";
echo "4 0 obj\n";
echo "<< /Length 44 >>\n";
echo "stream\n";
echo "BT\n";
echo "/F1 24 Tf\n";
echo "72 720 Td (Facture The District) Tj\n";
echo "72 700 Td (Nom du client: Jean Dupont) Tj\n";
echo "72 680 Td (Email: jean.dupont@example.com) Tj\n";
echo "72 660 Td (Total: 40.00 EUR) Tj\n";
echo "ET\n";
echo "endstream\n";
echo "endobj\n";
echo "xref\n";
echo "0 5\n";
echo "0000000000 65535 f \n";
echo "0000000010 00000 n \n";
echo "0000000070 00000 n \n";
echo "0000000124 00000 n \n";
echo "0000000213 00000 n \n";
echo "trailer\n";
echo "<< /Size 5 /Root 1 0 R >>\n";
echo "startxref\n";
echo "284\n";
echo "%%EOF\n";
?>
