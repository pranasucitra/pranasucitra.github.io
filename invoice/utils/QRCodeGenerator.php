<?php

/**
 * QR Code Generator
 *
 * Generates QR code and allows user to set dimensions, payload, and embed logo.
 * Requirements: PHP 5, PHP 7, Enabled PHP-GD library.
 * This class uses the PHP QR Code library from http://phpqrcode.sourceforge.net/.
 * How to use: 1) QRCodeGenerator instance 2) setDimensions() 3) setPayload() 4) execute().
 * Payload should be passed in JSON object string written in key/value pairs.
 *
 * @author Robin Correa <robincorrea@axs.com.sg>
 * @version 1.0.0
 *
 * @see http://phpqrcode.sourceforge.net/
 */
class QRCodeGenerator
{
    /**
     * QR default size (pixels)
     *
     * @var string
     */
    private $size = "110";

    /**
     * Min QR size (pixels)
     *
     * @var string
     */
    private $minSize = "110";

    /**
     * Max QR size (pixels)
     *
     * @var string
     */
    private $maxSize = "1000";

    /**
     * Allowed Logo File extesions (pixels)
     *
     * @var array
     */
    private $allowedLogoExtensions = array('gif', 'jpg', 'png');

    /**
     * QR Color
     *
     * @var string
     */
    private $color = "#000000";

    /**
     * Logo image file path
     *
     * @var string
     */
    private $logo = null;

    /**
     * File type
     *
     * @var string
     */
    private $file_type = "";

    /**
     * Outer frame width
     *
     * @var int
     */
    private $frame = 1;

    /**
     * SGQR Payload
     *
     * @var array
     */
    private $payload = null;

