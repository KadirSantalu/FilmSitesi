<?php
include "../Baglan.php";
session_destroy();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Film Sitesi Panel Giriş</title>

  <!-- Bootstrap -->
  <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form action="login_giris.php" method="post">
            <h1>Giriş Formu</h1>
            <?php
            if (isset($_GET['logout'])) {

            ?>
              <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                Çıkış Yapılmıştır!
              </div>
            <?php
            }
            ?>

            <?php
            if (isset($_GET['hata'])) {

            ?>
              <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                Kullanici Mail veya Şifre Yanlış!
              </div>
            <?php
            }
            ?>
            <div>
              <input type="text" name="kadi" id="kadi" class="form-control" placeholder="Kullanıcı Adını Giriniz" required="" />
            </div>
            <div>
              <input type="password" name="sifre" id="sifre" class="form-control" placeholder="Şifrenizi Giriniz" required="" />
            </div>
            <div>
              <input style="float: none; margin:0; " class="btn btn-default submit" type="submit" value="Giriş Yap">
            </div>

            <div class="clearfix"></div>

            <div class="separator">


              <div class="clearfix"></div>
              <br />


            </div>
          </form>
        </section>
      </div>

      <!-- <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

            
              </div>
            </form>
          </section>
        </div> -->
    </div>
  </div>
</body>

</html>