<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center">
    <?php
    include 'phpqrcode/qrlib.php';
    $qrData = "";
    $link = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $link = $_POST["link"];
        $filename = basename($link);
        ob_start();
        QRcode::png($link, null, QR_ECLEVEL_L, 10, 2);
        $qrData = base64_encode(ob_get_contents());
        ob_end_clean();
    }
    ?>
    <div class="container mx-auto p-8 bg-white shadow-md rounded-lg max-w-lg w-full">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <h4 class="text-lg font-medium text-gray-900 mb-4 text-center">Generate QR Code</h4>
            <div class="mb-4">
                <label for="link" class="block text-sm font-medium text-gray-700">Enter your link</label>
                <input type="url" id="link" name="link" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>
            <div class="mb-4">
                <button type="submit" class="w-full inline-flex justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Generate
                </button>
            </div>
        </form>
        <?php if ($qrData): ?>
        <div class="mt-8 text-center">
            <h2 class="text-lg font-medium text-gray-900 mb-2">Generated QR Code:</h2>
            <div class="border border-gray-200 rounded-lg p-4 inline-block" style="max-width: 256px;">
                <img src="data:image/png;base64,<?php echo $qrData; ?>" alt="QR Code" class="w-full h-auto mx-auto">
            </div>
            <div class="mt-4">
                <h2 class="text-md font-medium text-gray-700">Link:</h2>
                <p class="text-gray-600 mb-4 break-words"><?php echo htmlspecialchars($link); ?></p>
                <a href="data:image/png;base64,<?php echo $qrData; ?>" download="<?php echo htmlspecialchars($filename); ?>.png" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Download
                </a>
            </div>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
