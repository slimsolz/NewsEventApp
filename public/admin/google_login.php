<?php
require_once "../../vendor/autoload.php";
require_once '../../includes/config.php';
require_once '../../includes/functions.php';
require_once '../../includes/database.php';
require_once '../../includes/admin.php';
require_once '../../includes/session.php';

$admin = new Admin();
$google_client = new Google_Client();
$google_client->setClientId(GOOGLE_CLIENT_ID);
$google_client->setClientSecret(GOOGLE_CLIENT_SECRET);
$google_client->setRedirectUri(GOOGLE_REDIRECT_URL);
$google_client->setScopes("email profile");

$auth_url = $google_client->createAuthUrl();
echo "<a href='$auth_url'>Login with google</a>";

$code = isset($_GET['code']) ? $_GET['code'] : null;

if ($session ->isLoggedIn()) {
  redirectTo("./Admin/manageAdmin.php");
}

if(isset($code)) {
  try {
    $token = $google_client->fetchAccessTokenWithAuthCode($code);
    $google_client->setAccessToken($token);
  } catch (Exception $e) {
    echo $e->getMessage();
  }

  try {
    $payload = $google_client->verifyIdToken();
  } catch (Exception $e) {
    echo $e->getMessage();
  }
} else {
  $payload = null;
}

if (isset($payload)){
  $admin->email = $email = $payload['email'];
  $admin->firstName = $firstName = $payload['given_name'];
  $admin->lastName = $lastName = $payload['family_name'];

  $foundUser = Admin::findByEmail($email);
  if (!$foundUser){
    $admin->save();
    $user = Admin::findById($database->insertId());
    $session->login($user);
    redirectTo("./Admin/manageAdmin.php");
  } else {
    $session->login($foundUser);
    redirectTo("./Admin/manageAdmin.php");
  }
}
