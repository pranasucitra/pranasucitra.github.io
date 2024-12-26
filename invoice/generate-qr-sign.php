<?php require 'utils/QRCodeGenerator.php';

if (isset($_GET['_value'])) {
    $value = $_GET['_value'];

    $size = "120";
    $color = "#000";

    // $logo="logos/logo.png";
    $logo = null; // If no logo
    $file_type = "png";

    // QR Payload
    $payload = $value;

    //Initalize QR
    $qr = new QRCodeGenerator;
    // Set QR Dimensions
    $qr->setDimensions($size, $color, $logo, $file_type);
    // Set QR Payload
    $qr->setPayload($payload);
    $base64 = $qr->execute();
    if (!base64_decode($base64, true)) {
        exit($base64);
    }

    echo "<img src='data:image/png;base64, {$base64}' />";
}
