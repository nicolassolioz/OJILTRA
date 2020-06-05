<?php

require_once("phpqrcode/qrlib.php");

$companyID = 'ln2020';
$articleID = '923571';

$folder = 'qrcode';

$company_folder = $folder . '/' . $companyID;
if (!file_exists($company_folder)) {
    mkdir($company_folder, 0777, true);
}

// Path where the images will be saved
$filepath = $folder . '/' . $companyID . '/' . $articleID . '.png';
//$filepath = $folder . '/' . $articleID . '.png';

// Image (logo) to be drawn
$logopath = 'images/logo_qrcode.png';
// qr code content
$codeContents = $companyID . '/' . $articleID ;
// Create the file in the providen path
// Customize how you want
QRcode::png($codeContents,$filepath , QR_ECLEVEL_H, 20);

// Start DRAWING LOGO IN QRCODE

$QR = imagecreatefrompng($filepath);

// START TO DRAW THE IMAGE ON THE QR CODE
$logo = imagecreatefromstring(file_get_contents($logopath));

/**
 *  Fix for the transparent background
 */
imagecolortransparent($logo , imagecolorallocatealpha($logo , 0, 0, 0, 127));
imagealphablending($logo , false);
imagesavealpha($logo , true);

$QR_width = imagesx($QR);
$QR_height = imagesy($QR);

$logo_width = imagesx($logo);
$logo_height = imagesy($logo);

//echo($QR_width);
//echo($logo_height);

// Scale logo to fit in the QR Code
$logo_qr_width = $QR_width/5;
$scale = $logo_width/$logo_qr_width;
$logo_qr_height = $logo_height/$scale;

imagecopyresampled($QR, $logo, $QR_width/2.5, $QR_height/2.4, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);


// Save QR code again, but with logo on it
imagepng($QR,$filepath);

// End DRAWING LOGO IN QR CODE

// Ouput image in the browser
echo '<img src="'.$filepath.'" />';

?>