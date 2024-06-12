<?php
require '../vendor/autoload.php'; // Adjust path as necessary

use Firebase\Auth\Token\Verifier;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;

$serviceAccount = __DIR__ . '/../credential.json'; // Adjust path as necessary
$firebase = (new Factory)->withServiceAccount($serviceAccount);
$auth = $firebase->createAuth();

$data = json_decode(file_get_contents('php://input'), true);
$idTokenString = $data['token'];

try {
    $verifiedIdToken = $auth->verifyIdToken($idTokenString);
    $uid = $verifiedIdToken->claims()->get('sub');

    echo json_encode([
        'status' => 'success',
        'uid' => $uid,
        'user' => $data['user']
    ]);
} catch (\Kreait\Firebase\Exception\Auth\InvalidToken $e) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid token']);
} catch (\InvalidArgumentException $e) {
    echo json_encode(['status' => 'error', 'message' => 'The token could not be parsed']);
}
