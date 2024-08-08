# QR Code Generator

This project is a PHP-based QR Code generator that utilizes the open-source **phpqrcode** library. It allows you to generate QR Codes by simply passing text as input. The generated QR Code can be displayed directly in the browser or saved as an image file.

## Features

- **Generate QR Codes**: Create QR Codes from any text input.
- **Display or Save**: The generated QR Codes can be shown directly in the browser or saved as image files.
- **Customizable**: Adjust the error correction level, pixel size, and frame size of the QR Code.

## Getting Started

### Prerequisites

- **PHP**: Ensure PHP is installed on your system.
- **phpqrcode Library**: Download the **phpqrcode** library from SourceForge.

### Installation

1. **Download the phpqrcode Library**:

   - Visit the [phpqrcode page on SourceForge](https://sourceforge.net/projects/phpqrcode/).
   - Download and extract the library.

2. **Copy to Project**:
   - Copy the extracted `phpqrcode` folder into your project directory.

### Usage

To generate a QR Code, include the `qrlib.php` file from the **phpqrcode** library in your PHP code.

Example usage:

```php
require_once 'phpqrcode/qrlib.php';

// Text to encode
$text = "Hello, QR Code!";

// Output file path
$file = 'qrcode.png';

// Error Correction Level: 'L' (Low), 'M' (Medium), 'Q' (Quartile), 'H' (High)
$ecc = 'L';

// Pixel size (1-10)
$pixel_Size = 10;

// Frame size (1-10)
$frame_Size = 4;

// Generate QR code and save it as a file
QRcode::png($text, $file, $ecc, $pixel_Size, $frame_Size);

// Or display it directly in the browser
QRcode::png($text);
```