    /**
     * Execute Generator class
     *
     * Executes the QR class functionalities
     *
     * @author Robin Correa <robincorrea@axs.com.sg>
     * @version 1.0.0
     *
     * @return string Base64 encoded string.
     */
    public function execute()
    {
        try {
            return $this->generateQr();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Set Dimensions
     *
     * Sets the dimensions of the QR code image. Dimensions: size, color and logo.
     *
     * @author Robin Correa <robincorrea@axs.com.sg>
     * @version 1.0.0
     *
     * @param   int     $size   QR size
     * @param   string  $color   QR Color
     * @param   string  $logo    QR Logo image file path
     *
     * @return  void
     */
    public function setDimensions($size = "240", $color = "#000000", $logo = null, $file_type)
    {
        $this->size = $size;
        $this->color = $color;
        $this->logo = $logo;
        $this->file_type = $file_type;
    }

    /**
     * Set SGQR Payload
     *
     * Sets the SGQR Payload (String or array). Payload
     *
     * @author Robin Correa <robincorrea@axs.com.sg>
     * @version 1.0.0
     *
     * @param   string  $payload  JSON Payload data
     *
     * @return  void
     */
    public function setPayload($payload)
    {
        $this->payload = $payload;
    }

    /**
     * Generate QR code
     *
     * Generates the QR code based on the parameters
     *
     * @author Robin Correa <robincorrea@axs.com.sg>
     * @version 1.0.0
     *
     * @see http://phpqrcode.sourceforge.net/examples/index.php?example=711
     *
     * @return string Base64 encoded data (image file)
     */
    private function generateQr()
    {
        // Include the PHP QR Code library
        require "./lib/qrlib.php";

        if ($this->size > $this->maxSize) {
            throw new Exception("QR size is too large.");
        }

        if ($this->size < $this->minSize) {
            throw new Exception("QR size is too small.");
        }

        // Dimensions
        $size = $this->size;
        $color = $this->hexToRgb($this->color);
        $logo = isset($this->logo) ? $this->validateLogo($this->logo) : null;
        $outerFrame = $this->frame;

        // Generating frame
        $frame = QRcode::text($this->payload, false, QR_ECLEVEL_H);

        // Rendering frame with GD2
        $h = count($frame);
        $w = strlen($frame[0]);

        // Initialize width and height
        $imgW = $w + 2 * $outerFrame;
        $imgH = $h + 2 * $outerFrame;

        // Create base image
        $base_image = imagecreate($imgW, $imgH);

        // Set Background color (White)
        $col[0] = imagecolorallocate($base_image, 255, 255, 255);
        // $col[0] = imagecolorallocate($base_image, 208, 214, 210);

        // Set Foreground color (RGB)
        list($red, $green, $blue) = $color;
        $col[1] = imagecolorallocate($base_image, $red, $green, $blue);

        // Fill the image white color background
        imagefill($base_image, 0, 0, $col[0]);

        // Reference: http://phpqrcode.sourceforge.net/examples/index.php?example=711
        for ($y = 0; $y < $h; $y++) {
            for ($x = 0; $x < $w; $x++) {
                if ($frame[$y][$x] == '1') {
                    imagesetpixel($base_image, $x + $outerFrame, $y + $outerFrame, $col[1]);
                }
            }
        }

        // Create the final image
        $target_image = imagecreate($size, $size);

        // Initialize Write image into a variable
        ob_start();
        imagecopyresized($target_image, $base_image, 0, 0, 0, 0, $size, $size, $imgW, $imgH);
        imagedestroy($base_image);

        switch ($this->file_type) {
            case 'gif':
                imagegif($target_image);
                break;

            case 'jpg':
                imagejpeg($target_image);
                break;

            case 'png':
                imagepng($target_image);
                break;
        }

        imagedestroy($target_image);
        $imageData = ob_get_contents();
        ob_end_clean();

        // If there's embedded logo
        if (isset($logo)) {
            return $this->embedLogo($imageData, $logo);
        }

        // Return the base64 encoded image.
        return base64_encode($imageData);
    }

    /**
     * Embed Logo
     *
     * Adds logo to the base QR image
     *
     * @author Robin Correa <robincorrea@axs.com.sg>
     * @version 1.0.0
     *
     * @param   string  $imageData  Image data binary
     * @param   string  $logo       Logo image file path
     *
     * @return  string              Base64 string
     */
    private function embedLogo($imageData, $logo)
    {
        // Create the image from the string reference
        $QR = imagecreatefromstring($imageData);

        $logo = imagecreatefrompng($logo);

        $qrwidth = imagesx($QR);
        $qrheight = imagesy($QR);

        $logowidth = imagesx($logo);
        $logoheight = imagesy($logo);

        $logo_qr_width = $qrwidth / 4;
        $scale = $logowidth / $logo_qr_width;
        $logo_qr_height = $logoheight / $scale;

        imagecopyresampled($QR, $logo, ($qrwidth - $logo_qr_width) / 2, ($qrheight - $logo_qr_height) / 2, 0, 0, $logo_qr_width, $logo_qr_height, $logowidth, $logoheight);

        // Initialize write image into a variable
        ob_start();

        switch ($this->file_type) {
            case 'gif':
                imagegif($QR);
                break;

            case 'jpg':
                imagejpeg($QR);
                break;

            case 'png':
                imagepng($QR);
                break;
        }

        imagedestroy($QR);
        $imageData = ob_get_contents();
        ob_end_clean();

        // Return the base64 encoded image with logo.
        return base64_encode($imageData);
    }

    /**
     * Validate Logo
     *
     * Validates the logo image file path
     *
     * @author Robin Correa <robincorrea@axs.com.sg>
     * @version 1.0.0
     *
     * @param   string  $logo  Logo image file path
     *
     * @return  string         Validated Logo image file path
     *
     * @throws Exception if the logo image file does not exist.
     */
    private function validateLogo($logo)
    {
        // Check if logo image file does not exist. If yes, throw an exception.
        if (!file_exists($logo)) {
            throw new Exception('File does not exist.');
        }

        // Get the file extension
        $logoFileExtension = pathinfo($logo, PATHINFO_EXTENSION);

        // Validate the file extension
        if (!in_array($logoFileExtension, $this->allowedLogoExtensions)) {
            throw new Exception('The logo is not in PNG format.');
        }

        // Return the image (Validation success)
        return $logo;
    }

    /**
     * Hex To RGB
     *
     * Converts the hexadecimal color to RGB array values
     *
     * @author Robin Correa <robincorrea@axs.com.sg>
     * @version 1.0.0
     *
     * @param   string  $colorHex  Color hex string
     *
     * @return  array             RGB array
     *
     * @throws Exception if the hexadecimal value not valid.
     */
    private function hexToRgb($colorHex)
    {
        // Remove pound symbol
        $trimmedColorHex = ltrim($colorHex, '#');

        // Check if color hex's length is 6
        if (strlen($trimmedColorHex) === 6) {
            $rgb = array_map('hexdec', str_split($trimmedColorHex, 2));

            // Check if color hex's length is 3
        } else if (strlen($trimmedColorHex) === 3) {
            $rgb = array_map(function ($sColor) {
                return hexdec(str_repeat($sColor, 2));
            }, str_split($trimmedColorHex, 1));

            // Invalid color hex value
        } else {
            throw new Exception('Invalid hex color.');
        }

        // Check if RGB value (array) is valid.
        if (count($rgb) !== 3) {
            throw new Exception('Invalid hex color.');
        }

        return $rgb;
    }
}
