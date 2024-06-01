<?php

session_start();

require_once '../vendor/autoload.php';

$google_client = new Google_Client();
$google_client->setClientId('554908965148-otkc1s3igmg4t3stlpl24k7i9mlonmeh.apps.googleusercontent.com');
$google_client->setClientSecret('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');
$google_client->setRedirectUri('http://127.0.0.1:8000/');

$google_client->addScope('email');

if (isset($_GET["code"])) {

    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
    var_dump($token);
    /*if (!isset($token['error'])) {

        $google_client->setAccessToken($token['access_token']);

        $_SESSION['access_token'] = $token['access_token'];

        $google_service = new Google_Service_Oauth2($google_client);

        $data = $google_service->userinfo->get();

        if (!empty($data['given_name'])) {
            $_SESSION['user_first_name'] = $data['given_name'];
        }

        if (!empty($data['family_name'])) {
            $_SESSION['user_last_name'] = $data['family_name'];
        }

        if (!empty($data['email'])) {
            $_SESSION['user_email_address'] = $data['email'];
        }

        if (!empty($data['picture'])) {
            $_SESSION['user_image'] = $data['picture'];
        }
    }*/
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>SGP</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo text-center py-3 mb-0">
        <img class="img-fluid" width="120px" src="assets/img/logo.png" />
        <h2 class="mt-3" style="font-weight:400">Sistema de Gestión de Proyectos</h2>
      </div>
      <div class="login-box">
        <form class="login-form" action="{{ url('login') }}" method="POST">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Iniciar Sesión</h3>
          <div class="form-group">
            <label class="control-label">Usuario</label>
            <input class="form-control" name="TxtCorreo" type="email" placeholder="Usuario" value="{{ old('TxtCorreo') }}" required autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">Contraseña</label>
            <input class="form-control" name="TxtClave" type="password" required placeholder="Contraseña">
          </div>
          <div class="form-group btn-container">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Iniciar Sesión</button>
            <hr class="hr" />
            <a class="btn btn-outline-primary btn-block" href="<?= $google_client->createAuthUrl() ?>"><i class="fa fa-google fa-lg fa-fw"></i>Sign in with Google</a>
          </div>

          <div class="mt-3 text-center">
          <!--<a href="/recuperar">* Recuperar Contraseña *</a>-->
          </div>
        </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="assets/js/plugins/pace.min.js"></script>
  </body>
</html>