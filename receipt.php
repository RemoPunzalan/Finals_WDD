<?php
include('connect.php');
include('fpdf/fpdf.php');

function generateReceiptPDF($orderData)
{
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 12);

    // Add your header content here
    $pdf->Cell(200, 10, "KICKSTART", 0, 0, 'C');
    $pdf->Ln(10);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(200, 10, "Your Ultimate Sneaker Store", 0, 0, 'C');
    $pdf->Ln(10);
    $pdf->Ln();
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(200, 10, "Order Receipt", 0, 0, 'C');
    $pdf->Ln(10);
    $pdf->Cell(200, 5, "-------------------------------------------", 0, 0, 'C');
    $pdf->Ln(10);

    // Set up header row
    $width_cell = array(40, 100);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->SetFillColor(193, 229, 252);
    $pdf->Cell($width_cell[0], 10, 'Sneaker', 0, 0, 'C', true);
    $pdf->Cell($width_cell[1], 10, 'Brand', 0, 0, 'C', true);
    $pdf->Ln();

    // Set up data rows
    $fill = false;
    $pdf->SetFillColor(235, 236, 236);

    foreach ($orderData as $row) {
        $pdf->Cell($width_cell[0], 8, $row['sneaker'], 0, 0, 'C', $fill);
        $pdf->Cell($width_cell[1], 8, $row['brand'], 0, 1, 'C', $fill);
        $fill = !$fill;
    }

    $pdf->Ln(10);
    $pdf->Cell(200, 5, "-------------------------------------------", 0, 0, 'C');
    $pdf->Ln(10);
    $pdf->Cell(200, 5, "Thank you for shopping at KICKSTART!", 0, 0, 'C');

    // Output the PDF
    $pdf->Output();
}

// Fetch order data from the cart table
$result = mysqli_query($conn, "SELECT sneaker, brand FROM cart");
$orderData = array();
while ($row = mysqli_fetch_array($result)) {
    $orderData[] = $row;
}
mysqli_query($conn, "DELETE FROM cart");

// Call the function to generate PDF receipt
generateReceiptPDF($orderData);
?>
