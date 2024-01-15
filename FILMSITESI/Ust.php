<?php
include "Baglan.php"
?>

<!DOCTYPE html>
<html lang="tr-TR">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="description" content="<?php echo $Ayar['ayar_description'] ?>">
    <meta name="keywords" content="<?php echo $Ayar['ayar_keywords'] ?>">
    <title><?php echo $Ayar['ayar_baslik'] ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ramabhadra&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <script>
        function search() {
            var searchTerm = document.getElementById('arama').value;
            // Burada yapılacak işlemleri ekleyin, örneğin AJAX kullanarak arama sonuçlarını getirebilirsiniz.
            // Örnek: console.log('Aranan: ' + searchTerm);
        }
    </script>

</head>

<body>
    <!--ust başlangıç -->
    <div class="ust">
        <a href="index.php">
            <img src="img/logo2.jpg" height="80" width="250"></a>

        <div class="butons">
            <div class="giriss">
                <a href="login.html">
                    <center><button class="btn-1"> Giriş Yap</button></center>
                </a>
            </div>
            <div class="kayitt">
                <a href="signin.html">
                    <center><button class="btn-1"> Kayıt Ol</button></center>
                </a>
            </div>
        </div>

    </div>
    <!--ust bitiş -->

    <!--menu başlangıç -->
    <div class="menu">
        <ul>
            <li><a href="index.php"><b>AnaSayfa</b></a></li>
            <li><a href="#">Filmler</a></li>
            <li><a href="#">Diziler</a></li>
            <li><a href="hakkinda.php">Hakkında</a></li>
            <li><a href="iletisim.php">İletişim</a></li>
            <div class="butonhareket">
                <form method="post" action="ara.php">
                    <input id="arama" name="film_adi" type="search" placeholder="Film Adı Ara" oninput="search()">
                    <label for="arama"><button class="" type="submit">Sitede Ara</button></label>

                </form>
            </div>


        </ul>
    </div>

    <!--menu bitiş -->
