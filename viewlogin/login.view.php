<?php
 include('includes/header.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../fonts/icomoon/style.css">

    <link rel="stylesheet" href="../css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="../css/style.css">

    <title>Login</title>
  </head>
  <body>
  <style>
  body{
    background-color: #E7E7E7!important;
  }
  .cont_cone{
    background-color: #E8E8E8!important;
    border-radius: 15px!important;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
  }
  .btn_log{
    padding: 5px;
    color: white!important;
    border:none!important;
    background-color:#3AAFF7!important;
    font-size:15px!important;
    font-weight:bold;
  }
  .inp{
    border-radius: 7px;
    font-size:14px;
    border: 2px solid #9A9A9A!important;
  }
  .inp:focus{
    box-shadow:none!important;
    border: 2px solid #9A9A9A!important;
  }
  .form_titre{
    color: #535353;

  }
  .form_soutitre{
    font-size: 14px;
    color: #535353;
  }
  .form_buton{
    background-color:#3AAFF7!important;
    padding:5px!important;
    border:1px solid #3AAFF7;
    border-radius:5px!important;
  }
  .form_btncon{
    font-size: 15px!important;
    color: white;
    border:none!important;
    border-radius: 7px;
    background-color: #6690B8!important;
  }
  .form_btncon:focus{
    box-shadow:none!important;
    color: white !important;
  }
  .incorectmessag{
    font-size: 15px!important;
    font-weight: bold;
    color: red;
  }
  .redirect{
    color: blue;
    text-decoration:none;
  }
  </style>
      <div class="container py-5">
        <div class="row pt-3">
          <div class="col-12 col-lg-4"></div>
          <div class="col-12 col-lg-4">
            <div class="container-fluid">
              <div class="cont_cone">
                <div class="container py-4">
                  <h6 class="form_titre py-3">CONNECTEZ-VOUS</h6>
                  <form method="POST">
                    <p class="incorectmessag"><?=$incorectpara?></p>
                    <div class="col-12 col-lg-12 py-1">
                        <label class="form_soutitre">E-mail</label>
                      <input type="mail" name="email" class="form-control inp">
                    </div>
                    <div class="col-12 col-lg-12 py-1">
                        <label class="form_soutitre">Mot de Passe</label>
                      <input type="password" name="password" class="form-control inp">
                    </div>
                    <div class="col-12 col-lg-12 py-3">
                      <button type="submit" name="login" class="form-control form_btncon">CONNEXION</button>
                    </div>
                    <!-- <div class="pt-1 text-center">
                      <p>Have You an account? &nbsp;&nbsp; <a href="#" class="redirect">Inscription</a><br>
                      Forget Password? &nbsp;&nbsp; <a href="#" class="redirect">Retrouver</a></p>
                    </div> -->
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
</section>
