<?php
include "Ust.php";

if (isset($_POST["AdSoyad"], $_POST["mail"], $_POST["konu"], $_POST["mesaj"])) {
    $adsoyad = $_POST["AdSoyad"];
    $email = $_POST["mail"];
    $konu = $_POST["konu"];
    $mesaj = $_POST["mesaj"];

    try {
        $ekle = $db->prepare("INSERT INTO siteyorum (siteYorum_AdSoyad, siteYorum_Eposta, siteYorum_Konu, siteYorum_Mesaj) VALUES (?, ?, ?, ?)");

        $ekle->bindParam(1, $adsoyad, PDO::PARAM_STR);
        $ekle->bindParam(2, $email, PDO::PARAM_STR);
        $ekle->bindParam(3, $konu, PDO::PARAM_STR);
        $ekle->bindParam(4, $mesaj, PDO::PARAM_STR);

        if ($ekle->execute()) {
            echo "<script>alert('Mesajınız Başarı ile Gönderildi')</script>";
        } else {
            echo "<script>alert('Mesajınızda hata oluştu')</script>";
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


?>

<div class="container">
    <form id="contact" action="iletisim.php" method="POST">
        <h2>İletişim Sayfası</h2>
        <div class="form-control">
            <input placeholder="Adınız Soyadınız" name="AdSoyad" type="text" required autofocus>
        </div>
        <div class="form-control">
            <input placeholder="E-Posta Adresiniz" name="mail" type="email" required>
        </div>
        <div class="form-control">
            <input placeholder="Konu" name="konu" type="text" required>
        </div>
        <div class="form-control">
            <textarea placeholder="Lütfen Mesajınızı Buraya Yazın.." name="mesaj" required></textarea>
        </div>
        <div class="form-control">
            <button name="submit" type="submit" id="submit">GÖNDER</button>
        </div>
    </form>
</div>

<?php
include "Alt.php";
?>