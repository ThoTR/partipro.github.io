<?php
    require_once '../configs/do_login.php';

    /*if ($obj->is_logged() != ""){
      $obj->redirect('index.php');
    }

    if (isset($_POST['login-btn'])) {
      if ($obj->login()) {
          $message = 'login success !!';
          //$obj->redirect('index.php?message=' . $message);
          header("Location: localhost:8080/PWP/Project/index.php");
      } else {
          $error = "Enter valid email and password !";
      }
  }
  if (isset($_GET['logout'])) {
      $obj->logout();
  } */
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="../public/css/mystyle.css">
  <title>Se connecter | PartiPro</title>
 
</head>

<body class="text-center"> 
  
    <form class="form-signin" method="post" name="login" action="do_login.php">
      <div class="login-box">
        <h1>Se connecter</h1>
      </div>
      
      <div class="form-group">
        <input type="text" name="username" class="form-control" id="name" value=""  placeholder="Identifier" required autofocus >
      </div>

      <div class="form-group"> 
        <input type="password" name="password" class="form-control" id="inputPassword" value="" placeholder="Mot de passe" required>
      </div>

      <div class="checkbox mb-3" >
        <label>
        <input type="checkbox" name="remember_me" id="remember_me" value="remember-me" >
          Mémoriser mes informations
        </label>
      </div>
    <button style="font-size : 12px" class="btn btn-dark btn-lg btn-block" id='login-button' name="login-btn" type='submit'>Se connecter</button>
  </form>
</body>
</html>