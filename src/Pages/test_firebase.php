<?php
require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;

try {
    $factory = (new Factory)->withServiceAccount(__DIR__ . '/config/firebase_credentials.json');
    echo "✅ Firebase SDK Loaded Successfully!";
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage();
}
